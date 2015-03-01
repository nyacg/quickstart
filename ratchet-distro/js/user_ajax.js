function updatePreferences(){
	console.log("updating selection");

	var sugar = $('#sugar-toggle').hasClass('active') ? "Sugar, " : "No Sugar, ";	
	var soy = $('#milk-toggle').hasClass('active') ? "Soy Milk, " : "";
	var shots = $('#shots').text() + " shots, "
	var special = $('#special').val();
	var size = $('#sizes').find(".active").text().trim() + ", ";
	var config = size + sugar + soy + shots + special;
	console.log(config);

	/*$.post("http://extramegacool.com/quickstart.me/api_get_selection.php", {shop_id: shopId, user_id: userId, comment: config}, function(data){	

	}, "json").fail(function(){
		console.log("get order details fail");
	});*/
}

function listPlaces(){
	$.post("http://extramegacool.com/quickstart.me/api_get_all_shops.php", {user_id: userId}, function(data){	
		console.log(data);
	}, "json").fail(function(){
		console.log("get shops fail");
	});
}

//https://maps.googleapis.com/maps/api/distancematrix/json?origins=51.511175,%20-0.116902&destinations=51.511686,%20-0.119874

//