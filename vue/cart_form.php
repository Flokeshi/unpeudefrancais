<?php
require ('../modele/connexion_bdd.php');
 
if (isset($_SESSION['idUser'])) {
    $user_id=$_SESSION['idUser'];
}else{
    $user_id="";
}
if (isset($_SESSION['idCart'])) {
    $cart_id=$_SESSION['idCart'];
}else{
    $cart_id="";
}

// S'il y a une session utilisateur, on filtre le panier sur son id et sur l'id_cart s'il existe en session... 
if(isset($_SESSION['idUser'])) {
    $sql="SELECT * FROM cart_details INNER JOIN product ON product.product_id=cart_details.product_num LEFT JOIN category ON product.category_id=category.category_id LEFT JOIN cart ON cart.cart_id=cart_details.cart_num WHERE user_id=:user_id AND cart_num=:cart_id ORDER BY product_name ASC"; // Inner join permet de prendre en jointure tout le contenu des 2 tables qui ont une correspondance et qui n'ont pas une valeur nulle
    $stmt=$bdd->prepare($sql);
    $stmt->execute([':user_id' => $user_id, ':cart_id' => $cart_id]);

// Sinon, s'il n'y a pas de session utilisateur, on filtre le panier uniquement sur la session de l'id_cart
}else{
    $sql="SELECT * FROM cart_details INNER JOIN product ON product.product_id=cart_details.product_num LEFT JOIN category ON product.category_id=category.category_id WHERE cart_num=:cart_id ORDER BY product_name ASC"; 
    $stmt=$bdd->prepare($sql);
    $stmt->execute([':cart_id' => $cart_id]);
}


