<?php 
session_start();

// Si l'utilisateur n'est pas connecté, redirigé vers la page de connexion/inscription
if (empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])) {
        header('Location: ../index.php?error=Inscrivez vous ou connectez vous pour accéder à cette page.');
        die;
}

// Vérification que le formulaire est complet et qu'on récupère bien le $_FILES
if (empty($_FILES['image_profil'])) {
        header('Location: ../../pages/profil.php?error=Formulaire incomplet.');
        die;
    }

    $maxsize = 1000000;
    $format = array('.jpg', '.jpeg', '.gif', '.png');

    // Vérification erreur lors de l'upload
    if ($_FILES['image_profil']['error'] > 0) {
        header('Location: .../../pages/profil.php.php?error=Erreur lors du transfert de l\'image');
        die;
    } 

    $filesize = $_FILES['image_profil']['size'];

    // Vérification que l'image ne dépasse pas la taille maximale
    if ($filesize > $maxsize) {
        header('Location: .../../pages/profil.php.php?error=Image trop volumineuse.');
        die;
    }

    $filename = $_FILES['image_profil']['name'];
    $fileextention = "." . strtolower(substr(strchr($filename, '.'), 1));

    // Vérification que le fichier est bien une image avec une extention autorisée
    if (!in_array($fileextention, $format)) {
        header('Location: .../../pages/profil.php.php?error=Votre fichier n\'est pas une image.');
        die;
    }

    // Récupération du TMP NAME (stockage temporaire par php) et rename de l'image pour éviter les doublons
    $tmpName = $_FILES['image_profil']['tmp_name'];
    $uniqueName = md5(uniqid(rand(), true));

    // Envoie de l'image dans le dossier upload
    $filename = "../../upload/photoProfil/" . $uniqueName . $fileextention;
    $resultat = move_uploaded_file($tmpName, $filename);
    $randomFileName = $uniqueName . $fileextention;

    $id = $_SESSION['id'];
    // Envoi des informations en BDD 
    require_once '../connexion.php';
    $addImage = $db->prepare("UPDATE users SET image='$randomFileName' WHERE id=$id");
    $addImage->execute();
    
    if($resultat) {
        header('Location: ../../pages/profil.php?success=Image ajoutée.');
    }