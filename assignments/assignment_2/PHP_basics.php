<?php
/*the even number loop*/

    $allNumbers = range(1,50);
    $evenNumbers = 'Even numbers: ';
    foreach ($allNumbers as $number)
    {
        if ($number % 2 == 0 && $number != 50)
        {
            $evenNumbers = $evenNumbers . $number . ' - ';
        }
        else if ($number == 50)
        {
            $evenNumbers = $evenNumbers . $number;
        }
    }
?>

<?php
/*the form with email and textarea*/

    $form = <<<EOD
        <form>
            <label for="email">Email Address:</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="name@example.com">
            <br>
            <label for="message">Example textarea:</label>
            <textarea id="message" name="message" rows="4" cols="50" class="form-control" placeholder=""></textarea>
            <br>
        </form>
    EOD;
?>

<?php
/*the table that lists what row and column it is*/

    function createTable($rows, $columns)
    {
        $table = '<table class="table table-bordered">';
            for ($i = 1; $i <= $rows; $i++) //this is giving each row
            {
                $table = $table . '<tr>';
                for ($j = 1; $j <= $columns; $j++) //this is giving each column
                {
                    $table = $table . '<td>Row ' . $i . ', Col ' . $j . '</td>';
                }
                $table = $table . '</tr>';
            }
        $table = $table . '</table>';
        
        return $table;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Basics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <?php
        echo $evenNumbers;
        echo $form;
        echo createTable(8, 6);
    ?>
    </body>
</html>
