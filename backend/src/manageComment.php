<?php

if(isset($_POST['manageCommentId'])){
    if(isset($_POST['deleteComment'])){

    $query = "DELETE FROM comments WHERE id = :id";

    }elseif (isset($_POST['validComment'])){

    $query = "UPDATE comments SET is_valid = 1 WHERE id = :id";
    }

    $commentId = $_POST['manageCommentId'];

    $statement = $db->prepare($query);
    $statement->execute([
        ':id' => $commentId
    ]);
        echo "<script>redirectionPage('admin.php')</script>";
}else{
    echo "<div class'noCommentContainer'>Aucun commentaire a manager</div>";
}

