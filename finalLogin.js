function login() {

	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	
	if (username == ""){

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

				var result = this.responseText;

				if (result != ""){

					window.alert(result);

				}

				else {

					window.location.replace("http://web.engr.oregonstate.edu/~jurczakn/final.php");

				}

			}
		};

		var url = 'http://web.engr.oregonstate.edu/~jurczakn/finalLogin.php';

		reg.open('POST', url);

		reg.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		reg.send(vars);
	}


};		