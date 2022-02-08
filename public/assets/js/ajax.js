// Script Qte shop Jquery
$(document).ready(function() { 
	$(".shopAdd").on('click', function(){ 
		let btnId=$(this).attr('id'); 
		let id=btnId.split("-");
		id=id[2];
		let newQty=parseInt($("#input-"+id).val())+parseInt($("#"+btnId).val()); 
		if (newQty<=0) {
			$("#input-"+id).val(0);
		}else{
			$("#input-"+id).val(newQty);
		}
	});
});
// Script submit shop Jquery
$(document).ready(function() { 
	$(".shopSubmit").on('click', function(){ 
		let btnId=$(this).attr('id'); 
		let id=btnId.split("-"); 
		id=id[2];
		let newQty=parseInt($("#input-"+id).val());
		if (newQty<=0) {

		}else{
			alert("Le produit a bien été ajouté au panier !");
			$.post("../controller/traitement_cart.php", { 'product_id': id, 'qte': newQty }, function(data) {
	            $("#cart").html(data);
	        });
	    }
	});
});


// Script Qte cart Jquery
$(document).ready(function() { // = avec ready(function()) le code js s'exécute une fois que l'intégralité de la page est chargée
	$(".cartAdd").on('click', function(){ // on cible tous les éléments qui ont la classe "cartAdd"; "on" (=addEventListener) affecte un type d'événement qui est le 'click' et qui applique la fonction suivante :
		let btnId=$(this).attr('id'); // $(this) permet de cibler l'événement sur lequel on a cliqué. 'attr' permet de cibler l'attribut 'id' de l'élément sur lequel on a cliqué.
		let id=btnId.split("-"); // split permet de faire un tableau pour chaque valeur entre chaque tiret -
		id=id[2];
		let newQty=parseInt($("#input-"+id).val())+parseInt($("#"+btnId).val()); // val permet de modifier et d'attribuer une nouvelle valeur de l'input ciblé (vu qu'il a le même 'itmId' que les 'button')
		// val() permet de récupérer et lire la valeur de l'élément ciblé ; val(+1) attribue +1 à la valeur actuelle.
		if (newQty<=0) {
			$("#input-"+id).val(0);
		}else{
			$("#input-"+id).val(newQty);
		}

		// AJAX :
		// $.post remplace la variable $_POST ; le 1er paramètre "cart.php" est considéré comme le traitement du formulaire ; le 2ème paramètre est les données que l'on envoit à ce formulaire ; 3ème paramètre, ce qu'il faut faire une fois qu'on a reçu le retour du traitement de "cart.php".
		$.post("../controller/traitement_cart.php", { 'product_id': id, 'qte': newQty }, function(data) {
            $("#cart").html(data);
        });
	});
});

// Script delete product cart Jquery
$(document).ready(function() { 
	$(".cartDelete").on('click', function(){ 
		let btnId=$(this).attr('id'); 
		let id=btnId.split("-"); 
		id=id[1];
		let productDelete=parseInt($("#delete-"+id).val(0)); 
		$("#delete-"+id).val(0);

		if ( confirm("Etes-vous sûr(e) de vouloir supprimer ce produit ?")) {
			$.post("../controller/traitement_cart_delete.php", { 'product_id': id, 'qte': productDelete }, function(data) {
	            $("#cart").html(data);
	        });
	    }else{
	    	document.location.href="http://unpeudefrancaissansip/vue/cart_page.php";
	    }
	});
});
