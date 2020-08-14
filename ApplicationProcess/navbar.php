<nav class="navbar navbar-light" style="background-color: #ffffff;">
  <img src="https://www.jeuneafrique.com/medias/2019/04/25/03_208_adu-logov1.png" width="105" height="42" class="d-inline-block align-top" alt="">
  <span class="navbar-brand mb-0 h1" id="navbarHeader">Application Form</span>
  <div class="btn-group">
    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal" id="infoButton">
  Info/Help
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-header">
        <h5 class="modal-title" id="infoButtonHeader">Info/Help</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="helpbuttontext">
        <br>
        In order for you to complete your application, you need to sign up with your email and password, and then log in. Once logged in you need to fill in all the required fields and upload all the necessary files, then press submit. If you have any questions or problems please email 21rytel_j@aswarsaw.org.
        <br>
        <br>
        *Note: This website is optimized for Google Chrome, so if you are experiencing an issues please try and switch your browser.
      </div>
      </div>
    </div>
  </div>
</div>
    <?php
    if ($_SESSION['signupsite'] == True || $_SESSION['loginsite'] == True) {
      ?>
    <button class="btn btn-outline-success my-2 my-sm-0" onclick=" goback() " value="gobackbutton" id="gobackbutton" name="gobackbutton">Back</button>
    <?php
    $_SESSION['signupsite'] = False;
    $_SESSION['loginsite'] = False;
  }
    ?>

    <button class="btn btn-outline-danger my-2 my-sm-0" onclick=" languageChange() " value="English" id="languageButton" >French</button>
  </div>
</nav>