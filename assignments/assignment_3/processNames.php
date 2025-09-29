<?php  
      $inputtedName = "";
      $nameExploded = "";
      $firstName = "";
      $lastName = "";

      $allNames = "";
      $namesArray = [""];

    function addClearNames()
    {
        if (isset($_POST['addName'])) 
        {
            // inputted name into appropriate organization
            $inputtedName = $_POST['name'];
            $nameExploded = explode(" ", $inputtedName, 2);

            $firstName = $nameExploded[0];
            $lastName = $nameExploded[1];

            $newName = $nameExploded[1] . ", " . $nameExploded[0];

            // updating array w/ new name

            $nameList = $_POST['namelist'];
            $namesArray = explode("\n", $nameList);
            array_push($namesArray, $newName);

            // lastly organizing alphabetically

            sort($namesArray);

            $nameList = implode("\n", $namesArray);

            return $nameList;
        } 
        elseif (isset($_POST['clearName'])) 
        {
            $nameList = "";
        }

    }


