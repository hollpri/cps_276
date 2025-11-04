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

                <h1>Display Notes</h1>

                 <main>
                    <a href="https://russet-v8.wccnet.edu/~hmprice/cps_276/assignments/assignment_8/index.php" style="text-decoration: none;">Add Note</a>
                
                </main>

                <form action="display_notes.php" method="post">
                    <br>    

                    <label for="begDate">Beginning Date</label>
                    <br>
                    <input type="date" class="form-control" id="begDate" name="begDate">
                    <br>

                    <label for="endDate">Ending Date</label>
                    <br>
                    <input type="date" class="form-control" id="endDate" name="endDate">
                    <br>

                    <input type="submit" name="displayNoteSubmitBtn" value="Display Note" class="btn btn-primary">
                    <br>
                </form>

                <main>
                    <br>
                    <?php echo $notes ?>
                </main>
</body>
</html>