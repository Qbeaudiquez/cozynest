<?php

function getRoleNameById($db,$id){
    $statement = $db->prepare(
        "SELECT name
        FROM role
        WHERE id = :id");
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->fetch(PDO::FETCH_ASSOC)['name'];
}