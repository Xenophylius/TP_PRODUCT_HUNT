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
?> 
<h1 class="text-center textColor mb-5">Les meilleurs commentaires </h1>
<?php 
if(!empty($_GET['id'])) {

    $id_user = $_GET['id'];
// Requete pour récupérer les commentaires d'un ID
    $listCommentary = $db->prepare("SELECT * FROM commentary INNER JOIN users ON commentary.id_user = users.id WHERE id_user=$id_user");
    $listCommentary->execute();
    $commentary = $listCommentary->fetchAll();

// Boucle pour fetchAll les commentaires
    foreach ($commentary as $key => $value) { ?>
    <section class="w-100 border-bottom border-3 my-2" id="commentary">
        <h5 class="textColor">Commentaire de : <?= ucfirst($commentary[$key]['pseudo']) ?>, du <i><?= $commentary[$key]['created_at'] ?></i></h5>
        <p><?= $commentary[$key]['commentary'] ?></p>
    </section>

<?php  }
} else {
// Requete pour récupérer les commentaires
    $listCommentary = $db->prepare("SELECT * FROM commentary INNER JOIN users ON commentary.id_user = users.id ORDER BY rand()");
    $listCommentary->execute();
    $commentary = $listCommentary->fetchAll();

// Boucle pour fetchAll les commentaires
    foreach ($commentary as $key => $value) { ?>
    <section class="w-100 border-bottom border-3 my-2" id="commentary">
        <h5 class="textColor">Commentaire de : <?= $commentary[$key]['pseudo'] ?> du <i><?= $commentary[$key]['created_at'] ?></i></h5>
        <p><?= $commentary[$key]['commentary'] ?></p>
    </section>

<?php  } }
require_once '../partials/footer.php'; ?>