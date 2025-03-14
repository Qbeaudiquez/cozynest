<?php

// Connexion MySQL avec JawsDB
$jawsdb_url = getenv("JAWSDB_URL");
if ($jawsdb_url) {
    // Parse l'URL de la base de données JawsDB
    $parsed_url = parse_url($jawsdb_url);

    $username = $parsed_url['user'];
    $password = $parsed_url['pass'];
    $dbname = ltrim($parsed_url['path'], '/');
    $servername = $parsed_url['host'];
    $port = $parsed_url['port'];

    // DSN pour MySQL
    $dsn = "mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8mb4";

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        echo "Erreur de connexion MySQL : " . $e->getMessage();
    }
} else {
    echo "La variable d'environnement JAWSDB_URL n'est pas définie.";
}

// Connexion MongoDB avec MONGODB_URI
$mongoUri = getenv("MONGODB_URI");
if ($mongoUri) {
    try {
        $dbMongoConnect = new MongoDB\Driver\Manager($mongoUri);
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo "Erreur de connexion MongoDB : " . $e->getMessage();
    }
} else {
    echo "La variable d'environnement MONGODB_URI n'est pas définie.";
}

?>