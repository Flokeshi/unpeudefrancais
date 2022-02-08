<?php
require ('../modele/connexion_bdd.php');

/*requête préparée pour intégrer les produits au dashboard*/
$userInformation=$bdd->prepare("SELECT * FROM user WHERE user_id=:user_id");
$userInformation->execute(['user_id' => $_SESSION['idUser']]);
$userTable = $userInformation->fetch();
/*Utiliser foreach ensuite avec: foreach ($productsTable as $productRow)*/
?>

<form method="POST" action="../controller/traitement_myinformation_edit.php">
    <div class="form-group">
        <label for="lastname">
            <?php if ($_SESSION['lang']=="EN") { ?>
                Last Name
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Nom
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Apellido
            <?php } ?>
        </label>
        <input type="text" value="<?php echo $userTable['user_lastname']; ?>" name="lastname" id="lastname" class="form-control">
    </div>
    <div class="form-group">
        <label for="firstname">
            <?php if ($_SESSION['lang']=="EN") { ?>
                First Name
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Prénom
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Primer nombre
            <?php } ?>
        </label>
        <input type="text" value="<?php echo $userTable['user_firstname']; ?>" name="firstname" id="firstname" class="form-control">
    </div>
    <div class="form-group">
        <label for="birth">
            <?php if ($_SESSION['lang']=="EN") { ?>
                Birthday
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Date de naissance
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Fecha de nacimiento
            <?php } ?>
        </label>
        <input type="date" value="<?php echo $userTable['user_birthday']; ?>" name="birth" id="birth" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">
            Email
        </label>
        <input type="text" value="<?php echo $userTable['user_email']; ?>" name="email" id="email" class="form-control">
        <input type="hidden" name="idUser" value="<?php echo $_SESSION['idUser']; ?>">
    </div>
    <?php
    if (isset($_GET["erreurEmail"])) {
        if ($_GET["erreurEmail"] == "erreurs") {
            echo "<div class='alert alert-danger'>Cette adresse e-mail est déjà enregistrée.</div>";
        }
    }
    if (isset($_GET["erreurTechnique"])) {
        if ($_GET["erreurTechnique"] == "erreurs") {
            echo "<div class='alert alert-danger'>Une erreur technique est survenue. Veuillez réessayer.</div>";
        }
    }
    if (isset($_GET["validationModification"])) {
        if ($_GET["validationModification"] == "ok") {
            echo "<div class='alert alert-success'>Vos modifications ont bien été prises en compte.</div>";
        }
    }
    ?>
    <button type="submit" class="btn btn-primary btn-block">
        <?php if ($_SESSION['lang']=="EN") { ?>
            Edit !
        <?php }elseif ($_SESSION['lang']=="FR") { ?>
            Editer !
        <?php }elseif ($_SESSION['lang']=="ES") { ?>
            Editar !
        <?php } ?>
    </button>
</form>