<?php

require_once('/backend/src/config.php');


require_once('/frontend/views/partials/header.php');


$articles = getArticles($db, "last");
?>
<div class="sectionTitleContainer">
    <div class="stroke"></div>
    <h2>Les articles les plus appréciés</h2>
    <div class="stroke"></div>
</div>

<div class="sectionTitleContainer">
    <div class="stroke"></div>
    <h2>Dernier article</h2>
    <div class="stroke"></div>
</div>

<div class="articlesContainerBento">
    <?php
    require('/frontend/views/partials/articleCard.php');
    ?>
        <div class="moreArticle div5">
            <p>Plus d'article</p>
            <?= file_get_contents("/frontend/assets/img/icons/moreArticle.svg")?>
        </div>
</div>