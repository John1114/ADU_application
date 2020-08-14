<?php
session_start();
include('database_inc.php');

$firstName = str_replace("'", "\\'", $_POST['firstName']);
$lastName = str_replace("'", "\\'", $_POST['lastName']);
$email = str_replace("'", "\\'", $_POST['email']);
$password = str_replace("'", "\\'", $_POST['password']);

$firstName = str_replace("'", "\\'", $_SESSION['signupName']);
$lastName = str_replace("'", "\\'", $_SESSION['signupLastName']);
$email = str_replace("'", "\\'", $_SESSION['signupEmail']);
$password = str_replace("'", "\\'", $_SESSION['signupPassword']);

$_SESSION['emailalreadytaken'] = False;
if ($password == "") {
    header('location:signup.php');
}
if($_SESSION['failedCapthca'] == True || $_SESSION['captchaPassed'] == false) {
      $_SESSION['failedCapthca'] = True;
      header('location:signup.php');
}
$_SESSION['failedCapthca'] = False;
// echo "$reviewerName";
// echo "$applicantName";
// echo "$comments";
// echo "$finalGrade";
$result = mysqli_query($connect,
    "SELECT * FROM applicants;");
        while ($row = mysqli_fetch_array($result))
        { 
        	if ($row['email'] == $email) {
        	$_SESSION['emailalreadytaken'] = True;
        	header('location:signup.php');
        	}
        	
        }
if ($_SESSION['emailalreadytaken'] != True) {
	$result2 = mysqli_query($connect,
    "INSERT INTO `applicants`(`id`, `email`, `password`, `first_name`, `last_name`, `contact_number`, `date_of_birth`, `gender`, `country`, `city`, `citizenship`, `type_of_diploma`, `diploma_date`, `final_Grade`, `marrital_status`, `desired_major`, `first_time_applicant`, `learning_disability`, `career_aspirations`, `scholarship`, `guardian_one_name`, `guardian_one_life`, `guardian_one_relationship`, `guardian_one_phone_number`, `guardian_one_email`, `guardian_one_education`, `guardian_one_employer`, `guardian_one_job_title`, `guardian_two_name`, `guardian_two_life`, `guardian_two_relationship`, `guardian_two_phone_number`, `guardian_two_email`, `guardian_two_education`, `guardian_two_employer`, `guardian_two_job_title`, `essay_question`, `essay_answer`, `source`, `status`, `family_at_adu`, `other_applications`, `national_exam_file`, `final_grades_file`, `transcripts_file`, `identity_file`, `letter_file`, `scholarship_file`) VALUES (NULL, '$email', '$password', '$firstName', '$lastName','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')"
);
$_SESSION['check'] = "checkpassed1lI";
header('location:signupcompleted.php');
} else {
	        $_SESSION['emailalreadytaken'] = True;
        	header('location:signup.php');
}

?>