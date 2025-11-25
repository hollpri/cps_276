<?php

$full_Name_OG = "";
$first_Name = "";
$last_Name = "";
$full_Name_Complete = "";

require_once __DIR__ . '/../classes/Pdo_methods.php';

try 
{
    $raw = file_get_contents("php://input");
    $data = json_decode($raw, true);

    $full_Name_OG = trim($data['name']);
    $parts = explode(" ", $full_Name_OG, 2);

    $first_Name = $parts[0];
    $last_Name = $parts[1] ?? '';

    $full_Name_Complete = $last_Name . ", " . $first_Name;

    $sql = "INSERT INTO names (name) VALUES ('$full_Name_Complete')";

    $pdo = new PdoMethods();
    $result = $pdo->otherNotBinded($sql);

    header('Content-Type: application/json');
    echo json_encode(['masterstatus' => 'success', 'msg' => "Added: $full_Name_Complete"]);
}
catch (Exception $e)
{
    header('Content-Type: application/json');
    echo json_encode(['masterstatus' => 'error', 'msg' => "Error, failed to add: $full_Name_Complete" . $e->getMessage()]);
}

?>