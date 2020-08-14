<?php
session_start();
include('database_inc.php');
$id = $_GET['id'];
$reviewer_name = str_replace("'", "\\'", $_POST['reviewer_name']);
$applicant_name = str_replace("'", "\\'", $_POST['applicant_name']);
$review_capacity = str_replace("'", "\\'", $_POST['review_capacity']);
$review_commitment = str_replace("'", "\\'", $_POST['review_commitment']);
$review_quality = str_replace("'", "\\'", $_POST['review_quality']);
$review_scholarship = str_replace("'", "\\'", $_POST['review_scholarship']);
$final_grade = (int)$review_capacity + (int)$review_commitment + (int)$review_quality;
date_default_timezone_set("Africa/Niamey");
$date = date("d") . "/" . date("M") . "/" . date("Y") . "-" . date("H:i:s");

$result = mysqli_query($connect,
"UPDATE `reviews` SET `reviewer_name` = '$reviewer_name', `applicant_name` = '$applicant_name', `review_capacity` = '$review_capacity', `review_commitment` = '$review_commitment' , `review_quality` = '$review_quality' , `review_scholarship` = '$review_scholarship', `final_grade` = '$final_grade' WHERE `id` = '$id';");
$_SESSION['entryEdited'] = True;
header('location:admin.php');
// $result = mysqli_query($connect,
// "INSERT INTO `offers` 
// (`id`, `organization`, `job_title`, `job_description`, `location`, `start_date`, `end_date`, `job_function`, `required_languages`, `required_computer_skills`, `required_travel`, `number_of_openings`, `additional_notes`) 
// VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);"
// );
?>