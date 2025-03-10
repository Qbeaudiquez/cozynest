<?php
function getIdByNameCategory($db,$name){

    $statement = $db->prepare("SELECT * FROM categories WHERE name = :name");
    $statement->execute([':name' => $name]);
    return $statement->fetch(PDO::FETCH_ASSOC)['id'];
}