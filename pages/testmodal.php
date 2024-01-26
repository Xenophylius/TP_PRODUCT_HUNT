<?php 
    include_once '../partials/header.php';

    require_once '../process/connexion.php';
    $listProduct = $db->prepare("SELECT * FROM products");
    $listProduct->execute();
    $product = $listProduct->fetchALL();


    foreach ($product as $key => $value) {
        echo $product[$key]['id'] . ' ';
        echo 'TITRE : ' . $product[$key]['title_product'] . '<br>';
        ?>

        <button type="button" class="btn btn-primary" id="magicButton" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $product[$key]['id'] ?>" data-title="<?= $product[$key]['title_product']?>" data-description="<?= $product[$key]['description_product']?>" data-image="<?= $product[$key]['image_product']?>">
        Launch demo modal de l'index <?= $product[$key]['id'] ?>
        </button> <br>
   <?php  }
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
      </div>
      <div class="modal-body">
        <p id="idProductForModal" class="text-center"> 
        </p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" href="../pages/testmodal.php">Close</a>
     
      </div>
    </div>
  </div>
</div>

<script>
    let idProduct = document.querySelectorAll("#magicButton");
        for (let i = 0; i < idProduct.length; i++) {
            idProduct[i].addEventListener("click", function() {
            let idForModal = idProduct[i].dataset.id;
            let titleForModal = idProduct[i].dataset.title;
            let descriptionForModal = idProduct[i].dataset.description;
            let imageForModal = idProduct[i].dataset.image;
            document.getElementById("idProductForModal").innerHTML += ` <h3> ${titleForModal} </h3> 
            <p>${descriptionForModal}</p>
            <img src="../upload/${imageForModal}" class="w-25">
            `
     });
 }
</script>

<?php
    include_once '../partials/footer.php';
?>