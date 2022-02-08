<?php
if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email']){
	
	require ('../modele/connexion_bdd.php');

	$emailId = $_POST['email'];
	$token = $_POST['reset_link_token'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$cpassword = $_POST['cpassword'];

	$query = $bdd->prepare("SELECT * FROM user WHERE user_email=:user_email");
	$query->execute([":user_email" => $emailId]);
	$row = $query->fetch();

	if ($_POST['password'] == $_POST['cpassword']) {
		if($row){
			$query = $bdd->prepare("UPDATE user SET user_password=:user_password WHERE user_email=:user_email");
			$query -> execute([":user_password" => $password, ":user_email" => $emailId]);
			echo '<p>Congratulations! Your password has been updated successfully.</p><a href="../public/index.php">Click here to come back to the website</a>';

		}else{
			echo "<p>Something goes wrong. Please try again</p>";
		}
	}else{
		echo "<p>Vos mots de passe ne sont pas identiques.</p>";
	}
}
?>