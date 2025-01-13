<?php

function getArticles($db,$type = 'all', $category = null) {
    
    if ($type === 'last') {
        $query = "SELECT a.*,c.name AS category 
        FROM articles a 
        JOIN categories c ON a.cat_id = c.id 
        ORDER BY a.date DESC 
        LIMIT 4";
    } elseif ($type === 'category' && $category) {
        $query = "SELECT a.*, c.name AS category
        FROM articles a
        JOIN categories c ON a.cat_id = c.id 
        WHERE c.name = :category 
        ORDER BY a.date DESC 
        LIMIT 4";
    } else {
        $query = "SELECT a.*, c.name AS category
        FROM articles a
        JOIN categories c ON a.cat_id = c.id
        ORDER BY a.date DESC";
    }

    $stmt = $db->prepare($query);
    
    if ($type === 'category' && $category) {
        $stmt->bindParam(':category', $category);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

