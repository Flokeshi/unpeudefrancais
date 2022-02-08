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
    <title>Un Peu de Français : Panel Administrateur</title>

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

        require ('../modele/connexion_bdd.php');
        require ('../modele/fonctions.php');


        /*requête préparée pour intégrer les catégories au formulaire d'upload*/
        $cat=$bdd->prepare("SELECT * FROM category ORDER BY category_name ASC");
        $cat->execute();
        $categories = $cat->fetchAll();        
        /*Utiliser foreach ensuite avec: foreach ($categories as $category)*/


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

        /*requête préparée pour afficher la liste de contacts de la newsletter*/
        $newsletter=$bdd->prepare("SELECT user_email FROM newsletter ORDER BY user_email ASC");
        $newsletter->execute();
        $newsletterContacts = $newsletter->fetchAll();
        /*Utiliser foreach ensuite avec: foreach ($newsletterContacts as $contact)*/
        ?>
        <!-- end: Header -->

        <!-- Page title -->
        <?php 
        if (!isset($_SESSION['idUser']) || $_SESSION['role'] != 'admin') {
            include('../vue/404.html');
        } else if ($_SESSION['role'] == 'admin') { ?>
        <section id="page-title" class="dashboard-title">
            <div class="container">
                <div class="page-title dashboard-title">
                    <h1>Interface Administrateur</h1>
                </div>
                <!-- <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a> </li>
                        <li><a href="#">Components</a> </li>
                        <li class="active"><a href="#">Data Tables</a> </li>
                    </ul>
                </div> -->
                <div>
                    <?php
                        if (isset($_GET["uploadSuccess"])) {
                            if ($_GET["uploadSuccess"] == "upload") {
                                echo "<div class='alert alert-success'>Upload effectué avec succès !</div>";
                            }
                        }
                        if (isset($_GET["uploadFail"])) {
                            if ($_GET["uploadFail"] == "upload") {
                                echo "<div class='alert alert-danger'>Echec de l'upload.</div>";
                            }
                        }
                        if (isset($_GET["uploadError"])) {
                            if ($_GET["uploadError"] == "upload") {
                                echo "<div class='alert alert-warning'>Vous devez uploader un fichier de type png, gif, jpg, jpeg ou pdf et une image de type png, gif, jpg ou jpeg.</div>";
                            }
                        }
                        if (isset($_GET["deleteSuccess"])) {
                            if ($_GET["deleteSuccess"] == "delete") {
                                echo "<div class='alert alert-success'>Le fichier a bien été effacé !</div>";
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        <!-- end: Page title -->

        <!-- Page Content -->
        <section id="page-content" class="no-sidebar p-t-0">

            <div class="container">

                <!-- Upload Table -->
                <div class="row">
                    <div class="col-lg-12 p-t-0 p-b-60">
                        <div class="row">
                            <div class="col-lg-4">
                                <p style="display: block;" class="text-center"><a class="btn btn-primary text-center" data-bs-toggle="collapse" href="#productDownload" role="button" aria-expanded="false" aria-controls="productDownload">Télécharger un produit</a></p>
                            </div>
                            <div class="col-lg-4">
                                <p style="display: block;" class="text-center"><a class="btn btn-primary" data-bs-toggle="collapse" href="#newsletterSend" role="button" aria-expanded="false" aria-controls="newsletterSend">Envoyer la newsletter</a></p>
                            </div>
                            <div class="col-lg-4">
                                <p style="display: block;" class="text-center"><a class="btn btn-primary" data-bs-toggle="collapse" href="#indicators" role="button" aria-expanded="false" aria-controls="indicators">Voir les indicateurs du site</a></p>
                            </div>   
                        </div>
                         

                        <!-- Télécharger un produit -->
                        <div class="collapse" id="productDownload">
                            <div class="card card-body">
                                <form method="POST" action="../controller/traitement_upload.php" enctype="multipart/form-data">
                                    <table class="table table-bordered text-dark text-center dataTable">
                                        <thead>
                                            <th>Insérez votre produit</th>
                                            <th>Insérez votre illustration</th>
                                            <th>Nom du produit</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="file" name="file" id="file">
                                                    <label for="file">(format pdf, jpeg, jpg, png ou gif)</label>
                                                </td>
                                                <td>
                                                    <input type="file" name="pictureFile" id="pictureFile">
                                                    <label for="pictureFile">(format jpeg, jpg, png ou gif)</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="productName" placeholder="Nom du produit">
                                                </td>
                                            </tr>
                                            <thead>
                                                <th colspan="2">Description</th>
                                                <th>Prix</th>
                                            </thead>
                                            <tr>
                                                <td colspan="2" rowspan="3">
                                                    <textarea name="description" placeholder="Description..."></textarea>
                                                </td>
                                                <td>
                                                    <input type="number" step="any" name="price" placeholder="Prix du produit">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="thPrice">Catégorie</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="category">
                                                        <option value="">Choisissez une catégorie</option>
                                                        <?php foreach ($categories as $category) { ?>
                                                            <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-success" style="color: black; font-family: inherit; font-size: 12px; font-weight: 600; letter-spacing: .2px; padding: 12px 18px; font-family: Poppins;">Envoyer</button>
                                </form>
                            </div>
                        </div>

                        <!-- Envoyer la newsletter -->
                        <div class="collapse" id="newsletterSend">
                            <div class="card card-body">
                                <div class="title">Contacts pour la Newsletter</div><br>
                                <textarea name="description" style="width:100% !important; font-family: Poppins;" id="copyContacts">
                                    <?php 
                                    foreach($newsletterContacts as $contact) {
                                        $contact=$contact['user_email']." ; ";
                                        echo $contact; 
                                    } ?>                   
                                </textarea>
                                <button type="button" onclick="copyContacts();" class="btn btn-success" style="color: black; font-family: inherit; font-size: 12px; font-weight: 600; letter-spacing: .2px; padding: 12px 18px; font-family: Poppins; width: 150px;">Copier la liste</button>
                            </div>
                        </div>

                        <!-- Indicateurs du site -->
                        <div class="collapse" id="indicators">
                            <div class="card card-body">
                               <img src="../public/assets/images/graph.png">
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end: Upload Table -->

                <!-- Dashboard -->
                <div class="col-lg-12">
                    <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Page</th>
                                <th>Catégorie</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>URL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="dashboard">

                            <?php include("../vue/dashboard_data.php");?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Page</th>
                                <th>Catégorie</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>URL</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- end: Dashboard -->

            </div>
        </section>
        <?php } ?>
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

    <?php
    include("../vue/scrolltop.php");
    ?>

    <!--Plugins-->
    <script src="../public/assets/js/jquery.js"></script>
    <script src="../public/assets/js/plugins.js"></script>
    <script src="../public/assets/js/custom.js"></script>
    <script src="../public/assets/js/dashboard_delete_jquery.js"></script>

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