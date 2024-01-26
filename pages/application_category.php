<?php 
session_start();

// Si l'utilisateur n'est pas connecté, redirigé vers la page de connexion/inscription
if (empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])) {
        header('Location: ../index.php?error=Inscrivez vous ou connectez vous pour accéder à cette page.');
        die;
}
    
    // Récupération de la liste des produits
    require_once('../process/connexion.php');
        $listProduct = $db->prepare("SELECT * FROM products JOIN category ON products.id = category.id_product WHERE name_category='Application'");
        $listProduct->execute();
        $productsAll = $listProduct->fetchAll();

        require_once '../partials/header.php'; 
        include_once '../partials/message.php';
?>

<main>
    <h1 class="textColor text-center my-3">Liste des produits de la catégorie : Application</h1>

    <?php 
        foreach ($productsAll as $key => $value) { ?>
            <section class="border-bottom border-2 my-2">
                <img src="../upload/<?= $productsAll[$key]['image_product'] ?>" style="width: 50px;" class="me-3"><h5 class="d-inline"><?= $productsAll[$key]['title_product'] ?></h5>
                <p class="my-2"><?= $productsAll[$key]['description_product'] ?></p>
            </section>
       <?php } ?>
</main>

<?php
    require_once '../partials/footer.php';
?>