if ($recordset=$stmt->fetchAll()) { // Si on a du contenu dans le tableau, alors on a le contenu suivant :

	$total=0;
	$quantity=0;
	?>
	<!-- SHOP CART -->
    <section class="p-t-0 p-b-0">
        <div class="container">
            <div class="shop-cart p-t-0 p-b-0">
                <div class="table table-sm table-striped table-responsive box5 p-20 p0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="cart-product-remove"></th>
                                <th class="cart-product-picture">
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        Picture
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Image
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Imagen
                                    <?php } ?>
                                </th>
                                <th class="cart-product-thumbnail">
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        Product
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Produit
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Producto
                                    <?php } ?>
                                </th>
                                <th class="cart-product-price">
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        Unit price
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Prix unitaire
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Precio unitario
                                    <?php } ?>
                                </th>
                                <th class="cart-product-quantity">
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        Quantity
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Quantité
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Cantidad
                                    <?php } ?>
                                </th>
                                <th class="cart-product-subtotal">
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        Total
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Total
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Total
                                    <?php } ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recordset as $row) {?>
                            <tr>
                                <td class="cart-product-remove">
                                    <button class="btn btn-danger cartDelete" value="<?= ($row['cart_quantity']?$row['cart_quantity']:0)?>" id="delete-<?= $row['product_id']?>"><i class="fa fa-times"></i></button>
                                </td>
                                <td class="cart-product-picture"> <!-- class="infosProduct" id="btn-infos- " -->
                                    <a class="modalRight" type="button" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $row['product_id']?>"> <!-- href="../vue/shop_product_page.php" data-lightbox="ajax" -->
                                        <img src="<?php echo $row['picture_url'] ?>" alt="<?php echo $row['product_name'] ?>">
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-<?php echo $row['product_id']?>" tabindex="-1" aria-labelledby="modal-<?php echo $row['product_id']?>" aria-hidden="true" style="background-image: url('../public/assets/images/opacity/opacity90-d.png'); z-index: 3000;">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $row["product_name"]; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: red;"></button>
                                          </div>
                                          <div class="modal-body p-t-0 p-b-0">
                                              <span>Niveau <?php echo $row["category_name"]; ?></span>
                                          </div>
                                          <div class="modal-body">
                                            <p><?php echo $row["product_description"]; ?></p>
                                          </div>
                                          <!-- <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                          </div> -->
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end: Modal -->
                                </td>
                                <td class="cart-product-thumbnail">
                                    <div><?php echo $row['product_name'] ?></div>
                                </td>
                                <td class="cart-product-price"><span class="amount"><?php echo $row['product_price']." €" ?></span></td>
                                <td class="cart-product-quantity">
                                    <div class="quantity">
                                        <button type="button" class="cartAdd btn" value="-1" id="btn-minus-<?= $row['product_id']?>"><i class="fas fa-minus"></i></button>
                                        <input type="text" class="qty" value="<?= ($row['cart_quantity']?$row['cart_quantity']:0)?>" id="input-<?= $row['product_id']?>">
                                        <button type="button" class="cartAdd btn" value="+1" id="btn-plus-<?= $row['product_id']?>"><i class="fas fa-plus"></i></button>
                                    </div>
                                </td>
                                <td class="cart-product-subtotal"><span class="amount"><?=($row['product_price'] * $row['cart_quantity'])." €"; ?></span></td>
                            </tr>
                            <?php
                            $total += $row['product_price'] * $row['cart_quantity'];
                            $quantity += $row['cart_quantity'];
                            } ?>
                            
                        </tbody>
                    </table>
                </div>

                <!-- <div class="row">
                    <div class="col-lg-4">
                        <form class="form-inline">
                            <div class="input-group">
                                <input type="text" placeholder="Coupon Code" id="CouponCode" class="form-control">
                                <button type="submit" id="widget-subscribe-submit-button"
                                    class="btn btn-primary">Apply</button>

                            </div>
                            <p class="small">Enter any valid coupon or promo code here to redeem your discount.</p>
                        </form>
                    </div>
                    <div class="col-lg-8 text-end">
                        <button type="button" class="btn btn-primary">Update Card</button>
                    </div>
                </div> -->

                <div class="row">
                    <hr class="space">
                    <div class="col-lg-6 p-r-10 box7 p-20">
                        <div class="table-responsive">
                            <h4>
                                <?php if ($_SESSION['lang']=="EN") { ?>
                                    Cart subtotal
                                <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                    Sous-total
                                <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                    Total parcial
                                <?php } ?>
                            </h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart-product-quantity">
                                            <strong>
                                                <?php if ($_SESSION['lang']=="EN") { ?>
                                                    Quantity
                                                <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                                    Quantité
                                                <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                                    Cantidad
                                                <?php } ?>
                                            </strong>
                                        </td>
                                        <td class="cart-product-quantity text-end">
                                            <span class="amount"><?= $quantity; ?>
                                                <?php if ($_SESSION['lang']=="EN") { ?>
                                                    product(s)
                                                <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                                    produit(s)
                                                <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                                    Producto(s)
                                                <?php } ?>
                                            </span>
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

                        <?php if(isset($_SESSION['idUser'])) { ?>
                        <form method="POST" action="../vue/checkout_page.php">
                            <input type="hidden" name="quantityTotal" value="<?php echo $quantity; ?>">
                            <input type="hidden" name="amountTotal" value="<?php echo $total; ?>">
                            <button type="submit" class="btn icon-left float-right">
                                <span>
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        Proceed to checkout
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Passer au paiement
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Pasar por la caja
                                    <?php } ?>
                                </span>
                            </button>
                        </form>
                        <?php }else{ ?>
                        <form method="POST" action="../vue/checkout_page.php">
                            <input type="hidden" name="quantityTotal" value="<?php echo $quantity; ?>">
                            <input type="hidden" name="amountTotal" value="<?php echo $total; ?>">
                            <a href="../vue/connexion_page.php">
                                <button type="button" href="#" class="btn icon-left float-right">
                                    <?php if ($_SESSION['lang']=="EN") { ?>
                                        Proceed to checkout
                                    <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                        Passer au paiement
                                    <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                        Pasar por la caja
                                    <?php } ?>
                                </button>
                            </a>
                        </form>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: SHOP CART -->




<?php }else{ ?>

	<!-- SHOP CART EMPTY -->
    <section id="shop-cart" class="box7" style="background: url('../public/assets/images/cart/empty2.jpg') no-repeat center; background-size: cover; background-color: lightgreen;">
        <div class="container">
            <div class="p-t-10 m-b-20 text-center">
                <div class="heading-text heading-line text-center">
                    <h4>
                        <br>
                            <?php if ($_SESSION['lang']=="EN") { ?>
                                Your cart is 
                            <?php }elseif ($_SESSION['lang']=="FR") { ?>
                                Votre panier est 
                            <?php }elseif ($_SESSION['lang']=="ES") { ?>
                                Su carrito 
                            <?php } ?>
                        <br>
                        <?php if ($_SESSION['lang']=="EN") { ?>
                            currently empty.
                        <?php }elseif ($_SESSION['lang']=="FR") { ?>
                            actuellement vide.
                        <?php }elseif ($_SESSION['lang']=="ES") { ?>
                            está vacío.
                        <?php } ?>
                    </h4>
                </div>
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
    <!-- end: SHOP CART EMPTY -->
<?php } ?>
<script src="../public/assets/js/ajax.js"></script>