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
// include_once '../debug/debug.php';

  
  // Récupération de la liste des produits
  require_once('../process/connexion.php');
  $listProduct = $db->prepare("SELECT * FROM products LIMIT 10");
  $listProduct->execute();
  $productsAll = $listProduct->fetchAll();
  ?>
<main>


<!-- Modal de base pour afficher la liste des produits -->
<div id="demo" class="modal">
    <div class="modal_content">
      
    <div class="container">
        <?php
        // Boucle pour afficher les produits
        foreach ($productsAll as $key => $value) { ?>


        <!-- Modal background avec hover couleur et row -->      
            <div type="" id="" class="row justify-item-start rounded-2 m-2"
                onmouseover="this.style.background='linear-gradient(to left, #FFFBF2, white)';
                this.style.color='#FF0000';" onmouseout="this.style.background='';this.style.color='';">

              <a href="#demo"></a>


    
              <!-- Modal ligne de l'image du produit telecharger par le client (pour l'instant une) --> 
              <div class=col-2>
                  <img style="width: 2rem;" src="../upload/<?= $productsAll[$key]['image_product'] ?>" alt="Image du produit">
              </div>
    
              <!-- Modal ligne du titre du produit --> 
              <div class=col-3>
                <a style="font-family: Open Sans; color: #023535;" class="bloc" href="../process/product/product_one.php">
                <strong><?= $productsAll[$key]['title_product'] ?></strong></a> <form action="" method="$_POST">
                <input type="hidden" name="id"></form>
              </div>

              <!-- Modal ligne de la description du produit --> 
              <div class=col-7>
                  <p class="" style="font-family: 'Montserrat', sans-serif;">
                      <i><?= substr($productsAll[$key]['description_product'], 0, 12) . ' ...' ?></i><a style="text-decoration-color: #0CABA8;"
                      href="#demo"></a>
                  </p>
              </div>
        </div>

      <?php  } ?>
      <a href="#" class="modal_close">&times;</a>
    </div>
  </div>
</div>


<!-- Modal de base pour aficher un produit avec toutes ses propriétés -->
<div id="demo2" class="modal">
    <div class="modal_content">
      
    <div class="container">
        <?php
        // Boucle pour afficher les produits
        foreach ($productsAll as $key => $value) { ?>
          
        

        <!-- Modal background avec hover couleur et row -->      
        <form action="GET"> <input type="" value=""> <div type="" id="" class="row justify-item-start rounded-2 m-2" onmouseover="this.style.background='linear-gradient(to left, #FFFBF2, white)';
            this.style.color='#FF0000';" onmouseout="this.style.background='';this.style.color='';"></form>

              <a href="#demo"></a>
    
              <!-- Modal ligne de l'image du produit telecharger par le client (pour l'instant une) --> 
              <div class=col-2>
                  <img style="width: 2rem;" src="../upload/<?= $productsAll[$key]['image_product'] ?>" alt="Image du produit">
              </div>
    
              <!-- Modal ligne du titre du produit --> 
              <div class=col-3>
                <a style="font-family: Open Sans; color: #023535;" class="" href="./">
                <strong><?= $productsAll[$key]['title_product'] ?></strong></a>
              </div>

              <!-- Modal ligne de la description du produit --> 
              <div class=col-7>
                  <p class="" style="font-family: 'Montserrat', sans-serif;">
                      <i><?= substr($productsAll[$key]['description_product'], 0, 12) . ' ...' ?></i><a style="text-decoration-color: #0CABA8;"
                      href="#demo"></a>
                  </p>
              </div>
        </div>

      <?php  } ?>
      <a href="#" class="modal_close">&times;</a>
    </div>
  </div>
</div>



  <!-- Liste des applications menu central -->
  <section>

    <div class="container">
      <div class="row">
        <div id="menu_left" class="col-8">

          <!-- bloc separateur Titre welcome -->
          <div id="welcome" class="p-4">
            <div style="width: 90%; height: 100%; color: #023535; font-size: 24px; font-family: Open Sans;
            font-weight: 600; word-wrap: break-word">Welcome to Product Hunt!</div>
            
            <div style="width: 100%; height: 100%"><span style="color: #023535; font-size: 16px;
              font-family: Montserrat; font-weight: 400; word-wrap: break-word">The place to launch and discover new tech products. </span>
              <a href="./new_product.php" style="color: #0CABA8; font-size: 16px; font-family: Montserrat; font-weight: 400; word-wrap: break-word">Take a Tour.</a>
            </div>
          </div>

          <br>
          
          <!-- Liste des applications Menu central-->
          <section>
            
            
            <!-- // Boucle pour afficher les produits -->
            <?php foreach ($productsAll as $key => $value) { ?>

              <section  class="container m-3" id="">

                <div id="" style="width: 95%; height: 100%;" class="row justify-item-between rounded-2"
                onmouseover="this.style.background='linear-gradient(to left, #b5ff5421, white)';this.style.color='#FF0000';"
                onmouseout="this.style.background='';this.style.color='';">

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

<?php
          // Récupération de la liste des produits
          require_once('../process/connexion.php');
          $listlikes = $db->prepare("SELECT * FROM products JOIN like_product ON products.id = like_product.id_product ORDER BY counter_product DESC LIMIT 3");
          $listlikes->execute();
          $likesAll = $listlikes->fetchAll();
 ?>
  <div id="bloc_right" class="mt-3 ms-5 col-3">

          <div style="color: #023535; font-size: 16px; font-family: Open Sans;">TOP UP !</div>

<?php
foreach ($likesAll as $key => $value) { ?>

          <div class="mt-3" style="font-size: small;">
            <p><strong><?= $likesAll[$key]['title_product'] ?> - <strong><?= $likesAll[$key]['counter_product'] ?></p>
            </div>
            <?php  } ?>

          <!--deuxieme ligne horizontal centrer-->
          <section class=" grid text-center mt-5">
            <div id="line_under_nav" class="g-col-6 g-col-md-4 mt-2" style="width: 450px; border: 1px rgba(111, 223, 221, 0.73) solid"></div>
          </section>



          <!-- Liste des derniers commentaires-->
          <div class="mt-3 col-7">
          <div style="color: #023535; font-size: 16px; font-family: Open Sans;">TOP COMMENTAIRES !</div>

<?php
          // Récupération de la liste des produits
  require_once('../process/connexion.php');
  $listusers = $db->prepare("SELECT * FROM users JOIN commentary ON users.id = commentary.id_user ORDER BY created_at DESC LIMIT 3");
  $listusers->execute();
  $usersAll = $listusers->fetchAll();

  // var_dump($usersAll);
  // die;
  

            // <!-- Liste des meilleurs Comment Menu à droite contenu par user-->
            
            foreach ($usersAll as $key => $value) { ?>
            
            <div class="mt-3" style="color: #023535; font-size: 15px; font-family: Open Sans;
            font-weight: 700; word-wrap: break-word">
             <a style="font-family: Open Sans; color: #023535;" class="" href="./">
                <strong><?= $usersAll[$key]['pseudo'] ?></strong></a>
            </div>

            <div class="fw-lighter" style="font-family: Open Sans; font-size: 9px"><p><?= $usersAll[$key]['created_at'] ?></p></div>

            <div class="" style="font-style: oblique; font-size: 12px;">
              <p><?= $usersAll[$key]['commentary'] ?><a style="text-decoration-color: #0CABA8;" href="#demo">...suite</a></p></div>
            
            <?php  } ?>
    


  </section>
</main>



<?php include '../partials/footer.php'; ?>