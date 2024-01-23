<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCT HUNT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>


    <main>

        <!-- creation de la navbar suivant les données de figma -->
        <section id="navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <!-- integration du logo a la navbar -->
                    <a class="navbar-brand" href="#"><img style="width:250px;height: 65px" src="../images/logo.png" alt="logo_product_hunt"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- navbar champs de recherche -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Recherche Produit" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>

                    <!-- navbar line direct vers les produits-->
                    <div class="me-2 collapse navbar-collapse" id="navbarSupportedContent" >
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active ml-3" aria-current="page" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="">Produits</a>
                            </li>

                            <!-- navbar menus déroulant pour les categories-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Catégories
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Applications</a></li>
                                    <li><a class="dropdown-item" href="#">Site Web</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Autres</a></li>
                                </ul>
                            </li>


                            <div class="d-flex" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active ml-3" aria-current="page" href="../index.php">Deconnexion</a>
                                    </li>

                                    <button id="btn_profil" type="button" class="btn btn-success">Profil utilisateur</button>
                                </ul>

                            </div>
                    </div>
            </nav>
        </section>

        <!-- ligne en dessous de la navbar-->
        <section>
            <div id="line_under_nav" class="mt-2" style="width: 100%; height: 100%; border: 2px #0CABA8 solid"></div>
        </section>


        <br>
        <!--deuxieme ligne horizontal-->
        <section>
            <div id="line_under_nav" class="mt-2 d-flex justify-content-center" style="width: 1000px; border: 2px #0CABA8 solid"></div>
        </section>
 
    
    
    </main>