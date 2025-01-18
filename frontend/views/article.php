<?php require_once('/frontend/views/partials/header.php'); 
require_once('/backend/sql/dataArticles.php');
require_once('/backend/sql/dataComment.php');
require_once('/backend/nosql/dataViewCount.php');
?>
<link rel="stylesheet" href="/assets/css/article.css">
<?php
// Icons variable
$commentIcon = file_get_contents('/frontend/assets/img/icons/comment.svg');
$viewIcon = file_get_contents('/frontend/assets/img/icons/view.svg');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $article = getArticleById($db, $id);
    $articleCount = getCommentCount($db, $id,'valid');
    $viewsCount = getViewArticle($dbMangoConnect, $id);
    echo 
        "<article class='articleContainer' id='down'>
            <h2 class='articleTitle'>{$article['title']}</h2>
            <div class='imgArticleContainer'>
                <img src='/assets/img/backArticle/$id.png' alt='' class='imgArticle'>
            </div>
            <div class='descArticleContainer'>
                <p class='descArticle'>{$article['description']}</p>
            </div>
            <div class='contentArticle'>{$article['content']}</div>
            <div class='aboutArticleContainer'>
                <div class='categoryContainer'>
                    <p class='category'>{$article['category']}</p>
                </div>
                <div class='commentViewCntainer'>
                    <div class='commentContainer infoContainer'>
                        $commentIcon
                        <p class='comment'>$articleCount</p>
                    </div>
                    <div class='viewContainer infoContainer'>
                        $viewIcon
                        <p class='view'>$viewsCount</p>
                    </div>
                </div>
            </div>
        </article>";
}else{
    echo'Article Inconue';
}
?>
<button id="button">hello</button>
<script src="../assets/js/deleteArticle.js"></script>
