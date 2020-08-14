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
    $pageTitle = "Application Review Entries";
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
}
</style>
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
                      Entry has been successfully deleted!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

    <?php 
        $_SESSION['entryDeleted'] = False;
        } if ($_SESSION['entryEdited'] == True) {
    ?>
                    <div class="alert alert-primary" role="alert">
                      Entry has been successfully edited!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

    <?php 
        $_SESSION['entryEdited'] = False;
        }
    ?>
    <div class="btn-group float-left" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-brown" onclick=" sortbygrades() ">Sort by Grades</button>
  <button type="button" class="btn btn-brown" onclick=" sortbyapplicants() ">Sort by Applicants</button>
  <button type="button" class="btn btn-brown" onclick=" sortbydate() ">Sort by Date</button>
  <button type="button" class="btn btn-brown" onclick=" sortbyscholarship() ">Sort by Scholarship</button>
</div>
<div class="btn-group float-right" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-brown" onclick=" enterreview() ">Enter Review</button>
  <button type="button" class="btn btn-brown" onclick=" allapplicants() ">All Applicants</button>
  </div>
<br>
<br>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Reviewer</th>
                <th scope="col">Applicant</th>
                <th scope="col">Applied for scholarship</th>
                <th scope="col">Final Grade</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

    <?php 
    $sortby = $_GET['sortby'];
    if ($sortby != "applicants" && $sortby != "grades" && $sortby != "scholarship") {
      $sortby = "date";
      $order = "DESC";
    } elseif ($sortby == "applicants") {
      $sortby = "applicant_name";
      $order = "ASC";
    } elseif ($sortby == "scholarship") {
      $sortby = "review_scholarship";
      $order = "ASC";
    } elseif ($sortby == "grades") {
      $sortby = "final_grade";
      $order = "DESC";
    }
        $result = mysqli_query($connect,
        "SELECT * FROM reviews ORDER BY $sortby $order;");
        while ($row = mysqli_fetch_array($result))
        { 
          $applicantName = $row['applicant_name'];
        $result2 = mysqli_query($connect,
          "SELECT * FROM applicants");
        while ($row2 = mysqli_fetch_array($result2))
        { 
          $firstlast = $row2['first_name'] . " " . $row2['last_name'];
          if ($firstlast == $applicantName) {
            $applicantid = $row2['id'];
          }
        }

            $last_logged_in = $row['last_logged_in'];
            ?>
            <tr>
                <th><?php echo $row['id']; ?> </th>
                <td><?php echo $row['reviewer_name']; ?> </td>
                <td><?php echo "<a href=profile.php?id=" . $applicantid . ">" . $row['applicant_name'] . "</a>"; ?> </td>
                <td><?php echo $row['review_scholarship']; ?> </td>
                <td><?php echo $row['final_grade']; ?> </td>
                <td><?php echo $row['date']; ?> </td>
                <td><?php echo "<a href=\"editEntry.php?id=" . $row['id']. "\">Edit</a>" . "\n" . "<a href=\"removeEntry.php?id=" . $row['id']. "\">Delete</a>"; ?> 
              </td>
            </tr>
            <?php 
                }
            ?>
                        <?php
                if (mysqli_num_rows($result) == 0) { ?>
                  
                  <div class="alert alert-danger" role="alert">
                                        No Reviews yet
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                  <?php
            }
            ?>
            </tbody>
            </table>
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
    <script>
      function sortbygrades() {
        location.href = "admin.php?sortby=grades";
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
      function sortbyscholarship() {
        location.href = "admin.php?sortby=scholarship";
      }
      function enterreview() {
        location.href = "home.php";
      }
    </script>
  </div>
  </div>
  </body>
</html>