<?php 
require_once('/backend/src/config.php'); 
require_once('/backend/src/login.php');
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/config.css">
<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 1){
    require_once('/frontend/views/partials/dashbordDisplay.php');
    exit();
}
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['userLogin']));
    $password = $_POST['passwordLogin'];

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