<?php

class Directories {

    public $directoryNameInput = "initializing";
    public $fileInsidesInput = "initializing";

    public function directo($directoryNameInput = null, $fileInsidesInput = null) 
    {

        if ($directoryNameInput === "" || $fileInsidesInput === "")
        {
            return [
                'message' => "File could not be created"
            ];
        }

        $originalDirectory = "/home/h/m/hmprice/public_html/cps_276/assignments/assignment_5/directories/";
        $directoryToTest = $originalDirectory . $directoryNameInput . "/";

        $fileToCreate = "readme.txt";
        $pathToFile = $directoryToTest . $fileToCreate;

        $pathToWeb = "directories/$directoryNameInput/readme.txt";

        if (is_dir($directoryToTest))
        {
            return [
                'message' => "A directory already exists with that name"
            ];
        }
        else
        {
            mkdir("$directoryToTest");
            chmod("$directoryToTest", 0777);

            file_put_contents("$pathToFile", "$fileInsidesInput");

            $textReturnMessage = "File and directory were created";

            return [
            'message' => $textReturnMessage,
            'filePath' => $pathToWeb
            ];
        }

    }

}


