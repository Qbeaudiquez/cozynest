<link rel="stylesheet" href="../assets/css/dashbordLinkDisplay/articlesDisplays.css">
<?php
require_once('/backend/src/classes/articleClass.php');
$categories = getTableData($db, 'categories');
$articles = getTableData($db,'articles')
?>

<div class="articlesDisplay display" id="articles">
    <div class="createArticleContainer">
        <h4 class="createArticleTitle">Créer un nouvel article</h4>
        <form action="admin.php" method="post" enctype="multipart/form-data" class="createArticleForm">
        <input type="text" name="title" class="createTitle createInput" placeholder="Titre" required>
        <textarea name="content" class="createContent createInput" placeholder="Contenue ..." required rows="10"></textarea>
        <input type="text" name="desc" class="createDesc createInput" placeholder="Description" required>
        <select name="category" id="category" class="createCategory createInput">
            <?php foreach($categories as $category):?>
                <option value="<?= $category['name']?>"><?= $category['name']?></option>
            <?php endforeach?>
        </select>
        <input type="file" name="picture" id="picture" accept="image/*" required class="createInput">
        <input type="submit" value="Créer" class="createSubmit createInput">
    </form>
    </div>
    

    <?php require_once('/backend/src/createArticle.php');?>
<h4 class="manageArticleTitle">Tous les articles</h4>
<div class="articlesContainer">
    <?php foreach($articles as $article):?>
        <div class="article">
            <h4 class="titleArticle"><?=$article['title']?></h4>
            <div class="descContainer"><p class="descArticle"><?=$article['description']?></p></div>
            <form action="admin.php" method="post" class='deleteArticleContainer'>
                <input type="hidden" name="deleteArticleId" class="deleteArticleData" value="<?=$article['id']?>">
                <input type="submit" value="Supprimer" class="deleteArticleBtn manageBtn">
            </form>
            <form action="editArticle.php" method="post">
                <input type="hidden" name="editArticleId" value="<?=$article['id']?>">
                <input type="submit" name="editArticleIdBtn" value="Modifier" class="manageBtn">
            </form>
        </div>
    <?php endforeach?>

    <?php require_once('/backend/src/deleteArticle.php');?>
</div>
</div>

<?php if(isset($_POST['title']) || isset($_POST['deleteArticleId'])){
    echo '<script> redirectionPage("admin.php") </script>';
}