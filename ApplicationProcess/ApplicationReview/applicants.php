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
$numberOfResults = 0;
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

    <?php 
        if ($_SESSION['entryDeleted'] == True) {
    ?>
                    <div class="alert alert-warning" role="alert">
                      Profile has been successfully deleted!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

    <?php 
        $_SESSION['entryDeleted'] = False;
        } else if ($_SESSION['entryEdited'] == True) {
    ?>
                    <div class="alert alert-primary" role="alert">
                      Entry has been successfully edited!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

    <?php 
        $_SESSION['entryEdited'] = False;
        } else if ($_SESSION['reviewSubmitted'] == True) {
    ?>
                    <div class="alert alert-primary" role="alert">
                      Your review has been saved!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

    <?php 
        $_SESSION['reviewSubmitted'] = False;
        }
    ?>
      <form method="GET" action="applicants.php">
        <div class="btn-group float-left">
      <select class="form-control" onclick="" style="width:90px" name="gender" id="gender">
      <option value="ANY">Gender</option>
      <option value="ANY">Any</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
      <select class="form-control" onclick="" style="width:140px" name="remark" id="remark">
      <option value="ANY">Final Remark</option>
      <option value="ANY">Any</option>
      <option value="Tres Bien">Tres Bien</option>
      <option value="Bien">Bien</option>
      <option value="Assez Bien">Assez Bien</option>
      <option value="Passable">Passable</option>
    </select>
      <select class="form-control" onclick="" style="width:130px" name="scholarship" id="scholarship">
      <option value="ANY">Scholarship</option>
      <option value="ANY">Any</option>
      <option value="Yes">Applied</option>
      <option value="No">Did not Apply</option>
    </select>
      <select class="form-control" onclick="" style="width:80px" name="status" id="status">
      <option value="ANY">Status</option>
      <option value="ANY">Any</option>
      <option value="completed">Completed</option>
      <option value="">In Progress</option>
    </select>
  </div>
            <div class="btn-group float-left">
  <button type="submit" class="btn btn-brown paddingtop" id="submit" name="submit" value="submit" style=".ml-1">Filter</button>
</div>
</form>

<div class="btn-group float-right" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-brown" onclick=" stats() ">Stats</button>
  <button type="button" class="btn btn-brown" onclick=" uploads() ">All Uploaded Files</button>
  <button type="button" class="btn btn-brown" onclick=" enterreview() ">Enter Review</button>
  <button type="button" class="btn btn-brown" onclick=" entries() ">Entries</button>
  </div>
<br>
<br>
<!--         "SELECT * FROM `applicants`  WHERE `gender` = $actualgender AND `status` = $actualstatus AND `scholarship` = $actualscholarship AND `final_Grade` = $actualremark ORDER BY $sortby $order;"); -->
    <?php 
    $sortby = "id";
    $order = "ASC";
        $result = mysqli_query($connect,
        "SELECT * FROM `applicants`  WHERE $filter ORDER BY $sortby $order;");
        if (mysqli_num_rows($result) == 0) {
?>
<div class="alert alert-danger" role="alert">
                      No Results
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
<?php
            } 
            else {
              $numberOfResults = mysqli_num_rows($result);
            echo "Number of results: " . $numberOfResults;
              ?> <br> <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Applicant Name</th>
                <th scope="col">Gender</th>
                <th scope="col">City of Residence</th>
                <th scope="col">Final Remark</th>
                <th scope="col">Year Diploma Received</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody><?php
        while ($row = mysqli_fetch_array($result))
        { 
          $numberOfResults += 1;
            ?>
            <tr>
                <th><?php echo "<a style=\"font-weight:normal\" href=profile.php?id=" . $row['id'] . ">" . $row['first_name'] . " " . $row['last_name'] . "</a>"; ?> </th>
                <td><?php echo $row['gender']; ?> </td>
                <td><?php echo $row['city']; ?> </td>
                <td><?php echo $row['final_Grade']; ?> </td>
                <td><?php echo $row['diploma_date']; ?> </td>
                <td><?php echo "<a href=\"removeProfileConfirm.php?id=" . $row['id']. "\">Delete</a>"; ?> 
              </td>
            </tr>
            <?php 
                }
              }
            ?>
            </tbody>
            </table>
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
      if ($_GET['gender']) {
      document.getElementById("gender").value = "<?php echo $_GET['gender']; ?>";
      } if ($_GET['scholarship']) {
      document.getElementById("scholarship").value = "<?php echo $_GET['scholarship']; ?>";
      } if ($_GET['status']) {
      document.getElementById("status").value = "<?php echo $_GET['status']; ?>";
      } if ($_GET['remark']) {
      document.getElementById("remark").value = "<?php echo $_GET['remark']; ?>";
      }
      function sortbygrades() {
        location.href = "admin.php?sortby=grades";
      }
      function uploads() {
        location.href = "http://ilimi.org/applications/uploads.php";
      }
      function stats() {
        location.href = "stats.php";
      }
      function sortbydate() {
        location.href = "admin.php?sortby=date";
      }
      function sortbyapplicants() {
        location.href = "admin.php?sortby=applicants";
      }
      function allapplicants() {
        location.href = "applicants.php";
      }
      function entries() {
        location.href = "admin.php";
      }
      function enterreview() {
        location.href = "home.php";
      }
    </script>
  </div>
  </div>
  </body>
</html>