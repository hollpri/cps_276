<?php

require_once __DIR__ . '/../classes/Pdo_methods.php';

$sql = "DELETE FROM names";
$pdo = new PdoMethods();
$result = $pdo->otherNotBinded($sql);

header('Content-Type: application/json');
echo json_encode(['masterstatus' => 'success', 'msg' => 'All names cleared.']);

?>