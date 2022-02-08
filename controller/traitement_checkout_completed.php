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
    <title>Un Peu de Français : Checkout Completed</title>

    <!-- DataTables css -->
    <link href='../public/assets/plugins/datatables/datatables.min.css' rel='stylesheet' />

    <!-- Stylesheets & Fonts -->
    <link href="../public/assets/css/plugins.css" rel="stylesheet">
    <link href="../public/assets/css/style.css" rel="stylesheet">
    <link href="../public/assets/css/custom.css?var=123" rel="stylesheet">
</head>


<?php
session_start();
require ('../modele/connexion_bdd.php');

$amount=$_SESSION['amount'];
$invoice_date=date('Y-m-d G:i:s');

$sql="INSERT INTO invoice(invoice_user_id, cart_id) SELECT user_id, cart_id FROM cart WHERE user_id=:user_id AND cart_id=:cart_id"; // Inner join permet de prendre en jointure tout le contenu des 2 tables qui ont une correspondance et qui n'ont pas une valeur nulle
$stmt=$bdd->prepare($sql);
$stmt->execute([':user_id' => $_SESSION['idUser'], ':cart_id' => $_SESSION['idCart']]);


$sql="UPDATE invoice SET invoice_amount=:invoice_amount, invoice_date=:invoice_date WHERE invoice_user_id=:user_id AND cart_id=:cart_id";
$stmt=$bdd->prepare($sql);
$stmt->execute([':invoice_amount' => $amount, ':invoice_date' => $invoice_date, ':user_id' => $_SESSION['idUser'], ':cart_id' => $_SESSION['idCart']]);

unset($_SESSION['idCart']);
header("location:../vue/checkout_completed.php");
?>