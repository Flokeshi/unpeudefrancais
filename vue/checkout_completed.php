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
    <title>Un Peu de Français : Checkout Completed</title>

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
        ?>
        <!-- end: Header -->

        <!-- Page Content -->
       <!-- SHOP CHECKOUT COMPLETED -->
        <section id="shop-checkout-completed">
            <div class="container">
                <div class="p-t-10 m-b-20 text-center">
                    <div class="text-center">
                        <h3>
                            <?php if ($_SESSION['lang']=="EN") { ?>
                                Congratulations! Your order is completed!
                            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                Félicitations ! Votre commande a été finalisée !
                            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                ¡Felicidades! ¡Tu pedido está completo!
                            <?php } ?>
                        </h3>
                        <p>
                            <?php if ($_SESSION['lang']=="EN") { ?>
                                You can
                            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                Vous pouvez
                            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                Puedes
                            <?php } ?>
                            <a href="../vue/orders_page.php" class="text-underline">
                                <mark>
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        view your order
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        voir votre commande
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        ver tu pedido
                                    <?php } ?>
                                </mark>
                            </a> 
                            <?php if ($_SESSION['lang']=="EN") { ?>
                                on your account page, when you are logged in.
                            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                sur la page de votre compte, lorsque vous êtes connecté(e).
                            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                en la página de su cuenta, cuando haya iniciado sesión.
                            <?php } ?>
                        </p>
                    </div>
                    <a href="../vue/account_page.php" class="btn icon-left m-r-10">
                        <span>
                            <?php if ($_SESSION['lang']=="EN") { ?>
                                Go to login page
                            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                Aller à la page de connexion
                            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                Ir a la página de inicio de sesión
                            <?php } ?>
                        </span>
                    </a>
                    <a class="btn icon-left" href="../vue/shop.php">
                        <span>
                            <?php if ($_SESSION['lang']=="EN") { ?>
                                Return to shop
                            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                Retour au magasin
                            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                Volver a la tienda
                            <?php } ?>
                        </span>
                    </a>
                </div>
            </div>
        </section>
        <!-- end: SHOP CHECKOUT COMPLETED -->       
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
    <?php
    include("../vue/scrolltop.php");
    ?>
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