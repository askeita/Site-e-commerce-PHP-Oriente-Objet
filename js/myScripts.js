$(function() {
    
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
		$.ajax({
        url: "http://localhost/alsaleh_keita/Git/php-object-webforce3/shop-list",
        method: "POST",
		data: {price : "20 and 100 "}
    }).done(function(data){
        data = JSON.parse(data); 
		console.log(data);
		
		/** Price **/
//         var codeHTML = '';
/*         for (var i = 0; i < data.price.length; i++) {
			$("div.sp-wrap").append("<a href=" + data.price[i] + "><img src=" + data.price[i] + " alt=''></a>");
		} */
		
		/** Categorie **/
/*		for (var i = 0; i < data.categorie.length; i++) {
			$("#tabs-3").append("<p><strong>" + data.reviews[i] + "</strong></p><p>" + data.categorie[i]. + " </p><br />");
		} */
		

    }).fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus );
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
	
});