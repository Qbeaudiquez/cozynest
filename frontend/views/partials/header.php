<link rel="stylesheet" href="/assets/css/config.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/header.css">
<header id="heroContainer">
    <div id="burgerMenu" class=""></div>
    <div id="navSocialContainer">
        <nav>
            <ul id="navbar">
                <li><a href="/views/index.php">Accueil</a></li>
                <li><a href="/views/blog.php">Blog</a></li>
                <li><a href="/views/about.php">À propos</a></li>
                <li><a href="/views/contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="socialContainer">
            <a href="">
            <?= file_get_contents("/frontend/assets/img/icons/Instagram.svg")?>
            </a>
            <a href="">
            <?= file_get_contents("/frontend/assets/img/icons/Pinterest.svg")?>
            </a>
            <a href="">
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