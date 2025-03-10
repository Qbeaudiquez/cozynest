<?php

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $desc = $_POST['desc'];
    $category = $_POST['category'];
    $categoryId = getIdByNameCategory($db,$category);
    $autherId = $_SESSION['id'];
    echo $autherId;
    $article = new Article($db,$title,$content,$desc,$autherId,$categoryId,$dbMongoConnect);

    $article->save($_FILES);

}
