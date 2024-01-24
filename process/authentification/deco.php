<?php
session_start();
if (!empty($_SESSION["pseudo"]) && !empty($_SESSION["mail"])) {
    session_destroy();
    header('Location: ../../index.php?success=Vous êtes déconnecté.');
} else {
    header('Location: ../../index.php?error=Veuillez vous connecter.');
}
?>