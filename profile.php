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

  <h2 align = "center"> Profil </h2>

  <form method="post" action="verification_profile.php">
    <div align = "center">
      <label>First name: 
        <input type="text" name="firstname" placeholder="First Name">
      </label>
      <br><br>

      <label>Last name: 
        <input type="text" name="lastname" placeholder="Last Name">
      </label>
      <br><br>

      <label>Telephone: 
        <input type="text" name="telephone" placeholder="Telephone" maxlength="10">
      </label>
      <br><br>

      <label>Gender: 
        <input type="radio" name="gender" value="male" checked> Male
      </label>
      <input type="radio" name="gender" value="female"> Female
      <br><br>
      
      <label>Date de naissance: 
        <input type="date" name="dateNaissance">
      </label>
      <br><br>

      <label>E-mail: 
        <input type="email" name="email" placeholder="abc...@exemple.com">
      </label>
      <br><br>

      <?php
        $username = $_GET['username'];
      ?>

      <input type="hidden" name="username" value=<?= $username?>>

      <button class="button" type="submit">Submit</button>
      <button class="button" type="submit">Ajouter service</button>
    </div>
  </form>

</body>
</html>
