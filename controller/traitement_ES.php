<?php
/*Démarre la session utilisateur si elle est présente*/
session_start();

/*Connexion à la BDD*/
require ('../modele/connexion_bdd.php');
$_SESSION['lang']="ES";
header("Location:..".$_SESSION['URL']);
?>