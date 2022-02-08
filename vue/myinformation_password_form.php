<?php
require ('../modele/connexion_bdd.php');

/*requête préparée pour intégrer les produits au dashboard*/
$userInformation=$bdd->prepare("SELECT * FROM user WHERE user_id=:user_id"); // Inner join permet de prendre en jointure tout le contenu des 2 tables qui ont une correspondance et qui n'ont pas une valeur nulle
$userInformation->execute(['user_id' => $_SESSION['idUser']]);
$userTable = $userInformation->fetch();
/*Utiliser foreach ensuite avec: foreach ($productsTable as $productRow)*/
?>

<form method="POST" action="../controller/traitement_myinformation_password_edit.php">
    <div class="form-group">
        <label for="password">
            <?php if ($_SESSION['lang']=="EN") { ?>
                Old password
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Ancien mot de passe
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Antigua contraseña
            <?php } ?>
        </label>
        <input type="password" name="password" class="form-control" id="password" required>
    </div>
    <div class="form-group">
        <label for="password1">
            <?php if ($_SESSION['lang']=="EN") { ?>
                New password
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Nouveau mot de passe
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Nueva contraseña
            <?php } ?>
        </label>
        <input type="password" name="password1" class="form-control" id="password1" required>
    </div>
    <div class="form-group">
        <label for="password2">
            <?php if ($_SESSION['lang']=="EN") { ?>
                Confirm your new password
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Confirmez votre nouveau mot de passe
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Confirma tu nueva contraseña
            <?php } ?>
        </label>
        <input type="password" name="password2" class="form-control" id="password2" required>
        <input type="hidden" name="idUser" value="<?php echo $_SESSION['idUser']; ?>">
    </div>
    <?php
    if (isset($_GET["erreurPwd"])) {
        if ($_GET["erreurPwd"] == "erreurs") {
            echo "<div class='alert alert-danger'>Vos nouveaux mots de passe ne sont pas identiques.</div>";
        }
    }
    if (isset($_GET["oldPwd"])) {
        if ($_GET["oldPwd"] == "erreurs") {
            echo "<div class='alert alert-danger'>Votre ancien mot de passe est erroné.</div>";
        }
    }
    if (isset($_GET["erreurTechnique"])) {
        if ($_GET["erreurTechnique"] == "erreurs") {
            echo "<div class='alert alert-danger'>Une erreur technique est survenue. Veuillez réessayer.</div>";
        }
    }
    if (isset($_GET["validationModification2"])) {
        if ($_GET["validationModification2"] == "ok") {
            echo "<div class='alert alert-success'>Vos modifications ont bien été prises en compte.</div>";
        }
    }
    ?>
    <button type="submit" class="btn btn-primary btn-block">
        <?php if ($_SESSION['lang']=="EN") { ?>
            Modify !
        <?php }elseif ($_SESSION['lang']=="FR") { ?>
            Modifier !
        <?php }elseif ($_SESSION['lang']=="ES") { ?>
            Editar !
        <?php } ?>
    </button>
</form>