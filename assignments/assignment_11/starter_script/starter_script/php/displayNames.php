<?php

require_once __DIR__ . '/../classes/Pdo_methods.php';

$sql = "SELECT name FROM names ORDER BY name ASC";
$pdo = new PdoMethods();
$rows = $pdo->selectNotBinded($sql);

if (empty($rows)) 
{
    $output = "No names to display";
} 
else 
{
    $output = '';
    foreach ($rows as $row) 
    {
        $output .= htmlspecialchars($row['name']) . "<br>";
    }
}

echo json_encode(['masterstatus' => 'success', 'names' => $output]);


?>