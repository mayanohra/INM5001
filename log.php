<?php
session_start();
  $erreur      = "";
  $username    = "";
  $pass        = "";
  $id          = "";
  $success     = "";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username     = $_POST["username"];
    $pass         = $_POST['pass'];

    if ($username == "") {
      $message = $message . " Veuillez entrer votre username. ";
    } else if ($pass == ""){
      $message = $message . " Veuillez entrer votre mot de passe.";
    } else {

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=INM5001;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
      die('Erreur : '.$e->getMessage());
    }
    $query=$bdd->prepare('SELECT username, pass
        FROM members WHERE username = :username');

        $query->bindValue(':username',$_POST['username'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
    if ( $data['pass'] == $pass ) { // Acces OK !
        $_SESSION['username'] = $data['username'];
        $success = true;
    } else {
      $erreur = $erreur." Une erreur s'est produite, veuillez recommencez...";
    }

    if ($success) {
      header("Location: confirmation.html?username=$username&amp;id=$id", true, 303);
      exit;
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>A la PIGE !</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.css"/>
</head>
<body>
  <!--affichage du logo-->
  <center><a href="acceuil.html"><img class="ui middle aligned small image" src="LogoBIS.png"></a></center>

  <div class="ui hidden divider"></div>

  <div class="ui middle aligned grid child">
    <div class="column">
      <div class="ui center aligned page grid">
        <div class="eight wide  column">
          <div class="ui left aligned segment">
            <h4 class="ui dividing header">Account Info</h4>

            <div id="msgError"><b style="color: red">
              <?php if (!$erreur == ""){
                        echo "$erreur";
                      }
              ?></b>
            </div>

            <form class="ui form" action="log.php" method="POST">
              <div class="field">
                <label for="username">Username :</label>
                <div class="ui icon input">
                  <input type="text" placeholder="Username" name="username"
                   oninvalid="setCustomValidity('Ce champ est obligatoire !')" required> <i class="user icon"></i>
                </div>
              </div>
              <div class="field">
                <label for="password">Password :</label>
                <div class="ui icon input">
                  <input type="password" placeholder="Password" name="pass"
                  oninvalid="setCustomValidity('Ce champ est obligatoire !')" required> <i class="lock icon"></i>
                </div>
              </div>
              <button class="ui inverted blue button" type="submit" id="login"> Login </button>
              <a href="pageInscrip.html"><input type="button" value="Register" class="ui inverted blue button"></a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>
