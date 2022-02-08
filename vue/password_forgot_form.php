<form method="POST" action="../controller/traitement_reset_password.php"> <!-- password_reset_token.php -->
    <div class="form-group">
        <label for="exampleInputEmail1">
            <?php if ($_SESSION['lang']=="EN") { ?>
                Your email address
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Votre adresse email
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Tu correo electrónico
            <?php } ?>
        </label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">
            <?php if ($_SESSION['lang']=="EN") { ?>
                We'll never share your email with anyone else.
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Nunca compartiremos su correo electrónico con nadie más.
            <?php } ?>
        </small>
    </div>
    <?php
    if (isset($_GET["erreurPwd"])) {
        if ($_GET["erreurPwd"] == "erreurs") {
            echo "<div class='alert alert-danger'>Vos mots de passe ne sont pas identiques.</div>";
        }
    }
    if (isset($_GET["erreurTechnique"])) {
        if ($_GET["erreurTechnique"] == "erreurs") {
            echo "<div class='alert alert-danger'>Une erreur technique est survenue. Veuillez réessayer.</div>";
        }
    }
    if (isset($_GET["success"])) {
        if ($_GET["success"] == "MailSent") {
            echo "<div class='alert alert-success'>L'email pour réinitialiser votre mot de passe a bien été envoyé !</div>";
        }
    }
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "WrongLogIds") {
            echo "<div class='alert alert-danger'>L'adresse renseignée n'existe pas.</div>";
        }
    }
    ?>
    <button type="submit" class="btn btn-primary btn-block" name="password_reset_token">
        <?php if ($_SESSION['lang']=="EN") { ?>
                Send email
            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                Envoyer un email
            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                Enviar email
            <?php } ?>
    </button>
</form>