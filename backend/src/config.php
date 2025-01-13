<?php

$username = getenv("MYSQL_USER");
$password = getenv("MYSQL_PASSWORD");
$dbname = getenv("MYSQL_DATA_BASE");


$servername = "mysql";
$port = 3306;


$dsn = "mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8mb4";

try {
    
    $db = new PDO($dsn, $username, $password);
    
} catch (PDOException $e) {
    
    echo "Erreur : " . $e->getMessage();
}

$mongoHost = 'mongo';
$mongoPort = '27017';
$mongoDbName = getenv("MONGO_INITDB_ROOT_USERNAME");
$mongoPassword = getenv("MONGO_INITDB_ROOT_PASSWORD");
$mongoUser = getenv("MONGO_INITDB_ROOT_USERNAME");

try {
    $manager = new MongoDB\Driver\Manager("mongodb://$mongoUser:$mongoPassword@$mongoHost:$mongoPort");

} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "Erreur de connexion à MongoDB : " . $e->getMessage();
}


?>
