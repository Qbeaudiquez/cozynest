<?php

function getCommentCount($db, $articleId = null, $validity = null) {
    $validityCondition = '';

    if ($validity === 'valid') {
        $validityCondition = 'AND is_valid = 1';
    } elseif ($validity === 'invalid') {
        $validityCondition = 'AND is_valid = 0';
    }

    if ($articleId !== null) {
        $stmt = $db->prepare("SELECT COUNT(*) AS total 
                              FROM comments 
                              WHERE article_id = :articleId 
                              $validityCondition");
        $stmt->execute([':articleId' => $articleId]);
    } else {
        $stmt = $db->prepare("SELECT COUNT(*) AS total 
                              FROM comments");
        $stmt->execute();
    }

    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

function getComment($db, $isValid, $articleId = null){
    if($articleId !== null){
        $statement = $db->prepare(
            "SELECT *
            FROM comments
            WHERE article_id = :articleId 
            AND is_valid = :isValid");
        $statement->execute([
            ':articleId' => $articleId,
            ':isValid' => $isValid
        ]);
        
    }else{
        $statement = $db->prepare(
            "SELECT *
            FROM comments
            WHERE is_valid = :isValid");
        $statement->execute([
            ':isValid' => $isValid
        ]);
    }
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
