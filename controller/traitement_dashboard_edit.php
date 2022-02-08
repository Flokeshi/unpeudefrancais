<?php

/*Connexion à la BDD*/
require ('../modele/connexion_bdd.php');


/*if ($_POST['categoryName']=='A1' || 'a1') {
	$category_id=1;
}elseif ($_POST['categoryName']=='A2' || 'a2') {
	$category_id=2;
}elseif ($_POST['categoryName']=='B1' || 'b1') {
	$category_id=3;
}elseif ($_POST['categoryName']=='B2' || 'b2') {
	$category_id=4;
}elseif ($_POST['categoryName']=='C1' || 'c1') {
	$category_id=5;
}elseif ($_POST['categoryName']=='C2' || 'c2') {
	$category_id=6;
}*/

try {
	$virgule=array(",");
	$point=array(".");
	if (isset($_POST['productPrice']) && $_POST['productPrice']!="") {
		$product_price=str_replace($virgule, $point, $_POST['productPrice']); // remplace les virgules par des points
	}else{
		$product_price=NULL;
	}
	

	$sql="UPDATE product SET product_name=:product_name, product_description=:product_description, product_price=:product_price WHERE product_id=:product_id";
	$stmt=$bdd->prepare($sql);
	$stmt->execute([':product_name' => $_POST['productName'], ':product_description' => $_POST['productDescription'], ':product_price' => $product_price, ':product_id' => $_POST['productId']]);
	include('../vue/dashboard_page.php');
}catch(PDOException $e){
	echo $e->getMessage();
	die();
}
?>