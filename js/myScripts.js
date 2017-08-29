$(function() {
    
//    console.log(testMike);
    $.ajax({
        url: "http://localhost/alsaleh_keita/Git/php-object-webforce3/single/"+idItem,
        method: "POST", 
//        datatype: "json"
    }).done(function(data){
		
//        console.log(data);
        data = JSON.parse(data); 
		
		/** Pictures **/
        $("div.sp-wrap").html("");
//         var codeHTML = '';
        for (var i = 0; i < data.pictures.length; i++) {
			$("div.sp-wrap").append("<a href=" + data.pictures[i].url + "><img src=" + data.pictures[i].url + " alt=''></a>");
		}
		
		/** Reviews **/
		$("#elem-reviews").text(data.reviews.length + " Review(s)");
		for (var i = 0; i < data.pictures.length; i++) {
			$("#tabs-3").append("<p><strong>"+data.reviews[i].username+ "</strong></p><p>" + data.reviews[i].commentaire+ " </p><br />");
		}
		

    }).fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus );
    })
});