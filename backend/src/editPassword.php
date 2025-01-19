<?php

if(isset($_POST['oldPw']) && isset($_POST['newPw']) && isset($_POST['repeatNewPw'])){
    require_once('/backend/src/createSecurePassword.php');
    $oldPw = htmlspecialchars($_POST['oldPw']);
    $newPw = htmlspecialchars($_POST['newPw']);
    $repeatNewPw = htmlspecialchars($_POST['repeatNewPw']);

     if(!password_verify($oldPw, $hashedPw)){
        echo "Ancien mot de passe invalide";
    }elseif($newPw !== $repeatNewPw){
        echo "Nouveaux mot de passe non identique";     
    }else{
        $hashedNewPw = createSecurePassword($newPw);
        $statement = $db->prepare(
            "UPDATE user
            SET password = :password
            WHERE id = :id");
        $statement->execute([
            ':password' => $hashedNewPw,
            ':id' => $userId
        ]);
        echo "Mot de passe changé avec succès";
    }
}