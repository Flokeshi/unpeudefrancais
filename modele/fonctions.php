<?php

function verifUserExist($bdd, $email, $password) {
	try {
		$req = $bdd->prepare("SELECT * FROM user WHERE user_email = :user_email"); // prepare envoit la requête au système
		$req->execute([":user_email"=>$email]); // affectation des marqueurs ":user_email" et ":user_password" aux variables
		$UserExist = $req->fetch();

		if ($UserExist) { // Si un résultat est trouvé, TRUE
			if (password_verify($password, $UserExist['user_password'])==true) { // password-verify vérifie si $password (le MDP saisi par l'utilisateur) correspond bien au password haché contenu dans la BDD ($UserExist['user_password']) ;
				$_SESSION['idUser'] = $UserExist['user_id']; // On attribue le user_id à la variable de session 'idUser'
				$_SESSION['role'] = $UserExist['user_role'];
				return TRUE;
			}else{
				return FALSE;
			}
		}else{ // Si aucun résultat n'est trouvé, FALSE
			return FALSE;
		}

	}catch(PDOException $e) {
		header("Location:../vue/inscription_page.php?erreurTechnique=erreurs");
		exit();
	}
}

// fetch permet de récupérer un résultat sous forme de tableau associatif et les noms des attributs récupérés dans le SELECT seront les clés de ce tableau; 
// EXEMPLE : ['id_user'=>1, 'nom_user'=>'le nom']
// Pour afficher le nom du user : echo $UserExist['nom_user'];
// si aucun résultat n'est trouvé, fetch retourne FALSE;

// fetchAll permet de récupérer 0 ou plusieurs résultats sous forme de tableau associatif et les noms des attrivuts récupérés dans le SELECT seront les clés de ce tableau;
// EXEMPLE : [['id_user'=>1, 'nom_user'=>'le nom1'], ['id_user'=>6, 'nom_user'=>'le nom2']];
// Pour afficher le nom du premier résultat : echo $UserExist[0]['nom_user'];
// si aucun résultat n'est trouvé, fetchAll retourne un tableau vide;

function verifEmailExist($bdd, $email) {
	try {
		$req = $bdd->prepare("SELECT * FROM user WHERE user_email = :user_email"); // prepare envoit la requête au système
		$req->execute([":user_email"=>$email]); // affectation du marqueur ":mail" à la variable $email
		$resEmailExist = $req->fetch();

		if ($resEmailExist) { // Si un résultat est trouvé, TRUE
			return TRUE;
		}else{ // Si aucun résultat n'est trouvé, FALSE
			return FALSE;
		}
	}catch(PDOException $e) {
		header("Location:../vue/inscription_page.php?erreurTechnique=erreurs");
		exit();
	}
}

function ajoutUser($bdd, $lastname, $firstname, $email, $pwd, $role, $birthday) {
	try{ // ...on ajoute le user

		$sql = "INSERT INTO user (user_lastname, user_firstname, user_email, user_password, user_role, user_birthday) VALUES (:lastname, :firstname, :email, :pwd, :role, :birthday)";
		$datas = [':lastname' => $lastname, ':firstname' => $firstname, ':email' => $email, ':pwd' => $pwd, ':role' => $role, ':birthday' => $birthday];
		$regUser = $bdd->prepare($sql);
		$regUser->execute($datas);

	}catch(PDOException $e) {
		/*header("Location:../vue/inscription_page.php?erreurTechnique=erreurs");*/
		echo $e;
		echo "Les datas : ";
		print_r($datas);
		exit();
	}
}

function verifEmailExist2($bdd, $email, $id) {
	try {
		$req = $bdd->prepare("SELECT * FROM user WHERE user_email = :user_email"); // prepare envoit la requête au système
		$req->execute([":user_email"=>$email]); // affectation du marqueur ":mail" à la variable $email
		$resEmailExist = $req->fetch();

		if ($resEmailExist && $id!=$resEmailExist['user_id']) { // Si un résultat est trouvé, TRUE
			return TRUE;
		}else{ // Si aucun résultat n'est trouvé, FALSE
			return FALSE;
		}
	}catch(PDOException $e) {
		header("Location:../vue/inscription_page.php?erreurTechnique=erreurs");
		exit();
	}
}

// Fonction de vérification des 'string' saisies par le user lors des UPDATE ou des INSERT INTO
function checkValid($donnees) {
	$donnees = trim($donnees); // supprime les espaces en début et fin de chaîne
    $donnees = stripslashes($donnees); // supprime les antislashs d'une chaîne
    $donnees = htmlspecialchars($donnees); // convertit les caractères spéciaux en entités HTML
    $donnees = htmlentities($donnees); // convertit les caractères éligibles en entités HTML
    return $donnees;
}

?>