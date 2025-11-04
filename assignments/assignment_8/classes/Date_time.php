<?php

class Date_time {

    public function checkSubmit() 
    {
        $outputMsg = '';
        
        if (isset($_POST['addNoteSubmitBtn']))
        {
            $dateTime = $_POST['dateTime'];
            $note = $_POST['note'];

            if (empty($dateTime) || empty($note))
            {
                $outputMsg = 'Error: date/time and note must both be inputted';
            }
            else
            {
                $timestamp = strtotime($dateTime);

                $sql = 'INSERT INTO timeAndNotes (time_field, notes_field) VALUES (:timestamp, :note)';
                $bindings = [[":timestamp", $timestamp, "int"], [":note", $note, "str"]];

                require_once "Pdo_methods.php";
                $pdo = new PdoMethods();

                $pdo->otherBinded($sql, $bindings);

                $outputMsg = 'Note has been added';
            }
        }
        else if (isset($_POST['displayNoteSubmitBtn']))
        {
            $begDate = $_POST['begDate'];
            $endDate = $_POST['endDate'];

            if (empty($begDate) || empty($endDate))
            {
                $outputMsg = 'Error: beginning and ending date must both be inputted';
            }
            else
            {
                $begTimestamp = strtotime($begDate);
                $endTimestamp = strtotime($endDate);

                require_once "Pdo_methods.php";
                $pdo = new PdoMethods();

                $sql = 'SELECT * FROM timeAndNotes WHERE time_field BETWEEN :begTimestamp AND :endTimestamp ORDER BY time_field DESC';
                $bindings = [[":begTimestamp", $begTimestamp, "int"], [":endTimestamp", $endTimestamp, "int"]];


                $notes = $pdo->selectBinded($sql, $bindings);

                if (($notes === 'error') || (empty($notes))) {
                    $outputMsg = 'Error displaying table';
                } 
                else 
                {
                    $outputMsg = '<table class="table table-striped"><tr><th>Date and Time</th><th>Notes</th></tr>';
                    foreach ($notes as $note) {
                        $dateReadable = date('m/d/Y g:i a', $note['time_field']);
                        $noteReadable = $note['notes_field'];
                        $outputMsg .= "<tr><td>{$dateReadable}</td><td>{$noteReadable}</td></tr>";
                    }

                    $outputMsg .= '</table>';
                }
            }

        }
        return $outputMsg;
    }

}