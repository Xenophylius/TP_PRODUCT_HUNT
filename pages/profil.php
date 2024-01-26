<?php
session_start();

// Si l'utilisateur n'est pas connecté, redirigé vers la page de connexion/inscription
if (
    empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])
) {
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

<!-- Presentation du profil et telechargement photo de profil -->
<!-- le container des indications profils et des applis -->
<section class="container">

    <div class="d-flex justify-content-Evenly">

        <section class="">
            <div class="container">
                <div class="row">

                    <div class="d-flex align-items-start flex-column m-3">
                        <!-- affichage image de profil -->
                        <div id="picture_profil" class="mt-2">
                            <?php
                            
                            if (empty($userInfo['image'])) { ?>
                                <img src="../upload/photoProfil/Profile-Male-PNG.png" alt="Photo de profil de base" class="">
                            <?php } else {
                            ?>
                                <img src="../upload/photoProfil/<?= $userInfo['image'] ?>" alt="Photo du profil" class="w-50 rounded-circle"> <?php } ?>
                            <form action="../process/authentification/add_image.php" method="post" enctype="multipart/form-data">

                                <!-- affichage nom et email -->
                                <div class="mt-2">
                                    <h3 id="text_big_title" class="textColor"><?= ucfirst($userInfo['pseudo']) ?></h3>

                                    <h3 id="little_title_accueil" class="textColor mt-2"><?= $userInfo['mail'] ?></h3>
                                 </div>
                                   
                        </div>

                        <!-- indication image de profil a télécharger -->
                        <div class="mb-2 mt-3">
                            <label id="little_title_accueil" for="image_profil" class="mt-3"><strong class="textColor">Inserer ou changer votre image de profil :</strong></label>
                        </div>
                        <div>
                            <!-- image de profil a télécharger -->
                            <input type="file" class="form-control" name="image_profil" id="FormFile">
                            <button id="bouton_profil" type="submit" class="btn mt-2" id="inscription">Ajouter l'image</button>
                            </form>

                            <!--ligne horizontal couleur deux centrer-->
                            <section class=" grid text-center">
                                <div id="menu_up" class="g-col-4 mt-4"></div>
                            </section>

                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section>


            <!-- affichage bloc applis -->                    
            <div id="border_profil_product" class="text-center p-5">

                <?php
                // Boucle pour afficher les produits
                foreach ($products as $key => $value) { ?>
                    <section class="mt-4" id="">
                        <h3 id="text_moyen_title"><strong><?= strtoupper($products[$key]['title_product']) ?></strong></h3>
                        <p id="little_title_accueil" class="overflow-auto"><i><?= $products[$key]['description_product'] ?></i></p>

                        <h5 id="little_title_accueil">Images de votre application</h5>
                        <img src="../upload/<?= $products[$key]['image_product'] ?>" class="w-25" alt="Image du produit"><br>

                        <a href="modify_product.php?id_product=<?= $products[$key]['id'] ?>" class="btn m-2" id="bouton_profil">Modifier le produit</a>

                        <!--ligne horizontal couleur centrer-->
                        <section class=" grid text-center">
                            <div id="menu_up" class="g-col-4 mt-5"></div>
                        </section>

                    </section>
                <?php  } ?>


            </div>


    </div>
</section>

<?php include '../partials/footer.php'; ?>