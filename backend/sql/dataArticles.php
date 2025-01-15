<?php

function getArticlesByNb($db, $type = null,$nbArticle = 100000, $category = null) {
    $query = null;

    if ($type === 'last') {
        $query = "SELECT a.*, c.name AS category 
                  FROM articles a 
                  JOIN categories c ON a.cat_id = c.id 
                  ORDER BY a.date DESC 
                  LIMIT $nbArticle";
    } elseif ($type === 'category' && !empty($category)) {
        $query = "SELECT a.*, c.name AS category
                  FROM articles a
                  JOIN categories c ON a.cat_id = c.id 
                  WHERE c.name = :category 
                  ORDER BY a.date DESC 
                  LIMIT $nbArticle";
    }else {
        $query = "SELECT a.*, c.name AS category 
                  FROM articles a 
                  JOIN categories c ON a.cat_id = c.id 
                  ORDER BY a.date DESC 
                  LIMIT $nbArticle";
    }

    if (!$query) {
        throw new InvalidArgumentException("Invalid type or missing category parameter.");
    }

    $statement = $db->prepare($query);

    if ($type === 'category' && !empty($category)) {
        $statement->bindParam(':category', $category, PDO::PARAM_STR);
    }

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}


function getArticleById($db, $id){
    $statement = $db->prepare(
        "SELECT *
        FROM articles
        WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
}