<form method="POST" action="../controller/traitement_inscription.php">
    <div class="form-group">
        <label class="sr-only">
            <?php if ($_SESSION['lang']=="EN") { ?>
                Last Name
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Nom
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Apellido
            <?php } ?>
        </label>
        <input type="text" placeholder="<?php if ($_SESSION['lang']=="EN") {echo "Last name";}elseif ($_SESSION['lang']=="FR") {echo "Nom";}elseif ($_SESSION['lang']=="ES") {echo "Apellido";}; ?>" name="lastname" class="form-control" required>
    </div>
    <div class="form-group">
        <label class="sr-only">
            <?php if ($_SESSION['lang']=="EN") { ?>
                First Name
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Prénom
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Primer nombre
            <?php } ?>
        </label>
        <input type="text" placeholder="<?php if ($_SESSION['lang']=="EN") {echo "First name";}elseif ($_SESSION['lang']=="FR") {echo "Prénom";}elseif ($_SESSION['lang']=="ES") {echo "Primer nombre";}; ?>" name="firstname" class="form-control" required>
    </div>
    <div class="form-group">
        <label class="sr-only">
            <?php if ($_SESSION['lang']=="EN") { ?>
                Birthday
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Date de naissance
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Fecha de nacimiento
            <?php } ?>
        </label>
        <input type="date" name="birth" class="form-control" required>
    </div>
    <div class="form-group">
        <label class="sr-only">
            Email
        </label>
        <input type="text" placeholder="Email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label class="sr-only">
            <?php if ($_SESSION['lang']=="EN") { ?>
                Password
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Mot de passe
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Contraseña
            <?php } ?>
        </label>
        <input type="password" placeholder="<?php if ($_SESSION['lang']=="EN") {echo "Password";}elseif ($_SESSION['lang']=="FR") {echo "Mot de passe";}elseif ($_SESSION['lang']=="ES") {echo "Contraseña";}; ?>" name="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label class="sr-only">
            <?php if ($_SESSION['lang']=="EN") { ?>
                Confirm your password
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Confirmez votre mot de passe
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Confirmar la contraseña
            <?php } ?>
        </label>
        <input type="password" placeholder="<?php if ($_SESSION['lang']=="EN") {echo "Confirm your password";}elseif ($_SESSION['lang']=="FR") {echo "Confirmez votre mot de passe";}elseif ($_SESSION['lang']=="ES") {echo "Confirmar la contraseña";}; ?>" name="password2" class="form-control" required>
    </div>
    <?php
    if (isset($_GET["erreurPwd"])) {
        if ($_GET["erreurPwd"] == "erreurs") {
            echo "<div class='alert alert-danger'>Vos mots de passe ne sont pas identiques.</div>";
        }
    }
    if (isset($_GET["erreurEmail"])) {
        if ($_GET["erreurEmail"] == "erreurs") {
            echo "<div class='alert alert-danger'>L'adresse e-mail existe déjà.</div>";
        }
    }
    if (isset($_GET["erreurTechnique"])) {
        if ($_GET["erreurTechnique"] == "erreurs") {
            echo "<div class='alert alert-danger'>Une erreur technique est survenue. Veuillez réessayer.</div>";
        }
    }
    if (isset($_GET["validationInscription"])) {
        if ($_GET["validationInscription"] == "erreurs") {
            echo "<div class='alert alert-success'>Votre inscription a bien été prise en compte.</div>";
        }
    }
    if (isset($_GET["unvalidEmail"])) {
        if ($_GET["unvalidEmail"] == "unvalid") {
            echo "<div class='alert alert-warning'>Merci de renseigner une adresse email valide.</div>";
        }
    }
    ?>
    <button type="submit" class="btn btn-primary btn-block">
        <?php if ($_SESSION['lang']=="EN") { ?>
            Register
        <?php }elseif ($_SESSION['lang']=="FR") { ?>
            S'enregistrer
        <?php }elseif ($_SESSION['lang']=="ES") { ?>
            Registrarse
        <?php } ?>
    </button>
</form>