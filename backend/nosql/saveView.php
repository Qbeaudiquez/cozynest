<?php
function saveView($mongoDb, $articleId) {
    $mongoDbName = 'cozynest';
    $collection = 'viewCount';
    $namespace = "$mongoDbName.$collection";

    $filter = ['article_id' => (int) $articleId];
    $update = ['$inc' => ['views_count' => 1]];
    $option = ['upsert' => true];

    $bulk = new MongoDB\Driver\BulkWrite();
    $bulk->update($filter, $update, $option);

    try {
        $result = $mongoDb->executeBulkWrite($namespace, $bulk);
        error_log("Vue mise à jour avec succès pour l'article ID : $articleId");
        return $result;
    } catch (MongoDB\Driver\Exception $e) {
        error_log("Erreur MongoDB : " . $e->getMessage());
        return false;
    }
}
