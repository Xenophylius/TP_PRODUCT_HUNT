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
                    <img src="../upload/<?= $productsAll[$key]['image_product'] ?>" class="w-25" alt="Image du produit"><br>

                        <?php 
                            // Requete pour récupérer nombre de LIKE
                            $id_product = $productsAll[$key]['id'];
                            $counterLike = $db->prepare("SELECT count(*) FROM like_product WHERE id_product=$id_product");
                            $counterLike->execute();
                            $like = $counterLike->fetch();
                        ?>

                    <a href="../process/product/like_product.php?id_product=<?= $productsAll[$key]['id'] ?>" class="btn btn-success"><i class="fa-solid fa-circle-up fa-2xl"></i><h5 class="d-inline font-weight-bold px-2"><?= $like[0] ?></h5></a><br>
                    <form action="../process/product/add_commentary.php?id_product=<?= $productsAll[$key]['id'] ?>" method="post" class="d-flex align-items-center justify-content-center">
                        <textarea name="commentary" id="commentary" rows="5" placeholder="Ajoutez votre commentaire..."></textarea>
                        <button type="submit" class="btn btn-success">Envoyer</button>
                    </form>

                        <?php 
                            // Requete pour récupérer les commentaires
                            $listCommentary = $db->prepare("SELECT * FROM commentary INNER JOIN users ON commentary.id_user = users.id WHERE id_product=?");
                            $listCommentary->execute([$id_product]);
                            $commentary = $listCommentary->fetchAll();

                            // Boucle pour fetchAll les commentaires
                            foreach ($commentary as $key => $value) { ?>
                                <section class="w-100">
                                    <h5>Commentaire de : <?= $commentary[$key]['pseudo'] ?> du <i><?= $commentary[$key]['created_at'] ?></i></h5>
                                    <p>Le commentaire : <?= $commentary[$key]['commentary'] ?></p>
                                </section>

                            <?php  } ?>
                        

                        
                </section>
          <?php  } ?>
</main>

<?php
    require_once '../partials/footer.php';
?>