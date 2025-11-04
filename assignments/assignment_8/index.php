<?php
require_once 'classes/Date_time.php';
$dt = new Date_time();
$notes = $dt->checkSubmit();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Date-Time Notes Assignment 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body class="container">
      <div class="row">
            <div class="col-md-10 mx-auto">

                <h1>Add Note</h1>

                 <main>
                    <a href="https://russet-v8.wccnet.edu/~hmprice/cps_276/assignments/assignment_8/display_notes.php" style="text-decoration: none;">Display Notes</a>

                    <br><br>
                    <?php echo $notes ?>
                </main>

                <form action="index.php" method="post">
                    <br>    

                    <label for="inputDateTime">Date and Time</label>
                    <input type="datetime-local" class="form-control" id="dataTime" name="dateTime">
                    <br>

                    <label for="inputNote">Note</label>
                    <textarea id="note" name="note" rows="4" cols="50" class="form-control" placeholder=""></textarea>
                    <br>

                    <input type="submit" name="addNoteSubmitBtn" value="Add Note" class="btn btn-primary">
                    <br>
                </form>
</body>
</html>