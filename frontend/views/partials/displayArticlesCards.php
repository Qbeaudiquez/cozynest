<link rel="stylesheet" href="/assets/css/displayArticlesCard.css">
<div class="mainArticlesContainer" id="down">
<?php
$page = basename($_SERVER['PHP_SELF']);
$displayAll = false;
if(isset($_GET['all'])){
    $displayAll = $_GET['all'];
}
?>

<?php if(!$displayAll): ?>
    <?php if($page !== 'index.php' && isset($_GET['category'])){
        $category =  $_GET['category'];
        $categoryUrl = '&category=' . $category;
        $articlesBest = getArticlesByNb($db, 'category', 3, $category);
        $articlesLast = getArticlesByNb($db, 'category', 4, $category);
    }else{
        $categoryUrl = null;
        $articlesBest = getArticlesByNb($db, "last", 3);
        $articlesLast = getArticlesByNb($db, "last", 4);
    }

    ?>

    <!-- Three most appreciate articles -->
    <?php $articles = $articlesBest ?>


    <div class="sectionTitleContainer">
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

    <?php if($page === 'index.php'): ?>
    <div class="articlesContainerBento articlesContainer">
    <?php endif ?>
        <?php require('/frontend/views/partials/articleCard.php');?>
                <a href="blog.php?all=1<?= $categoryUrl?>#down" class="moreArticle div5">
                    <p>Plus d'article</p>
                    <?= file_get_contents("/frontend/assets/img/icons/moreArticle.svg")?>
                </a>
    <?php if($page === 'index.php'): ?>
    </div>
    <?php endif ?>
<?php elseif($displayAll): ?>
        <?php
            if(isset($_GET['category'])){
                $category = $_GET['category'];
                $articles = getArticlesByNb($db,'category',$nbArticle = 100000, $category);
            }else{
                $articles = getArticlesByNb($db,'last');
            }            
            require('/frontend/views/partials/articleCard.php'); 
        ?>       
<?php endif ?>
</div>