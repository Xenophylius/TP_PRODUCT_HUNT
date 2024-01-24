<?php
session_start();

// Si l'utilisateur n'est pas connecté, redirigé vers la page de connexion/inscription
if (empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])) {
        header('Location: ../index.php?error=Inscrivez vous ou connectez vous pour accéder à cette page.');
        die;
}

// Vérification que le formulaire est complet et qu'on récupère bien les $_POST et $_FILES
if (empty($_POST['title_product']) &&
    empty($_POST['description_product']) &&
    empty($_FILES['image_product'])) {
        header('Location: ../../pages/new_product.php?error=Formulaire incomplet.');
        die;
    }

    $maxsize = 1000000;
    $format = array('.jpg', '.jpeg', '.gif', '.png');

    // Vérification erreur lors de l'upload
    if ($_FILES['image_product']['error'] > 0) {
        header('Location: ../../pages/new_product.php?error=Erreur lors du transfert de l\'image');
        die;
    } 

    $filesize = $_FILES['image_product']['size'];

    // Vérification que l'image ne dépasse pas la taille maximale
    if ($filesize > $maxsize) {
        header('Location: ../../pages/new_product.php?error=Image trop volumineuse.');
        die;
    }

    $filename = $_FILES['image_product']['name'];
    $fileextention = "." . strtolower(substr(strchr($filename, '.'), 1));

    // Vérification que le fichier est bien une image avec une extention autorisée
    if (!in_array($fileextention, $format)) {
        header('Location: ../../pages/new_product.php?error=Votre fichier n\'est pas une image.');
        die;
    }

    // Récupération du TMP NAME (stockage temporaire par php) et rename de l'image pour éviter les doublons
    $tmpName = $_FILES['image_product']['tmp_name'];
    $uniqueName = md5(uniqid(rand(), true));

    // Envoie de l'image dans le dossier upload
    $filename = "../../upload/" . $uniqueName . $fileextention;
    $resultat = move_uploaded_file($tmpName, $filename);
    $randomFileName = $uniqueName . $fileextention;

    // Envoi des informations en BDD 
    require_once '../connexion.php';
    $addProduct = $db->prepare("INSERT INTO products (id_user, title_product, image_product, description_product) VALUES (?, ?, ?, ?)");
    $addProduct->execute([
        $_SESSION['id'],
        $_POST['title_product'],
        $randomFileName,
        $_POST['description_product']
    ]);
    
    if($resultat) {
        header('Location: ../../pages/list_product.php?success=Nouveau produit créé.');
    }

?>

