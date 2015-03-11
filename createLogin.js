function sendUsername() {

	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var password2 = document.getElementById("password2").value;
	
	if (password !== password2){

		window.alert("Passwords do not match.");

		return;

	}

	else if (username == ""){

		window.alert("Username is required.");

		return;

	}

	else if (password == ""){

		window.alert("Password is required.");

		return;

	}

	else {

		var reg = new XMLHttpRequest();

		if(!reg){

			throw 'Unable to create HttpRequest.';

		}

		var vars;
			
		vars = "username="+username+"&password="+password;

		reg.onreadystatechange = function(){

			if(this.readyState === 4){

				var results = JSON.parse(this.responseText);

				document.write(results);

			}
		};

		var url = 'http://web.engr.oregonstate.edu/~jurczakn/createLogin.php';

		reg.open('POST', url);

		reg.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		reg.send(vars);
	}

	window.alert("All good here.");

};			