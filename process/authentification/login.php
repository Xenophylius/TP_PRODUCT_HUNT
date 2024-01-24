<?php 
session_start();
require_once('verifydata.php');

    if (!empty($_POST['mail']) &&
        !empty($_POST['password'])) {
            // Manipulation et sécurisation des données
            $mail = valid_donnees($_POST['mail']);
            $mailVerify = filter_var($mail, FILTER_VALIDATE_EMAIL);


            // Récupérer du Hash en BDD
            require_once('../connexion.php');
            $verifyPseudo = $db->prepare("SELECT * FROM users WHERE mail=?");
            $verifyPseudo->execute([$mailVerify]);
            $userExist = $verifyPseudo->fetch();

            if ($userExist === false) {
                header('Location: ../../index.php?error=Identifiant et/ou mot de passe incorrect.');
            } else {
            $passwordHash = $userExist["password"];
            $pseudo = $userExist["pseudo"];
            $id = $userExist["id"];
            
        
            // Vérification du password
            if (password_verify($_POST['password'], $passwordHash)) {
                $_SESSION["pseudo"] = $pseudo;
                $_SESSION["mail"] = $mailVerify;
                $_SESSION["id"] = $id;
              
                header('Location: ../../pages/index_accueil.php?success=Vous êtes connecté.');
            } else {
                header('Location: ../../index.php?error=Identifiant et/ou mot de passe incorrect.');
            }}
        } else {
            header('Location: ../../index.php?error=Identifiant et/ou mot de passe incorrect.');
        }
?>