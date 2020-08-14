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

    <title>Apply to A.D.U.</title>
    <link rel="icon" href="https://i.imgur.com/M3Tvgrs.png">
    <?php
    include 'navbar.php';
    ?>
    <style type="text/css">
    body, html {
  height: 100%;
}

body {  background-image: url(https://i.imgur.com/LdhlHYW.jpg);
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
  </head>
  <body onload="changeLanguageOnLoad()">
    <div style="font-family: Verdana">
    <br>
    <div class="bg-image">
      <div id="intro" class="row">
          <!-- <div class="col-md-6"> -->
            <div class="col-md-8 offset-md-2">
            	<br><br><br><br><br><br><br><br><br><br><br>
              <div class="card-deck">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title" id="signupHeader">Sign-Up</h5>
      <p class="card-text" id="signupText">If this is your first time, click sign up so that you can get started with your application process.</p>
                      <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
  <button type="button" class="btn-brown btn" onclick=" signup() " id="signupButton">Sign-up</button>
</div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title" id="loginHeader">Login</h5>
      <p class="card-text" id="loginText">If you've already signed and are ready to finish your application click login</p>
                        <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
  <button type="button" class="btn-brown btn" onclick=" login() " id="loginButton">Login</button>
</div>
    </div>
  </div>
</div>
              
                    </div>
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
      function login() {
        location.href = "login.php";
      }
      function signup() {
        location.href = "signup.php";
      }
      function languageChange() {
        var languageButton = document.getElementById("languageButton");
        var navbarHeader = document.getElementById("navbarHeader");

        var signupHeader = document.getElementById("signupHeader");
        var loginHeader = document.getElementById("loginHeader");
        var loginButton = document.getElementById("loginButton");
        var signupButton = document.getElementById("signupButton");
        var loginText = document.getElementById("loginText");
        var signupText = document.getElementById("signupText");
        var helpbuttontext = document.getElementById("helpbuttontext");
        var infoButton = document.getElementById("infoButton");
        var infoButtonHeader = document.getElementById("infoButtonHeader");

        translateInnerHTML(languageButton, "English", "French");
        translateClassName(languageButton, "btn btn-outline-danger my-2 my-sm-0", "btn btn-outline-primary my-2 my-sm-0");
        translateInnerHTML(navbarHeader, "Application Form", "Formulaire d'Inscription")
        translateInnerHTML(helpbuttontext, "<br>         In order for you to complete your application, you need to sign up with your email and password, and then log in. Once logged in you need to fill in all the required fields and upload all the necessary files, then press submit. If you have any questions or problems please email 21rytel_j@aswarsaw.org.         <br>         <br>         *Note: This website is optimized for Google Chrome, so if you are experiencing an issues please try and switch your browser.", "<br> Pour pouvoir compléter votre candidature, vous devez vous inscrire avec votre email et votre mot de passe, puis vous connecter. Une fois connecté, vous devez remplir tous les champs obligatoires, télécharger tous les fichiers nécessaires, puis cliquer sur Envoyer. . Si vous avez des questions ou des problèmes, veuillez envoyer un courrier électronique à 21rytel_j@aswarsaw.org. <br> <br> * Remarque: ce site est optimisé pour Google Chrome. Si vous rencontrez un problème, essayez de changer de navigateur.")
        translateInnerHTML(infoButton, "Info/Help", "Info/Aider")
        translateInnerHTML(infoButtonHeader, "Info/Help", "Info/Aider")

        translateInnerHTML(signupHeader, "Sign-Up", "S'inscrire");
        translateInnerHTML(loginHeader, "Login", "S'identifier");
        translateInnerHTML(signupButton, "Sign-Up", "S'inscrire");
        translateInnerHTML(loginButton, "Login", "S'identifier");
        translateInnerHTML(signupText, "If this is your first time, click sign up so that you can get started with your application process.", "Si vous vous présentez pour la première fois, cliquez sur Inscrivez-vous pour pouvoir démarrer le processus de candidature.");
        translateInnerHTML(loginText, "If you've already signed and are ready to finish your application click login", "Si vous vous êtes déjà inscrit et êtes prêt à terminer votre application, cliquez sur Login.");
        languageLocalStorageChange();

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

<!-- <div class="row justify-content-md-center">
                  <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
  <button type="button" class="btn-brown btn">Login</button>
  <button type="button" class="btn-brown btn">Sign-up</button>
</div>
<h6> Have you already signed up, or is this your first time here? If this is you first time, click sign up so that you can get started with your application process. If you've already signed and are ready to finish your application click login.</h6> -->