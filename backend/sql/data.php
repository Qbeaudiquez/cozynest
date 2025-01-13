<?php
require_once('/backend/src/config.php');

require_once('/backend/src/classes/article.php');

$tables = $db->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

foreach($tables as $table){
    $statement = $db->prepare("SELECT * FROM $table");
    $statement->execute();

    $data[$table] = $statement->fetchAll(PDO::FETCH_ASSOC);
    
}

function getLastFiveArticles($db, $catId = null){
    if($catId){
        $statement = $db->prepare("SELECT * FROM articles WHERE cat_id = :catId ORDER BY date DESC LIMIT 5");
        $statement->bindParam(':catId', $catId, PDO::PARAM_INT);    
    }else{
        $statement = $db->prepare("SELECT * FROM articles ORDER BY date DESC LIMIT 5");
    }
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

$fiveLastArticleWithoutCategory = getLastFiveArticles($db);

$fiveLastArticlesWithCategories = [];

foreach($data['categories'] as $category){
    $catId = $category['id'];
    $fiveLastArticlesWithCategories[$category['name']] = getLastFiveArticles($db, $catId);
}

