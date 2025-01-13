<link rel='stylesheet' href='/assets/css/cardArticle.css'>
<?php
$comment = file_get_contents('/frontend/assets/img/icons/comment.svg');
$like = file_get_contents('/frontend/assets/img/icons/like.svg');
$view = file_get_contents('/frontend/assets/img/icons/view.svg');
$idArticle = 0;
foreach($articles as $article){
    $idArticle ++;
    echo "
    
    <article class='cardContainer div$idArticle'>
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
                $comment
                <p class='comment'>10</p>
            </div>
            <div class='likeContainer containers'>
                $like
                <p class='like'>30</p>
            </div>
            <div class='viewContainer containers'>
                $view
                <p class='view'>150</p>
            </div>
        </div>
    </div>
</article>";
}