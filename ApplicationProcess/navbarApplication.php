<!-- <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #98141e;">
  <a class="navbar-brand" href="https://ilimi.org/" target="_blank">A.D.U</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php
  ?>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">How it Works</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">FAQ</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="userStepOne.php">Create New Acount</a>
      </li>
      <?php if ($logged_in_user == TRUE) {?>
      <li class="nav-item active">
        <a class="nav-link" href="logout_user.php">Logout from <?php echo $name ?></a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav> -->
<!-- Image and text -->
<!-- <nav class="navbar navbar-light" style="background-color: #ffffff;">
  <a class="navbar-brand" href="#">
    <img src="https://ilimi.org/wp-content/uploads/2018/07/03_208_ADU-Logov1.png" width="140" height="58" class="d-inline-block align-top" alt="">
    <b style="font-size: 30px; color: #ffffff">___________________________</b><b style="font-size: 34px; font-family: Verdana; font-weight:normal;">Application Review Form</b>
  </a>
</nav> -->
<!-- <nav class="navbar navbar-light" style="background-color: #ffffff;">
  <a class="navbar-brand">
    <img src="https://ilimi.org/wp-content/uploads/2018/07/03_208_ADU-Logov1.png" width="105" height="39" class="d-inline-block align-top" alt="">
    <span class="navbar-brand mb-0 h1">Application Form</span>
  </a>
</nav> -->
<nav class="navbar navbar-light" style="background-color: #ffffff;">
  <img src="https://www.jeuneafrique.com/medias/2019/04/25/03_208_adu-logov1.png" width="105" height="42" class="d-inline-block align-top" alt="">
  <span class="navbar-brand mb-0 h1" id="navbarHeader">Application Form</span>
  <div class="button-group">
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
    <button class="btn btn-outline-danger my-2 my-sm-0" onclick=" languageChange() " value="English" id="languageButton" >French</button>
  </div>
</nav>


