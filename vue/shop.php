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
    <title>Un Peu de Français : Shop</title>

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

        require ('../modele/connexion_bdd.php');
        require ('../modele/fonctions.php');
        ?>

        <div class="shopFirstRequestSql">
        <?php
        $categorySession=$_GET['category'];

        if (isset($categorySession)) {
            /*requête préparée pour intégrer les produits au magasin*/
            $products=$bdd->prepare("SELECT * FROM product LEFT JOIN category ON product.category_id=category.category_id LEFT JOIN cart_details ON product.product_id = cart_details.product_num AND cart_num=:cart_id AND category_name=:category_name WHERE product_price IS NOT NULL ORDER BY product_name ASC");
            $products->execute([':cart_id' => $_SESSION['idCart'], ':category_name' => $categorySession]);
            $productsTable = $products->fetchAll();
            /*Utiliser foreach ensuite avec: foreach ($productsTable as $productRow)*/
        }else{
            /*requête préparée pour intégrer les produits au magasin*/
            $products=$bdd->prepare("SELECT * FROM product LEFT JOIN category ON product.category_id=category.category_id LEFT JOIN cart_details ON product.product_id = cart_details.product_num AND cart_num=:cart_id WHERE product_price IS NOT NULL ORDER BY product_name ASC");
            $products->execute([':cart_id' => $_SESSION['idCart']]);
            $productsTable = $products->fetchAll();
            /*Utiliser foreach ensuite avec: foreach ($productsTable as $productRow)*/
        }
        ?>
        </div>
        <!-- end: Header -->

        <!-- Page Content -->
        <section>
            <div class="container">
                <div class="row m-b-20">
                    <div class="col-lg-6 p-t-10 m-b-20">
                        <h4 class="evenboxinnerShop">
                            <?php if ($_SESSION['lang']=="EN") { ?>
                                Shop
                            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                Magasin
                            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                Tienda
                            <?php } ?>
                        </h4>
                        <p>
                            <?php if ($_SESSION['lang']=="EN") { ?>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, sit, exercitationem, consequuntur, assumenda iusto eos commodi alias.
                            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, sit, exercitationem, consequuntur, assumenda iusto eos commodi alias.
                            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, sit, exercitationem, consequuntur, assumenda iusto eos commodi alias.
                            <?php } ?>
                        </p>
                    </div>
                    <?php include('../controller/debug.php');?>
                    <!-- <div class="col-lg-3">
                        <div class="order-select">
                            <h6>Sort by</h6>
                            <p>Showing 1&ndash;12 of 25 results</p>
                            <form method="get">
                                <select class="form-select">
                                    <option value="order" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </form>
                        </div>
                    </div> -->
                    <div class="col-lg-3">
                        <div class="order-select">
                            <h6>
                                <?php if ($_SESSION['lang']=="EN") { ?>
                                    Sort by Category
                                <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                    Trier par catégorie
                                <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                    Ordenar por categoria
                                <?php } ?>
                            </h6>
                            <p>
                                <?php if ($_SESSION['lang']=="EN") { ?>
                                    From
                                <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                    De
                                <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                    Desde
                                <?php } ?> 
                                A1 - C2
                            </p>
                            <form method="get">
                                <select class="form-select shopFilter">
                                    <option value="all" id="all" selected="selected">
                                        <?php if ($_SESSION['lang']=="EN") { ?>
                                            All categories
                                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                            Toutes les catégories
                                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                            Todas las categorias
                                        <?php } ?>
                                    </option>
                                    <option value="A1" id="A1">A1</option>
                                    <option value="A2" id="A2">A2</option>
                                    <option value="B1" id="B1">B1</option>
                                    <option value="B2" id="B2">B2</option>
                                    <option value="C1" id="C1">C1</option>
                                    <option value="C2" id="C2">C2</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>

                <!--Product list-->
                <div class="shop">
                    <div class="grid-layout grid-4-columns" data-item="grid-item">
                        <?php foreach ($productsTable as $productRow) {?>
                        <div class="grid-item p-l-20 p-r-20 filter <?php echo $productRow["category_name"]; ?>">
                            <div class="product">
                                <div class="product-image <?php echo "box".random_int(4,7) ?>">
                                    <a><img alt="Shop product image!" src="<?php echo $productRow["picture_url"]; ?>">
                                    </a>

                                    <?php
                                    date_default_timezone_set('Europe/London');
                                    $today = date('Y-m-d G:i:s', strtotime('-14 days'));
                                    $new = date($productRow["added_date"]);
                                    if ($new > $today) { ?>
                                        <span class="product-new">NEW</span>
                                    <?php } ?>
                                    
                                    <!-- <span class="product-wishlist">
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                    </span> -->
                                    <div class="product-overlay modalRight" id="btn-infos-<?= $productRow['product_id']?>">
                                        <!-- Button trigger Modal -->
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $productRow['product_id']?>" style="color: white;">Description</a>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-<?php echo $productRow['product_id']?>" tabindex="-1" aria-labelledby="modal-<?php echo $productRow['product_id']?>" aria-hidden="true" style="background-image: url('../public/assets/images/opacity/opacity90-d.png'); z-index: 3000;">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $productRow["product_name"]; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: red;"></button>
                                      </div>
                                      <div class="modal-body p-t-0 p-b-0">
                                          <span>Niveau <?php echo $productRow["category_name"]; ?></span>
                                      </div>
                                      <div class="modal-body">
                                        <p><?php echo $productRow["product_description"]; ?></p>
                                      </div>
                                      <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                      </div> -->
                                    </div>
                                  </div>
                                </div>
                                <!-- end: Modal -->

                                <div class="product-description">
                                    <div class="product-category"><?php echo $productRow["category_name"]; ?></div>
                                    <div class="product-title">
                                        <h3><a href="#"><?php echo $productRow["product_name"]; ?></a></h3>
                                    </div>
                                    <div class="product-price"><?php echo $productRow["product_price"]." €"; ?>
                                    </div>
                                    <!-- <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="product-reviews"><a href="#">6 customer reviews</a>
                                    </div> -->

                                    <br>
                                    <div class="cart-product-quantity row">
                                        <div class="quantity col-9">
                                            <button type="button" class="shopAdd btn btn-light" value="-1" id="btn-minus-<?= $productRow['product_id']?>"><i class="fas fa-minus"></i></button>
                                            <input type="text" class="qty" value="<?= ($productRow['cart_quantity']?$productRow['cart_quantity']:0)?>" id="input-<?= $productRow['product_id']?>">
                                            <button type="button" class="shopAdd btn btn-light" value="+1" id="btn-plus-<?= $productRow['product_id']?>"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <div class="col-3">
                                            <button class="btn btn-primary shopSubmit" id="btn-submit-<?= $productRow['product_id']?>" type="submit";><i class="icon-shopping-cart"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div>
                        <p>
                            <small id="resultsNumber">
                                <?php if ($_SESSION['lang']=="EN") { ?>
                                    Showing <?php echo count($productsTable); ?> result(s)
                                <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                    <?php echo count($productsTable); ?> résultat(s) trouvé(s)
                                <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                    Mostrando <?php echo count($productsTable); ?> resultado(s)
                                <?php } ?>
                            </small>
                        </p>

                    </div>
                   
                    <!-- Pagination -->
                    <!-- <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item active"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul> -->
                    <!-- end: Pagination -->
                </div>

            </div>
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

    <!-- Scroll Top -->
    <?php
    include("../vue/scrolltop.php");
    ?>
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