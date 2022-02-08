 <div class="topbar-form saisieConnexion" id="popbox">
    <form method="POST" action="../controller/traitement_connexion.php">
        <div class="form-group">
            <label class="sr-only">Email</label>
            <input type="text" placeholder="Email" name="email" class="form-control saisieConnexion" id="inputMail" required>
        </div>
        <div class="input-group mb-3">
            <label class="sr-only">Password</label>
            <input type="password" class="form-control saisieConnexion" placeholder="Password" name="password" aria-label="Recipient's username" aria-describedby="basic-addon2" id="inputPwd" required>
          <button type="button" onclick="hidePassword();" class="btn btn-primary input-group-text" id="basic-addon2"><i class="far fa-eye" id="eyePwd"></i></button>
      </div>

        <div class="form-inline form-group">
            <div class="form-check m-b-20">
                <!-- <label>
                    <div>
                        <input type="checkbox">
                        <small class="m-l-10"> Remember me</small>
                    </div>
                </label> -->
                <label>
                    <a href="../vue/password_forgot_page.php"> 
                        <?php if ($_SESSION['lang']=="EN") { ?>
                            Forgot your password? Click here
                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                            Mot de passe oublié ? Cliquez ici
                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                            Olvidaste tu contraseña ? haga clic aquí
                        <?php } ?>
                    </a>
                </label>
                <label>
                    <a href="../vue/inscription_page.php">
                        <?php if ($_SESSION['lang']=="EN") { ?>
                            No account? Sign up
                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                            Vous n'avez pas de compte ? Inscrivez-vous
                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                            Sin cuenta? Inscribirse
                        <?php } ?>
                    </a>
                </label>
                <?php
                if (isset($_GET["erreurMessage"])) {
                    if ($_GET["erreurMessage"] == "erreurs") {
                        echo "<div class='alert alert-danger'>Vos identifiants sont incorrects</div>";
                    }
                }
                if (isset($_GET["erreurTechnique"])) {
                    if ($_GET["erreurTechnique"] == "erreurs") {
                        echo "<div class='alert alert-danger'>Une erreur technique est survenue.</div>";
                    }
                }
                ?>
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                <?php if ($_SESSION['lang']=="EN") { ?>
                    Log in
                <?php }elseif ($_SESSION['lang']=="FR") { ?>
                    Connexion
                <?php }elseif ($_SESSION['lang']=="ES") { ?>
                    Acceso
                <?php } ?>
            </button>
        </div>
    </form>
</div>