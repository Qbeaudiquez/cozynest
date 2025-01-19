<?php

function getUserById($db, $id){
    $statement = $db->prepare("SELECT * FROM user WHERE id = :id");
    $statement->execute([
        'id' => $id
    ]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}