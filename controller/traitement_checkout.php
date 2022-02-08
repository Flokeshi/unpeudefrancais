<?php
session_start();

/*Connexion à la BDD*/
require ('../modele/connexion_bdd.php');

$user_email=$_POST['userEmail'];
$amount=$_POST['orderTotal'];
$_SESSION['amount']=$amount;
$currency='EUR';
$quantity=$_POST['quantityTotal'];
$payment_method=$_POST['payment_method'];
$payment_date=date('Y-m-d G:i:s');
$user_id=$_SESSION['idUser'];
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Florian Mangin" />
    <!-- <meta name="description" content="Themeforest Template Polo, html template"> -->
    <link rel="icon" type="image/png" href="../public/assets/images/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>Check Out</title>
    <!-- Stylesheets & Fonts -->
    <link href="../public/assets/css/plugins.css" rel="stylesheet">
    <link href="../public/assets/css/style.css" rel="stylesheet">
    <link href="../public/assets/css/custom.css?var=123" rel="stylesheet">
    <!-- <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
	<section>
		<article id="paypal-buttons" class="mx-auto" style="width: 300px;">

            <!-- Google Analytics -->
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                ga('create', 'UA-XXXXX-Y', 'auto');
                ga('send', 'pageview');
            </script>
            <!-- End Google Analytics -->

            <!-- Script pour obtenir le clientId depuis analytics -->
            <script> 
                ga(function(tracker) {
                    let clientId = tracker.get('clientId');
                    console.log(clientId);
                });
            </script>

            <!-- API Paypal -->
			<script src="https://www.paypal.com/sdk/js?client-id=ASqOTgTUfTLOGpRysDQI87mHCgnaBsvn2l4UTjAU_9aVysl-5EIg_KhslHbRsxkYShG-iA-gQrbX1ux8&locale=fr_FR" data-page-type="checkout"> // remplacer test par clientId et mettre data-client-token="<?php //echo $user_email; ?>" data-page-type="checkout"</script>

			<script>paypal.Buttons({

                // Configurer la transaction
                createOrder : function (data, actions) {

                    // Les produits à payer avec leurs details
                    let produits = [
                        {
                            name : "produit de Unpeudefrancais",
                            description : "",
                            quantity : 1,
                            unit_amount : { value : <?php echo $amount; ?>, currency_code : "USD" }
                        },
                        
                    ];

                    // Le total des produits
                    let total_amount = produits.reduce(function (total, product) {
                        return total + product.unit_amount.value * product.quantity;
                    }, 0);

                    // La transaction
                    return actions.order.create({
                        purchase_units : [{
                            items : produits,
                            amount : {
                                value : total_amount,
                                currency_code : "USD",
                                breakdown : {
                                    item_total : { value : total_amount, currency_code : "USD" }
                                }
                            }
                        }]
                    });
                },

                // Capturer la transaction après l'approbation de l'utilisateur
                onApprove : function (data, actions) {
                    return actions.order.capture().then(function(details) {

                        // Afficher les details de la transaction dans la console
                        console.log(details);

                        // On affiche un message de succès
                        alert(details.payer.name.given_name + ' ' + details.payer.name.surname + ', votre transaction a bien été effectuée. Vous recevrez une notification lorsque nous validerons votre paiement.');
                        document.location.href="../controller/traitement_checkout_completed.php";
                    });
                },

                // Annuler la transaction
                onCancel : function (data) {
                    alert("La transaction a été annulée.");
                }

            }).render('#paypal-buttons');</script> <!-- render cible la balise dans laquelle intégrer les boutons ; y mettre "#paypal-boutons" -->

		</article>
	</section>

	<!--Plugins-->
    <script src="../public/assets/js/jquery.js"></script>
    <script src="../public/assets/js/plugins.js"></script>

    <!--Template functions-->
    <script src="../public/assets/js/functions.js?var=444"></script>

</body>


