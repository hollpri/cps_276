<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require_once 'php/fileUploadProc.php'; 
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>File and Directory Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body class="container">
      <div class="row">
            <div class="col-md-10 mx-auto">

                <h1>File Upload</h1>

                 <main>
                    <a href="https://russet-v8.wccnet.edu/~hmprice/cps_276/assignments/assignment_7/listFiles.php" style="text-decoration: none;">Show File List</a>
                </main>

                <body>
                    <?php
                        echo $output;
                    <?>
                </body>

                <form action="index.php" method="post">
                    <br>    

                    <label for="fileNames">File Name</label>
                    <input type="text" id="folder_name" name="folder_name" class="form-control" placeholder="">
                    <br>

                    <input type="file" accept="image/*">
                    <br><br>

                    <input type="submit" name="submitBtn" value="Upload File" class="btn btn-primary">
                    <br>
                </form>
</body>
</html>