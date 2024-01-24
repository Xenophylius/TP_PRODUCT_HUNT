<?php
session_start();
    
    require_once('verifydata.php');

    if (!empty($_POST['pseudo']) &&
        !empty($_POST['mail']) &&
        !empty($_POST['password'])) {
            // Manipulation et sécurisation des données
            $pseudo = valid_donnees($_POST['pseudo']);
            $mail = valid_donnees($_POST['mail']);
            $mailVerify = filter_var($mail, FILTER_VALIDATE_EMAIL);
            $password = valid_donnees($_POST['password']);

            // Hachage du password
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Vérification que pseudo et mail n'existent pas 
            require_once('../connexion.php');
            $verifyPseudo = $db->prepare("SELECT * FROM users WHERE pseudo=? OR mail=?");
            $verifyPseudo->execute([$pseudo, $mailVerify]);
            $userExist = $verifyPseudo->fetchAll();

            if (!$userExist) {

                if ($mailVerify != false) {
                    // Connexion et injection BDD
                    require_once('../connexion.php');
                    $addUser = $db->prepare("INSERT INTO users (pseudo, password, mail) VALUES (?, ?, ?)");
                    $addUser->execute([
                        $pseudo,
                        $passwordHash,
                        $mailVerify,
                        
                    ]);
                    $id_user = $db->lastInsertId();

                    // Création de la session
                    $_SESSION["id"] = $id_user;
                    $_SESSION["pseudo"] = $pseudo;
                    $_SESSION["mail"] = $mail;
                    

                    header('Location: ../../pages/index_accueil.php?success=Bienvenue, vous êtes inscrit.');                
                } else {
                    header('Location: ../../index.php?error=Veuillez saisir une adresse mail valide.');
                }
            } else { header('Location: ../../index.php?error=Identifiant et/ou mot de passe déjà utilisés.');
        }  {
            
        }}  else { header('Location: ../../index.php?error=Veuillez saisir un identifiant, un mot de passe et une adresse mail valide et non utilisé.');
        }
?>
