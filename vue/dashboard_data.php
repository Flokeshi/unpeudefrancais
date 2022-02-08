<?php
require ('../modele/connexion_bdd.php');

/*requête préparée pour intégrer l'image bannière au dashboard*/
$pic = $bdd->prepare("SELECT * FROM picture WHERE picture_id=3"); // prepare envoit la requête au système
$pic->execute(); // exécute la requête
$picTable = $pic->fetch(); // affectation du tableau des picture_url à la variable $picTable. Cette variable retourne donc un tableau.
/*$picTable["picture_url"] */

/*requête préparée pour intégrer les produits au dashboard*/
$products=$bdd->prepare("SELECT * FROM product LEFT JOIN category ON product.category_id=category.category_id ORDER BY product_name ASC"); // Inner join permet de prendre en jointure tout le contenu des 2 tables qui ont une correspondance et qui n'ont pas une valeur nulle
$products->execute();
$productsTable = $products->fetchAll();
/*Utiliser foreach ensuite avec: foreach ($productsTable as $productRow)*/
?>

<tr>
    <td>Home</td>
    <td>Banner</td>
    <td><a href="<?php echo $picTable["picture_url"]; ?>"><img src="<?php echo $picTable["picture_url"]; ?>"></a></td>
    <td>banner</td>
    <td></td>
    <td></td>
    <td><a href="<?php echo $picTable["picture_url"]; ?>"><?php echo $picTable["picture_url"]; ?></a></td>
    <td class="text-center"><button class="btn btn-secondary dashboardPictureEdit" id="edit-<?= $picTable['picture_id']?>"><i class="icon-edit"></i></button></td>
</tr>

<?php foreach ($productsTable as $productRow) { ?>
    <tr class="dashboardProductRow">
        <form method="POST" action="../controller/traitement_dashboard_edit.php">
            <td>Shop</td>
            <td><!-- <input type="text" name="categoryName" value="<?php echo $productRow["category_name"]; ?>" class="form-control text-center" > --><?php echo $productRow["category_name"]; ?></td>
            <td><a href="<?php echo $productRow["picture_url"]; ?>"><img src="<?php echo $productRow["picture_url"]; ?>"></a></td>
            <td><input type="text" name="productName" value="<?php echo $productRow["product_name"]; ?>" class="form-control text-center"><input type="hidden" name="productId" value="<?php echo $productRow["product_id"]; ?>"></td>
            <td><textarea name="productDescription" class="form-control text-center" style="height:100px; min-width: 200px;"><?php echo $productRow["product_description"]; ?></textarea></td>
            <td><input type="text" name="productPrice" value="<?php echo $productRow["product_price"]; ?>" class="form-control text-center" style="width: 80%;"> €</td>
            <td><a href="<?php echo $productRow["product_url"];?>"><?php echo $productRow["product_url"]; ?></a></td>
            <td class="text-center"> 
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                <button class="btn btn-info dashboardEdit" id="edit-<?= $productRow['product_id']?>-<?= $productRow['product_name']?>-<?= $productRow['product_description']?>-<?= $productRow['product_price']?>"><i class="fas fa-save"></i></button>
                <button class="btn btn-danger dashboardDelete" id="delete-<?= $productRow['product_id']?>-<?= $productRow['product_url']?>-<?= $productRow['picture_url']?>"><i class="icon-trash-2"></i></button>
            </td>
        </form>
    </tr>
<?php } ?>