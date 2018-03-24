var $_GET = {},
    args = location.search.substr(1).split(/&/);
    var tmp = args[0].split(/=/);
    if (tmp[0] != "") {
        $_GET[decodeURIComponent(tmp[0])] = decodeURIComponent(tmp.slice(1).join("").replace("+", " "));
    }

fetch('fetchProfile.php?username='+$_GET['username'])
	.then(function(response) {
		return response.json();
	})
	.then(function(profileInfo) {
		console.log(profileInfo);
		printResult(profileInfo);
	})


function printResult(profileInfo){
	document.getElementById('username').value = profileInfo[1];
	document.getElementById('password').value = profileInfo[2];
	document.getElementById('firstName').value = profileInfo[3];
	document.getElementById('lastName').value = profileInfo[4];
	document.getElementById('phoneNumber').value = profileInfo[5];
	document.getElementById('DOB').value = profileInfo[6];
	document.getElementById('email').value = profileInfo[7];
	document.getElementById('address').value = profileInfo[8];
	document.getElementById('city').value = profileInfo[9];
	document.getElementById('province').value = profileInfo[10];
	document.getElementById('country').value = profileInfo[11];
}