fetch('fetchDB.php')
	.then(function(response) {
		return response.json();
	})
	.then(function(searchResult) {
		printResult(searchResult);
	})


function printResult(searchResult){
	const searchListEl = document.getElementById("searchList");
	if(searchResult != ""){
		searchList.innerHTML += "<li>" + searchResult['Title'] + "</li>";
	}
}