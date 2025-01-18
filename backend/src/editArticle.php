<?php
    require_once('/backend/sql/dataCategories.php');

    $categoryName = $_POST['editCategory'];
    $idCategory = getIdByNameCategory($db,$categoryName);
    $idArticle = $_POST['editArticleId'];
    $title = htmlspecialchars(trim($_POST['editTitle']));
    $content = htmlspecialchars(trim($_POST['editContent']));
    $desc = htmlspecialchars(trim($_POST['editDesc']));

    $query = "UPDATE articles
        SET title = :title,
            content = :content,
            description = :desc,
            cat_id = :cat_id
        WHERE id = :idArticle";

    $statement = $db->prepare($query);
    
    $statement->execute([
        ':title' => $title,
        ':content' => $content,
        ':desc' => $desc,
        ':idArticle' => $idArticle,
        ':cat_id' => $idCategory
    ]);

    $file = $_FILES;

    if(isset($file) && $file['editPicture']['error'] === UPLOAD_ERR_OK){
        $uploadDir = '/frontend/assets/img/backArticle/';
        $ext = ".png";
        $uploadFile = $uploadDir . $idArticle . $ext;

        $fileType = mime_content_type($file['editPicture']['tmp_name']);
        if(strpos($fileType, 'image') === 0){
            move_uploaded_file($file['editPicture']['tmp_name'], $uploadFile);
        }
        
    }
