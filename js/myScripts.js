$(function() {
    
	let filter = {price: undefined, categorie: undefined}; // on crée un objet pour récupérer le prix et la catégorie d'un article. "Filter.price" prendra la valeur de l'input
	
//    console.log(testMike);
	function singleItem() {
		$.ajax({
			url: "http://localhost/alsaleh_keita/Git/php-object-webforce3/single/"+idItem,
			method: "POST", 
	//        datatype: "json"
		}).done(function(data){
			
	//        console.log(data);
			data = JSON.parse(data); 
			
			/** Pictures **/
	//        $("div.sp-wrap").html("");
	//         var codeHTML = '';
			for (var i = 0; i < data.pictures.length; i++) {
				$("div.sp-wrap").append("<a href=" + data.pictures[i].url + "><img src=" + data.pictures[i].url + " alt=''></a>");
			}
			
			/** Reviews **/
			$("#elem-reviews").text(data.reviews.length + " Review(s)");
			for (var i = 0; i < data.reviews.length; i++) {
				$("#tabs-3").append("<p><strong>" + data.reviews[i].username + "</strong></p><p>" + data.reviews[i].commentaire + " </p><br />");
			}
			

		}).fail(function(jqXHR, textStatus) {
			alert( "Request failed: " + textStatus );
		}) 
	}
	
    function shopListItem() {
		
//		console.info($("#amount").val();
		// Bug si drop en dehors du span 
		$("span.ui-slider-handle.ui-state-default.ui-corner-all").mouseup(function () {
			console.warn("Al ne va pas comprendre");
			filter.price = $("#amount").val();
			filter.price = filter.price.replace("$", "");
			filter.price = filter.price.replace("$", "");
			filter.price = filter.price.replace("-", "and");
			console.log(filter);
			runFilter();
		});
		
		$("li.shop-categories-item").click(function() {
			console.log($(this).attr("id").split("-")[1]); // on veut récupérer l'id de la balise
			filter.categorie = $(this).attr("id").split("-")[1];
			runFilter();
		})
		
		function runFilter() {
			$.ajax({
				url: "http://localhost/alsaleh_keita/Git/php-object-webforce3/shop-list",
				method: "POST",
//				data: {price : "20 and 100 "}
				data: filter
			}).done(function(data){
			data = JSON.parse(data); 
//			console.log(data);
			$("div.shop-list").html("");	// on vide tout le code HTML
			for(var i = 0; i < data.length; i++) {
			var html = "<div class='grid-item2 mb30'>  <div class='row'>  <div class='arrival-overlay col-md-4'> <a href='" + hostDomaine + "single/" + data[i].iditems + "'> <img src='"+data[i].url+"' alt=''> </a> </div>  <div class='col-md-8'> <div class='list-content'>  <h1> <a href='" + hostDomaine + "single/" + data[i].iditems + "'> " + data[i].libelle + " </a> </h1>  <div class='list-midrow'>  <ul> <li><span class='low-price'>" + data[i].price + "€</span></li> </ul>  <img src='"+data[i].url+"' alt=''>  <div class='reviews'><a href='#'>21 Rewiew(s)</a> / <a href='#'>Add a Review</a></div> <div class='clear'></div> </div>  <p class='list-desc'>" + data[i].description + "</p>  <div class='list-downrow'>  <a href='#' class='medium-button button-red add-cart' id='items-"+data[i].iditems+"'>Add to Cart</a>  <ul> <li><a href='#' class='wishlist'><i class='fa fa-heart'></i> Add to Wishlist</a></li> <li><a href='#' class='compare'><i class='fa fa-retweet'></i>Add to Compare</a></li> </ul> <div class='clear'></div>    </div>  </div> </div>  </div>  </div>";
				
/* 			$("div.shop-list").append(html);
			$("a#items-"+data[i].iditems+".medium-button.button-red.add-cart").data("test", data[i]);
			console.log("a.medium-button.button-red.add-cart");
			} */
		/** Price **/
//         var codeHTML = '';
/*         for (var i = 0; i < data.price.length; i++) {
			$("div.sp-wrap").append("<a href=" + data.price[i] + "><img src=" + data.price[i] + " alt=''></a>");
		} */
		
		/** Categorie **/
/*		for (var i = 0; i < data.categorie.length; i++) {
			$("#tabs-3").append("<p><strong>" + data.reviews[i] + "</strong></p><p>" + data.categorie[i]. + " </p><br />");
		} */
		

//		}).fail(function(jqXHR, textStatus) {
//			alert( "Request failed: " + textStatus );
			}
			listenerEven();
		})
		

	}
	
	switch (typePage) {
		case 1: 
			singleItem();
			break;
			
		case 2: 
			shopListItem();
			break;
			
		default: 
			console.log("OK");	
	}
	
	
	function listenerEven() {
		$("a.medium-button.button-red.add-cart").click(function(e) {
			e.preventDefault();
	//		console.log($("a.medium-button.button-red.add-cart").data());
			var datalocal = localStorage.getItem("cart");
			datalocal = JSON.parse(datalocal);
			if (datalocal == null) 
				datalocal = [];
	//			console.log(datalocal);
				datalocal.push($(this).data());
	//		console.log($(this).data());
			localStorage.setItem("cart", JSON.parse(datalocal));
		})
	}
	listenerEven();
});