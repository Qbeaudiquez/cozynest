<?php
session_start();
function login($db, $username, $password){
    $statement = $db->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
    $statement->execute(['pseudo' => $username]);
    $loginData = $statement->fetch(PDO::FETCH_ASSOC);

    if($loginData && password_verify( $password,$loginData['password'])){
        
        $_SESSION['user'] = $loginData['pseudo'];
        $_SESSION['role'] = $loginData['role_id'];
        return true;
    }
    return false;
}