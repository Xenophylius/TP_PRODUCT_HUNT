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

<main class="my-2">
    <form action="../process/product/create_product.php" method="post" enctype="multipart/form-data" class="rounded-5 w-50 mx-auto px-3" id="inscription">
        <label for="title_product" class="my-1" ><strong class="textColor">Nom du produit</strong></label>
        <input type="text" class="form-control my-2 rounded-3" id="title_product" placeholder="Nom de votre produit" name="title_product">
    
        <label for="description_product" ><strong class="textColor">Description</strong></label>
        <textarea class="form-control my-2 rounded-3" rows="5" id="description_product" placeholder="Description de votre produit" name="description_product"></textarea>

        <label for="category"><strong>Catégorie : </strong></label>
        <select name="category" id="category" class="dropdown w-25 rounded-3 my-2 text-center">
            <option value="Application">Application</option>
            <option value="Site Web">Site Web</option>
            <option value="Autre">Autre</option>
        </select><br>

        <label for="image_product" class="textColor"><strong class="textColor">Image</strong></label>
        <input type="file" class="form-control my-2 rounded-3" name="image_product">

        <button type="submit" class="btn my-3"  id="inscription">Envoyer</button>
    </form>
</main>

<?php
    require_once '../partials/footer.php';
?>