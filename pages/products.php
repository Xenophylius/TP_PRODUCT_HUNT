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

require_once '../process/connexion.php';


// Récupération de la liste des produits
  require_once('../process/connexion.php');
  $listProduct = $db->prepare("SELECT * FROM products");
  $listProduct->execute();
  $productsAll = $listProduct->fetchAll();
  ?>
<main>

  <!-- Liste des applications menu central -->
  <section>

    <div class="container">
      
        

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
          
            
            
            <!-- // Boucle pour afficher les produits -->
            <?php foreach ($productsAll as $key => $value) { ?>

              <section  class="container m-3 position-relative" id="">
             

                <div id="" style="width: 100%; height: 100%;" class="row justify-item-between rounded-2"
                onmouseover="this.style.background='linear-gradient(to left, #b5ff5421, white)';this.style.color='#FF0000';"
                onmouseout="this.style.background='';this.style.color='';">

                  

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
                            $listCommentary = $db->prepare("SELECT * FROM commentary INNER JOIN users ON commentary.id_user = users.id WHERE id_product=?");
                            $listCommentary->execute([$id_product]);
                            $commentary = $listCommentary->fetchAll();

                            // Boucle pour fetchAll les commentaires
                            foreach ($commentary as $key => $value) { ?>
                                <section class="w-100 d-none" id="commentary" data-idCommentary="<?= $commentary[$key]['id'] ?>" data-pseudo="<?= $commentary[$key]['pseudo'] ?>" data-date="<?= $commentary[$key]['created_at'] ?>" data-commentary="<?= $commentary[$key]['commentary'] ?>">
                                    <h5>Commentaire de : <?= $commentary[$key]['pseudo'] ?> du <i><?= $commentary[$key]['created_at'] ?></i></h5>
                                    <p >Le commentaire : <?= $commentary[$key]['commentary'] ?></p>
                                </section>

                            <?php  } ?>
            <?php  } ?>

          

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <a class="btn btn-secondary" href="../pages/products.php">Close</a>
                  </div>
                  <div class="modal-body position-relative">
                    <p id="idProductForModal"> 
                    </p>
                    <p id="idCommentaryForModal">
                    </p>
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-secondary" href="../pages/products.php">Close</a>
                
                  </div>
                </div>
              </div>
            </div>

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
          $listlikes = $db->prepare("SELECT * FROM products JOIN like_product ON products.id = like_product.id_product ORDER BY rand() LIMIT 3");
          $listlikes->execute();
          $likesAll = $listlikes->fetchAll();
 ?>


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
            <a href="../process/product/like_product.php?id_product=${idForModal}" class="btn position-absolute end-0 border" style="margin-right: 15%;">Vote : <i class="fa-solid fa-circle-up fa-xl"></i><span class="font-weight-bold mx-2">${likeForModal}</span></a>
            <p class="mt-3"><i>${descriptionForModal}</i></p>
            <p>
                    <form action="../process/product/add_commentary.php?id_product=${idForModal}" method="post">
                        <h5 class="font-bold mt-3 border border-bottom">Ajoutez votre commentaire : </h5><br>
                        <textarea name="commentary" id="commentary" rows="2" class="w-100" placeholder="Ajoutez votre commentaire..."></textarea><br>
                        <button type="submit" class="btn btn-success">Envoyer</button>
                    </form>
            </p>
            <h5 class="font-bold mt-3 border border-bottom">Commentaires</h5>
            
            
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

<?php require_once '../partials/footer.php'; ?>