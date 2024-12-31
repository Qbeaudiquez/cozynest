<?php
$serveurname = "mysql";
$username = "user";
$password = "password";
$dbname = "blog_hygge";

try{
    $connexion = new PDO("mysql:host=$serveurname;dbname=$dbname", $username, $password);
}catch (PDOExecption $e) {

    echo "Error : " . $e->getMessage();
}

echo "bdd chargé";