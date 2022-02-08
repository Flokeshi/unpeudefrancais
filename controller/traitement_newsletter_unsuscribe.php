<?php
/*Démarre la session utilisateur si elle est présente*/
session_start();

/*Connexion à la BDD*/
require ('../modele/connexion_bdd.php');

$email=$_POST['email'];

try {

	// On vérifie l'adresse email...
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

		/* On supprime de la BDD les emails du user*/
		$sql="DELETE FROM newsletter WHERE user_email=:user_email";
		$stmt=$bdd->prepare($sql);
		$stmt->execute([':user_email' => $email]);

		header("Location:../vue/newsletter_unsuscribe.php?success=unsuscribe");

		// Si l'adresse email n'est pas valide...
	}else{
		header("Location:../vue/newsletter_unsuscribe.php?validNewsletter=email");
	}

}catch(PDOException $e){
	echo $e->getMessage();
	die();
}
?>