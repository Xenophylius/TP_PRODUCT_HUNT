<?php
session_start();

include_once '../../debug/debug.php';


// Si l'utilisateur n'est pas connecté, redirigé vers la page de connexion/inscription
if (empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])) {
        header('Location: ../index.php?error=Inscrivez vous ou connectez vous pour accéder à cette page.');
        die;
}

// Vérification que l'id a bien été envoyé par l'index en POST
if (empty($_POST['id'])) {
    header('Location: ../../pages/index_accueil.php?error=Le produit n\'a pas été selectionné.');
    die;
}

