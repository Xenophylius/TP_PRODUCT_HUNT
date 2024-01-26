<?php
session_start();

// Si l'utilisateur n'est pas connecté, redirigé vers la page de connexion/inscription
if (
  empty($_SESSION['id']) &&
  empty($_SESSION['pseudo']) &&
  empty($_SESSION['mail'])
) {
  header('Location: ../../index.php?error=Inscrivez vous ou connectez vous pour accéder à cette page.');
  die;
}

include_once '../../debug/debug.php';

  
  // Récupération de la liste des produits
  require_once('../../process/connexion.php');

    if(($_GET['search_valider'])) {
    // Récupère la valeur du champ 'monChamp'
    $valeur = $_GET['search_valider'];
 

  
    // Affiche la valeur
   
  $valeur = $_GET['search_valider'];

  $listProduct = $db->prepare("SELECT * FROM products WHERE title_product LIKE '% . $valeur . %'");
  $listProduct->execute();
  // $stmt->execute([$_GET['name']]);
 
  $productsAll = $listProduct->fetchAll();

  var_dump($productsAll);
   
    echo "La valeur que vous avez entrée est : " . $productsAll;
} else {
   
    echo "Aucune valeur n'a été envoyée.";
}
die;


