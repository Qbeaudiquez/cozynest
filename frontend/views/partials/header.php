<?php
session_start();
?>

<link rel="stylesheet" href="/assets/css/config.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/header.css">
<link rel="stylesheet" href="/assets/css/config.css">
<?php
require_once('/backend/src/config.php');
require_once('/backend/sql/allData.php');
$categories = getTableData($db, 'categories');
?>
<header id="heroContainer">
    <div id="burgerMenuContainer"><div id="burgerMenu"></div></div>
    <div id="navSocialContainer">
        <nav>
            <ul id="navbar">
                <li><a href="/index.php" class="navLink">Accueil</a></li>
                <li ><a class="navLink blogLink">
                    <div class="blogCtaContainer">
                        <p>Blog</p>
                        <?php include('/frontend/assets/img/icons/blogDown.svg')?>
                    </div>
                    <div class="blogLinkContainer">
                        <ul>
                            <?php foreach ($categories as $category): ?>
                                <li><a href="blog.php?category=<?= $category['name']?>#down"><?= $category['name']?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </a></li>
                <li><a href="/about.php" class="navLink">À propos</a></li>
                <li><a href="/contact.php" class="navLink">Contact</a></li>
            </ul>
        </nav>
        <div id="socialContainer">
            <a href="" class="socialLink">
            <?php include('/frontend/assets/img/icons/Instagram.svg')?>
            </a>
            <a href="" class="socialLink">
            <?php include("/frontend/assets/img/icons/Pinterest.svg")?>
            </a>
            <a href="" class="socialLink">
            <?php include("/frontend/assets/img/icons/TikTok.svg")?>
            </a>
        </div>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 1):?>
        <a href="admin.php">Dashbord</a>
        <?php endif ?>
    </div>
    <div id="titleDescContainer">
        <h1 id="heroTitle">Bienvenue 
        <br>sur <span>Cozy Nest</span></h1>
        <p id="heroDesc">Prenez une pause, installez-vous confortablement et plongez dans un univers chaleureux dédié au bien-être et à la simplicité.</p>
    </div>
    <a href="#down"><button id="heroCta">Explorez l'univers hygge</button></a>
</header>

<script src="/assets/js/header/burgerMenu.js"></script>
<script src="/assets/js/header/blogMenu.js"></script>