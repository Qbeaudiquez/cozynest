<?php
require_once('/backend/src/config.php');

require_once('/backend/src/classes/article.php');



function getTableData($db, $tableName) {
    $statement = $db->prepare("SHOW TABLES LIKE :tableName");
    $statement->execute([':tableName' => $tableName]);

    if ($statement->rowCount() === 0) {
        throw new Exception("Table $tableName does not exist in the database.");
    }

    $query = $db->prepare("SELECT * FROM `$tableName`");
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}