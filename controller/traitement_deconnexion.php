<?php
session_start();
session_destroy(); 
/*unset($_SESSION['idUser']);*/ // Détruit uniquement la variable de session contenant le user_id
/*unset($_SESSION['idCart']);*/ // Détruit uniquement la variable de session contenant le cart_id
// Ne pas oublier d'appliquer le code suivant sur toutes les pages qui nécessitent une connexion :
// if (!isset($_SESSION['idUser'])) { // Vérification de la session existante
header("Location:..".$_SESSION['URL']); 
?>