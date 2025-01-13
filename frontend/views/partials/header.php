<link rel="stylesheet" href="/assets/css/config.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/header.css">
<link rel="stylesheet" href="/assets/css/config.css">
<link rel="stylesheet" href="/assets/css/title.css">
<?php
require_once('/backend/src/config.php');
require_once('/backend/sql/dataArticles.php');
?>
<header id="heroContainer">
    <div id="burgerMenuContainer" class=""><div id="burgerMenu"></div></div>
    <div id="navSocialContainer">
        <nav>
            <ul id="navbar">
                <li><a href="/index.php" class="navLink">Accueil</a></li>
                <li><a href="/blog.php" class="navLink">Blog</a></li>
                <li><a href="/about.php" class="navLink">À propos</a></li>
                <li><a href="/contact.php" class="navLink">Contact</a></li>
            </ul>
        </nav>
        <div id="socialContainer">
            <a href="" class="socialLink">
            <?= file_get_contents("/frontend/assets/img/icons/Instagram.svg")?>
            </a>
            <a href="" class="socialLink">
            <?= file_get_contents("/frontend/assets/img/icons/Pinterest.svg")?>
            </a>
            <a href="" class="socialLink">
            <?= file_get_contents("/frontend/assets/img/icons/TikTok.svg")?>
            </a>
        </div>
    </div>
    <div id="titleDescContainer">
        <h1 id="heroTitle">Bienvenue 
        <br>sur <span>Cozy Nest</span></h1>
        <p id="heroDesc">Prenez une pause, installez-vous confortablement et plongez dans un univers chaleureux dédié au bien-être et à la simplicité.</p>
    </div>
    <button id="heroCta">Explorez l'univers hygge</button>
</header>

<script src="/assets/js/header/burgerMenu.js"></script>