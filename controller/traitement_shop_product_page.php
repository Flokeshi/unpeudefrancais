<?php
/*Démarre la session utilisateur si elle est présente*/
session_start();

/*Connexion à la BDD*/
require ('../modele/connexion_bdd.php');
require ('../modele/fonctions.php');

$product_id=$_POST['id'];

/*requête préparée*/
$products=$bdd->prepare("SELECT * FROM product LEFT JOIN category ON product.category_id=category.category_id LEFT JOIN cart ON product.product_id = cart.product_num WHERE product_id=:product_id ORDER BY product_id ASC");
$products->execute([':product_id' => $product_id]);
$infosProducts=$products->fetch();
?>

<div class="row">
	<div class="col-lg-5">
		<div id="pictureProduct"> <!-- class="carousel" data-items="1" -->
			<img src="<?php echo $infosProducts['picture_url'] ?>" alt="Shop product image!">
			<!-- <img src="" alt="Shop product image!"> -->
		</div>
	</div>
	<div class="col-lg-7">
		<div class="product-description">
			<div>Niveau <?php echo $infosProducts['category_name'] ?></div>
			<div class="product-title">
				<h3><a href=""><?php echo $infosProducts['product_name'] ?></a></h3>
			</div>
			<div class="product-price"><ins><?php echo $infosProducts['product_price']." €" ?></ins>
			</div>
			<!-- <div class="product-rate">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half-o"></i>
			</div>
			<div class="product-reviews"><a href="#">3 customer reviews</a>
            </div> -->
			<div class="seperator m-b-10"></div>
			<p><?php echo $infosProducts['product_description'] ?></p>
			<div class="product-meta">
				<p>Tags: <a rel="tag" href="#">Languages</a>, <a href="#" rel="tag">Educational sheet</a>
				</p>
			</div>
			<div class="seperator m-t-20 m-b-10"></div>
		</div>
	
		<div class="m-t-10">
			<h6>Select quantity</h6>
			<div class="cart-product-quantity">
				<div class="quantity m-l-5">
					<button type="button" class="productAdd btn btn-light" value="-1" id="btn-minusLightbox-<?= $infosProducts['product_id']?>"><i class="fas fa-minus"></i></button>
                    <input type="text" class="qty" value="<?= ($infosProducts['cart_quantity']?$infosProducts['cart_quantity']:0)?>" id="inputProduct-<?= $infosProducts['product_id']?>">
                    <button type="button" class="productAdd btn btn-light" value="+1" id="btn-plusLightbox-<?= $infosProducts['product_id']?>"><i class="fas fa-plus"></i></button>
                    <button class="btn btn-lg submitProduct" type="submit" id="btn-submit-<?= $infosProducts['product_id']?>"><i class="icon-shopping-cart"></i> Add to cart</button>
				</div>
			</div>
		</div>	
	</div>
</div>

<script src="../public/assets/js/qte_cart_jquery.js"></script>