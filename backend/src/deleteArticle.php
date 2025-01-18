<?php

function deleteArticle($db,$id){
    $statement = $db->prepare('DELETE FROM articles WHERE id = :id');
    $statement->execute([':id' => $id]);
}
echo "coucou";