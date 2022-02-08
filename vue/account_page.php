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
    <title>Un Peu de Français : My Account</title>

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
        <?php
        if (isset($_SESSION['idUser'])) { ?>
            <section class="p-t-60 p-b-60">
                <article class="container">
                    <h4 class="evenboxinnerShop m-l-40">
                        <?php if ($_SESSION['lang']=="EN") { ?>
                            My account
                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                            Mon compte
                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                            Mi cuenta
                        <?php } ?>
                    </h4>
                    <div class="row text-center account">
                        <div class="col-lg-4">
                            <div class="box11" style="background: url('../public/assets/images/account/account1.jpg') no-repeat center;background-size: auto 120%;">
                                <a href="../vue/myinformation_page.php">
                                    <i class="fas fa-id-card p-10"></i>
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        My information
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Mes informations
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Mi informacion
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="box12" style="background: url('../public/assets/images/account/account2.jpg') no-repeat center;background-size: auto 120%;">
                                <a href="../vue/orders_page.php">
                                    <i class="fas fa-file-alt p-10"></i>
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        My orders
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Mes commandes
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Mis pedidos
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="box13" style="background: url('../public/assets/images/account/account3.jpg') no-repeat center;background-size: auto 120%;">
                                <a href="../controller/traitement_deconnexion.php">
                                    <i class="fas fa-sign-out-alt p-10"></i>
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        Log out
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Déconnexion
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Cerrar sesión
                                    <?php } ?>
                            </a>
                            </div>
                        </div>
                    </div>
                </article>
            </section>
        <?php
        }else{
            include("../vue/404.html");
        }?>
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

    <!-- Scroll Top -->
    <?php include("../vue/scrolltop.php");?>
    <!-- end: Scroll Top -->

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