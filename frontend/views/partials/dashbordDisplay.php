<?php
require_once('/backend/sql/dataArticles.php');
require_once('/backend/nosql/dataViewCount.php');
require_once('/backend/sql/dataComment.php');
require_once('/backend/sql/dataCategories.php')
?>
<link rel="stylesheet" href="/assets/css/dashbordDisplay.css">

<div class="dashbordContainer">
    <div class="dashbordContainerLeft">
        <h2 class="dashbordTitle">Cozynest</h2>
        <ul class="dashbordLinkContainer">
            <li class="dashbordLink home active"><span>H</span>ome</li>
            <li class="dashbordLink articles"><span>A</span>rticles</li>
            <li class="dashbordLink comments"><span>C</span>ommentaires</li>
            <li class="dashbordLink users"><span>U</span>tilisateurs</li>
            <li class="dashbordLink setting"><span>P</span>aramètres</li>
        </ul>
    </div>
    <div class="dashbordContainerRight">
        <div class="userInfoLocateContainer">
            <div class="userInfoContainer">
                <div class="imgUser"></div>
                <div class="usernameRoleContainer">
                    <p class="username">Nom utilisateur</p>
                    <p class="role">Administrateur</p>
                </div>
            </div>
            <div class="locateInfoContainer">
                <h3 class="location">Dashbord</h3>
                <p class="path">/home</p>
            </div>
        </div>
        <?php require_once('/frontend/views/partials/dashbordLinkDisplay/homeDisplay.php')?>
        <?php require_once('/frontend/views/partials/dashbordLinkDisplay/articleDisplay.php')?>
    </div>
        
</div>