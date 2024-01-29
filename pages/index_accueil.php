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
        <div id="menu_left" class="col-8 p-3">

          <!-- bloc separateur Titre welcome avec lien nouvelle aplli -->
          <div class=" col-11 p-4" id="bloc_titre">
            <div id="text_big_title">
              <div>Welcome to Product Hunt!</div>
            </div>

            <div id="little_title_accueil"><span>The place to launch and discover new tech products. </span>
              <a href="./new_product.php" id="liens">Take a your chance.</a>
            </div>
          </div>

          <br>

          <!-- Liste des applications Menu central avec ouverture Modal-->

          <!-- // Boucle pour afficher les produits -->
          <?php foreach ($productsAll as $key => $value) { ?>

              

            <!-- bloc pour clique toute zone modal -->
            <section class="container m-1 position-relative" type="button" class="btn" id="magicButton" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $productsAll[$key]['id'] ?>" data-title="<?= $productsAll[$key]['title_product'] ?>" data-description="<?= $productsAll[$key]['description_product'] ?>" data-image="<?= $productsAll[$key]['image_product'] ?>" data-like="<?= $like[0] ?>">
          <div id="bloc_product_index" class="col-11 row justify-item-between">

                  <!-- image appli -->
                <div class=col-1>
                  <img style="width: 100%;" src="../upload/<?= $productsAll[$key]['image_product'] ?>" alt="Image du produit">
                </div>

                  <div class=col-4>
                    <a style="font-family: Open Sans; font-weight: 700; word-wrap: break-word; color: #023535;" class="">
                    <strong><?= ucfirst($productsAll[$key]['title_product']) ?></strong></a>
                  </div>

                  <div class=col-5>
                    <p class="" style="font-family: 'Montserrat', sans-serif;">
                      <i><?= ucfirst(substr($productsAll[$key]['description_product'], 0, 20)) . ' ...' ?></i>

                      <?php 
                          // Récupération de la catégorie du produit
                          $categoryList = $db->prepare("SELECT * FROM category WHERE id_product=?");
                          $categoryList->execute([$productsAll[$key]['id']]);
                          $category = $categoryList->fetch();
                      ?>

                      <br><i>#<?= $category['name_category'] ?></i>

                      <?php 
                            // Requete pour récupérer nombre de LIKE
                            $id_product = $productsAll[$key]['id'];
                            $counterLike = $db->prepare("SELECT count(*) FROM like_product WHERE id_product=$id_product");
                            $counterLike->execute();
                            $like = $counterLike->fetch();
                        ?>
                        <a href="../process/product/like_product.php?id_product=<?= $productsAll[$key]['id'] ?>" class="btn position-absolute end-0" style="margin-right: 15%;"><i class="fa-solid fa-circle-up fa-xl"></i><span class="font-weight-bold mx-2"><?= $like[0] ?></span></a>

                        <a type="button" class="btn btn-success position-absolute end-0 me-3" id="magicButton" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $productsAll[$key]['id'] ?>" data-title="<?= $productsAll[$key]['title_product']?>" data-description="<?= $productsAll[$key]['description_product']?>" data-image="<?= $productsAll[$key]['image_product']?>" data-like="<?= $like[0] ?>">
                        Plus d'infos
                        </a> 
                    </p>
                  </div>

                </div>
                
              </section>

              <?php 
                            // Requete pour récupérer les commentaires
                            $listCommentary = $db->prepare("SELECT * FROM commentary INNER JOIN users ON commentary.id_user = users.id WHERE id_product=? ORDER BY created_at DESC");
                            $listCommentary->execute([$id_product]);
                            $commentary = $listCommentary->fetchAll();

            // Boucle pour fetchAll les commentaires
            foreach ($commentary as $key => $value) { ?>
              <section class="w-100 d-none" id="commentary" data-idCommentary="<?= $commentary[$key]['id'] ?>" data-pseudo="<?= $commentary[$key]['pseudo'] ?>" data-date="<?= $commentary[$key]['created_at'] ?>" data-commentary="<?= $commentary[$key]['commentary'] ?>">
                <h5>Commentaire de : <?= $commentary[$key]['pseudo'] ?> du <i><?= $commentary[$key]['created_at'] ?></i></h5>
                <p>Le commentaire : <?= $commentary[$key]['commentary'] ?></p>
              </section>

            <?php  } ?>
          <?php  } ?>



          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                </div>
                <div class="modal-body position-relative">
                  <p id="idProductForModal">
                  </p>
                  <p id="idCommentaryForModal">
                  </p>
                </div>
                <div class="modal-footer">
                  <a class="btn btn-secondary" href="../pages/index_accueil.php">Close</a>

                </div>
              </div>
            </div>
          </div>

          <!-- Titre Inscris toi ! -->

          <!-- bloc separateur Titre welcome -->
          <div class=" col-11 p-4" id="bloc_titre">
            <div id="text_big_title">
              <div>Inscris ton application, ton site!</div>
            </div>

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
        
        
        <div class="mt-2 ms-5 col-3">
        <strong>
          <div class="mb-1" id="little_title_accueil">TOP UP !</div>
         <div>
          <?php
          foreach ($likesAll as $key => $value) { ?>

            <div class="row" id="text_menu">
              <p id="little_title_accueil" class="col-6"><?= $likesAll[$key]['title_product'] ?>
              <p class="col-3" id="menu_top_comm_date"><?= $likesAll[$key]['counter_product'] ?></p></p>
            </div>
          <?php  } ?>
          </div>

                            <!--ligne horizontal couleur deux centrer-->
                            <section class=" grid text-center">
                                <div id="menu_up" class="mt-5 mb-5"></div>
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


            // <!-- Liste des meilleurs Comment Menu à droite contenu par user-->

            foreach ($usersAll as $key => $value) { ?>
            
           <div id=menu_top_comm_pseudo class="mt-2"><img src="../upload/photoProfil/<?php if (empty($usersAll[$key]['image'])) {?>Profile-Male-PNG.png"<?php } else { echo $usersAll[$key]['image'] . '"';} ?> style="width: 20px;" class="me-2" alt="Photo de profil"><strong><?= ucfirst($usersAll[$key]['pseudo']) ?></strong></div>

           <div id=menu_top_comm_date class=""><i><?= $usersAll[$key]['created_at'] ?></i></div>
           <div id="menu_top_comm_commentary" class="">
              <p><?= '" ' . ucfirst(substr($usersAll[$key]['commentary'], 0, 40)) . ' ..."' ?><a style="" href="#demo">...suite</a></p></div>
            
            <?php  } ?>



  </section>
