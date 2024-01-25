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
        $listProduct = $db->prepare("SELECT * FROM products LIMIT 10");
        $listProduct->execute();
        $productsAll = $listProduct->fetchAll();

        require_once '../partials/header.php'; 
        include_once '../partials/message.php';
?>


  <!-- Liste des applications menu de gauche -->
  <section>

    <div class="container">
      <div class="row">
        <div id="menu_left" class="col-8">

          <!-- Titre welcome -->
          <div id="welcome" class="p-4">
            <div style="width: 90%; height: 100%; color: #023535; font-size: 24px; font-family: Open Sans;
            font-weight: 600; word-wrap: break-word">Liste des Produits</div>
            <div style="width: 100%; height: 100%"><span style="color: #023535; font-size: 16px;
              font-family: Montserrat; font-weight: 400; word-wrap: break-word">The place to launch and discover new tech products. </span>
              <a href="./new_product.php" style="color: #0CABA8; font-size: 16px; font-family: Montserrat; font-weight: 400; word-wrap: break-word">Take a Tour.</a>
            </div>
          </div>

          <br>
          <br>
          <!-- Liste des applications Menu gauche-->
          <section>
           

<main class="text-center">
        <?php
        // Boucle pour afficher les produits
            foreach ($productsAll as $key => $value) { ?>
                <section class="w-30 rounded-5 container" id="">
                    <h3 class="row"><strong><?= $productsAll[$key]['title_product'] ?></strong></h3>
                    <h5></h5>
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
</main>

<?php  } ?>
         
          </section>


          <!-- Titre Inscris toi ! -->
          <div id="welcome" class="mt-3 p-4">
            <div style="width: 90%; height: 100%; color: #023535; font-size: 24px; font-family: Open Sans;
            font-weight: 600; word-wrap: break-word">Inscris ton application, ton site!</div>
            <div style="width: 100%; height: 100%"><span style="color: #023535; font-size: 16px;
            font-family: Montserrat; font-weight: 400; word-wrap: break-word">Et deviens le "Mark Zuckerberg" of the new tech de 2024. </span>
              <a href="./new_product.php" style="color: #0CABA8; font-size: 16px; font-family: Montserrat; font-weight: 400; word-wrap: break-word">Take your chance.</a>
            </div>
          </div>


        </div>
        </section>
</section>

        <!-- Liste des meilleurs UP Menu à droite-->
        <div id="bloc_right" class="mt-3 ms-5 col-3">

          <div style="color: #023535; font-size: 16px; font-family: Open Sans;">TOP UP !</div>

          <div class="mt-3" style="font-size: small;">
            <p><strong>Application WOODOO - 55 up</strong></p>
          </div>
          <div style="font-size: small;">
            <p><strong>Site Web DESIGNEEE - 42 up</strong></p>
          </div>
          <div style="font-size: small;">
            <p><strong>Reseau Social Profil BD - 21 up</strong></p>
          </div>



          <!--deuxieme ligne horizontal centrer-->
          <section class=" grid text-center mt-5">
            <div id="line_under_nav" class="g-col-6 g-col-md-4 mt-2" style="width: 450px; border: 1px rgba(111, 223, 221, 0.73) solid"></div>
          </section>



          <!-- Liste des derniers commentaires-->
          <div class="mt-3 col-7">
          <div style="color: #023535; font-size: 16px; font-family: Open Sans;">TOP COMMENTAIRES !</div>

            <!-- Liste des meilleurs Comment Menu à droite contenu par user-->
            <div class="mt-3" style="color: #023535; font-size: 15px; font-family: Open Sans;
            font-weight: 700; word-wrap: break-word">
              <p>User :</p>
            </div>

            <div class="" style="font-style: oblique; font-size: 13px;">
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit...
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">suite...</a>
              </p>
            </div>



            <div class="mt-3" style="color: #023535; font-size: 15px; font-family: Open Sans;
font-weight: 700; word-wrap: break-word">
              <p>User 3 :</p>
            </div>

            <div class="" style=" font-style: oblique; font-size: 13px;">
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit... <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">suite...</a></p>
            </div>



            <div class="mt-3" style="color: #023535; font-size: 15px; font-family: Open Sans;
font-weight: 700; word-wrap: break-word">
              <p>User 2 :</p>
            </div>

            <div class="mt-3" style=" font-style: oblique; font-size: 13px;">
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit...<a data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">suite...</a></p>
            </div>


          </div>
        </div>



<?php
 require_once '../partials/footer.php';  ?>
