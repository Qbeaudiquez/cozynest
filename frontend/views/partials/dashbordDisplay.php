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
            <li class="dashbordLink home active" data-display="home" data-path="Home"><span>H</span>ome</li>
            <li class="dashbordLink articles" data-display="articles" data-path="Articles"><span>A</span>rticles</li>
            <li class="dashbordLink comments" data-display="comments" data-path="Commentaires"><span>C</span>ommentaires</li>
            <li class="dashbordLink users" data-display="users" data-path="Utilisateurs"><span>U</span>tilisateurs</li>
            <li class="dashbordLink setting" data-display="setting" data-path="Paramètres"><span>P</span>aramètres</li>
        </ul>
        <a href="index.php" class="backMainPage">Retour à la page d'accueil</a>
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
                <p class="path">/Home</p>
            </div>
        </div>
        <?php require_once('/frontend/views/partials/dashbordLinkDisplay/homeDisplay.php')?>
        <?php require_once('/frontend/views/partials/dashbordLinkDisplay/articlesDisplay.php')?>
        <?php require_once('/frontend/views/partials/dashbordLinkDisplay/comentsDisplay.php')?>
        <?php require_once('/frontend/views/partials/dashbordLinkDisplay/usersDisplay.php')?>
        <?php require_once('/frontend/views/partials/dashbordLinkDisplay/settingDisplay.php')?>
    </div>
        
</div>

<script src="../assets/js/selectDashbord.js"></script>