
<link rel='stylesheet' href='/assets/css/cardArticle.css'>
<?php

// Join data script
require_once('/backend/sql/dataCountComment.php');

// Icons variable
$commentIcon = file_get_contents('/frontend/assets/img/icons/comment.svg');
$likeIcon = file_get_contents('/frontend/assets/img/icons/like.svg');
$viewIcon = file_get_contents('/frontend/assets/img/icons/view.svg');

$idArticle = 0;

foreach($articles as $article){
    $commentCount = getCommentCount($db, $article['id'], $validity = null);
    $idArticle ++;
    echo "
    <article style='background-image:url(\"../../assets/img/backArticle/$idArticle.png\");' class='cardContainer div$idArticle'>
    <a href='article.php?id={$article['id']}'>
    <div class='dateContainer'>
        <div class='datebutton'>
            <p class='date'>{$article['date']}</p>
        </div>
    </div>
    <div class='aboutContainer'>
        <div class='titleDescCatContainer'>
            <h3 class='title'>{$article['title']}</h3>
            <p class='desc'>{$article['description']}</p>
            <div class='catContainer'>
                <p class='cat'>{$article['category']}</p>
            </div>
        </div>
        <div class='infoContainer'>
            <div class='commentContainer containers'>
                $commentIcon
                <p class='comment'>$commentCount</p>
            </div>
            <div class='likeContainer containers'>
                $likeIcon
                <p class='like'>30</p>
            </div>
            <div class='viewContainer containers'>
                $viewIcon
                <p class='view'>150</p>
            </div>
        </div>
    </div>
    </a>
</article>
";
}