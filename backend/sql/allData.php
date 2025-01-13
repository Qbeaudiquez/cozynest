<?php
require_once('/backend/src/config.php');

require_once('/backend/src/classes/article.php');

$tables = $db->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

foreach($tables as $table){
    $statement = $db->prepare("SELECT * FROM $table");
    $statement->execute();

    $data[$table] = $statement->fetchAll(PDO::FETCH_ASSOC);
    
}