</main>

<!-- Script pour la modal dynamique-->
<script>
  let idProduct = document.querySelectorAll("#magicButton");
  for (let i = 0; i < idProduct.length; i++) {
    idProduct[i].addEventListener("click", function() {
      let idForModal = idProduct[i].dataset.id;
      let titleForModal = idProduct[i].dataset.title;
      let descriptionForModal = idProduct[i].dataset.description;
      let imageForModal = idProduct[i].dataset.image;
      let likeForModal = idProduct[i].dataset.like;

      document.getElementById("idProductForModal").innerHTML += `
            <img src="../upload/${imageForModal}" class="w-25">
            <a href="../process/product/like_product.php?id_product=${idForModal}" class="btn position-absolute end-0 border" style="margin-right: 15%;">Vote : <i class="fa-solid fa-circle-up fa-xl"></i><span id="text_moyen_title">${likeForModal}</span></a>
            <p class="mt-3"><i>${descriptionForModal}</i></p>
            <p>
                    <form action="../process/product/add_commentary.php?id_product=${idForModal}" method="post">
                        <h5 class="font-bold mt-3 border border-bottom">Ajoutez votre commentaire : </h5><br>
                        <textarea name="commentary" id="commentary" rows="2" class="w-100" placeholder="Ajoutez votre commentaire..."></textarea><br>
                        <button type="submit" class="btn btn-success">Envoyer</button>
                    </form>
            </p>
            <h5 id="menu_top_comm_date" class="font-bold mt-3 border border-bottom">Commentaires</h5>
            
            
            `
      document.getElementById("exampleModalLabel").innerHTML += ` ${titleForModal} `
    });
  }

    let idCommentary = document.querySelectorAll('#commentary');
      for (let i = 0; i < idCommentary.length; i++) {
            let idCommentaryForModal = idCommentary[i].dataset.idCommentary;
            let pseudoCommentaryForModal = idCommentary[i].dataset.pseudo;
            let dateCommentaryForModal = idCommentary[i].dataset.date;
            let commentaryCommentaryForModal = idCommentary[i].dataset.commentary;
            
            
            document.getElementById("idCommentaryForModal").innerHTML += `
              <div class="border-bottom border-3">
              <p><strong>${pseudoCommentaryForModal}</strong>
              <i>${dateCommentaryForModal}</i> </p>
              <p>${commentaryCommentaryForModal}</p> 
              </div>
                          
            `

  };
</script>

<?php include '../partials/footer.php'; ?>

