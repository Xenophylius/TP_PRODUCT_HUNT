<?php
session_start();

// Si l'utilisateur n'est pas connecté, redirigé vers la page de connexion/inscription
if (empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])) {
        header('Location: ../index.php?error=Inscrivez vous ou connectez vous pour accéder à cette page.');
        die;
}

// on prepare la requete qui, par la connexion, recupere des question avec leur id
$preparedRequest = $connexion->prepare("SELECT * FROM products WHERE id = ?");

// on execute en précisant que l'on veut id de la reponse
$preparedRequest->execute(
    [ $_POST['productsid']
    ]);

// on nomme une variable pour generer en generant le fetch de la requete donx id de la reponse
$productsql = $preparedRequest->fetch(PDO::FETCH_ASSOC);

// on precise que l'on veut la valeur de cette requete
$idproduct = $productsql['id'];

?>

