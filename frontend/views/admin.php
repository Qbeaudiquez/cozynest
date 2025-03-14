<?php 
if(!isset($_SESSION)){
    session_start();
}

require_once('/backend/src/config.php'); 
require_once('/backend/src/login.php');
require_once('/backend/sql/allData.php');
require_once('/backend/sql/dataRole.php');
?>
<script src="../assets/js/redirectionPage.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/config.css">

<?php 
if (isset($_SESSION['role']) && $_SESSION['role'] === 1){
    require_once('/frontend/views/partials/dashbordDisplay.php');
    exit;
}elseif(isset($_SESSION['role']) && $_SESSION['role'] !== 1){
    echo "Vous n'avez pas les droits";
}
    
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userLogin'])) {
    $username = htmlspecialchars(trim($_POST['userLogin']));
    $password = $_POST['passwordLogin'];
    unset($_POST);

    if (login($db, $username, $password)) {
        include('admin.php');
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect";
    }
}


if(!isset($_SESSION['role'])){
    require('/frontend/views/partials/loginDisplay.html');
}
?>