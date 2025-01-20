<?php
require_once('/backend/sql/dataUser.php');
if($_SESSION){
    $userId = $_SESSION['id'];
    $user = getUserById($db, $userId);
    $hashedPw = $user['password'];
}
?>

<div class="userDisplay display" id="users">
    <div class="connectedUserContainer">
        <div class="pseudoEmailContainer">
            <h3 class="connectedUserPseudo"><?= $user['pseudo']?></h3>
            <p class="connectedUserEmail"><?= $user['email']?></p>
        </div>
        <form action="admin.php" method="post">
            <fieldset>
            <legend>Changer de mot de passe</legend>
                <label for="oldPw">Ancien mot de passe</label>
                <input type="password" name="oldPw" class="oldPw" required>
                <br>
                <label for="newPw">Nouveau mot de passe</label>
                <input type="password" name="newPw" class="newPw" required>
                <br>
                <label for="repeatNewPw">Confirmer le nouveau mot de passe</label>
                <input type="password" name="repeatNewPw" class="repeatNewPw" required>
                <br>
                <input type="submit" value="Valider">
            </fieldset>
        </form>
        <?php require_once('/backend/src/editPassword.php') ?>
    </div>
</div>