<?php
$lastArticles = getArticlesByNb($db);
$comments = getTableData($db, 'comments');
$allCountViews = getTotalViews($dbMongoConnect);
$allCountComments = getCommentCount($db);
$allCountArticles = getCountArticle($db);
?>

<link rel="stylesheet" href="/assets/css/dashbordLinkDisplay/homeDisplay.css">
<div class="homeDisplay display active" id="home">
    <div class="articlesViewsContainer">
        <div class="infoContainer">
            <div class="head">
                <div class="titleNbContainer">
                    <h3 class="title">Articles</h3>
                    <p class="nb"><?= $allCountArticles ?></p>
                </div>
                <?php include('/frontend/assets/img/icons/comment.svg')?>
            </div>
            <div class="smallTitleContainer">
                <h4 class="smallTitle">Dernier articles publiés</h4>
            </div>
           <div class="feedContainer">
           <?php foreach($lastArticles as $lastArticle):?>
                <div class="articleContainer">
                    <h5 class="articlesTitle"><?= $lastArticle['title'] ?></h5>
                    <p class="creatAt"><?= $lastArticle['date'] ?></p>
                </div>
            <?php endforeach ?>
           </div> 
        </div>
        <div class="infoContainer">
            <div class="head">
                <div class="titleNbContainer">
                    <h3 class="title">Vues</h3>
                    <p class="nb"><?=$allCountViews?></p>
                </div>
                <?php include('/frontend/assets/img/icons/view.svg')?>
            </div>
            <div class="smallTitleContainer">
                <h4 class="smallTitle">Articles les plus vue</h4>
            </div>
           <div class="feedContainer">
           <?php foreach($lastArticles as $lastArticle):?>
                <div class="articleContainer">
                    <h5 class="articlesTitle"><?= $lastArticle['title'] ?></h5>
                    <p class="creatAt"><?= $lastArticle['date'] ?></p>
                </div>
            <?php endforeach ?>
           </div> 
        </div>
    </div>
    <div class="infoContainer comments">
        <div class="head">
            <div class="titleNbContainer">
                <h3 class="title">Commentaires</h3>
                <p class="nb"><?=$allCountComments?></p>
            </div>
            <?php include('/frontend/assets/img/icons/article.svg')?>
        </div>
        <div class="smallTitleContainer">
                <h4 class="smallTitle">Commentaires a valider</h4>
        </div>
        <div class="feedContainer">
            <?php foreach($comments as $comment):?>
                <?php if($comment['is_valid'] === 0):?>
                    <div class="commentContainer">
                        <h3 class="content">Pseudo : <?=$comment['pseudo']?></h3>
                        <p class="creatAt">Commentaire : <?=$comment['content']?></p>
                    </div>
                <?php endif ?>
            <?php endforeach?>
        </div>
    </div>
</div>