<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Apply to A.D.U</title>
    <link rel="icon" href="https://i.imgur.com/M3Tvgrs.png">
    <?php
    $_SESSION['loginsite'] = True;
    include 'navbar.php';
    ?>
    <style type="text/css">
    body, html {
  height: 100%;
}

body {  background-image: url(https://i.imgur.com/9Us2j6N.png);
        height: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover; 
      } 
.btn-brown {
    background-color: #98141e;
    color: white;
}
.btn-brown:hover {
    background-color: #a85d58;
    color: white;
}
}
</style>
<script type="text/javascript">
  var wrongloginAlertBool = false;
</script>
  </head>
  <body onload="changeLanguageOnLoad()">
    <div style="font-family: Verdana">
    <br>
    <div class="bg-image">
      <div id="intro" class="row">
          <!-- <div class="col-md-6"> -->
            <div class="col-md-8 offset-md-2">
              <div class="card">
                <div class="card-body">
                  <?php 
                    if ($_SESSION['incorrectlogin'] == True) {
                    ?>
                    <div class="alert alert-danger" role="alert" id="wrongloginAlert">
                      Incorrect Email or Password
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <script type="text/javascript"> wrongloginAlertBool = true; </script>
                    <?php 
                    $_SESSION['incorrectlogin'] = False;
                    } 
                    ?>
                  <div class="row justify-content-md-center">
                  <h3 id="cardHeader"> Login to finalize your application</h3>
                </div>
                  <form action="loginProcess.php" method="POST">
  <div class="form-group">
    <label for="email" id="emailField">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="password" id="passwordField">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>
  <button type="submit" class="btn btn-brown" id="buttonText">Login</button>
</form>
                    </div>
                  </div>
                <!-- </div> -->
              </div>
            </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
      
function goback() {
  location.href = "loginorsignup.php";
}

            function translateInnerHTML(id, english, french) {
        if (languageButton.innerHTML=="French") {
          id.innerHTML = english;
        } else if (languageButton.innerHTML=="English") {
          id.innerHTML = french;
        }
      }
      function translateClassName(id, english, french) {
        if (languageButton.innerHTML=="French") {
          id.className = english;
        } else if (languageButton.innerHTML=="English") {
          id.className = french;
        }
      }
      function translatePlaceholder(id, english, french) {
        if (languageButton.innerHTML=="French") {
          id.placeholder = english;
        } else if (languageButton.innerHTML=="English") {
          id.placeholder = french;
        }
      }
      function languageChange() {
        var helpbuttontext = document.getElementById("helpbuttontext");
        var infoButton = document.getElementById("infoButton");
        var infoButtonHeader = document.getElementById("infoButtonHeader");
        
        translateInnerHTML(languageButton, "English", "French");
        translateClassName(languageButton, "btn btn-outline-danger my-2 my-sm-0", "btn btn-outline-primary my-2 my-sm-0");
        translateInnerHTML(navbarHeader, "Application Form", "Formulaire d'Inscription");
        translateInnerHTML(helpbuttontext, "<br>         In order for you to complete your application, you need to sign up with your email and password, and then log in. Once logged in you need to fill in all the required fields and upload all the necessary files, then press submit. If you have any questions or problems please email 21rytel_j@aswarsaw.org.         <br>         <br>         *Note: This website is optimized for Google Chrome, so if you are experiencing an issues please try and switch your browser.", "<br> Pour pouvoir compléter votre candidature, vous devez vous inscrire avec votre email et votre mot de passe, puis vous connecter. Une fois connecté, vous devez remplir tous les champs obligatoires, télécharger tous les fichiers nécessaires, puis cliquer sur Envoyer. . Si vous avez des questions ou des problèmes, veuillez envoyer un courrier électronique à 21rytel_j@aswarsaw.org. <br> <br> * Remarque: ce site est optimisé pour Google Chrome. Si vous rencontrez un problème, essayez de changer de navigateur.")
        translateInnerHTML(infoButton, "Info/Help", "Info/Aider")
        translateInnerHTML(infoButtonHeader, "Info/Help", "Info/Aider")

        translateInnerHTML(cardHeader, "Login to finalize your application", "Connectez-vous pour finaliser votre candidature");
        translateInnerHTML(emailField, "Email Adress", "Adresse électronique");
        translatePlaceholder(email, "Enter email", "Entrer email");
        translateInnerHTML(passwordField, "Password", "Mot de passe");
        translatePlaceholder(password, "Password", "Mot de passe");
        translateInnerHTML(buttonText, "Login", "S'identifier");
        translateInnerHTML(gobackbutton, "Back", "Returner");
        if (wrongloginAlertBool == true) {
        translateInnerHTML(wrongloginAlert, "Incorrect Email or Password                         <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">        <span aria-hidden=\"true\">&times;</span>   </button>", "Email ou mot de passe incorrect                         <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">        <span aria-hidden=\"true\">&times;</span>   </button>");
      }
languageLocalStorageChange();
      }
function languageLocalStorageChange() {
                if (languageButton.innerHTML=="French") {
          language = "English";
          localStorage.setItem('language', 'English');
        } else if (languageButton.innerHTML=="English") {
          language = "French";
          localStorage.setItem('language', 'French');
        }
      }
        function changeLanguageOnLoad() {
        var language = localStorage.getItem('language');
         if (language=="French") {
          languageChange();
        } else if (language != "English") {
          language = English;
        
        }
      }
    </script>
  </div>
  </div>
  </body>
</html>