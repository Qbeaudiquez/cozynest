<?php
require('/backend/src/config.php');
function createAdmin($db, $email, $pseudo, $password, $id) {
    // Hashage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Requête SQL pour insérer un admin
    $query = $db->prepare("INSERT INTO user (email, pseudo, password, role_id) VALUES (:email, :user, :password, :id)");
    $query->execute([
        'email' => $email,
        'user' => $pseudo,
        'password' => $hashedPassword,
        'id' => $id
    ]);

    return $query->rowCount() > 0; 
}

// Exemple d'utilisation
if (createAdmin($db, 'delescaille.elo@gmail.com', 'Elodie', 'HDzG57wh8wE22e', 1)) {
    echo "Admin créé avec succès !";
}
?>
