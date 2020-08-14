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
                  <div class="btn-group float-right" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-brown" onclick=" entries() ">Entries</button>
  <button type="button" class="btn btn-brown" onclick=" allapplicants() ">All Applicants</button>
  </div>
  <br>
                  <?php
                  if($_SESSION['reviewSubmitted'] == True) {
                    ?>
                    <div class="alert alert-success" role="alert">
                      Your review has been saved!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    $_SESSION['reviewSubmitted'] = False;
                  }
                  ?>
                    <h5 class="card-title">Review</h5>
                            <form action="homeProcess.php" method="POST">
                          <div class="form-group">
                            <label for="reviewer_name">Reviewers Name</label>
                            <input type="text" name="reviewer_name" class="form-control" id="reviewer_name" aria-describedby="nameHelp" placeholder="Enter your name" required="">
                            <!-- <small id="nameHelp" class="form-text text-muted">We'll never share your name with anyone else.</small> -->
                          </div>
                          <div class="form-group">
                            <label for="applicant_name">Applicant Name</label>
                            <select name="applicant_name" class="form-control" id="applicant_name" required="">
                              <?php
                                  $result2 = mysqli_query($connect,
                                      "SELECT * FROM `applicants` WHERE `status` = 'completed';");
                                      while ($row = mysqli_fetch_array($result2))
                                      {
                              ?>
                                    <option ><?php echo $row['first_name'] . " " . $row['last_name']?></option>
                                      <?php
                                    }
                                ?>
                            </select>
                          </div>
                          <hr>
                          <div class="form-group">
                          <h5>Intellectual Capacity</h5>
                          <p>This evaluates the students academic background with their final grade/ final report from the Bac exam.</p>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_capacity" id="review_capacity" value="1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              1: Passable 
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_capacity" id="review_capacity" value="2">
                            <label class="form-check-label" for="exampleRadios2">
                              2: Assez bien 
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_capacity" id="review_capacity" value="3">
                            <label class="form-check-label" for="exampleRadios2">
                              3: Bien 
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_capacity" id="review_capacity" value="4">
                            <label class="form-check-label" for="exampleRadios2">
                              4: Tres Bien 
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_capacity" id="review_capacity" value="5">
                            <label class="form-check-label" for="exampleRadios2">
                              5: Tres bien with a fantastic track record from  the previous years. Ideally 16+/20
                            </label>
                          </div>
                          </div>
                          <hr>
                          <div class="form-group">
                          <h5>Commitment to development of Niger/Africa </h5>
                          <p>Reading the student's essay you can define if the student is committed and really took their application seriously and you can define by their attitude and by the content of the student is committed to the developmnet of Niger or Afria at large </p>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_commitment" id="review_commitment" value="1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              1: No mention of Niger or Africa in the essay
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_commitment" id="review_commitment" value="2">
                            <label class="form-check-label" for="exampleRadios2">
                              2: Little to no mention of Niger of Africa
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_commitment" id="review_commitment" value="3">
                            <label class="form-check-label" for="exampleRadios2">
                              3: Applicant has been thinking of making changes in his/her community but has not initiated anything yet
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_commitment" id="review_commitment" value="4">
                            <label class="form-check-label" for="exampleRadios2">
                              4: Applicant took the initiative and started something in their community but no impact yet or they have been highly involved in activities to develop their community
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_commitment" id="review_commitment" value="5">
                            <label class="form-check-label" for="exampleRadios2">
                              5: Applicant took an initiative, demonstrated impact and has been recognised on a regional or international level
                            </label>
                          </div>
                          </div>
                          <hr>
                          <div class="form-group">
                          <h5>Overall quality of application </h5>
                          <p>The more elaborate the student is in filling out the aplication form defines their commitment and eagerness to intergrate the school, the students who opt to use the online application form also might be more innovtive and open to adopting technology than other</p>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_quality" id="review_quality" value="1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              1: No attention to details, very short and brief answers, used manual form
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_quality" id="review_quality" value="2">
                            <label class="form-check-label" for="exampleRadios2">
                              2: little to no attention to details, brief aanswers but straight to the point, used manual form
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_quality" id="review_quality" value="3">
                            <label class="form-check-label" for="exampleRadios2">
                              3: Attention to details, forms well filled and elaborate answers but does not address the prompt, used manual form
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_quality" id="review_quality" value="4">
                            <label class="form-check-label" for="exampleRadios2">
                              4: Consize and precise elaborate answers, responding to the prompt, used manual form or online form
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="review_quality" id="review_quality" value="5">
                            <label class="form-check-label" for="exampleRadios2">
                              5: Consize and precise elaborate answers, responds to the prompt, submitted an online form
                            </label>
                          </div>
                          </div>
                          <hr>
                          <div class="form-group">
                          <h5>Applied for scholarship </h5>
                          <p></p>
                            <select id="review_scholarship" name="review_scholarship" class="form-control">
                              <option selected value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <hr>
                          <button type="submit" class="wpcf7-form-control wpcf7-submit laborator-btn btn btn-index-1 btn-type-st andard btn-secondary btn-large hc-cta-send" style="width:100%; height:50px; background-color: #98141e"> Submit Review</button>
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
      function entries() {
        location.href = "admin.php";
      }
      function allapplicants() {
        location.href = "applicants.php";
      }
    </script>
  </div>
  </div>
  </body>
</html>