<?php

$adresse = "../public/assets/files/"; //Adresse du dossier.


/*code de gestion de fichiers*/
$dossier = opendir($adresse); //Ouverture du dossier. 
echo '<fieldset><legend>Liste des fichiers</legend><br>'; //Ouverture de fieldset 
//(Fieldset permet de faire des cadres avec légende intégrée en haut a gauche. C'est très simple à utiliser et ça permet de répartir les formulaires en plusieurs parties et donc d'accroître leur lisibilité !). 

while ($Fichier = readdir($dossier)) { //Affichage...
     if ($Fichier != "." && $Fichier != "..") { 
          echo '<a href="../vue/dashboard.php?nom='.$Fichier.'" class="ms-2 text-reset" href="#" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="icon-trash-2">Supprimer</a> => <a href='.$adresse.$Fichier.' target="_blank">'.$Fichier.'</a><BR>'; 
     }
}
closedir($dossier); //Fermeture du dossier. 
echo '<br></fieldset>'; //Fermeture du fieldset.


/*code de suppression de fichiers*/
if(isset($_GET['nom'])) { //Si $_GET['nom'] existe, on supprime le fichier...
     if ($Fichier != "." && $Fichier != "..") {
          $nom=''.$adresse.$_GET['nom'].'';
          unlink($nom); //Supprime le fichier à l'adresse indiquée...
          echo '<div class="alert alert-success">Le fichier "'.$_GET['nom'].'" a été éffacé !</div>';
     }
}

?>