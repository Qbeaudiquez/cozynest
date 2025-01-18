<link rel="stylesheet" href="../assets/css/config.css">
<script src="../assets/js/redirectionPage.js"></script>
<?php 
require_once('/backend/src/config.php');
require_once('/backend/sql/dataArticles.php');
?>



<?php if(isset($_POST['editArticleId']) && isset($_POST['editArticleIdBtn'])): ?>
    
    <?php 
    $idArticle = $_POST['editArticleId'];
    $article = getArticleById($db, $idArticle);
    ?>
    <form action="editArticle.php" method="post" enctype="multipart/form-data">
        <img src="../assets/img/backArticle/<?= $idArticle?>.png" alt="">
        <input type="text" name="editTitle" id="" value="<?= $article['title'] ?>" requiered>
        <textarea name="editContent" id="" requiered><?= $article['content'] ?></textarea>
        <input type="text" name="editDesc" id="" value="<?= $article['description'] ?>" requiered>
        <input type="file" name="editPicture" id="" accept="image/*">
        <input type="hidden" name="editArticleId" value="<?=$idArticle?>">
        <input type="submit" value="Modifier">
        <a href="admin.php">Retour</a>
    </form>

<?php elseif(isset($_POST['editTitle'])) :?>
    <?php require_once('/backend/src/editArticle.php');?>
    <div class="answerContainer">
        <p class="answer">Article modifié</p>
        <a href="admin.php">Retour</a>
        <?= var_dump($_POST)?>
        <form action="article.php?id=<?=$_POST['editArticleId']?>#down" method="post">
            <input type="submit" value="Voir l'article">
        </form>
<?php else :?>
    <div class="answerContainer">
        <p class="answer">Aucun article n'a été selectionné</p>
        <a href="admin.php">Retour</a>
    </div>
<?php endif ?>