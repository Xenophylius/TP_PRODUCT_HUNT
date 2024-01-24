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
?>

<main>
   
    <!-- Modal pour les produits -->
    <section id="modal">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Produits</h1>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <div id="bloc_appli"></div>

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
<span style="color: #0CABA8; font-size: 16px; font-family: Montserrat; font-weight: 400; word-wrap: break-word">Take a Tour. </span></div>
</div>



<br>
<br>

                    <!-- Liste des applications Menu gauche-->
                    <div class="container">
                                <div class="row"></div>
                                <a style="font-family: Open Sans; font-weight: 700; word-wrap: break-word; color: #023535;" class="active ml-4" aria-current="page" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">Application WOODOO</a>
                                <p style="font-family: 'Montserrat', sans-serif;">description - Lorem ipsum dolor,
                                sit amet consectetur adipisicing elit.
                                    ... <a  data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">plus d'infos.</a> </p>
                    </div>

                        <div class="container">
                                <a style="font-family: Open Sans; font-weight: 700; word-wrap: break-word; color: #023535;" class="active mt-3" aria-current="page" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" href="">site web DESIGNEEE</a>
                                <p style="font-family: 'Montserrat', sans-serif;">description - Lorem ipsum dolor,
                                sit amet consectetur adipisicing elit.
                                    ... <a  data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">plus d'infos.</a> </p>
                        </div>

                        <div class="container">
                                <a style="font-family: Open Sans; font-weight: 700; word-wrap: break-word; color: #023535;" class="active ml-3" aria-current="page" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" href="">Reseau Social Profil BD</a><p style="font-family: 'Montserrat', sans-serif;">description - Lorem ipsum dolor,
                                sit amet consectetur adipisicing elit.
                                    ... <a  data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">plus d'infos.</a> </p>
                        </div>

                        <div class="container">
                                <a style="font-family: Open Sans; font-weight: 700; word-wrap: break-word; color: #023535;" class="active ml-3" aria-current="page" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" href="">Webdesigner</a><p style="font-family: 'Montserrat', sans-serif;">description - Lorem ipsum dolor,
                                sit amet consectetur adipisicing elit.
                                    ... <a  data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">plus d'infos.</a> </p>
                        </div>

                        <div class="container">
                                <a style="font-family: Open Sans; font-weight: 700; word-wrap: break-word; color: #023535;" class="active ml-3" aria-current="page" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" href="">Application sportUS</a><p style="font-family: 'Montserrat', sans-serif;">description - Lorem ipsum dolor,
                                sit amet consectetur adipisicing elit.
                                    ... <a  data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">plus d'infos.</a> </p>
                        </div>

<!-- Titre Inscris toi ! -->
<div id="welcome" class="mt-5 p-4">
<div style="width: 90%; height: 100%; color: #023535; font-size: 24px; font-family: Open Sans;
font-weight: 600; word-wrap: break-word">Inscris ton application, ton site!</div>
<div style="width: 100%; height: 100%"><span style="color: #023535; font-size: 16px;
font-family: Montserrat; font-weight: 400; word-wrap: break-word">Et deviens le "Mark Zuckerberg" of the new tech de 2024. </span>
<span style="color: #0CABA8; font-size: 16px; font-family: Montserrat; font-weight: 400; word-wrap: break-word">Take your chance. </span></div>
</div>


 </div> 
 


<!-- Liste des meilleurs UP Menu à droite-->
 <div id="bloc_right" class="mt-3 ms-5 col-3">

 <div style="color: #023535; font-size: 16px; font-family: Open Sans;">TOP UP !</div>
   
  <div class="mt-3" style="font-size: small;"><p><strong>Application WOODOO - 55 up</strong></p></div>
  <div style="font-size: small;"><p><strong>Site Web DESIGNEEE - 42 up</strong></p></div>
  <div style="font-size: small;"><p><strong>Reseau Social Profil BD - 21 up</strong></p></div>
  


      <!--deuxieme ligne horizontal centrer-->
      <section class=" grid text-center mt-5">
      <div id="line_under_nav" class="g-col-6 g-col-md-4 mt-2" style="width: 289px; border: 1px rgba(111, 223, 221, 0.73) solid"></div>
      </section>
 


<!-- Liste des meilleurs Comment Menu à droite titre-->
<div class="mt-3 col-7">

<div style="color: #023535; font-size: 21px; font-family: Open Sans;
font-weight: 700; word-wrap: break-word">Top</div>

<div style="color: #023535; font-size: 17px; font-family: Open Sans;
font-weight: 700; word-wrap: break-word">Commentaires !</div>


<!-- Liste des meilleurs Comment Menu à droite contenu par user-->  
<div class="mt-3" style="color: #023535; font-size: 15px; font-family: Open Sans;
font-weight: 700; word-wrap: break-word"><p>User :</p></div>
 
<div class="" style="font-style: oblique; font-size: 13px;"><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit... <a  data-bs-toggle="modal"
data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">suite...</a></p></div>
 


<div class="mt-3" style="color: #023535; font-size: 15px; font-family: Open Sans;
font-weight: 700; word-wrap: break-word"><p>User 3 :</p></div>
 
<div class="" style=" font-style: oblique; font-size: 13px;"><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit... <a  data-bs-toggle="modal"
data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">suite...</a></p></div>
 

   
<div class="mt-3" style="color: #023535; font-size: 15px; font-family: Open Sans;
font-weight: 700; word-wrap: break-word"><p>User 2 :</p></div>
 
<div class="mt-3" style=" font-style: oblique; font-size: 13px;"><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit...<a  data-bs-toggle="modal"
data-bs-target="#staticBackdrop" style="text-decoration-color: #0CABA8;" href="">suite...</a></p></div>
 

</div>
</div>
 



</section>
</main>



<?php include '../partials/footer.php'; ?>
