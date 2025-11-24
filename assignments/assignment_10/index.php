<?php
$output = "";
$acknowledgement = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'php/rest_client.php';
    $result = getWeather();
    $acknowledgement = $result[0];
    $output = $result[1];

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Zip Code Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body class="container">
      <div class="row">
            <div class="col-md-10 mx-auto">

                <h1>Enter Zip Code to Get City Weather</h1>

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