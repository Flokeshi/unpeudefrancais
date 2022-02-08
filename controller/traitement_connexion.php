<?php
session_start();
require '../modele/connexion_bdd.php'; // lie le fichier connexion_bdd à ce fichier
require '../modele/fonctions.php'; // lie le fichier fonctions à ce fichier

$email = $_POST["email"]; // prendre l'input "email" situé dans le name de l'input dans index.php
$password = $_POST["password"]; // password crypté avec password_hash


if (verifUserExist($bdd, $email, $password)) { // Si un résultat est trouvé, redirection vers la dernière page visitée avec $_SESSION['URL']


	// On recherche s'il existe un panier existant sous ce user_id
	/*$sql="SELECT * FROM cart_details INNER JOIN product ON product.product_id=cart_details.product_num LEFT JOIN cart ON cart.cart_id=cart_details.cart_num WHERE user_id=:user_id";
    $stmt=$bdd->prepare($sql);
    $stmt->execute([':user_id' => $_SESSION['idUser']]);*/


    // Si aucun panier n'existe, alors...
    /*if (!$recordset=$stmt->fetchAll()) {*/

		// S'il existe une variable de session contenant le cart_id, on update le user_id sur ce cart_id pour conserver le panier actuel
		if (isset($_SESSION['idCart'])){
			$sql="UPDATE cart SET user_id=:user_id WHERE cart_id =:cart_id";
			$req= $bdd->prepare($sql);
			$req->execute([":user_id"=>$_SESSION['idUser'], ":cart_id"=>$_SESSION['idCart']]);
		};

	// Sinon, s'il existe déjà un panier, on reprend son cart_id en variable de session
	/*}else{
		$_SESSION['idCart']=$recordset['cart_num'];
	}*/
	header("Location:..".$_SESSION['URL']);
}else{ // Si aucun résultat n'est trouvé, redirection vers index.php
	header("Location:../vue/connexion_page.php?erreurMessage=erreurs");
}

/*if ($email == "admin@cci.fr" && $mot_de_passe == "1234") {
	//Si correct redirection vers accueil.php
	$_SESSION['idUser'] = 4;
	header("Location:../vue/accueil.php");
}
else {
	//Si incorrect redirection vers index.php
	if ($email != "admin@cci.fr" && $mot_de_passe != "1234") {
		header("Location:../public/index.php?erreurMessage=erreurs");
	}
	elseif ($email != "admin@cci.fr") {
		header("Location:../public/index.php?erreurMail=erreurs");
	} 
	elseif ($mot_de_passe != "1234") {
		header("Location:../public/index.php?erreurPassword=erreurs");
	}
}*/

?>