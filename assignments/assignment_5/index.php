<?php

$return = ['message' => '', 'filePath' => ''];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require_once 'classes/Directories.php'; 

    $directoryName = $_POST['folder_name'];
    $fileInsides = $_POST['file_content'];

    $myDirectory = new Directories();
    $return = $myDirectory->directo($directoryName, $fileInsides);
    }
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

                <h1>File and Directory Assignment</h1>
                <p>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.</p>

                 <main>
                    <?php echo $return['message']?>

                    <br>

                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $return['message'] === 'File and directory were created'): ?>
                        <a href="<?= htmlspecialchars($return['filePath']); ?>">Path where file is located.</a>
                    <?php endif; ?>
                </main>

                <form action="index.php" method="post">
                    
                    <label for="names">Folder Name</label>
                    <input type="text" id="folder_name" name="folder_name" class="form-control" placeholder="">
                    <br>
                    
                    <label for="message">File Content</label>
                    <textarea id="file_content" name="file_content" rows="6" cols="80" class="form-control" placeholder=""></textarea>
                    <br>

                    <input type="submit" name="submitBtn" value="Submit" class="btn btn-primary">
                    <br>

                </form>
</body>
</html>