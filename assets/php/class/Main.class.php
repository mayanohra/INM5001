<?php
/*
Citywars Inc.
Page Primary.class.php

*/

class Main extends Primary{ //load parent primary
	
	public $page;
	public $pageDisplayName;
	
	
	public $defaultLang = 'fr';
	public $siteColor = 'orange';
	
	function __construct($page) { // en declarant la classe cest execute 
        parent::__construct();
		
		$this->page = strtolower($page);
		$this->pageDisplayName = ucfirst(str_replace('-', ' ', $this->page));
		
		$_SESSION['lang'] = $this->defaultLang; // changer de langue
		if(isset($_GET['lang'])){
			$_SESSION['lang'] = $_GET['lang'];
		}
		
		
	}
	

	
	public function parseRequest(){ //premiere fonction dans index.php, fait tout 
		$menuHtml = '';
		
		$additionalCss = '';
		
		
		
		
		$title = 'Fleurbec - '.$this->page;
		
		
		$html = '
			<!DOCTYPE html>
			<!--load html-->
			<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
			<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
			<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
				<head>
					<title>'.$title.'</title>

					<!-- Meta -->
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<meta name="description" content=" Depuis 1975, randonneurs comme botanistes identifient les plantes sans peine, par l’image, grâce aux guides Fleurbec vendus à plus de 300 000 exemplaires">
					<meta name="author" content="Site Abordable">
					
					

					<!-- #FAVICONS //icone dans longlet--> 
					<link rel="shortcut icon" href="assets/img/favicon/favicon.ico" type="image/x-icon">
					<link rel="icon" href="assets/img/favicon/favicon.ico" type="image/x-icon">
					
					<script type="application/ld+json">
						{
							"@context": "http://schema.org",
							"@type": "Organization",
							"url": "https://www.siteabordable.com",
							"contactPoint": [{
								"@type": "ContactPoint",
								"telephone": "+1-450-600-2244",
								"contactType": "customer service"
							}]
						}
					</script>

				</head>
				
				<body id="body"  class="demo-lightbox-gallery">
					
					'.$this->getContent().'
					
					<!-- a partir de webfont jusqua la fin on delete et on remplace parle index.html--> 
					<!-- Web Fonts -->
					<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">
					<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,300,600&amp;subset=cyrillic,latin">

					<!-- CSS Global Compulsory -->
					<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
					<link rel="stylesheet" href="assets/css/style.css">
					<link rel="stylesheet" href="assets/css/global.css">
					
					<!-- CSS Header and Footer -->
					<link rel="stylesheet" href="assets/css/headers/header-v7.css">
					<link rel="stylesheet" href="assets/css/footers/footer-v1.css">
					
					<!-- CSS Implementing Plugins -->
					<link rel="stylesheet" href="assets/plugins/animate.css">
					<link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
					<link rel="stylesheet" href="assets/plugins/line-icons-pro/styles.css">
					<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
					<link rel="stylesheet" href="assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
					<link rel="stylesheet" href="assets/plugins/owl-carousel2/assets/owl.carousel.css">
					<link rel="stylesheet" href="assets/plugins/fancybox/source/jquery.fancybox.css">

					<!-- CSS Theme -->
					<link rel="stylesheet" href="assets/css/theme-colors/default.css" id="style_color">
					<link rel="stylesheet" href="assets/css/theme-skins/dark.css">
					
					<!-- CSS Customization -->
					<link rel="stylesheet" href="assets/css/custom.css">
						
					'.$additionalCss.'
					
				</body>
			</html>
		';
		/*$this->footer()->getFooter()*/
		/*$this->footer()->getFooter()
					'.$this->scripts()->getScripts().'
					'.$this->topHeader()->getTopHeader().'
					*/
		
		return $html;
	}
	
	
	
	
	
	
	
	
	
	
	
