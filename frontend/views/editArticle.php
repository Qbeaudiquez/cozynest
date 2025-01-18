<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/config.css">
<link rel="stylesheet" href="../assets/css/editArticle.css">
<script src="../assets/js/redirectionPage.js"></script>
<?php 
require_once('/backend/src/config.php');
require_once('/backend/sql/dataArticles.php');
require_once('/backend/sql/allData.php');
$categories = getTableData($db, 'categories');
?>



<?php if(isset($_POST['editArticleId']) && isset($_POST['editArticleIdBtn'])): ?>
    
    <?php 
    $idArticle = $_POST['editArticleId'];
    $article = getArticleById($db, $idArticle);
    ?>
    <form action="editArticle.php" method="post" enctype="multipart/form-data" class="editForm">
        <img src="../assets/img/backArticle/<?= $idArticle?>.png" alt="">
        <input type="text" name="editTitle" class="editInput" value="<?= $article['title'] ?>" requiered>
        <textarea name="editContent" class="editInput editContent" requiered><?= $article['content'] ?></textarea>
        <input type="text" name="editDesc" class="editInput" value="<?= $article['description'] ?>" requiered>
        <select name="editCategory" class="editCategory editInput editBtn">
            <?php foreach($categories as $category):?>
                <option value="<?= $category['name']?>"><?= $category['name']?></option>
            <?php endforeach?>
        </select>
        <input type="file" name="editPicture" class="editInput" accept="image/*">
        <input type="hidden" name="editArticleId" value="<?=$idArticle?>">
        <input type="submit" value="Modifier" class="editInput editBtn" >
        <a href="admin.php" class="backBtn btn">Retour au dashbord</a>
    </form>

<?php elseif(isset($_POST['editTitle'])) :?>
    <?php require_once('/backend/src/editArticle.php');?>
    <div class="answerContainer">
        <p class="answer">Article modifié</p>
        <div class="backLookContainer">
            <a href="admin.php" >Retour au dashbord</a>
        <form action="article.php?id=<?=$_POST['editArticleId']?>#down" method="post">
            <input type="submit" value="Voir l'article" class="lookBtn btn">
        </form>
        </div>
        
<?php else :?>
    <div class="answerContainer">
        <p class="answer">Aucun article n'a été selectionné</p>
        <a href="admin.php" class="backBtn btn">Retour au dashbord</a>
    </div>
<?php endif ?>