<!DOCTYPE html>
<html>
<head>
	<title>Notre Site</title>
	<link rel="stylesheet" type="text/css" href="style-recherche.css">
</head>
<body>
	<div class="recherche">
		<form action="validSearch.php" method="post" id="formulaire">
			<input type="text" name="keyword" placeholder="Recherche..">
			<button type="submit">Rechercher</button>
		</form>
	</div>
	<div id="msgErreur"></div>

	<script type="text/javascript" src="application.js"></script>
</body>
</html>