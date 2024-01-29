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
    $listUsers = $db->prepare("SELECT * FROM users");
    $listUsers->execute();
    $users = $listUsers->fetchAll();
?>

<main>
    <h1 class="textColor text-center">Liste des utilisateurs</h1>
        <?php 
            foreach ($users as $key => $value) { ?>
                <section class="border-bottom">
                    <img src="../upload/photoProfil/<?php if (empty($users[$key]['image'])) {?>Profile-Male-PNG.png"<?php } else { echo $users[$key]['image'] . '"';} ?> alt="Photo de profil" style="height: 100px;" class="my-3 mx-5">
                    <h3 class="textColor d-inline"><?= ucfirst($users[$key]['pseudo']) ?></h3>
                </section>
          <?php } ?>
    
</main>

<?php
    require_once '../partials/footer.php';
?>