<?php
require_once('/backend/src/classes/articleClass.php');
$categories = getTableData($db, 'categories');
$articles = getTableData($db,'articles')
?>

<div class="articlesDisplay display" id="articles">
    <form action="admin.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" id="title" placeholder="Titre">
        <textarea name="content" id="content" placeholder="Contenue ..."></textarea>
        <input type="text" name="desc" id="desc" placeholder="Description">
        <select name="category" id="category">
            <?php foreach($categories as $category):?>
                <option value="<?= $category['name']?>"><?= $category['name']?></option>
            <?php endforeach?>
        </select>
        <input type="file" name="picture" id="picture" accept="image/*" requiered>
        <input type="submit" value="teste">
    </form>

    <?php require_once('/backend/src/createArticle.php');?>

<div class="articlesContainer">
    <?php foreach($articles as $article):?>
        <div class="article">
            <h4 class="titleArtivle"><?=$article['title']?></h4>
            <p class="descArticle"><?=$article['description']?></p>
            <form action="admin.php" method="post">
                <input type="text" name="deleteArticleId" id="deleteBtn" value="<?=$article['id']?>" hidden>
                <input type="submit" value="Supprimer">
            </form>
            <a href="editArticle.php">
                <button class='buttonEditArticle' data-article-id='<?=$article['id']?>'>Modifier</button>
            </a>
        </div>
    <?php endforeach?>

    <?php require_once('/backend/src/deleteArticle.php');?>
</div>
</div>

<?php if(isset($_POST['title']) || isset($_POST['deleteArticleId'])){
    echo '<script> redirectionPage("admin.php") </script>';
}




