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
    <title>Un Peu de Français : Terms of Sales</title>

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
        <?php if ($_SESSION['lang']=="EN") { ?>
            Legal notice content
        <?php }elseif ($_SESSION['lang']=="FR") { ?>
            Legal notice content
        <?php }elseif ($_SESSION['lang']=="ES") { ?>
            Legal notice content
        <?php } ?>
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