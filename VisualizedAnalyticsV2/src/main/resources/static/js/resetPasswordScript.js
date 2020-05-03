function emailValidator(){
	var email = document.getElementById("email").value;
	
	var email_pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,3})+$/;
	
	if(email != ''){
		if(email.match(email_pattern)){
			window.location = 'reset_password?linksent';
		}
		else{
			window.location = 'reset_password?error';
		}
	}
	else{
		window.location = 'reset_password?error2';
	}
}