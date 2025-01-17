<?php

function getCommentCount($db, $articleId, $validity = null) {

    $validityCondition = '';
    
    if ($validity === 'valid') {
        $validityCondition = 'AND is_valid = 1';
    } elseif ($validity === 'invalid') {
        $validityCondition = 'AND is_valid = 0';
    }
    
    $stmt = $db->prepare("SELECT COUNT(*) AS total 
                          FROM comments 
                          WHERE article_id = :articleId 
                          $validityCondition");
    

    $stmt->execute([':articleId' => $articleId]);
    
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}