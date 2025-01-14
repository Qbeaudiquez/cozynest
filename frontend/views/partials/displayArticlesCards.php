<?php

$page = basename($_SERVER['PHP_SELF']);
$displayAll = false;
if(isset($_GET['all'])){
    $displayAll = $_GET['all'];
}
?>

<?php if(!$displayAll): ?>
    <?php if($page !== 'index.php' && isset($_GET['category'])){
        $category = $_GET['category'];
        $articlesBest = getArticlesByNb($db,3, 'category', $category);
        $articlesLast = getArticlesByNb($db,4, 'category', $category);
    }else{
        
        $articlesBest = getArticlesByNb($db, 3, "last");
        $articlesLast = getArticlesByNb($db, 4, "last");
    }

    ?>

    <!-- Three most appreciate articles -->
    <?php $articles = $articlesBest ?>


    <div id='down' class="sectionTitleContainer">
        <div class="stroke"></div>
        <h2>Les articles les plus appréciés</h2>
        <div class="stroke"></div>
    </div>

    <div class="articlesContainerBest articlesContainer">
        <?php require('/frontend/views/partials/articleCard.php');?>
    </div>




    <!-- Four last articles -->
    <?php $articles = $articlesLast ?>
    <div class="sectionTitleContainer">
        <div class="stroke"></div>
        <h2>Dernier article</h2>
        <div class="stroke"></div>
    </div>

    <div class="articlesContainerBento articlesContainer">
        <?php require('/frontend/views/partials/articleCard.php');?>
                <a href="blog.php?all=1" class="moreArticle div5">
                    <p>Plus d'article</p>
                    <?= file_get_contents("/frontend/assets/img/icons/moreArticle.svg")?>
                </a>
    </div>
<?php elseif($displayAll && isset($_GET['category'])): ?>
    <?php $articles = getArticlesByNb($db,100000, 'category', $category);
    require('/frontend/views/partials/articleCard.php'); 
    ?>
<?php else: ?>
    <?php $articles = $articlesBest = getArticlesByNb($db);
        require('/frontend/views/partials/articleCard.php');   
    ?>
<?php endif ?>

