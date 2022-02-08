<?php
/*Démarre la session utilisateur si elle est présente*/
session_start();

/*Connexion à la BDD*/
require ('../modele/connexion_bdd.php');

$email=$_POST['email'];
$date=date('Y-m-d G:i:s');

try {

	// On vérifie l'adresse email...
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

		/* On interroge la BDD pour récupérer les emails des users*/
		$sql="SELECT * FROM newsletter WHERE user_email=:user_email";
		$stmt=$bdd->prepare($sql);
		$stmt->execute([':user_email' => $email]);


		// Si l'email est déjà inscrite dans la table newsletter...
		if ($row=$stmt->fetch()) {
			header("Location:".$_SESSION['URL']."?erreurNewsletter=erreurs");

		// Sinon, inscription du user à la newsletter	
		}else{
			$sql="INSERT INTO newsletter (user_email, newsletter_date) VALUES (:user_email, :newsletter_date)";
			$stmt=$bdd->prepare($sql);
			$stmt->execute([':user_email' => $email, ':newsletter_date' => $date]);
			header("Location:".$_SESSION['URL']."?validateNewsletter=validation");
		}

		// Si l'adresse email n'est pas valide...
	}else{
		header("Location:".$_SESSION['URL']."?validEmail=email");
	}

}catch(PDOException $e){
	echo $e->getMessage();
	die();
}
?>