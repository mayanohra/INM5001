<?php
/*
Citywars Inc.
Page Primary.class.php
*/

class Primary{ // toutes variables base de donnee et nom de l'application; public private protected types var; protected dans primary tous ses enfants; private seulement primary; 
	
	protected $Bd_ServerName;
	protected $Bd_Login;
	protected $Bd_Password;
	protected $Bd_BdName;
	protected $Root;
	protected $Bd_Handler;
	protected $Domain;
	protected $AppDisplayName = 'Site Abordable';
	protected $AppName = 'site-abordable';
	
	public function __construct(){
		$this->Bd_ServerName = 'localhost';
		if(isset($_SERVER['HTTP_HOST'])){
			$this->Domain = 'https://'.$_SERVER['HTTP_HOST'];
		}
		else{
			$this->Domain = 'https://siteabordable.com/';
		}
		$this->Root = getcwd();
	}
	
	public function OpenBdd(){ // ouvre la connection a la base de donnee
		$this->Bd_Login = 'c1fleurbec'; //login pour la base de donnee. 
		$this->Bd_Password = 'gso!zYTA47';
		$this->Bd_BdName = 'c1fleurbec';
		
		try{
			//if($this->Bd_Handler == null || empty($this->Bd_Handler)){
				$options = array(
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' // connecte en pdo; securitaire. 
				); 
				$this->Bd_Handler = new PDO('mysql:host='.$this->Bd_ServerName.';dbname='.$this->Bd_BdName, $this->Bd_Login, $this->Bd_Password, $options); // cconnexion au port
			//}
			
			$this->Bd_Login = ''; //vider la variable pour securit/
			$this->Bd_Password = '';
			$this->Bd_BdName = '';
			
			return $this->Bd_Handler;
		}
		catch(Exception $e){
			die('SQL Error : '.$e->getMessage());
		}
	}
	
	public function CloseBdd(){
		$this->Bd_Handler = null;
	}
	
	public function globalAjaxFunc(){ // un procede request javascript; action apres que la page est loadee 
		$html = '
			<script type="text/javascript">
				function globalSend(key, dataSent,callback){
					if(!dataSent["noLoader"]){
						$(".loader").show();
					}
					
					$.post("'.$this->Domain.'/api/"+key, dataSent,
						function(data){
							if(!data){
								$(".loader").hide();
								return;
							}
							
							data = $.parseJSON(data);
							
							if(data[0] == "reload"){
								globalSend("Reload", "");
							}
							else if(data[0] == "reloadAll"){
								location.reload(true);
							}
							else if(data[0] == "SERVER"){
								if(data[0] == "RELOAD"){
									alert("An error happened.");
									globalSend("Reload", "");
									return;
								}
								alert(data[1]+"\nContact Linkupdated for more info");
								globalSend("Reload", "");
							}
							else if(data[0] == "ALERT"){
								alert(data[1]);
							}
							else if(data[0] == "js"){
								eval(data[1]);
							}
							else if(data.length >= 2){
								$(data[0]).html(data[1]);
								$(".loader").hide();
							}
							
							if(typeof callback == \'function\'){
								callback.call(this, data);
							}
						}
					);
				}
			</script>
		';
		
		return $html;
	}
	
	////*******Début********////
	////Mes Fonctions Privée////
	////*******Début********////
	
	////********Fin*********////
	////Mes Fonctions Privée////
	////********Fin*********////
}




?>