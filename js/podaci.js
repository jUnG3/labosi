function username(){

	$(document).ready(function(){
	
		$.ajax({
			type: "GET",
			url: "../php/sesije.php?getUsername",
			success: function(username){
			
				$("#korisnik").html(username);
			}
		});
	});
}

username();