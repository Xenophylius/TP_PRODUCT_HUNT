<?php 
session_start();

// Si l'utilisateur n'est pas connecté, redirigé vers la page de connexion/inscription
if (empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])) {
        header('Location: ../index.php?error=Inscrivez vous ou connectez vous pour accéder à cette page.');
        die;
}



// Vérification que le commentaire n'est pas vide
if (empty($_POST['commentary'])) {
    header('Location: ../../pages/index_accueil.php?error=Votre commentaire n\'est pas valide.');
    die;
}

// Connexion à la BDD et injection du commentaire
require_once '../connexion.php';
$addCommentary = $db->prepare("INSERT INTO commentary (id_user, id_product, created_at, commentary) VALUES (?, ?, ?, ?)");
$addCommentary->execute([
    $_SESSION['id'],
    $_GET['id_product'],
    date("Y-m-d H:i:s"),
    $_POST['commentary']
]);

header('Location: ../../pages/index_accueil.php?success=Merci pour votre commentaire');
die;