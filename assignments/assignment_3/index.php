<?php
$output = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 require_once 'processNames.php'; 
 $output = addClearNames();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Basic Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container">
      <div class="row">
            <div class="col-lg-10 mx-auto">

                <h1>Add Names</h1>

                <form action="index.php" method="post">
                    
                    <input type="submit" name="addName" value="Add Name" class="btn btn-primary">
                    <input type="submit" name="clearName" value="Clear Names" class="btn btn-primary">
                    <br>

                    <label for="names">Enter Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="">
                    </label>
                    <br>

                <label for="output">List of Names</label>
                <textarea style="height: 500px;" class="form-control"
                id="namelist" name="namelist"><?php echo $output ?></textarea>
                </form>
</body>
</html>