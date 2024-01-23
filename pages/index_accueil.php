<?php require_once '../partials/header.php'; ?>

<main>
   
    
<section id="modal">
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Produits</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div><img src="../images/logo_appli_1.png" alt=""></div>

        Description : Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime obcaecati minima eius
        iste temporibus exercitationem ipsum dolores corrupti, et sit fuga natus amet dignissimos accusantium
        vitae fugit reprehenderit? Ex, at.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    </section>
    
<section>
        <div class="me-2" id="" >
                <ul class="">
                    <li class="container">
                                <div class=""><img id="logo_appli" src="../images/logo_appli_1.png" alt="logo_application_or_site"></div>
                                <a style="color: #0CABA8;" class="active ml-4" aria-current="page" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" href="">Produits-1</a>
                                <p style="font-family: 'Montserrat', sans-serif;">description - Lorem ipsum dolor,
                                sit amet consectetur adipisicing elit.
                                    ... <a  data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">plus d'infos.</a> </p>
                        </li>

                        <li class="container">
                                <a style="color: #0CABA8;" class="active ml-3" aria-current="page" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" href="">Produits-1</a>
                                <p style="font-family: 'Montserrat', sans-serif;">description - Lorem ipsum dolor,
                                sit amet consectetur adipisicing elit.
                                    ... <a  data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">plus d'infos.</a> </p>
                        </li>

                        <li class="container">
                                <a style="color: #0CABA8;" class="active ml-3" aria-current="page" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" href="">Produits-1</a><p style="font-family: 'Montserrat', sans-serif;">description - Lorem ipsum dolor,
                                sit amet consectetur adipisicing elit.
                                    ... <a  data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">plus d'infos.</a> </p>
                        </li>
</section>



</main>



<?php include '../partials/footer.php'; ?>
