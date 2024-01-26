<?php
session_start();

// Si l'utilisateur n'est pas connecté, redirigé vers la page de connexion/inscription
if (empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])) {
        header('Location: ../../index.php?error=Inscrivez vous ou connectez vous pour accéder à cette page.');
        die;
}
    $id = $_SESSION['id'];
    $id_product = $_GET['id_product'];

require_once('../connexion.php');
    // Vérification que le like n'existe pas déjà
    $listLike = $db->prepare("SELECT * FROM like_product WHERE id_user=$id AND id_product=$id_product");
    $listLike->execute();
    $likeExist = $listLike->fetch();

    if (!$likeExist) {
    // Ajout du like
    $addLikeProduct = $db->prepare("INSERT INTO like_product (id_user, id_product, counter_product) VALUES (?, ?, 1)");
    $addLikeProduct->execute([
        $_SESSION['id'],
        $_GET['id_product']
    ]);

    header('Location: ../../pages/index_accueil.php?success=Merci pour votre like.');
    } else {
        $unLike = $db->prepare("DELETE FROM like_product WHERE id_user=$id AND id_product=$id_product");
        $unLike->execute();

        header('Location: ../../pages/index_accueil.php?error=Vous avez supprimé votre like de ce produit.');
    }
?>