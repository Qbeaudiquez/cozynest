<?php
require_once('/backend/src/config.php');
require_once('/backend/nosql/saveView.php');

// Indiquer que la réponse est au format JSON
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

// Vérifier ce que le serveur reçoit
error_log("Données reçues: " . print_r($data, true));

if(isset($data['articleId'])){
    $articleId = $data['articleId'];

    // Sauvegarder la vue
    $result = saveView($dbMongoConnect, $articleId);

    if ($result) {
        http_response_code(200);
        echo json_encode(['message' => 'Compteur de vues mis à jour']);
    } else {
        http_response_code(500);
        echo json_encode(['message' => 'Erreur lors de la mise à jour']);
    }
} else {
    // Si l'ID de l'article est manquant
    http_response_code(400);
    echo json_encode(['message' => 'ID de l’article manquant']);
}
