<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="../public/assets/images/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>Un Peu de Français : Contact</title>

    <!-- DataTables css -->
    <link href='../public/assets/plugins/datatables/datatables.min.css' rel='stylesheet' />

    <!-- Stylesheets & Fonts -->
    <link href="../public/assets/css/plugins.css" rel="stylesheet">
    <link href="../public/assets/css/style.css" rel="stylesheet">
    <link href="../public/assets/css/custom.css?var=123" rel="stylesheet">
</head>

<body>

    <!-- Body Inner -->
    <div class="body-inner" id="scrollbehavior">

        <!-- Header -->
        <?php
        session_start();
        if (isset($_SESSION['lang'])) {
            
        }else{
        $_SESSION['lang']="EN";
        }

        if ($_SESSION['lang']=="EN") {
            include("../vue/topbar_EN.php");
            include("../vue/header_EN.php");
        }elseif ($_SESSION['lang']=="FR") {
            include("../vue/topbar_FR.php");
            include("../vue/header_FR.php");
        }elseif ($_SESSION['lang']=="ES") {
            include("../vue/topbar_ES.php");
            include("../vue/header_ES.php");
        }
        $_SESSION['URL']=$_SERVER['REQUEST_URI']; // met l'url actuelle en variable de session (ou PHP_SELF ?)
        ?>
        <!-- end: Header -->

        <!-- Page Content -->
        <section class="container connexion_page">
            <article class="boxConnexion w-100">
                <div class="evenboxinnerConnexion m-b-30 m-t-0 m-l-0">
                    <?php if ($_SESSION['lang']=="EN") { ?>
                        Contact us
                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                        Contactez-nous
                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                        Contacta con nosotros
                    <?php } ?>
                </div>
                <form method="POST" action="../controller/traitement_contact.php">
                    <div class="row">                       
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        Your First Name (required)
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Votre prénom (obligatoire)
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Tu nombre (requerido)
                                    <?php } ?>
                                </label>
                                <input type="text" placeholder="<?php if ($_SESSION['lang']=="EN") {echo "First Name";}elseif ($_SESSION['lang']=="FR") {echo "Prénom";}elseif ($_SESSION['lang']=="ES") {echo "Nombre";}; ?>" name="firstname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        Your Email (required)
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Votre email (obligatoire)
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Tu email (requerido)
                                    <?php } ?>
                                </label>
                                <input type="text" placeholder="Email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        Subject
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Sujet
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Sujeto
                                    <?php } ?>
                                </label>
                                <input type="text" placeholder="<?php if ($_SESSION['lang']=="EN") {echo "Subject";}elseif ($_SESSION['lang']=="FR") {echo "Sujet";}elseif ($_SESSION['lang']=="ES") {echo "Sujeto";}; ?>" name="subject" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        Your message
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Votre message
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Tu mensaje
                                    <?php } ?>
                                </label>
                                <textarea name="message" class="form-control" style="height: 210px; font-family: arial;" required></textarea>
                            </div>     
                        </div>
                        <div class="col-lg-5">
                            <button type="submit" class="btn btn-primary btn-block">
                                <?php if ($_SESSION['lang']=="EN") { ?>
                                    Send
                                <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                    Envoyer
                                <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                    Enviar
                                <?php } ?>
                            </button>
                        </div>
                    </div>

                    <?php
                    if (isset($_GET["erreurTechnique"])) {
                        if ($_GET["erreurTechnique"] == "erreurs") {
                            echo "<div class='alert alert-danger'>Une erreur technique est survenue. Veuillez réessayer.</div>";
                        }
                    }
                    ?>
                </form>
            </article>
        </section>
        <!-- end: Page Content -->

        <!-- Footer -->
        <?php
        if ($_SESSION['lang']=="EN") {
            include("../vue/footer_EN.php");
        }elseif ($_SESSION['lang']=="FR") {
            include("../vue/footer_FR.php");
        }elseif ($_SESSION['lang']=="ES") {
            include("../vue/footer_ES.php");
        }
        ?>
        <!-- end: Footer -->

    </div>
    <!-- end: Body Inner -->

    <!-- Scroll top -->
    <a id="st" href="#scrollbehavior" data-offset-top="600"><img src="../public/assets/images/scrolltop/bubble4-3.png" class="img1"><img src="../public/assets/images/scrolltop/bubble4-2.png" class="img2"></a>
    <!-- <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a> -->

    <!--Plugins-->
    <script src="../public/assets/js/jquery.js"></script>
    <script src="../public/assets/js/plugins.js"></script>
    <script src="../public/assets/js/custom.js"></script>

    <!--Template functions-->
    <script src="../public/assets/js/functions.js"></script>

    <!--Datatables plugin files-->
    <script src='../public/assets/plugins/datatables/datatables.min.js'></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</body>

</html>