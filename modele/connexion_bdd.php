<?php
try{
    $bdd = new PDO("mysql:host=localhost;dbname=unpeudefrancais;charset=UTF8","root","");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // activation des erreurs PDO
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // mode fetch
}catch(PDOException $e){
	echo $e->getMessage();
	die();
}
?>
