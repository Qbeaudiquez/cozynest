<?php

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $desc = $_POST['desc'];
    $category = $_POST['category'];
    $categoryId = getIdByNameCategory($db,$_POST['category']);

    $article = new Article($db,$title,$content,$desc,1,$categoryId,$dbMangoConnect);

    $article->save($_FILES);

}
