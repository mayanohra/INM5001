<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Site web</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body>
  <!--affichage du logo-->
  <div>
    <img src="Logo.png" alt="Logo du site" style="width:350px;height:150px;">
  </div>
  <form method="post" action="login_verif.php">
    <div align = "center">
      Username: <input type="text" name="username" placeholder="Username">
      <br><br>
      Password: <input type="password" name="password" placeholder="Password">
      <br><br>
      <button class="button" type="submit">Connexion</button>
    </div>
  </form>
</body>
</html>
