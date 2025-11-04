<?php

require_once 'classes/Db_con.php';
$db = new DB_con();

$rows = $db->getAllFiles();

$fileLinks = [];
foreach ($rows as $row)
{
    $fileLinks[] = "<a href='{$row['file_path']}' target='_blank'>{$row['file_name']}</a>";
}