<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/config.css">
<link rel="stylesheet" href="/assets/css/cardArticle.css">
<article id="cardContainer">
    <div id="dateContainer">
        <p id="date">Date</p>
    </div>
    <div id="aboutContainer">
        <h3 id="titleCard">Title</h3>
        <p id="descCard">Description</p>
        <div id="catCommentLikeContainer">
            <div id="catContainer">
                <p id="cat">Quatégorie</p>
            </div>
            <div id="commentLikeContainer">
                <div id="commentContainer">
                    <?= file_get_contents("/frontend/assets/img/icons/comment.svg")?>
                </a>
                    <p id="comment">0</p>
                </div>
                <div id="likeContainer">
                    <?= file_get_contents("/frontend/assets/img/icons/like.svg")?>
                </a>
                    <p id="like">0</p>
                </div>
            </div>
        </div>
    </div>
</article>