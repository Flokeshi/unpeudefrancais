<?php
session_start();
require '../modele/connexion_bdd.php'; // lie le fichier connexion_bdd à ce fichier
require '../modele/fonctions.php'; // lie le fichier fonctions à ce fichier

// Récupérer les données saisies dans le formulaire
$lastname = checkValid($_POST["lastname"]);
$firstname = checkValid($_POST["firstname"]);
$birthday = $_POST["birth"];
$email = checkValid($_POST["email"]); // prendre l'input "email" situé dans le name de l'input dans inscription.php
$pwd = password_hash($_POST["password"], PASSWORD_DEFAULT); // cryptage pour la sécurité
$role = "customer";

try {

    // On vérifie l'adresse email...
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Si les mots de passe sont identiques :
        if ($_POST["password"] == $_POST["password2"]) {

            // Requête sql pour vérifier si l'adresse email saisie existe déjà.
            if (verifEmailExist($bdd, $email)) {

                // Si oui rediriger vers le formulaire d'inscription et afficher un message informant l'utilisateur que l'email existe déjà
                header("Location:../vue/inscription_page.php?erreurEmail=erreurs");

            // Si non,
            }else{

                // Requêtes INSERT pour insérer un nouveau user
                ajoutUser($bdd, $lastname, $firstname, $email, $pwd, $role, $birthday);

                // redirection vers le formulaire de connexion avec affichage d'un message informant du succès de l'inscription
                header("Location:../vue/inscription_page.php?validationInscription=erreurs");
            }
                      
        // Sinon (càd si mots de passe pas identiques) redirection vers le formulaire d'inscription et affichage d'un message d'erreur
        }else{
            header("Location:../vue/inscription_page.php?erreurPwd=erreurs");
        }

    // Si l'adresse email n'est pas valide :
    }else{
        header("Location:../vue/inscription_page.php?unvalidEmail=unvalid");
    }
    
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}
?>