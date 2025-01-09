<?php

$serveurname = "mysql";
$username = getenv("MYSQL_USER");
$password = getenv("MYSQL_PASSWORD");
$dbname = getenv("MYSQL_DATA_BASE");

try {
    $connexion = new PDO("mysql:host=$serveurname;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}