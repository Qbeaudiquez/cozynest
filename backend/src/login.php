<?php
function login($db, $username, $password){
    $statement = $db->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
    $statement->execute(['pseudo' => $username]);
    $loginData = $statement->fetch(PDO::FETCH_ASSOC);
    $loginPassword = $loginData['password'];
    

    if($loginData && password_verify($password,$loginPassword)){
        
        $_SESSION['user'] = $loginData['pseudo'];
        $_SESSION['role'] = $loginData['role_id'];
        $_SESSION['id'] = $loginData['id'];
        return true;
    }
    return false;
}