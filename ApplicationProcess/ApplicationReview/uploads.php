<?php
session_start();
include('database_inc.php');
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
    $pageTitle = "All Applicants";
    include 'navbarAdmin.php';
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
</style>

<?php
    if(isset($_GET['submit']))
{
$filter = "";

if($_GET['gender'] != "ANY") {
  $filter = "`gender` = \"" . $_GET['gender'] . "\"";
} 
if($_GET['scholarship'] != "ANY") {
  if($_GET['gender'] != "ANY") {
    $filter = $filter . " AND ";
  }
  $filter = $filter . " `scholarship` = \"" . $_GET['scholarship'] . "\"";
} 
if($_GET['remark'] != "ANY") {
  if($filter != "") {
    $filter = $filter . " AND ";
  }
  $filter = $filter . "`final_Grade` = \"" . $_GET['remark'] . "\"";
} 
if($_GET['status'] != "ANY") {
  if($filter != "") {
    $filter = $filter . " AND ";
  }
  $filter = $filter . " `status` = \"" . $_GET['status'] . "\"";
}

}

if($filter == "") {
  $filter = " id > 0 ";
}
?>
  </head>
  <body>
    <div style="font-family: Verdana">
    <br>
      <div id="intro" class="row">
          <!-- <div class="col-md-6"> -->
            <div class="col-md-10 offset-md-1">
              <div class="card">
                <div class="card-body">
                 
<div class="row my-2">
    <div class="col-12">
<div class="btn-group float-right" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-brown" onclick=" back() ">Back</button>
  </div>
<br>
<br>
<?php
$dir    = 'http://ilimi.org/uploads';
$files1 = scandir($dir);
$counter = 0;
echo "FILES:";
while ($counter <= count($files1)) {
  ?>
  <a href="http://localhost/ApplicationForm/<?php echo $files1[$counter]; ?><!-- "> --><?php echo $files1[$counter]; ?></a>
  <br>
<?php
     $counter += 1;
 }

?>

      
    </div>
</div>


                </div>
              </div>

          </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
function back() {
        location.href = "applicants.php";
      }
    </script>
  </div>
  </div>
  </body>
</html>