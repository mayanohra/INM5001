fetch('fetchDB.php')
	.then(function(response) {
		return response.text();
	})
	.then(function(searchResult) {
		printResult(searchResult);
	})


function printResult(searchResult){
	const searchListEl = document.getElementById("searchList");
	if(searchResult != ""){
		console.log(searchResult);
		searchList.innerHTML += "<li>maya00</li>"
	}
}