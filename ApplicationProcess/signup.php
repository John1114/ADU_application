<?php
session_start();
require('src/autoload.php');
$_SESSION['captchaPassed'] = false;
$siteKey = '6LcyvK4UAAAAAOROSzos6EJo81q3pEqLlqP4NINp';
$secret = '6LcyvK4UAAAAALA5Los_9MQr35j2Ofe9ZEpGBomb';
    if(isset($_POST['submit']))
{
$recaptcha = new \ReCaptcha\ReCaptcha($secret);
 
$gRecaptchaResponse = $_POST['g-recaptcha-response']; //google captcha post data
$remoteIp = $_SERVER['REMOTE_ADDR']; //to get user's ip
 
$recaptchaErrors = ''; // blank varible to store error
 
$resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp); //method to verify captcha
if ($resp->isSuccess()) {
   $_SESSION['signupName'] = $_POST['firstName'];
$_SESSION['signupLastName'] = $_POST['lastName'];
$_SESSION['signupEmail'] = $_POST['email'];
$_SESSION['signupPassword'] = $_POST['password'];
$_SESSION['captchaPassed'] = true;
header('location:signupProcess.php');
} else {
   $recaptchaErrors = $resp->getErrorCodes(); // set the error in varible
   $_SESSION['failedCapthca'] = True;
}
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Apply to A.D.U.</title>
    <link rel="icon" href="https://i.imgur.com/M3Tvgrs.png">
    <?php
    $_SESSION['signupsite'] = True;
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
  var emailAlreadyTakenAlertBool = false;
  var failedCapthcaBool = false;
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
                  <?php if ($_SESSION['failedCapthca'] == True) {
                    ?>
                    <div class="alert alert-danger" role="alert" id="failedCapthca">
                      Please check the ReCaptcha box. 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <script type="text/javascript"> failedCapthcaBool = true;</script>
                    </div>
                    <?php 
                    $_SESSION['failedCapthca'] = False;
                    } if ($_SESSION['emailalreadytaken'] == True) {
                    ?>
                    <div class="alert alert-warning" role="alert" id="emailAlreadyTakenAlert">
                      Sorry, this email was already used.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <script type="text/javascript"> emailAlreadyTakenAlertBool = true;</script>
                    </div>
                    <?php 
                    $_SESSION['emailalreadytaken'] = False;
                    } 
                    ?>
                  <div class="row justify-content-md-center">
                  <h3 id="cardHeader"> Register for an applicant account</h3>
                </div>
                  <form method="POST" class="recaptchaForm">
  <div class="form-group">
    <label for="firstName" id="firstNameField">First Name</label>
    <input type="text" class="form-control" name="firstName" id="firstName" aria-describedby="emailHelp" placeholder="Enter your First Name" required>
  </div>
  <div class="form-group">
    <label for="lastName" id="lastNameField">Last Name</label>
    <input type="text" class="form-control" name="lastName" id="lastName" aria-describedby="emailHelp" placeholder="Enter your Last Name" required>
  </div>
  <div class="form-group">
    <label for="emailField" id="emailField" name="emailField">Email Address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="password" id="passwordField">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" onkeyup="check()" required>
    <span id='message'></span>
  </div>
    <div class="form-group">
    <label for="confirmPassword" id="confirmPasswordField">Confirm Password</label>
    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm your Password" onkeyup="check()" required>
    <span id='message'></span>
  </div>
  <div class="form-group">
    <div class="g-recaptcha" data-sitekey="6LcyvK4UAAAAAOROSzos6EJo81q3pEqLlqP4NINp" required></div>
  </div>
  <button type="submit" class="btn btn-brown" id="buttonText" name="submit" value="submit"> Create Account</button>
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
      //document.getElementById("buttonText").disabled = true;
      var check = function() {
  if (document.getElementById('password').value == document.getElementById('confirmPassword').value && document.getElementById('password').value != "") {
    document.getElementById('message').style.color = 'green';
    if (languageButton.innerHTML=="French") {
      document.getElementById('message').innerHTML = 'Passwords match!';
    } else {
      document.getElementById('message').innerHTML = 'Les mots de passe correspondent!';
    }
    document.getElementById("buttonText").disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
        if (languageButton.innerHTML=="French") {
      document.getElementById('message').innerHTML = 'Passwords are not the same';
    } else {
      document.getElementById('message').innerHTML = 'les mots de passe ne sont pas les mêmes';
    }
    document.getElementById("buttonText").disabled = true;
  }
}
function goback() {
  location.href = "loginorsignup.php";
}
function languageChange() {
        var languageButton = document.getElementById("languageButton");
        var navbarHeader = document.getElementById("navbarHeader");
        var cardHeader = document.getElementById("cardHeader");
        var firstNameField = document.getElementById("firstNameField");
        var lastNameField = document.getElementById("lastNameField");
        var emailField = document.getElementById('emailField');
        var passwordField = document.getElementById("passwordField");
        var confirmPasswordField = document.getElementById("confirmPasswordField");
        var buttonText = document.getElementById("buttonText");
        var firstName = document.getElementById("firstName");
        var lastName = document.getElementById("lastName");
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        var confirmPassword = document.getElementById("confirmPassword");
        var backbutton = document.getElementById("gobackbutton");
        var emailAlreadyTakenAlert = document.getElementById("emailAlreadyTakenAlert");
        var failedCapthca = document.getElementById("failedCapthca");
        var helpbuttontext = document.getElementById("helpbuttontext");
        var infoButton = document.getElementById("infoButton");
        var infoButtonHeader = document.getElementById("infoButtonHeader");

          if (languageButton.innerHTML=="English") {
            languageButton.innerHTML = "French";
            languageButton.className = "btn btn-outline-danger my-2 my-sm-0";
            navbarHeader.innerHTML = "Application Form";
            infoButton.innerHTML = "Info/Help";
            infoButtonHeader.innerHTML = "Info/Help";
            helpbuttontext.innerHTML = "<br>         In order for you to complete your application, you need to sign up with your email and password, and then log in. Once logged in you need to fill in all the required fields and upload all the necessary files, then press submit. If you have any questions or problems please email 21rytel_j@aswarsaw.org.         <br>         <br>         *Note: This website is optimized for Google Chrome, so if you are experiencing an issues please try and switch your browser.";
            cardHeader.innerHTML = "Register for an applicant account";
            firstNameField.innerHTML = "First Name";
            lastNameField.innerHTML = "Last Name";
            emailField.innerHTML = 'Email Adress';
            passwordField.innerHTML = "Password";
            confirmPasswordField.innerHTML = "Confirm Password";
            buttonText.innerHTML = "Create Account";
            firstName.placeholder = "Enter your First Name";
            lastName.placeholder = "Enter your Last Name";
            email.placeholder = "Enter Email";
            password.placeholder = "Password";
            confirmPassword.placeholder = "Confirm your Password";
            backbutton.innerHTML = "Back";
          }
          else if (languageButton.innerHTML=="French") {
            languageButton.innerHTML = "English";
            languageButton.className = "btn btn-outline-primary my-2 my-sm-0";
            navbarHeader.innerHTML = "Formulaire d'Inscription";
            infoButton.innerHTML = "Info/Aider";
            infoButtonHeader.innerHTML = "Info/Aider";
            helpbuttontext.innerHTML = "<br> Pour pouvoir compléter votre candidature, vous devez vous inscrire avec votre email et votre mot de passe, puis vous connecter. Une fois connecté, vous devez remplir tous les champs obligatoires, télécharger tous les fichiers nécessaires, puis cliquer sur Envoyer. . Si vous avez des questions ou des problèmes, veuillez envoyer un courrier électronique à 21rytel_j@aswarsaw.org. <br> <br> * Remarque: ce site est optimisé pour Google Chrome. Si vous rencontrez un problème, essayez de changer de navigateur.";
            cardHeader.innerHTML = "Inscrivez-vous pour un compte demandeur";
            firstNameField.innerHTML = "Prénom";
            lastNameField.innerHTML = "Nom de famille";
            emailField.innerHTML = 'Email';
            passwordField.innerHTML = "Mot de Passe";
            confirmPasswordField.innerHTML = "Confirmez le mot de passe";
            buttonText.innerHTML = "Créer un compte";
            firstName.placeholder = "Entrez votre prénom";
            lastName.placeholder = "Entrez votre nom de famille";
            email.placeholder = "Entrez Email";
            password.placeholder = "Mot de passe";
            confirmPassword.placeholder = "Confirmer votre mot de passe";
            backbutton.innerHTML = "Returner";
          }
          if (emailAlreadyTakenAlertBool == true) {
            if (languageButton.innerHTML=="French") {
              emailAlreadyTakenAlert.innerHTML = "Sorry, this email was already used.                         <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                           <span aria-hidden=\"true\">&times;</span>                         </button>";
            } else if (languageButton.innerHTML=="English") {
              emailAlreadyTakenAlert.innerHTML = "Désolé, cet email a déjà été utilisé.                         <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                           <span aria-hidden=\"true\">&times;</span>                         </button>";
            }
          }
          if (failedCapthcaBool == true) {
            if (languageButton.innerHTML=="French") {
              failedCapthca.innerHTML = "Please check the ReCaptcha box.                         <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                           <span aria-hidden=\"true\">&times;</span>                         </button>";
            } else if (languageButton.innerHTML=="English") {
              failedCapthca.innerHTML = "Veuillez cocher la case ReCaptcha.                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                           <span aria-hidden=\"true\">&times;</span>                         </button>";
            }
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

<!--<div class="form-group">
    <label for="gender">Gender</label>
    <select class="custom-select mr-sm-2" id="gender" name="gender" required>
        <option selected value="">Choose...</option>
        <option value="female">Female</option>
        <option value="male">Male</option>
        <option value="other">Other</option>
      </select>
  </div>
    <div class="form-group">
    <label for="location">Location</label>
    <input type="text" class="form-control" id="location" name="location" placeholder="Country, City" required>
  </div>
    <div class="form-group">
    <label for="contactNumber">Contact Number (Either Whatsapp or Phone)</label>
    <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter your Contact Number" required>
  </div>