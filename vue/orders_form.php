<?php
require ('../modele/connexion_bdd.php');
 
if (isset($_SESSION['idUser'])) {
  $user_id=$_SESSION['idUser'];  
}else{
    $user_id=0;
}

$sql="SELECT * FROM invoice INNER JOIN cart ON invoice.cart_id=cart.cart_id INNER JOIN cart_details ON cart.cart_id=cart_details.cart_num INNER JOIN product ON cart_details.product_num=product.product_id WHERE invoice_user_id=:user_id ORDER BY invoice_date DESC"; 
// Inner join permet de prendre en jointure tout le contenu des 2 tables qui ont une correspondance et qui n'ont pas une valeur nulle
$stmt=$bdd->prepare($sql);
$stmt->execute([':user_id' => $user_id]);

// S'il y a une session utilisateur, alors...
if (isset($_SESSION['idUser'])) {

    // Si on a du contenu dans le tableau, alors on a le contenu suivant :
    if ($recordset=$stmt->fetchAll()) { ?>

    	<!-- MY ORDERS CONTENT -->
        <section class="p-t-0 p-b-0">
            <div class="container">
                <div class="shop-cart p-t-0 p-b-0">
                    <div class="table table-sm table-striped table-responsive box5 p-20 p0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="invoice-number">
                                        <?php if ($_SESSION['lang']=="EN") { ?>
                                            Order n°
                                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                            Commande n°
                                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                            Orden n°
                                        <?php } ?>
                                    </th>
                                    <th class="invoice-amount">
                                        <?php if ($_SESSION['lang']=="EN") { ?>
                                            Unit Price
                                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                            Prix unitaire
                                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                            Precio unitario
                                        <?php } ?>
                                    </th>
                                    <th class="invoice-products">
                                        <?php if ($_SESSION['lang']=="EN") { ?>
                                            Products
                                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                            Produits
                                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                            Productos
                                        <?php } ?>
                                    </th>
                                    <th class="invoice-purchase_date">
                                        <?php if ($_SESSION['lang']=="EN") { ?>
                                            Purchase date
                                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                            Date d'achat
                                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                            Fecha de compra
                                        <?php } ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recordset as $row) {?>
                                <tr>
                                    <td class="invoice-number"><?php echo $row['invoice_id']?></td>
                                    <td><?php echo $row['product_price']?> € /unit</td>
                                    <td class="invoice-products">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?php echo $row['product_name']?></li>
                                            <li class="list-group-item"><a href="<?php echo $row['product_url']?>" download="<?php echo $row["product_name"]; ?>"><img style='width: 100px;' src="<?php echo $row['picture_url']?>"></a></li>
                                        </ul>
                                    </td>
                                    <td class="invoice-purchase_date"><?php echo $row['invoice_date']?></td>
                                </tr> 
                                <?php } ?>          
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="row">
                        <hr class="space">
                        <div class="col-lg-6 p-r-10 box7 p-20">
                            <div class="table-responsive">
                                <h4>Cart Subtotal</h4>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="cart-product-quantity">
                                                <strong>Quantity</strong>
                                            </td>
                                            <td class="cart-product-quantity text-end">
                                                <span class="amount"><?= $quantity; ?> produits</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart-product-subtotal">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="cart-product-subtotal text-end">
                                                <span class="amount color lead"><strong><?= $total; ?> €</strong></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="#" class="btn icon-left float-right"><span>Proceed to Checkout</span></a>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- end: MY ORDERS CONTENT -->

    <?php }else{ ?>
    	<!-- SHOP CART EMPTY -->
        <section id="shop-cart" class="box7" style="background: url('../public/assets/images/invoice/invoice5.jpg') no-repeat center; background-size: cover; background-color: lightgreen;">
            <div class="container">
                <div class="p-t-10 m-b-20 text-center">
                    <div class="heading-text heading-line text-center">
                        <h4><br>You currently have<br> no orders.</h4>
                    </div>
                    <a class="btn icon-left" href="../vue/shop.php"><span>Return To Shop</span></a>
                </div>
            </div>
        </section>
        <!-- end: SHOP CART EMPTY -->
    <?php }
}else{
    include("../vue/404.html");
} ?>
<script src="../public/assets/js/ajax.js"></script>