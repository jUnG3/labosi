function username(){

	$(document).ready(function(){
	
		$.ajax({
			type: "GET",
			url: "../php/controller.php?f=getUsername",
			success: function(username){
			
				$("#korisnik").html(username);
			}
		});
	});
}

$(document).ready(function(){

	$.ajax({
			type: "GET",
			url: "../php/controller.php?f=jelLogiran",
			success: function(username){
			}
		});
});