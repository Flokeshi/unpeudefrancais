
// Script delete dashboard Jquery
$(document).ready(function() { // = avec ready(function()) le code js s'exécute une fois que l'intégralité de la page est chargée
	$(".dashboardDelete").on('click', function(){ // on cible tous les éléments qui ont la classe "cartAdd"; "on" (=addEventListener) affecte un type d'événement qui est le 'click' et qui applique la fonction suivante :
		let btnId=$(this).attr('id'); // $(this) permet de cibler l'événement sur lequel on a cliqué. 'attr' permet de cibler l'attribut 'id' de l'élément sur lequel on a cliqué.
		let id=btnId.split("-"); // split permet de faire un tableau pour chaque valeur entre chaque tiret -
		let file=id[2];
		let picture=id[3];
		id=id[1];

		if ( confirm("Etes-vous sûr(e) de vouloir supprimer ce produit ?")) {
			// $.post remplace la variable $_POST ; le 1er paramètre "cart.php" est considéré comme le traitement du formulaire ; le 2ème paramètre est les données que l'on envoit à ce formulaire ; 3ème paramètre, ce qu'il faut faire une fois qu'on a reçu le retour du traitement de "cart.php".
			$.post("../controller/traitement_dashboard_delete.php", { 'id': id, 'file': file, 'picture': picture }, function(data) {
	            $("#dashboard").html(data);
	        });
	    }else{
	    	document.location.href="http://unpeudefrancaissansip/vue/dashboard_page.php";
	    }
	});
});

// Script delete dashboard Jquery
$(document).ready(function() { // = avec ready(function()) le code js s'exécute une fois que l'intégralité de la page est chargée
	$(".dashboardEdit").on('click', function(){ // on cible tous les éléments qui ont la classe "cartAdd"; "on" (=addEventListener) affecte un type d'événement qui est le 'click' et qui applique la fonction suivante :
		let btnId=$(this).attr('id'); // $(this) permet de cibler l'événement sur lequel on a cliqué. 'attr' permet de cibler l'attribut 'id' de l'élément sur lequel on a cliqué.
		let id=btnId.split("-"); // split permet de faire un tableau pour chaque valeur entre chaque tiret -
		let name=id[2];
		let description=id[3];
		let price=id[4];
		id=id[1];

		if ( confirm("Etes-vous sûr(e) de vouloir éditer ce produit ?")) {
			// $.post remplace la variable $_POST ; le 1er paramètre "cart.php" est considéré comme le traitement du formulaire ; le 2ème paramètre est les données que l'on envoit à ce formulaire ; 3ème paramètre, ce qu'il faut faire une fois qu'on a reçu le retour du traitement de "cart.php".
			$.post("../controller/traitement_dashboard_edit.php", { 'id': id, 'name': name, 'description': description, 'price': price }, function(data) {
	            $("#dashboard").html(data);
	        });
	    }else{
	    	document.location.href="http://unpeudefrancaissansip/vue/dashboard_page.php";
	    }
	});
});