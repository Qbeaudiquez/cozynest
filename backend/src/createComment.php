
<?php

if(isset($_POST['pseudo']) && isset($_POST['commentContent'])){
    var_dump($_POST);
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $commentContent = htmlspecialchars(trim($_POST['commentContent']));
    
    $comment = new Comment($db,$pseudo,$commentContent,$id);

    $comment->save($id);

    echo "<script>redirectionPage('article.php?id=$id');</script>";
}


