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
?>

<main>


  <!-- Création de la Modal de base -->

  <?php
  // Récupération de la liste des produits
  require_once('../process/connexion.php');
  $listProduct = $db->prepare("SELECT * FROM products LIMIT 10");
  $listProduct->execute();
  $productsAll = $listProduct->fetchAll();
  
  ?>

  <!-- la Modal de base -->
  <a href="#demo"></a>

  <div id="demo" class="modal">
    <div class="modal_content">
      <section class="p-5">
        <?php

        // Boucle pour afficher les produits
        foreach ($productsAll as $key => $value) { ?>
          
          <section class="container" id="">

<div id="" class="row justify-item-between rounded-2 m-2" onmouseover="this.style.background='linear-gradient(to left, #FFFBF2, white)';this.style.color='#FF0000';" onmouseout="this.style.background='';this.style.color='';">

  <a href="#demo2"></a>

  <div class=col-1>
    <img style="width: 100%;" src="../upload/<?= $productsAll[$key]['image_product'] ?>" alt="Image du produit">
  </div>

  <div class=col-4>
    <a style="font-family: Open Sans; font-weight: 700; word-wrap: break-word; color: #023535;" class=""><strong><?= $productsAll[$key]['title_product'] ?></strong></a>
  </div>

  <div class=col-7>
    <p class="" style="font-family: 'Montserrat', sans-serif;">
      <i><?= substr($productsAll[$key]['description_product'], 0, 12) . ' ...' ?></i><a style="text-decoration-color: #0CABA8;" href="#demo"></a>
    </p>
  </div>

</div>

</section>
<?php  } ?>



      <a href="#" class="modal_close">&times;</a>
    </div>
  </div>
  </button>



  <!-- Création de la Modal de base -->

  <?php
  // Récupération de la liste des produits

//   // on prepare la requete qui, par la connexion, recupere des question avec leur id
//   require_once('../process/connexion.php');
//   $preparedRequest = $db->prepare("SELECT * FROM products WHERE id = ?");
//   $preparesRequest->execute([
//     $_POST['id']
//   ]);


//   $productsql = $preparedRequest->fetch(PDO::FETCH_ASSOC);

//   // on precise que l'on veut la valeur de cette requete
//   $idproduct = $productsql['id'];
// ?>
<!-- //   <div data-id=<?= $idproduct ?>></div> -->



  <!-- la Modal de base -->
  <a href="#demo2"></a>

  <div id="demo2" class="modal2">
    <div class="modal2_content">
      <section class="">
        <?php

        // Boucle pour afficher les produits
        foreach ($productsAll as $key => $value) { ?>
          <section class="" id="">

            <div class="container">
              <div class="">

                <!-- element dans la modal -->
                <img style="width: 10%;" src="../upload/<?= $productsAll[$key]['image_product'] ?>" class="" alt="Image du produit">

                <a style="font-family: Open Sans; font-weight: 700; word-wrap: break-word; color: #023535;" class=""><strong><?= $productsAll[$key]['title_product'] ?></strong></a>

                <p class="" style="font-family: 'Montserrat', sans-serif;">
                  <i><?= substr($productsAll[$key]['description_product'], 0, 15) ?></i><a style="text-decoration-color: #0CABA8;"></a>
                </p>
              </div>

            </div>

          </section>
        <?php  } ?>

      </section>

      <a href="#" class="modal_close">&times;</a>
    </div>
  </div>




  <!-- Liste des applications menu central -->
  <section>

    <div class="container">
      <div class="row">
        <div id="menu_left" class="col-8">

          <!-- Titre welcome -->
          <div id="welcome" class="p-4">
            <div style="width: 90%; height: 100%; color: #023535; font-size: 24px; font-family: Open Sans;
            font-weight: 600; word-wrap: break-word">Welcome to Product Hunt!</div>
            <div style="width: 100%; height: 100%"><span style="color: #023535; font-size: 16px;
              font-family: Montserrat; font-weight: 400; word-wrap: break-word">The place to launch and discover new tech products. </span>
              <a href="./new_product.php" style="color: #0CABA8; font-size: 16px; font-family: Montserrat; font-weight: 400; word-wrap: break-word">Take a Tour.</a>
            </div>
          </div>

          <br>
          <br>


          <!-- Liste des applications Menu gauche-->
          <section>
            <?php
            // Boucle pour afficher les produits
            foreach ($productsAll as $key => $value) { ?>

              <section class="container m-3" id="">

                <div id="" class="row justify-item-between rounded-2" onmouseover="this.style.background='linear-gradient(to left, #FFFBF2, white)';this.style.color='#FF0000';" onmouseout="this.style.background='';this.style.color='';">

                  <a href="#demo2"></a>

                  <div class=col-1>
                    <img style="width: 100%;" src="../upload/<?= $productsAll[$key]['image_product'] ?>" alt="Image du produit">
                  </div>

                  <div class=col-4>
                    <a style="font-family: Open Sans; font-weight: 700; word-wrap: break-word; color: #023535;" class=""><strong><?= $productsAll[$key]['title_product'] ?></strong></a>
                  </div>

                  <div class=col-7>
                    <p class="" style="font-family: 'Montserrat', sans-serif;">
                      <i><?= substr($productsAll[$key]['description_product'], 0, 12) . ' ...' ?></i>
                    </p>
                  </div>

                </div>

              </section>
            <?php  } ?>

          </section>


          <!-- Titre Inscris toi ! -->
          <div id="welcome" class="mt-5 p-4">
            <div style="width: 90%; height: 100%; color: #023535; font-size: 24px; font-family: Open Sans;
font-weight: 600; word-wrap: break-word">Inscris ton application, ton site!</div>
            <div style="width: 100%; height: 100%"><span style="color: #023535; font-size: 16px;
font-family: Montserrat; font-weight: 400; word-wrap: break-word">Et deviens le "Mark Zuckerberg" of the new tech de 2024. </span>
              <a href="./new_product.php" style="color: #0CABA8; font-size: 16px; font-family: Montserrat; font-weight: 400; word-wrap: break-word">Take your chance.</a>
            </div>
          </div>


        </div>



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




  </section>
</main>



<?php include '../partials/footer.php'; ?>