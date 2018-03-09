const formEl = document.getElementById("formulaire");
const keywordEl = document.getElementById('keyword');

formEl.addEventListener('submit', function(e){
	e.preventDefault();
	verifyKeyword();
	
})

function verifyKeyword(){
	const msgErreurSearchEl = document.getElementById('msgErreur');
	if(keywordEl.value === NULL){
		msgErreurSearchEl.innerHTML = "Champs ne peut pas être vide";
	}else{
		fetchValidSearch();
	}
}

function fetchValidSearch(){

}