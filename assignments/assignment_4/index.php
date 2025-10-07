<?php
require_once "Calculator.php";

$Calculator = new Calculator();

$result="";
$result .= $Calculator->calc("*", 10, 2);
$result .= $Calculator->calc("*", 4.56, 2);
$result .= $Calculator->calc("/", 10, 2);
$result .= $Calculator->calc("/", 10, 3);
$result .= $Calculator->calc("/", 10, 0);
$result .= $Calculator->calc("/", 0, 10);
$result .= $Calculator->calc("-", 10, 2);
$result .= $Calculator->calc("-", 10, 20);
$result .= $Calculator->calc("+", 10.5, 2);
$result .= $Calculator->calc("+", 10.5, 0);
$result .= $Calculator->calc("*", 10);
$result .= $Calculator->calc("+","a",10);
$result .= $Calculator->calc("+",10,"a");
$result .= $Calculator->calc(10);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Calculator Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .output
        {
            line-height: 2.5;
        }
    </style>
</head>
<body class="container">
    <div class="row">
    <div class="col-lg-12 mx-auto">
    <div class="output">

    <h1>Calculator Output</h1>

    <main>
        <?php echo $result ?>
     </main>
</body>
</html>