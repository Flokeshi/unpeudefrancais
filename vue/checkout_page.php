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
    <title>Un Peu de Français : Checkout</title>

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
        require ('../modele/connexion_bdd.php');
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

        $quantity=$_POST['quantityTotal'];
        $total=$_POST['amountTotal'];
        $user_id=$_SESSION['idUser'];
        $cart_id=$_SESSION['idCart'];

        try {
            $sql="SELECT * FROM cart_details INNER JOIN product ON product.product_id=cart_details.product_num INNER JOIN category ON product.category_id=category.category_id INNER JOIN cart ON cart.cart_id=cart_details.cart_num WHERE user_id=:user_id AND cart_num=:cart_id ORDER BY product_name ASC"; // Inner join permet de prendre en jointure tout le contenu des 2 tables qui ont une correspondance et qui n'ont pas une valeur nulle
            $stmt=$bdd->prepare($sql);
            $stmt->execute([':user_id' => $user_id, ':cart_id' => $cart_id]);
            $recordset=$stmt->fetchAll();

            $userEmail=$bdd->prepare("SELECT user_email FROM user WHERE user_id=:user_id");
            $userEmail->execute([':user_id' => $user_id]);
            $user_email=$userEmail->fetch();
            $user_email=$user_email['user_email'];

        }catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
        ?>
        <!-- end: Header -->


        <!-- Page Content -->
       <!-- SHOP CHECKOUT -->
        <section id="shop-checkout">
            <div class="container">

                <?php if (isset($_SESSION['idUser']) && isset($_SESSION['idCart'])) { ?>
                <form method="POST" action="../controller/traitement_checkout.php">
                    <div class="row">
                        <div class="col-md-8">

                            <!-- Step 1 - Payment method -->
                            <div class="card">
                                <div class="card-body p-4">
                                    <span class="text-muted text-sm font-italic">
                                        <?php if ($_SESSION['lang']=="EN") { ?>
                                            Step 1 of 2
                                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                            Etape 1 sur 2
                                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                            Paso 1 de 2
                                        <?php } ?>
                                    </span>
                                    <h4 class="mb-4">
                                        <?php if ($_SESSION['lang']=="EN") { ?>
                                            Choose your ayment method
                                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                            Choisissez votre méthode de paiement
                                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                            Escoja su método de pago
                                        <?php } ?>
                                    </h4>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check image-checkbox p-2 border rounded">
                                                <input id="option-1" type="radio" class="form-check-input" name="payment_method" value="mastercard">
                                                <label class="form-check-label d-block text-center p-3" for="option-1">
                                                    <img src="../public/assets/images/logos/mastercard-logo.png" alt="#" height="44">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check image-checkbox p-2 border rounded">
                                                <input id="option-2" type="radio" class="form-check-input" name="payment_method" value="visa" required>
                                                <label class="form-check-label d-block text-center p-3" for="option-2">
                                                    <img src="../public/assets/images/logos/visa-logo.png" alt="#" height="44">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check image-checkbox p-2 border rounded">
                                                <input id="option-3" type="radio" class="form-check-input" name="payment_method" value="paypal">
                                                <label class="form-check-label d-block text-center p-3" for="option-3">
                                                    <img src="../public/assets/images/logos/paypal-logo.png" alt="#" height="44">
                                                </label>
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-4">
                                            <div class="form-check image-checkbox p-2 border rounded">
                                                <input id="option-4" type="radio" class="form-check-input" name="payment_method">
                                                <label class="form-check-label d-block text-center p-3" for="option-4">
                                                    <i class="fas fa-university"></i>
                                                    <span class="d-block font-weight-bold">Bank Transfer</span>
                                                </label>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- end: Step 1 - Payment method -->
                            
                            <!-- Step 2 - Order review -->
                            <div class="card">
                                <div class="card-body p-4">
                                    <span class="text-muted text-sm font-italic">
                                        <?php if ($_SESSION['lang']=="EN") { ?>
                                            Step 2 of 2
                                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                            Etape 2 sur 2
                                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                            Paso 2 de 2
                                        <?php } ?>
                                    </span>
                                    <h4 class="mb-4">
                                        <?php if ($_SESSION['lang']=="EN") { ?>
                                            Order Overview
                                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                            Aperçu de la commande
                                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                            Resumen del pedido
                                        <?php } ?>
                                    </h4>

                                    <!-- Product item -->
                                    <?php foreach ($recordset as $row) { ?>
                                    <hr class="my-4">
                                    <div class="d-flex align-items-start">
                                        <div class="col-3 px-0 mr-3 text-dark">
                                            <img src="<?php echo $row['picture_url']; ?>" alt="Image Description" class="rounded img-fluid p-1" style="width: 150px;">
                                        </div>
                                        <div class="flex-fill">
                                            <h4 class="h6 mb-0"><?php echo $row['product_name']; ?></h4>
                                            <small class="d-block">Niveau <?php echo $row['category_name']; ?></small>
                                            <small class="d-block"><?php echo $row['cart_quantity']; ?> products</small>
                                            <small class="d-block"><?php echo ($row['product_price']*$row['cart_quantity']); ?> €</small>
                                            <small class="d-block mt-2 font-weight-bold"><?php echo $row['product_description']; ?></small>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <a class="d-block text-body text-sm mb-1" href="javascript:;">
                                                <i class="far fa-trash-alt mr-1"></i> Remove
                                            </a>
                                        </div> -->
                                    </div>
                                    <?php } ?>
                                    <!-- end: Product item -->
                                </div>
                            </div>
                            <!-- end: Step 2 - Order review -->
                        </div>


                        <div class="col-md-4" >

                            <!-- Order Summary -->
                            <div class="card"> <!-- style="position:fixed; top: 204px; display:inline;" -->

                            <!-- <div class="card" style="position:sticky;"> -->
                                <!-- position: sticky ne fonctionne pas... -->

                                <div class="card-body p-4">
                                    <!-- Title -->
                                    <h2 class="h4 mb-0">
                                        <?php if ($_SESSION['lang']=="EN") { ?>
                                            Order summary
                                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                            Récapitulatif de la commande
                                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                            Resumen del pedido
                                        <?php } ?>
                                    </h2>
                                    <!-- end: Title -->

                                    <!-- Total Pice-->
                                    <div class="media align-items-center mb-2">
                                        <div class="mr-3">
                                            <h4 class="h6 text-muted font-weight-normal mb-0">
                                                <?php if ($_SESSION['lang']=="EN") { ?>
                                                    Item subtotal (<?php echo $quantity; ?>)
                                                <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                                    Sous-total des articles (<?php echo $quantity; ?>)
                                                <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                                    Subtotal de artículos (<?php echo $quantity; ?>)
                                                <?php } ?>
                                            </h4>
                                        </div>
                                        <div class="media-body text-right">
                                            <span><?php echo $total; ?> €</span>
                                        </div>
                                    </div>
                                    <!-- <div class="media align-items-center mb-2">
                                        <div class="mr-3">
                                            <h4 class="h6 text-muted font-weight-normal mb-0">Shipping</h4>
                                        </div>
                                        <div class="media-body text-right">
                                            <span>$0</span>
                                        </div>
                                    </div>
                                    <div class="media align-items-center">
                                        <div class="mr-3">
                                            <h4 class="h6 text-muted font-weight-normal mb-0">Discount coupon</h4>
                                        </div>
                                        <div class="media-body text-right">
                                            <span> €</span>
                                        </div>
                                    </div> -->
                                    <hr class="my-4">
                                    <div class="media align-items-center">
                                        <div class="mr-3">
                                            <h4 class="h4">Total</h4>
                                        </div>
                                        <div class="media-body text-right">
                                            <span class="text-dark h4"><?php echo $total; ?> €</span>
                                        </div>
                                    </div>

                                    <!-- end: Total -->
                                    <div>
                                        <input type="hidden" name="orderTotal" value="<?php echo $total; ?>">
                                        <input type="hidden" name="userEmail" value="<?php echo $user_email; ?>">
                                        <input type="hidden" name="quantityTotal" value="<?php echo $quantity; ?>">
                                        
                                        <button type="submit" class="btn btn-primary btn-block mt-4">
                                            <?php if ($_SESSION['lang']=="EN") { ?>
                                                Place order
                                            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                                Passer la commande
                                            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                                Realizar pedido
                                            <?php } ?>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <!--  Order Summary -->
                        </div>
                    </div>
                </form>

                <?php }else{ 
                include("../vue/404.html");
            } ?>
            </div>
        </section>
        <!-- end: SHOP CHECKOUT -->        
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
    <script src="../public/assets/js/ajax.js"></script>

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