<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Hunt</title>
    
    <link rel="icon" href="../images/logo_product_hunt_rond.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>


    <main>

        <!-- creation de la navbar suivant les données de figma -->
        <section id="navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid d-flex flex-row">

                    <!-- integration du logo a la navbar -->
                    <a class="navbar-brand" href="#"><img src="../images/logo_product_hunt.png" style="width:200px;height: 54px" alt="logo_product_hunt"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- navbar champs de recherche -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Recherche Produit" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>
                    &nbsp; &nbsp; |


                    <!-- navbar line direct vers les produits-->
                    <div class="me-2 collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active ml-3" aria-current="page" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href=""> &nbsp; &nbsp; Produits</a>
                            </li>

                            <!-- navbar lien nouveau produit-->
                            <div class="me-2 collapse navbar-collapse" id="navbarSupportedContent">
                                &nbsp; &nbsp; |
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active ml-3" aria-current="page" href="../new_product.php"> &nbsp; &nbsp; Nouveau produits</a>
                                    </li>



                                    <!-- navbar menus déroulant pour les categories-->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catégories</a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Applications</a></li>
                                            <li><a class="dropdown-item" href="#">Site Web</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Autres</a></li>
                                        </ul>
                                    </li>

                            </div>

                    </div>


                    <!-- deconnexion et profil en justift-end-->
                    <div style="display: flex; justify-content: end;" class="d-flex" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active ml-3 text-secondary" aria-current="page" href="../index.php">Deconnexion</a>
                            </li>

                            <button id="btn_profil" type="button" class="btn btn-success">Profil utilisateur</button>
                        </ul>
                    </div>
            </nav>
        </section>

        <!-- ligne en dessous de la navbar-->
        <section>
            <div id="line_under_nav" class="mt-2" style="width: 100%; height: 100%; border: 1px rgba(111, 223, 221, 0.73) solid"></div>
        </section>

        <!-- Menu des raccourci plus petit -->
        <section class="container">
            <div class="row d-flex justify-content-center">

                <div class="m-2" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="" role="group" aria-label="First group">
                        <button id="menu2" style="font-size: 10pt;" type="button" class="btn text-white"><strong>Produits</strong></button>
                        &nbsp; &nbsp; | &nbsp;
                        <button id="menu2_color" style="font-size: 10pt;" type="button" class="btn"><strong>Best Commentaires</strong></button>
                        &nbsp; &nbsp; | &nbsp;
                        <button id="menu2_color" style="font-size: 10pt;" type="button" class="btn"><strong>Utilisateurs en ligne</strong></button>
                        &nbsp; &nbsp; | &nbsp;

                        <!-- organism pour contrle ethique des applis ou des IA -->
                        <a class="" href="https://goodalgo.fr/labels-ethiquement-engages/"><img src="../images/logo_Adel.png" alt="logo Adel">GoodAlgo </a>

                        <!--deuxieme ligne horizontal centrer-->
                        <section class=" grid text-center">
                            <div id="line_under_nav" class="g-col-6 g-col-md-4 mt-2" style="width: 600px; border: 1px rgba(184, 236, 235, 0.73) solid"></div>
                        </section>
                    </div>

                </div>
            </div>
        </section>



    </main>

    <br>
    <br>