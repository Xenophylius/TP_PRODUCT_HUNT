<?php 
session_start();

// Si l'utilisateur n'est pas connecté, redirigé vers la page de connexion/inscription
if (empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])) {
        header('Location: ../index.php?error=Inscrivez vous ou connectez vous pour accéder à cette page.');
        die;
}

// Connexion BDD 
require_once '../process/connexion.php';
    $modifyProduct = $db->prepare("SELECT * FROM products WHERE id=?");
    $modifyProduct->execute([$_GET['id_product']]);
    $product = $modifyProduct->fetch();

    $id=$_GET['id_product'];

    // Si l'utilisateur modifie alors UPDATE en BDD
    if (isset($_POST['submit'])) {
        $productModification = $db->prepare("UPDATE products SET title_product=?, description_product=? WHERE id=$id");
        $productModification->execute([
            $_POST['title_product'],
            $_POST['description_product']
        ]);

        header('Location: profil.php?success=Modifications effectuées.');
        die;
    }

    include_once '../partials/message.php';
    include_once '../partials/header.php'; 
?>

<main class="text-center">
    <section>
        <h3>Modifier votre produit : </h3>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="title_product">Titre du produit</label><br>
            <input type="text" id="title_product" name="title_product" value="<?= $product['title_product'] ?>"/><br>
        
            <label for="description_product">Description du produit</label><br>
            <textarea id="description_product" name="description_product" row="5" ><?= $product['description_product'] ?></textarea><br>
        
            <label for="image_product" class="textColor"><strong class="textColor">Image</strong></label><br>
            <img src="../upload/<?= $product['image_product'] ?>" alt="Image du produit"><br>

            <input type="file" class="w-25 text-center" name="image_product" ><br>
            <button type="submit" class="btn btn-success" name="submit">Envoyer</button>
        </form>
    </section>

    <section>
        
    </section>
</main>

<?php include '../partials/footer.php'; ?>