  <?php   
  
  $erreur      = "";
  
  $erreur = isset($_GET["erreur"]); 
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

            <form class="ui form" action="profily.php" method="POST">
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