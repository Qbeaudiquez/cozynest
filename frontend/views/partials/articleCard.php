<link rel='stylesheet' href='/assets/css/cardArticle.css'>
<?php

// Join data script
require_once('/backend/sql/dataComment.php');
require_once('/backend/nosql/dataViewCount.php');

// Icons variable
$commentIcon = file_get_contents('/frontend/assets/img/icons/comment.svg');
$viewIcon = file_get_contents('/frontend/assets/img/icons/view.svg');
$divArticle = 0;

foreach($articles as $article){

    $articleId = $article['id'];
    $commentCount = getCommentCount($db, $articleId, 'valid');
    $divArticle ++;
    $viewsCount = getViewArticle($dbMongoConnect, $articleId);

    echo "
    <article style='background-image:url(\"../../assets/img/backArticle/$articleId.png\");' class='cardContainer div$divArticle'>
    <a href='article.php?id=$articleId#down' class='incView' data-article-id='$articleId'>
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
            <div class='viewContainer containers'>
                $viewIcon
                <p class='view'>$viewsCount</p>
            </div>
        </div>
    </div>
    </a>
</article>
";
}
?>