	public function getContent(){
		$html = '';
		
		if($this->page == 'erreur-404'){
			
		}
		else if($this->page == 'erreur-500'){
			
		}
		else if($this->page == 'qui-sommes-nous'){
			$html = '
				<div class="content-side-right"> 
					'.$this->imageGaucheTexteDroiteComplet().'
					'.$this->imageGaucheTexteDroiteComplet().'
				</div>
			';
			
		}
	
	
	
	
		
	
		else if($this->page == 'accueil-a'){
			
			$html = '
				<div data-spy="scroll" data-target="#nav-target" class="content-side-right nav-spy"> 
					
					'.$this->pageExterne().'
					
					 
					
					'.$this->TexteGauchePluginDroite().'
				
					
					
				</div>
			';
			
			
		}
		
		
		
		else if($this->page == 'accueil'){
			
			$html = '
				<div data-spy="scroll" data-target="#nav-target" class="content-side-right nav-spy"> 
					
					
					
					'.$this->TexteGauchePluginDroite().'
					
					
					
				</div>
			';
			
		
		}
		
		
		
		
		
		
		else{
		
		}
		
		return $html;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	public function espaceBlanc(){

$html='	
	<div class="">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	</div>
	';
		return $html;
	
	}
	

	
	
	
	public function pageExterne(){

$html=file_get_contents('test.html', true);
return $html;
		}
	
	
	
	
	
	
	

	
	
	
	

	
	
	

	

	

	

	
	

	
	public function TexteGauchePluginDroite(){
		$html='
			<div id="qui-sommes-nous" class="container content-sm">
				<div class="headline-center margin-bottom-40">
					<h2>QUI SOMMES NOUS</h2>
					
					
					<p>Phasellus vitae ipsum ex. Etiam eu vestibulum ante. 
					
					<br>
						Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipiscing elit. Morbi libero libero, imperdiet fringilla 
						</p>
						
						
						<p>Phasellus vitae ipsum ex. Etiam eu vestibulum ante. 
					
					<br>
						Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipiscing elit. Morbi libero libero, imperdiet fringilla 
						</p>
						<p>Phasellus vitae ipsum ex. Etiam eu vestibulum ante. 
					
					<br>
						Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipiscing elit. Morbi libero libero, imperdiet fringilla 
						</p>
				</div>

				<div class="row">
					<div class="col-md-6 content-xs md-margin-bottom-50">
<p>

<p>Phasellus vitae ipsum ex. Etiam eu vestibulum ante. 
					
					<br>
						Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipiscing elit. Morbi libero libero, imperdiet fringilla 
						</p><br>
<br>
<br>
<p>Phasellus vitae ipsum ex. Etiam eu vestibulum ante. 
					
					<br>
						Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipiscing elit. Morbi libero libero, imperdiet fringilla 
						</p><br>
<br>
<br>
<br>
</p>	



	<a href="#" class="btn-u">En savoir plus</a>
					</div>

					<!-- Smallest Progress Bar -->
					<div class="col-md-6 progress-box">
					
						<!-- 
						<h3 class="heading-xs">Fleurbec c\'est <span class="pull-right">88%</span></h3>
						
						
						<div class="progress progress-u progress-xxs">
							<div class="progress-bar progress-bar-u" role="progressbar" data-width="88">
							</div>
						</div>	
						-->
					
						
						
						<h3 class="heading-xs custom-vert-chaud">Notre site c\'est </h3>
						<p>Phasellus vitae ipsum ex. Etiam eu vestibulum ante. 
					
					<br>
						Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipiscing elit. Morbi libero libero, imperdiet fringilla 
						</p>
						    
							<h3 class="heading-xs custom-vert-chaud">Notre site c\'est </h3>
						<p>Phasellus vitae ipsum ex. Etiam eu vestibulum ante. 
					
					<br>
						Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipiscing elit. Morbi libero libero, imperdiet fringilla 
						</p>
						    
						<h3 class="heading-xs custom-vert-chaud">Notre site c\'est </h3>
						<p>Phasellus vitae ipsum ex. Etiam eu vestibulum ante. 
					
					<br>
						Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipiscing elit. Morbi libero libero, imperdiet fringilla 
						</p>
						    
						
						
						<p class = "">
						<i> 
						<h3 class="heading-xs custom-vert-chaud">Notre site c\'est </h3>
						<p>Phasellus vitae ipsum ex. Etiam eu vestibulum ante. 
					
					<br>
						Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipiscing elit. Morbi libero libero, imperdiet fringilla 
						</p>
						    
</i> 
						</p>
						
						
					</div>
					<!-- End Smallest Progress Bar -->
				</div><!--/end row-->
			</div>
		';
		return $html;
			
	}
	

		

	
	
	
	

	

	
	

	

	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}




?>