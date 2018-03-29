const loginEl = document.getElementById("login");
const passwordEl = document.getElementById("password");
const usernameEl = document.getElementById("username");
const errorEl = document.getElementById("msgError");
password = passwordEl.value;
username = usernameEl.value;

loginEl.addEventListener('click', function(e){
	e.preventDefault();
	userOK = verifyUsername(username);
	passOK = verifyPassword(password);
				
	if(userOK === true && passOK === true){
		verifyCombination();
	}
})

function verifyCombination(){
	fetch('login_verif.php') 
		.then(function(response) {
			if(!response.ok){
				errorEl.innerHTML = "Invalid username / password";
			}
		})
}

function verifyUsername(username){
	if(username === "" || password.replace(/ /g , '') == ""){
		usernameEl.style.backgroundColor = "rgba(255, 0, 0, 0.05)";
		return false;
	}else{
		return true;
	}
}

function verifyPassword(password){
	//Removes all the empty spaces
	if(password === "" || password.replace(/ /g , '') == "" ){
		passwordEl.style.backgroundColor = "rgba(255, 0, 0, 0.05)";
		return false;
	}else{
		return true;
	}
}