<?php
session_start();
if($_SESSION['loggedin'] == False) {
    header('location:index.php');
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

    <title>Review Applicants</title>
    <link rel="icon" href="https://i.imgur.com/M3Tvgrs.png">
    <?php
    include 'database_inc.php';
    include 'navbar.php';
    ?>
    <style type="text/css">
    body, html {
  height: 100%;
}

body {  background-image: url(https://i.imgur.com/7wGFM1d.jpg);
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
.paddingtop {
  margin-left: 10px;
}
}
</style>
  </head>
  <body>
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
                      Incorrect Password
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php 
                    $_SESSION['incorrectlogin'] = False;
                    } 
                    ?>
                  <h3> Are you sure?</h3>
                  <h6> Once you delete an applicant you won't be able to retrieve any of the information</h6>
                  <div class="row justify-content-md-center">
                </div>
                  <form action="removeProfile.php?id=<?php echo $_GET['id']?>" method="POST">
  <div class="form-group">
    <label for="password" id="passwordField">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    <br>
    <button type="submit" class="btn btn-secondary">Delete</button>
    <button type="button" class="btn btn-brown" onclick="goback()" >Back</button>
  </div>
                  
                  
                    </div>
                  </div>
                <!-- </div> -->
              </div>
            </div>
          </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
      function goback() {
        location.href = "applicants.php";
      } function deleteanyway() {
        location.href = "removeProfile.php?id=<?php echo $_GET['id']?>";
      }
    </script>
  </div>
  </div>
  </body>
</html>