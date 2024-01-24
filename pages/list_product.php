<?php
    
    // Récupération de la liste des produits
    require_once('../process/connexion.php');
        $listProduct = $db->prepare("SELECT * FROM products LIMIT 10");
        $listProduct->execute();
        $productsAll = $listProduct->fetchAll();
?>

<main class="text-center">
        <?php
        // Boucle pour afficher les produits
            foreach ($productsAll as $key => $value) { ?>
                <section class="w-50 rounded-5 mx-auto my-3" id="inscription">
                    <h3>Titre du produit : <strong><?= $productsAll[$key]['title_product'] ?></strong></h3>
                    <h5>Description du produit : </h5>
                    <p><i><?= $productsAll[$key]['description_product'] ?></i></p>
                    <h5>Images : </h5>
                    <img src="../upload/<?= $productsAll[$key]['image_product'] ?>" class="w-25" alt="Image du produit">
                </section>
          <?php  } ?>

