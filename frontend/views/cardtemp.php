<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/config.css">
<link rel="stylesheet" href="/assets/css/cardArticle.css">
<article class="cardContainer">
    <div class="dateContainer">
        <p class="cardDate">Date</p>
    </div>
    <div class="aboutContainer">
        <h3 class="titleCard">Title</h3>
        <p class="descCard">Description</p>
        <div class="catCommentLikeContainer">
            <div class="catContainer">
                <p class="cat">Quatégorie</p>
            </div>
            <div class="commentLikeContainer">
                <div class="commentContainer">
                    <?= file_get_contents("/frontend/assets/img/icons/comment.svg")?>
                </a>
                    <p class="comment">0</p>
                </div>
                <div class="likeContainer">
                    <?= file_get_contents("/frontend/assets/img/icons/like.svg")?>
                </a>
                    <p class="like">0</p>
                </div>
            </div>
        </div>
    </div>
</article>