<?php
session_start();
include('database_inc.php');
$reviewer_name = str_replace("'", "\\'", $_POST['reviewer_name']);
$applicant_name = str_replace("'", "\\'", $_POST['applicant_name']);
$review_capacity = str_replace("'", "\\'", $_POST['review_capacity']);
$review_commitment = str_replace("'", "\\'", $_POST['review_commitment']);
$review_quality = str_replace("'", "\\'", $_POST['review_quality']);
$review_scholarship = str_replace("'", "\\'", $_POST['review_scholarship']);
$final_grade = (int)$review_capacity + (int)$review_commitment + (int)$review_quality;
date_default_timezone_set("Africa/Niamey");
$date = date("d") . "/" . date("M") . "/" . date("Y") . "-" . date("H:i:s");
// echo "$reviewerName";
// echo "$applicantName";
// echo "$comments";
// echo "$finalGrade";

$result = mysqli_query($connect,
    "INSERT INTO `reviews` 
    (`id`, `reviewer_name`, `applicant_name`, `review_capacity`, `review_commitment`, `review_quality`, `review_scholarship`, `final_grade`, `date`) 
    VALUES (NULL, '$reviewer_name', '$applicant_name', '$review_capacity', '$review_commitment', '$review_quality', '$review_scholarship', '$final_grade', '$date');"
);
$_SESSION['reviewSubmitted'] = True;
header('location:home.php');
?>