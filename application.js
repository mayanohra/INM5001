const formEl = document.getElementById("form");

formEl.addEventListener('submit', function(e){
	e.preventDefault();
	fetchSearch();
});


function fetchSearch(){
	const formEL = document.forms.namedItem("form");
	var formData = new FormData(formEl);

	fetch('validSearch.php', { method: 'POST, body: formData'})
		.then(function(response) {
			if (response.ok){
				return response.json();
			}else{
				//TODO: ERREUR
			}
		})
		.then(function(searchResult) {
			// printResult(response.json());
		})
}

// function printResult(searchResult){
// 	const searchListEl = document.getElementById("searchList");
// 	if(searchResult != ""){
// 		searchList.innerHTML += "<li>maya00</li>"
// 	}
// }