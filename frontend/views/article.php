<?php require_once('/frontend/views/partials/header.php'); 
require_once('/backend/sql/dataArticles.php');
require_once('/backend/sql/dataComment.php');
require_once('/backend/nosql/dataViewCount.php');
require_once('/backend/src/classes/commentClass.php');
?>
<link rel="stylesheet" href="/assets/css/article.css">
<script src="/assets/js/redirectionPage.js"></script>
<?php
// Icons variable
$commentIcon = file_get_contents('/frontend/assets/img/icons/comment.svg');
$viewIcon = file_get_contents('/frontend/assets/img/icons/view.svg');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $article = getArticleById($db, $id);
    $commentCount = getCommentCount($db, $id,'valid');
    $comments = getComment($db, 1 , $id);
    $viewsCount = getViewArticle($dbMongoConnect, $id);
}
    ?>
    <?php if($article):?>
        <article class='articleContainer' id='down'>
            <h2 class='articleTitle'><?=$article['title']?></h2>
            <div class='imgArticleContainer'>
                <img src='../../assets/img/backArticle/<?=$id?>.png' alt='' class='imgArticle'>
            </div>
            <div class='descArticleContainer'>
                <p class='descArticle'><?=$article['description']?></p>
            </div>
            <div class='contentArticle'><?=$article['content']?></div>
            <div class='aboutArticleContainer'>
                <div class='categoryContainer'>
                    <p class='category'><?=$article['category']?></p>
                </div>
                <div class='commentViewCntainer'>
                    <div class='commentContainer infoContainer'>
                        <?=$commentIcon?>
                        <p class='comment'><?=$commentCount?></p>
                    </div>
                    <div class='viewContainer infoContainer'>
                        <?=$viewIcon?>
                        <p class='view'><?=$viewsCount?></p>
                    </div>
                </div>
            </div>
        </article>
        <div class="answerContainer">
            <h3 class="answerTitle">Laisser un commantaire !</h3>
            <form action="article.php?id=<?= $id?>" method="post">
                <input type="text" name="pseudo" placeholder="Votre pseudo" required>
                <textarea name="commentContent" required></textarea>
                <input type="submit" value="Valider">
            </form>
        </div>
        <?php require_once('/backend/src/createComment.php');?>
        <div class="commentsContainer">
            <?php foreach($comments as $comment):?>
                <div class="commentContainer">
                    <h3 class="commentPseudo"><?= $comment['pseudo']?></h3>
                    <p class="commentContent"><?= $comment['content']?></p>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
