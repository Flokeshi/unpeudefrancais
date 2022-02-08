<?php 
require ('../modele/connexion_bdd.php');

/*requête préparée pour intégrer les produits au dashboard*/
$products=$bdd->prepare("SELECT * FROM category INNER JOIN product ON product.category_id=category.category_id WHERE category_name='A1' ORDER BY added_date DESC"); // Inner join permet de prendre en jointure tout le contenu des 2 tables qui ont une correspondance et qui n'ont pas une valeur nulle
$products->execute();
$productsA1 = $products->fetchAll();
/*Utiliser foreach ensuite avec: foreach ($productsA1 as $productRow)*/

$products=$bdd->prepare("SELECT * FROM category INNER JOIN product ON product.category_id=category.category_id WHERE category_name='A2' ORDER BY added_date DESC");
$products->execute();
$productsA2 = $products->fetchAll();

$products=$bdd->prepare("SELECT * FROM category INNER JOIN product ON product.category_id=category.category_id WHERE category_name='B1' ORDER BY added_date DESC");
$products->execute();
$productsB1 = $products->fetchAll();

$products=$bdd->prepare("SELECT * FROM category INNER JOIN product ON product.category_id=category.category_id WHERE category_name='B2' ORDER BY added_date DESC");
$products->execute();
$productsB2 = $products->fetchAll();

$products=$bdd->prepare("SELECT * FROM category INNER JOIN product ON product.category_id=category.category_id WHERE category_name='C1' ORDER BY added_date DESC");
$products->execute();
$productsC1 = $products->fetchAll();

$products=$bdd->prepare("SELECT * FROM category INNER JOIN product ON product.category_id=category.category_id WHERE category_name='C2' ORDER BY added_date DESC");
$products->execute();
$productsC2 = $products->fetchAll();
?>

