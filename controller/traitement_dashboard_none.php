<?php
/*Démarre la session utilisateur si elle est présente*/
session_start();

/*Connexion à la BDD*/
require ('../modele/connexion_bdd.php');

try {
	include("../vue/dashboard_data.php");	
}catch(PDOException $e){
	echo $e->getMessage();
	die();
}
?>