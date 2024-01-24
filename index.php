<?php
session_start();

// Si l'utilisateur est connecté, redirigé vers l'accueil
if (!empty($_SESSION['id']) &&
    !empty($_SESSION['pseudo']) &&
    !empty($_SESSION['mail'])) {
        header('Location: ./pages/index_accueil.php');
        die;
}
    include_once './partials/message.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCT HUNT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<main class="text-center h-100" >
    <img src="./images/logo.png" alt="Logo Product Hunt" class="w-50" >
        <div class="rounded-3 m-3 p-3 ">
            <!-- INSCRIPTION -->
            <div class="row text-center w-75 mx-auto ">
                <div class="col-12 col-md-5 rounded-5 mx-auto" id="inscription">
                    <h2 class="rounded-3 mx-auto my-2 "><strong>Inscription</strong></h2>
                    <form action="./process/authentification/register.php" method="post">
                        <div class="form-floating mb-3 text-dark">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" class="form-control " id="pseudo" placeholder="Pseudo" name="pseudo">
                        </div>
                        <div class="form-floating mb-3 text-dark">
                            <input type="email" class="form-control " id="mail" placeholder="name@example.com" name="mail">
                            <label for="mail">Adresse mail</label>
                        </div>
                        <div class="form-floating text-dark">
                            <input type="password" class="form-control " id="password" placeholder="Password" name="password">
                            <label for="password">Mot de passe</label>
                        </div>
                        <button type="submit" class="my-3 btn" id="inscription"><i class="fa-solid fa-user-plus fa-sm mx-2"></i>Inscription</button>
                    </form>
                </div>
            <!-- CONNEXION -->
                <div class="col-12 col-md-5 rounded-5 mx-auto py-auto" id="inscription">
                    <h2 class="rounded-3 m-2 mx-auto">Connexion</h2>
                    <form action="./process/authentification/login.php" method="post" class="py-4">
                        <div class="form-floating mb-3 text-dark">
                            <input type="email" class="form-control " id="mail" placeholder="name@example.com" name="mail">
                            <label for="mail">Adresse mail</label>
                        </div>
                        <div class="form-floating text-dark">
                            <input type="password" class="form-control " id="password" placeholder="Password" name="password">
                            <label for="password">Mot de passe</label>
                        </div>
                        <button type="submit" class="my-3 btn" id="inscription"><i class="fa-solid fa-user fa-sm mx-2"></i>Connexion</button>
                    </form>
                </div>
            </div>
        </div>
</main>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>
</html>