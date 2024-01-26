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

  <!-- Liste des applications menu central -->
  <section>

    <div class="container">
      <div class="row">
        <div id="menu_left" class="col-8 p-4">

          <!-- bloc separateur Titre welcome -->
          <div class="p-3" style="background-color: #92dfb031;" id="bloc_titre">
            <div id="text_big_title">
            <div>Welcome to Product Hunt!</div></div>
            
            <div id="little_title_accueil"><span>The place to launch and discover new tech products. </span>
              <a href="./new_product.php" id="liens">Take a your chance.</a>
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
                    <a style="font-family: Open Sans; font-weight: 700; word-wrap: break-word; color: #023535;" class="">
                    <strong><?= $productsAll[$key]['title_product'] ?></strong></a>
                  </div>

                  <div class=col-7>
                    <p class="" style="font-family: 'Montserrat', sans-serif;">
                      <i><?= substr($productsAll[$key]['description_product'], 0, 20) . ' ...' ?></i>
                    </p>
                  </div>

                </div>

              </section>
            <?php  } ?>

          </section>


          <!-- Titre Inscris toi ! -->
          
          <!-- bloc separateur Titre welcome -->
          <div class="p-3" style="background-color: #92dfb031;" id="bloc_titre">
            <div id="text_big_title">
            <div>Inscris ton application, ton site!</div></div>
            
            <div id="little_title_accueil"><span>Et deviens le "Mark Zuckerberg" of the new tech de 2024. </span>
              <a href="./new_product.php" id="liens">Take a your chance.</a>
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
  <div class="mt-3 ms-5 col-3">

          <div id="little_title_accueil">TOP UP !</div>

<?php
foreach ($likesAll as $key => $value) { ?>

          <div class="mt-3" style="font-size: small;">
            <p><?= $likesAll[$key]['title_product'] ?> - <strong><?= $likesAll[$key]['counter_product'] ?></p>
            </div>
            <?php  } ?>

          <!--deuxieme ligne horizontal centrer-->
          <section class=" grid text-center mt-5">
            <div id="line_under_nav" class=""></div>
          </section>



          <!-- Liste des derniers commentaires-->
          <div class="mt-3 col-7">
          <div id="little_title_accueil">TOP COMMENTAIRES !</div>

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
            
           <div id=menu_top_comm_pseudo class="mt-2"> <p><strong><?= $usersAll[$key]['pseudo'] ?></strong></div>
           <div id=menu_top_comm_date class=""><?= $usersAll[$key]['image'] ?></div>
           <div id=menu_top_comm_date class=""><?= $usersAll[$key]['created_at'] ?></div>
           <div id="menu_top_comm_commentary" class="">
              <p><?= '" ' . substr($usersAll[$key]['commentary'], 0, 40) . ' ..."' ?><a style="" href="#demo">...suite</a></p></div>
            
            <?php  } ?>
    


  </section>
</main>



<?php include '../partials/footer.php'; ?>