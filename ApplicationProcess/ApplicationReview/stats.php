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

    <title>Applicant Statistics</title>
    <link rel="icon" href="https://i.imgur.com/M3Tvgrs.png">
    <?php
    $pageTitle = "Applicant Statistics";
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
.card-columns {
    column-count: 3;
  padding: 1%;
}
.paddingtop {
  margin-left: 10px;
}
</style>
    <?php
$applicationsStarted = 0;
$applicationsFinished = 0;
$malesNumber = 0;
$malesPercentage = 0;
$femalesNumber = 0;
$femalesPercentage = 0;
$residenceCountriesArray = array();
$residenceCountryOne = "";
$residenceCountryTwo = "";
$residenceCountryThree = "";
$citizenshipCountriesArray = array();
$citizenshipCountryOne = "";
$citizenshipCountryTwo = "";
$citizenshipCountryThree = "";
$serieArray = array();
$serie = "";
$gradeArray = array();
$grade = "";
$appliedNumber = 0;
$appliedPercentage = 0;
$didnotappliedNumber = 0;
$didnotappliedPercentage = 0;
$dateArray = array();
$date = "";
$statusArray = array();
$status = "";
$sourceArray = array();
$source = "";
$uploadedfiles = 0;
$essays = 0;

        $result = mysqli_query($connect,
        "SELECT * FROM applicants;");
        while ($row = mysqli_fetch_array($result))
        { 
$applicationsStarted = $applicationsStarted + 1;

if ($row['status'] == "completed") {
  $applicationsFinished = $applicationsFinished + 1;
}

if ($row['gender'] == "Male") {
  $malesNumber = $malesNumber + 1;
} elseif ($row['gender'] == "Female") {
  $femalesNumber = $femalesNumber + 1;
}

if ($row['country'] != "") {
$residenceCountriesArray[] = $row['country'];
}

if ($row['citizenship'] != "") {
$citizenshipCountriesArray[] = $row['citizenship'];
}

if ($row['type_of_diploma'] != "") {
$serieArray[] = $row['type_of_diploma'];
}

if ($row['final_Grade'] != "") {
$gradeArray[] = $row['final_Grade'];
}

if ($row['scholarship'] == "Yes") {
  $appliedNumber = $appliedNumber + 1;
} elseif ($row['scholarship'] == "No") {
  $didnotappliedNumber = $didnotappliedNumber + 1;
}

if ($row['diploma_date'] != "") {
$dateArray[] = $row['diploma_date'];
}

if ($row['marrital_status'] != "") {
$statusArray[] = $row['marrital_status'];
}

if ($row['source'] != "") {
$sourceArray[] = $row['source'];
}

if ($row['national_exam_file'] != "") {
$uploadedfiles = $uploadedfiles + 1;
}
if ($row['final_grades_file'] != "") {
$uploadedfiles = $uploadedfiles + 1;
}
if ($row['transcripts_file'] != "") {
$uploadedfiles = $uploadedfiles + 1;
}
if ($row['identity_file'] != "") {
$uploadedfiles = $uploadedfiles + 1;
}
if ($row['letter_file'] != "") {
$uploadedfiles = $uploadedfiles + 1;
}
if ($row['scholarship_file'] != "") {
$uploadedfiles = $uploadedfiles + 1;
}

if ($row['essay_answer'] != "") {
  $essays = $essays + 1;
}

        }

$malesPercentage = round(($malesNumber / ($malesNumber + $femalesNumber))*100);
$femalesPercentage = 100 - $malesPercentage;

$appliedPercentage = round(($appliedNumber / ($appliedNumber + $didnotappliedNumber))*100);
$didnotappliedPercentage = 100 - $appliedPercentage;

$arr_freq = array_count_values($residenceCountriesArray);
arsort($arr_freq);
$new_arr = array_keys($arr_freq); 
$residenceCountryOne = $new_arr[0];
$residenceCountryTwo = $new_arr[1];
$residenceCountryThree = $new_arr[2];

$arr_freq = array_count_values($citizenshipCountriesArray);
arsort($arr_freq);
$new_arr = array_keys($arr_freq); 
$citizenshipCountryOne = $new_arr[0];
$citizenshipCountryTwo = $new_arr[1];
$citizenshipCountryThree = $new_arr[2];

$arr_freq = array_count_values($serieArray);
arsort($arr_freq);
$new_arr = array_keys($arr_freq); 
$serie = $new_arr[0];

$arr_freq = array_count_values($gradeArray);
arsort($arr_freq);
$new_arr = array_keys($arr_freq); 
$grade = $new_arr[0];

$arr_freq = array_count_values($dateArray);
arsort($arr_freq);
$new_arr = array_keys($arr_freq); 
$date = $new_arr[0];

$arr_freq = array_count_values($statusArray);
arsort($arr_freq);
$new_arr = array_keys($arr_freq); 
$status = $new_arr[0];

$arr_freq = array_count_values($sourceArray);
arsort($arr_freq);
$new_arr = array_keys($arr_freq); 
$source = $new_arr[0];

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
                        <button type="button" class="btn btn-brown" onclick=" applicants() ">All Applicants</button>
                        <button type="button" class="btn btn-brown" onclick=" uploads() ">All Uploaded Files</button>
                        <button type="button" class="btn btn-brown" onclick=" enterreview() ">Enter Review</button>
                        <button type="button" class="btn btn-brown" onclick=" entries() ">Entries</button>
                        </div>
                      <br>
                      <br>
                      <br>
                      <div class="card-deck">

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h3> <b><?php echo $applicationsStarted ?></b> Total applications <br>(in progress and finished)</h3>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h3> <b><?php echo $applicationsFinished ?></b> Applications finished</h3>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>

                        <div class="card-columns">

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h5> <b><?php echo $femalesPercentage ?>%</b> Females, <b><?php echo $malesPercentage ?>%</b> Males <br> <b><?php echo $femalesNumber ?></b> Females, <b><?php echo $malesNumber ?></b> Males </h5>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h6> <b><?php echo $residenceCountryOne ?>, <?php echo $residenceCountryTwo ?>, <?php echo $residenceCountryThree ?></b><br> Most common countries of residence </h6>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h6> <b><?php echo $citizenshipCountryOne ?>, <?php echo $citizenshipCountryTwo ?>, <?php echo $citizenshipCountryThree ?></b><br> Most common countries of citizenship </h6>
                              </div>
                            </div>
                          </div>
                        </div>

                        </div>

                        <div class="card-deck">

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h5> <b><?php echo $serie ?></b> <br> Most common serie</h5>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h5> <b><?php echo $grade ?></b> <br>Most common final grade</h5>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h5> <h6>Scholarship</h6><b><?php echo $appliedPercentage ?>%</b> Applied, <b><?php echo $didnotappliedPercentage ?>%</b> Did not Apply <br> <b><?php echo $appliedNumber ?></b> Applied, <b><?php echo $didnotappliedNumber ?></b> Did not Apply </h5>
                              </div>
                            </div>
                          </div>
                        </div>

                        </div>
<br>
                        <div class="card-deck">

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h5> <b><?php echo $date ?></b> <br> Most common date of completion of diploma</h5>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h5> <b><?php echo $status ?></b><br> Most common marrital status</h5>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h5> <b><?php echo $source ?></b> Most common source</h5>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h5> <b><?php echo $uploadedfiles ?></b> uploaded files</h5>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body">    
                            <div class="row my-2">
                              <div class="col-12">
                                <h5> <b><?php echo $essays ?></b> essays written</h5>
                              </div>
                            </div>
                          </div>
                        </div>

                        </div>
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
      function applicants() {
        location.href = "applicants.php";
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