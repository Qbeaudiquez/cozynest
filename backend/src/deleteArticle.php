<?php

function deleteArticle($db,$id,$dbMongoConnect){
    $statement = $db->prepare('DELETE FROM articles WHERE id = :id');
    $statement->execute([':id' => $id]);


    $database = 'cozynest';
    $collection = 'viewCount';

    $filter = ['article_id' => (int)$id];

    $delete = new MongoDB\Driver\BulkWrite;
    $delete->delete($filter);

    try {
        $result = $dbMongoConnect->executeBulkWrite("$database.$collection", $delete);

        if ($result->getDeletedCount() > 0) {
            echo "L'article avec l'ID $id a été supprimé de la collection $collection.";
        } else {
            echo "Aucun article trouvé pour cet ID.";
        }
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo "Erreur MongoDB : " . $e->getMessage();
    }

    $picturePath = "/frontend/assets/img/backArticle/$id.png";

    if (file_exists($picturePath)) {
        unlink($picturePath);
    }
}

if(isset($_POST['deleteArticleId'])){
    $id = $_POST['deleteArticleId'];
    echo deleteArticle($db,$id,$dbMongoConnect);
    echo "done ! ";
}