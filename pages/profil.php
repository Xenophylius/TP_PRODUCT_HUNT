<?php 
session_start();

// Si l'utilisateur n'est pas connecté, redirigé vers la page de connexion/inscription
if (empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])) {
        header('Location: ../index.php?error=Inscrivez vous ou connectez vous pour accéder à cette page.');
        die;
}

require_once '../partials/header.php'; 
include_once '../partials/message.php';

// Connexion BDD et requête pour infos user
require_once '../process/connexion.php';
    $profilUser = $db->prepare("SELECT * FROM users WHERE id=?");
    $profilUser->execute([$_SESSION['id']]);
    $userInfo = $profilUser->fetch();

// Récupération des produits de l'user
    $productUser = $db->prepare("SELECT * FROM products WHERE id_user=?");
    $productUser->execute([$_SESSION['id']]);
    $products = $productUser->fetchAll();

?>

<main class="text-center">
    <section>
        <h3 class="textColor">Votre pseudo : <?= ucfirst($userInfo['pseudo']) ?></h3>
        <h3 class="textColor">Votre mail : <?= $userInfo['mail'] ?></h3>

        <?php 
            if (empty($userInfo['image'])) { ?>
                <img src="../upload/photoProfil/Profile-Male-PNG.png" alt="Photo de profil de base" class="w-25">
           <?php } else {
        ?>
        <img src="../upload/photoProfil/<?= $userInfo['image'] ?>" alt="Photo du profil" class="w-25 rounded-circle"> <?php } ?>

        <form action="../process/authentification/add_image.php" method="post" enctype="multipart/form-data">
            <label for="image_profil" class="textColor"><strong class="textColor">Photo de profil</strong></label>
            <input type="file" class="form-control my-2 rounded-3 w-25 mx-auto" name="image_profil">

            <button type="submit" class="btn my-3"  id="inscription">Ajouter votre photo de profil.</button>
        </form>
    </section>

    <section>
        <h3 class="textColor">Vos produits : </h3>
        <?php
        // Boucle pour afficher les produits
            foreach ($products as $key => $value) { ?>
                <section class="w-50 rounded-5 mx-auto my-3" id="inscription">
                    <h3><strong><?= strtoupper($products[$key]['title_product']) ?></strong></h3>
                    <h5>Description du produit : </h5>
                    <p class="overflow-auto"><i><?= $products[$key]['description_product'] ?></i></p>
                    <h5>Images : </h5>
                    <img src="../upload/<?= $products[$key]['image_product'] ?>" class="w-25" alt="Image du produit"><br>
                    <a href="modify_product.php?id_product=<?= $products[$key]['id'] ?>" class="btn btn-success" >Modifier le produit</a>
                </section>
          <?php  } ?>
    </section>
</main>

<?php include '../partials/footer.php'; ?>