<!-- Header -->
<header id="header" style="z-index: 10 !important;">
    <div class="header-inner boxHeader" style="background: url('../public/assets/images/opacity/opacity70-b.png'), url('../public/assets/images/header/header3.jpg') no-repeat center; background-size: cover; background-color: lightskyblue !important; border: 3px solid black;">
        <div class="container">
            <!--Logo-->

            <div id="logo"><a href="../public/index.php"><span class="logo-default"><img src="../public/assets/images/logo.png" class="logo">Un peu de français</span></a></div>
            <!--End: Logo-->
            <!-- Search -->
            <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                <form class="search-form" action="shop.php" method="get">
                    <input class="form-control" name="q" type="text" placeholder="Type & Search..." />
                    <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                </form>
            </div>
            <!-- end: search -->
            <!--Header Extras-->
            <div class="header-extras">
                <ul>
                    <li>
                        <a id="btn-search" href="#"> <i class="icon-search"></i></a>
                    </li>
                    <li>
                        <div class="p-dropdown"> <a href="#"><i class="icon-globe"></i><span>EN</span></a>
                            <ul class="p-dropdown-content">
                                <li><a href="../controller/traitement_FR.php">French</a></li>
                                <li><a href="../controller/traitement_ES.php">Spanish</a></li>
                                <li><a>English</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!--end: Header Extras-->
            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger"> <a class="lines-button x"><span class="lines"></span></a> </div>
            <!--end: Navigation Resposnive Trigger-->
            <!--Navigation-->
            <div id="mainMenu">
                <div class="container">
                    <nav>
                        <ul class="menu">

                            <li><a href="../public/index.php"><i class="fas fa-home"></i>Home</a></li>

                            <li><a href="../vue/freeShop.php"><i class="fas fa-file-download"></i>Free</a>
                            
                            <li class="dropdown mega-menu-item"><a href="../vue/shop.php"><i class="fas fa-shopping-bag"></i></i>Shop</a>
                                <!-- <ul class="dropdown-menu">
                                    <li class="mega-menu-content">
                                        <div class="row">
                                            
                                            <div class="col-lg-2">
                                                <ul>
                                                    <li class="mega-menu-title">A1</li>
                                                    <?php 
                                                    //$compteur=0;
                                                    //foreach ($productsA1 as $row) { 
                                                        //if ($compteur < 6) { ?>
                                                            <li><a href="../vue/shop.php?from=<?php //echo $row['product_url'] ?>"><?php //echo $row['product_name'] ?></a></li>
                                                            <?php
                                                            //$compteur++;}}?>
                                                </ul>
                                            </div>
                                            <div class="col-lg-2">
                                                <ul>
                                                    <li class="mega-menu-title">A2</li>
                                                    <?php 
                                                    //$compteur=0;
                                                    //foreach ($productsA2 as $row) { 
                                                        //if ($compteur < 6) { ?>
                                                            <li><a href="../vue/shop.php?from=<?php //echo $row['product_url'] ?>"><?php //echo $row['product_name'] ?></a></li>
                                                            <?php
                                                            //$compteur++;}}?>
                                                </ul>
                                            </div>
                                            <div class="col-lg-2">
                                                <ul>
                                                    <li class="mega-menu-title">B1</li>
                                                    <?php 
                                                    //$compteur=0;
                                                    //foreach ($productsB1 as $row) { 
                                                        //if ($compteur < 6) { ?>
                                                            <li><a href="../vue/shop.php?from=<?php //echo $row['product_url'] ?>"><?php //echo $row['product_name'] ?></a></li>
                                                            <?php
                                                            //$compteur++;}}?>
                                                </ul>
                                            </div>
                                            <div class="col-lg-2">
                                                <ul>
                                                    <li class="mega-menu-title">B2</li>
                                                    <?php 
                                                    //$compteur=0;
                                                    //foreach ($productsB2 as $row) { 
                                                        //if ($compteur < 6) { ?>
                                                            <li><a href="../vue/shop.php?from=<?php //echo $row['product_url'] ?>"><?php //echo $row['product_name'] ?></a></li>
                                                            <?php
                                                            //$compteur++;}}?>
                                                </ul>
                                            </div>
                                            <div class="col-lg-2">
                                                <ul>
                                                    <li class="mega-menu-title">C1</li>
                                                    <?php 
                                                    //$compteur=0;
                                                    //foreach ($productsC1 as $row) { 
                                                        //if ($compteur < 6) { ?>
                                                            <li><a href="../vue/shop.php?from=<?php //echo $row['product_url'] ?>"><?php //echo $row['product_name'] ?></a></li>
                                                            <?php
                                                            //$compteur++;}}?>
                                                </ul>
                                            </div>
                                            <div class="col-lg-2">
                                                <ul>
                                                    <li class="mega-menu-title">C2</li>
                                                    <?php 
                                                    //$compteur=0;
                                                    //foreach ($productsC2 as $row) { 
                                                        //if ($compteur < 6) { ?>
                                                            <li><a href="../vue/shop.php?from=<?php //echo $row['product_url'] ?>"><?php //echo $row['product_name'] ?></a></li>
                                                            <?php
                                                            //$compteur++;}}?>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </li>
                                </ul> -->
                            </li>
                            
                            <?php if (!isset($_SESSION['idUser'])) { ?>
                                <li><a href="../vue/connexion_page.php"><i class="fas fa-sign-in-alt"></i>Log in</a>
                            <?php }else{ ?>
                                <li class="dropdown"><a href="../vue/account_page.php"><i class="fa fa-user"></i>Account</a>
                            <?php 
                            } 
                            if (!isset($_SESSION['idUser'])) { ?>
                                <!-- <ul class="dropdown-menu">
                                    <li class="p-dropdown-content">
                                        <?php
                                        //include('connexion_form.php');
                                        ?>
                                    </li>
                                </ul> -->
                                <?php }else{ ?>
                                <ul class="dropdown-menu">
                                    <li class="p-dropdown-content">
                                        <?php
                                        include('../vue/account_form.php');
                                        ?>
                                    </li>
                                </ul>
                                <?php } ?>
                            </li>

                            <li class="dropdown"><a href="../vue/cart_page.php"><i class="fas fa-shopping-cart"></i></i>Cart</a>  
                                <!-- <ul class="dropdown-menu">
                                    <li class="p-dropdown-content">
                                    <?php //include("../vue/cart_form.php");?>
                                    </li>
                                </ul> -->
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!--end: Navigation-->
    
    </div>
</header>
<!-- end: Header