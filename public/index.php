<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Florian Mangin" />
    <!-- <meta name="description" content="Themeforest Template Polo, html template"> -->
    <link rel="icon" type="image/png" href="../public/assets/images/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>Un Peu de Français</title>
    <!-- Stylesheets & Fonts -->
    <link href="../public/assets/css/plugins.css" rel="stylesheet">
    <link href="../public/assets/css/style.css" rel="stylesheet">
    <link href="../public/assets/css/custom.css?var=123" rel="stylesheet">
    <!-- <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body> <!-- oncontextmenu="return false" onkeydown="return false;" onmousedown="return false;" --><!-- Désactive le clic droit, CTRL et F12 --><!-- à mettre sur les body de toutes les pages -->

    <!-- Body Inner -->
    <div class="body-inner" id="scrollbehavior">

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

        require ('../modele/connexion_bdd.php');
        require ('../modele/fonctions.php');

        /*requête préparée pour intégrer l'image bannière de l'accueil*/
        $pic = $bdd->prepare("SELECT * FROM picture WHERE picture_id=3"); // prepare envoit la requête au système
        $pic->execute(); // exécute la requête
        $picTable = $pic->fetch(); // affectation du tableau des picture_url à la variable $picTable. Cette variable retourne donc un tableau indexé
        /*$picTable["picture_url"] */

        /*requête préparée pour intégrer les produits au carousel de l'accueil*/
        $products=$bdd->prepare("SELECT * FROM product LEFT JOIN category ON product.category_id=category.category_id ORDER BY added_date DESC");
        $products->execute();
        $productsTable = $products->fetchAll();
        /*Utiliser foreach ensuite avec: foreach ($productsTable as $productRow)*/
        ?>

        <!-- BOXES -->
        <section class="p-t-20 p-b-20">
            <div class="container">

                <!-- Banner -->
                <div class="row p-b-50 p-t-30">
                    <div>
                        <img src="<?php echo $picTable["picture_url"]; ?>" id="boxBanner" class="boxBanner">
                    </div>
                </div>
                <!-- end: Banner -->

                <div class="post-item-description p-b-30 m-b-20" style="background: url('../public/assets/images/opacity/opacity60-y.png') no-repeat center; background-size: cover;">

                    <?php if ($_SESSION['lang']=="EN") { ?>

                        <h2>Presentation of the website</h2>
                        <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet. Ut nec metus a mi ullamcorper hendrerit. Nulla facilisi. Pellentesque
                        sed nibh a quam accumsan dignissim quis quis urna. The most happiest time of the day!. Praesent id dolor dui, dapibus gravida elit. Donec consequat laoreet sagittis. Suspendisse ultricies ultrices viverra. Morbi
                        rhoncus laoreet tincidunt. Mauris interdum convallis metus.M</p>
                        <div class="blockquote">
                        <p>The world is a dangerous place to live; not because of the people who are evil, but because of the people who don't do anything about it.</p>
                        <small>by <cite>Albert Einstein</cite></small>
                        </div>
                        <p> The most happiest time of the day!. Praesent id dolor dui, dapibus gravida elit. Donec consequat laoreet sagittis. Suspendisse ultricies ultrices viverra. Morbi rhoncus laoreet tincidunt. Mauris interdum convallis
                        metus. Suspendisse vel lacus est, sit amet tincidunt erat. Etiam purus sem, euismod eu vulputate eget, porta quis sapien. Donec tellus est, rhoncus vel scelerisque id, iaculis eu nibh.</p>
                        <p>Donec posuere bibendum metus. Quisque gravida luctus volutpat. Mauris interdum, lectus in dapibus molestie, quam felis sollicitudin mauris, sit amet tempus velit lectus nec lorem. Nullam vel mollis neque. The most
                        happiest time of the day!. Nullam vel enim dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed tincidunt accumsan massa id viverra. Sed sagittis, nisl sit amet imperdiet
                        convallis, nunc tortor consequat tellus, vel molestie neque nulla non ligula. Proin tincidunt tellus ac porta volutpat. Cras mattis congue lacus id bibendum. Mauris ut sodales libero. Maecenas feugiat sit amet
                        enim in accumsan.</p>
                        <p>Duis vestibulum quis quam vel accumsan. Nunc a vulputate lectus. Vestibulum eleifend nisl sed massa sagittis vestibulum. Vestibulum pretium blandit tellus, sodales volutpat sapien varius vel. Phasellus tristique
                        cursus erat, a placerat tellus laoreet eget. Fusce vitae dui sit amet lacus rutrum convallis. Vivamus sit amet lectus venenatis est rhoncus interdum a vitae velit.</p>

                    <?php }elseif ($_SESSION['lang']=="FR") { ?>

                        <h2>Présentation du site</h2>
                        <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet. Ut nec metus a mi ullamcorper hendrerit. Nulla facilisi. Pellentesque
                        sed nibh a quam accumsan dignissim quis quis urna. The most happiest time of the day!. Praesent id dolor dui, dapibus gravida elit. Donec consequat laoreet sagittis. Suspendisse ultricies ultrices viverra. Morbi
                        rhoncus laoreet tincidunt. Mauris interdum convallis metus.M</p>
                        <div class="blockquote">
                        <p>Le monde est un endroit dangereux où vivre; pas à cause des gens pervers, mais à cause des gens qui ne font rien à ce sujet.</p>
                        <small>Par <cite>Albert Einstein</cite></small>
                        </div>
                        <p> The most happiest time of the day!. Praesent id dolor dui, dapibus gravida elit. Donec consequat laoreet sagittis. Suspendisse ultricies ultrices viverra. Morbi rhoncus laoreet tincidunt. Mauris interdum convallis
                        metus. Suspendisse vel lacus est, sit amet tincidunt erat. Etiam purus sem, euismod eu vulputate eget, porta quis sapien. Donec tellus est, rhoncus vel scelerisque id, iaculis eu nibh.</p>
                        <p>Donec posuere bibendum metus. Quisque gravida luctus volutpat. Mauris interdum, lectus in dapibus molestie, quam felis sollicitudin mauris, sit amet tempus velit lectus nec lorem. Nullam vel mollis neque. The most
                        happiest time of the day!. Nullam vel enim dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed tincidunt accumsan massa id viverra. Sed sagittis, nisl sit amet imperdiet
                        convallis, nunc tortor consequat tellus, vel molestie neque nulla non ligula. Proin tincidunt tellus ac porta volutpat. Cras mattis congue lacus id bibendum. Mauris ut sodales libero. Maecenas feugiat sit amet
                        enim in accumsan.</p>
                        <p>Duis vestibulum quis quam vel accumsan. Nunc a vulputate lectus. Vestibulum eleifend nisl sed massa sagittis vestibulum. Vestibulum pretium blandit tellus, sodales volutpat sapien varius vel. Phasellus tristique
                        cursus erat, a placerat tellus laoreet eget. Fusce vitae dui sit amet lacus rutrum convallis. Vivamus sit amet lectus venenatis est rhoncus interdum a vitae velit.</p>

                    <?php }elseif ($_SESSION['lang']=="ES") { ?>

                        <h2>Presentación del sitio</h2>
                        <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet. Ut nec metus a mi ullamcorper hendrerit. Nulla facilisi. Pellentesque
                        sed nibh a quam accumsan dignissim quis quis urna. The most happiest time of the day!. Praesent id dolor dui, dapibus gravida elit. Donec consequat laoreet sagittis. Suspendisse ultricies ultrices viverra. Morbi
                        rhoncus laoreet tincidunt. Mauris interdum convallis metus.M</p>
                        <div class="blockquote">
                        <p>El mundo es un lugar peligroso para vivir; no por la gente mala, sino por la gente que no hace nada al respecto.</p>
                        <small>Por <cite>Albert Einstein</cite></small>
                        </div>
                        <p> The most happiest time of the day!. Praesent id dolor dui, dapibus gravida elit. Donec consequat laoreet sagittis. Suspendisse ultricies ultrices viverra. Morbi rhoncus laoreet tincidunt. Mauris interdum convallis
                        metus. Suspendisse vel lacus est, sit amet tincidunt erat. Etiam purus sem, euismod eu vulputate eget, porta quis sapien. Donec tellus est, rhoncus vel scelerisque id, iaculis eu nibh.</p>
                        <p>Donec posuere bibendum metus. Quisque gravida luctus volutpat. Mauris interdum, lectus in dapibus molestie, quam felis sollicitudin mauris, sit amet tempus velit lectus nec lorem. Nullam vel mollis neque. The most
                        happiest time of the day!. Nullam vel enim dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed tincidunt accumsan massa id viverra. Sed sagittis, nisl sit amet imperdiet
                        convallis, nunc tortor consequat tellus, vel molestie neque nulla non ligula. Proin tincidunt tellus ac porta volutpat. Cras mattis congue lacus id bibendum. Mauris ut sodales libero. Maecenas feugiat sit amet
                        enim in accumsan.</p>
                        <p>Duis vestibulum quis quam vel accumsan. Nunc a vulputate lectus. Vestibulum eleifend nisl sed massa sagittis vestibulum. Vestibulum pretium blandit tellus, sodales volutpat sapien varius vel. Phasellus tristique
                        cursus erat, a placerat tellus laoreet eget. Fusce vitae dui sit amet lacus rutrum convallis. Vivamus sit amet lectus venenatis est rhoncus interdum a vitae velit.</p>

                    <?php } ?>
                </div>
                <!-- <div class="button">Click me</div> -->

            </div>
        </section>
        <!-- end: BOXES -->

        <section class="p-0 p-b-20">
            <div class="container">
                <div class="row p-t-0 justify-content-space-between">
                    <a href="../vue/newsletter_suscribe.php" class="box1 col-lg-4" style="background: url('<?php if ($_SESSION['lang']=="EN") { echo "../public/assets/images/bubbles/bubble1_EN.png";}elseif($_SESSION['lang']=="FR"){echo "../public/assets/images/bubbles/bubble1_FR.png";}elseif($_SESSION['lang']=="ES"){echo "../public/assets/images/bubbles/bubble1_ES.png";}; ?>') no-repeat center, url('../public/assets/images/index/box1.jpg') no-repeat center; background-size: cover; background-color: pink;"></a>
                    <a href="../vue/shop.php" class="box2 col-lg-4" style="background: url('<?php if ($_SESSION['lang']=="EN") { echo "../public/assets/images/bubbles/bubble2_EN.png";}elseif($_SESSION['lang']=="FR"){echo "../public/assets/images/bubbles/bubble2_FR.png";}elseif($_SESSION['lang']=="ES"){echo "../public/assets/images/bubbles/bubble2_ES.png";}; ?>') no-repeat center, url('../public/assets/images/index/box2.jpg') no-repeat center; background-size: cover; background-color: lightgreen;"></a>
                    <a href="../vue/freeShop.php" class="box3 col-lg-4" style="background: url('<?php if ($_SESSION['lang']=="EN") { echo "../public/assets/images/bubbles/bubble3_EN.png";}elseif($_SESSION['lang']=="FR"){echo "../public/assets/images/bubbles/bubble3_FR.png";}elseif($_SESSION['lang']=="ES"){echo "../public/assets/images/bubbles/bubble3_ES.png";}; ?>') no-repeat center, url('../public/assets/images/index/box3.jpg') no-repeat center; background-size: cover; background-color: darkviolet;"></a>
                </div>
            </div> 
        </section>      

        <!-- CALL TO ACTION -->
        <section class="p-0 p-b-10">
                <div class="container">
                     <a href="../vue/shop.php">
                        <h4 class="evenboxinner" style="font-size:35px; transform: none; background-color: darkorange;">
                            <?php if ($_SESSION['lang']=="EN") { ?>
                                New products!
                            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                Nouveaux produits !
                            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                Nuevos productos !
                            <?php } ?>
                         </h4>
                     </a>
                </div>
        </section>
        <!-- END: CALL TO ACTION -->


        <!-- CAROUSEL -->
        <section class="p-t-0 p-b-50">
            <div class="grid-articles carousel arrows-visibile container" data-items="4" data-margin="30" data-dots="false">

                <?php
                $compteur=0;
                foreach ($productsTable as $productRow) { 
                    if ($compteur <6) { ?>
                        <article class="post-entry">
                            <a href="#newsltr" data-offset-bottom="600" class="post-image"><img alt="" src="<?php echo $productRow["picture_url"]; ?>" class="<?php echo "box".random_int(4,7) ?>"></a>
                            <div class="post-entry-overlay">
                                <div class="post-entry-meta">
                                    <div class="post-entry-meta-category">
                                        <span class="badge bg-danger">New!</span>
                                    </div>
                                    <div class="post-entry-meta-title">
                                        <h2><a href="#"><?php echo $productRow["product_name"]; ?></a></h2>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php 
                    $compteur++;
                    }
                } ?>

            </div>
        </section>
        <!-- end: CAROUSEL -->

        <!-- ADVERTISEMENT -->
        <!-- <section class="p-t-20 p-b-40">
            <div class="container">
                <div class="marketing-box">ADVERTISEMENT</div>
            </div>
        </section> -->
        <!-- end: ADVERTISEMENT -->

        <?php
        if ($_SESSION['lang']=="EN") {
            include("../vue/footer_EN.php");
        }elseif ($_SESSION['lang']=="FR") {
            include("../vue/footer_FR.php");
        }elseif ($_SESSION['lang']=="ES") {
            include("../vue/footer_ES.php");
        }
        ?>

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
    <script src="../public/assets/js/functions.js?var=444"></script>

</body>

</html>