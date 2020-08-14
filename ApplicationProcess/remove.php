<?php
session_start();
include('database_inc.php');
$email = $_SESSION['applicantEmail'];;
$filetype = $_GET['filetype'];
$fileToDelete = $_GET['file_name'];

if ($email == "") {
	header('location:loginorsignup.php');
}

$result = mysqli_query($connect,
"UPDATE `applicants` 
    SET `$filetype`= ''  WHERE `email` = '$email'"
);

$uploaddir  = "/home/virtuals/ilimi.org/applications/uploads/";
$fileToDelete = $uploaddir . $fileToDelete;
unlink($fileToDelete);


// echo "$reviewerName";
// echo "$applicantName";
// echo "$comments";
// echo "$finalGrade";
$_SESSION['fileremoved'] = True;
$_SESSION['readytogo'] = True;
header('location:application.php');
?>