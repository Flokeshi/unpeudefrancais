<?php
require ('../modele/connexion_bdd.php');

$fileFolder = "../public/assets/files/";
$pictureFolder = "../public/assets/images/product/";
$file = basename($_FILES['file']['name']);
$picture = basename($_FILES['pictureFile']['name']);
//On fait un tableau contenant les extensions autorisées.
//Comme il s'agit d'une fiche pédagogique pour l'exemple, on ne prend que des extensions d'images et pdf.
$extensionsFiles = array('.png', '.gif', '.jpg', '.jpeg', '.pdf');
$extensionsPictures = array('.png', '.gif', '.jpg', '.jpeg');
//On récupère la partie de la chaine à partir du dernier . pour connaître l'extension.
$extensionFile = strrchr($_FILES['file']['name'], '.');
$extensionPicture = strrchr($_FILES['pictureFile']['name'], '.');

if(!in_array($extensionFile, $extensionsFiles) || !in_array($extensionPicture, $extensionsPictures)) { //Si l'extension n'est pas dans le tableau
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ou pdf et une image de type png, gif, jpg ou jpeg.';
}

if (!isset($erreur)) {
	//On formate le nom du fichier ici avec les caractères spéciaux...
	$file = strtr($file, 
		'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
		'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
	$file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);
	$picture = strtr($picture, 
		'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
		'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
	$picture = preg_replace('/([^.a-z0-9]+)/i', '-', $picture);

	if (move_uploaded_file($_FILES['file']['tmp_name'], $fileFolder.$file) && move_uploaded_file($_FILES['pictureFile']['tmp_name'], $pictureFolder.$picture)) {

		// On détermine la valeur de $price s'il y a un prix dans le formulaire, ou s'il s'agit d'une fiche gratuite...
		if ($_POST['price']!="") {
			$price=$_POST['price'];
		}else{
			$price=NULL;
		}

		$urlFile = $fileFolder.$file;
		$urlPicture = $pictureFolder.$picture;
		$sql="INSERT INTO product (product_name, product_description, product_price, product_url, picture_url, category_id, added_date) VALUES (:product_name, :description, :price, :url, :picture, :category, NOW() )";
		$stmt=$bdd->prepare($sql);
		$stmt->execute([':product_name' => $_POST['productName'], ':description' => $_POST['description'], ':price' => $price, ':url' => $urlFile, ':picture' => $urlPicture, ':category' => $_POST['category']]);

		header("Location:../vue/dashboard_page.php?uploadSuccess=upload");
	}else{
		header("Location:../vue/dashboard_page.php?uploadFail=upload");
	}
}else{
 	/*echo "<div class='alert alert-warning'>".$erreur."</div>";*/
 	header("Location:../vue/dashboard_page.php?uploadError=upload");
 }

?>