<?php
session_start();
include('database_inc.php');
$email = $_SESSION['applicantEmail'];
if ($email == "") {
	header('location:loginorsignup.php');
}

$uploadfileOne = $uploaddir . basename($_FILES['nationalExamUpload']['name']);
$imageFileTypeOne = strtolower(pathinfo($uploadfileOne,PATHINFO_EXTENSION));
echo $imageFileTypeOne;
$uploadfileTwo = $uploaddir . basename($_FILES['finalGradesUpload']['name']);
$imageFileTypeTwo = strtolower(pathinfo($uploadfileTwo,PATHINFO_EXTENSION));
echo $imageFileTypeTwo;
$uploadfileThree = $uploaddir . basename($_FILES['transcriptsUpload']['name']);
$imageFileTypeThree = strtolower(pathinfo($uploadfileThree,PATHINFO_EXTENSION));
echo $imageFileTypeThree;
$uploadfileFour = $uploaddir . basename($_FILES['idUpload']['name']);
$imageFileTypeFour = strtolower(pathinfo($uploadfileFour,PATHINFO_EXTENSION));
echo $imageFileTypeFour;
$uploadfileFive = $uploaddir . basename($_FILES['letterUpload']['name']);
$imageFileTypeFive = strtolower(pathinfo($uploadfileFive,PATHINFO_EXTENSION));
echo $imageFileTypeFive;
$uploadfileSix = $uploaddir . basename($_FILES['scholarshipUpload']['name']);
$imageFileTypeSix = strtolower(pathinfo($uploadfileSix,PATHINFO_EXTENSION));
echo $imageFileTypeSix;
	if ($imageFileTypeOne != "jpg" && $imageFileTypeOne != "png" && $imageFileTypeOne != "pdf" && $imageFileTypeOne != "") {
		$_SESSION['readytogo'] = True;
		$_SESSION['wrongfiletype'] = True;
		$_SESSION['applicantEmail'] = $email;
		header('location:application.php');
	} else if ($imageFileTypeTwo != "jpg" && $imageFileTypeTwo != "png" && $imageFileTypeTwo != "pdf" && $imageFileTypeTwo != "") {
		$_SESSION['readytogo'] = True;
		$_SESSION['wrongfiletype'] = True;
		$_SESSION['applicantEmail'] = $email;
		header('location:application.php');
	} else if ($imageFileTypeThree != "jpg" && $imageFileTypeThree != "png" && $imageFileTypeThree != "pdf" && $imageFileTypeThree != "") {
		$_SESSION['readytogo'] = True;
		$_SESSION['wrongfiletype'] = True;
		$_SESSION['applicantEmail'] = $email;
		header('location:application.php');
	} else if ($imageFileTypeFour != "jpg" && $imageFileTypeFour != "png" && $imageFileTypeFour != "pdf" && $imageFileTypeFour != "") {
		$_SESSION['readytogo'] = True;
		$_SESSION['wrongfiletype'] = True;
		$_SESSION['applicantEmail'] = $email;
		header('location:application.php');
	} else if ($imageFileTypeFive != "jpg" && $imageFileTypeFive != "png" && $imageFileTypeFive != "pdf" && $imageFileTypeFive != "") {
		$_SESSION['readytogo'] = True;
		$_SESSION['wrongfiletype'] = True;
		$_SESSION['applicantEmail'] = $email;
		header('location:application.php');
	} else if ($imageFileTypeSix != "jpg" && $imageFileTypeSix != "png" && $imageFileTypeSix != "pdf" && $imageFileTypeSix != "") {
		$_SESSION['readytogo'] = True;
		$_SESSION['wrongfiletype'] = True;
		$_SESSION['applicantEmail'] = $email;
		header('location:application.php');
	} else if ($_FILES['nationalExamUpload']['size'] > 5242880) {
		$_SESSION['readytogo'] = True;
		$_SESSION['filetobig'] = True;
		$_SESSION['applicantEmail'] = $email;
		header('location:application.php');
	} else if ($_FILES['finalGradesUpload']['size'] > 5242880) {
		$_SESSION['readytogo'] = True;
		$_SESSION['filetobig'] = True;
		$_SESSION['applicantEmail'] = $email;
		header('location:application.php');
	} else if ($_FILES['transcriptsUpload']['size'] > 5242880) {
		$_SESSION['readytogo'] = True;
		$_SESSION['filetobig'] = True;
		$_SESSION['applicantEmail'] = $email;
		header('location:application.php');
	} else if ($_FILES['idUpload']['size'] > 5242880) {
		$_SESSION['readytogo'] = True;
		$_SESSION['filetobig'] = True;
		$_SESSION['applicantEmail'] = $email;
		header('location:application.php');
	} else if ($_FILES['letterUpload']['size'] > 5242880) {
		$_SESSION['readytogo'] = True;
		$_SESSION['filetobig'] = True;
		$_SESSION['applicantEmail'] = $email;
		header('location:application.php');
	} else if ($_FILES['scholarshipUpload']['size'] > 5242880) {
		$_SESSION['readytogo'] = True;
		$_SESSION['filetobig'] = True;
		$_SESSION['applicantEmail'] = $email;
		header('location:application.php');
	}


else {
$citizenship = str_replace("'", "\\'", $_POST['citizenship']);
$country_code = str_replace("'", "\\'", $_POST['country_code']);
$contact_number = str_replace("'", "\\'", $_POST['contact_number']);
$date_of_birth = str_replace("'", "\\'", $_POST['date_of_birth']);
$gender = str_replace("'", "\\'", $_POST['gender']);
$marrital_status = str_replace("'", "\\'", $_POST['marrital_status']);
$country = str_replace("'", "\\'", $_POST['country']);
$city = str_replace("'", "\\'", $_POST['city']);
$type_of_diploma = str_replace("'", "\\'", $_POST['type_of_diploma']);
$diploma_date = str_replace("'", "\\'", $_POST['diploma_date']);
$final_Grade = str_replace("'", "\\'", $_POST['final_Grade']);
$desired_major = str_replace("'", "\\'", $_POST['desired_major']);
$first_time_applicant = str_replace("'", "\\'", $_POST['first_time_applicant']);
$learning_disability = str_replace("'", "\\'", $_POST['learning_disability']);
$career_aspirations = str_replace("'", "\\'", $_POST['career_aspirations']);
$guardian_one_name = str_replace("'", "\\'", $_POST['guardian_one_name']);
$guardian_one_life = str_replace("'", "\\'", $_POST['guardian_one_life']);
$guardian_one_relationship = str_replace("'", "\\'", $_POST['guardian_one_relationship']);
$guardian_one_phone_number = str_replace("'", "\\'", $_POST['guardian_one_phone_number']);
$guardian_one_email = str_replace("'", "\\'", $_POST['guardian_one_email']);
$guardian_one_education = str_replace("'", "\\'", $_POST['guardian_one_education']);
$guardian_one_employer = str_replace("'", "\\'", $_POST['guardian_one_employer']);
$guardian_one_job_title = str_replace("'", "\\'", $_POST['guardian_one_job_title']);
$guardian_two_name = str_replace("'", "\\'", $_POST['guardian_two_name']);
$guardian_two_life = str_replace("'", "\\'", $_POST['guardian_two_life']);
$guardian_two_relationship = str_replace("'", "\\'", $_POST['guardian_two_relationship']);
$guardian_two_phone_number = str_replace("'", "\\'", $_POST['guardian_two_phone_number']);
$guardian_two_email = str_replace("'", "\\'", $_POST['guardian_two_email']);
$guardian_two_education = str_replace("'", "\\'", $_POST['guardian_two_education']);
$guardian_two_employer = str_replace("'", "\\'", $_POST['guardian_two_employer']);
$guardian_two_job_title = str_replace("'", "\\'", $_POST['guardian_two_job_title']);
$scholarship = str_replace("'", "\\'", $_POST['scholarship']);
$other_applications = str_replace("'", "\\'", $_POST['other_applications']);
$essay_answer = str_replace("'", "\\'",$_POST['essay_answer']);
$source = str_replace("'", "\\'", $_POST['source']);
$family_at_adu = str_replace("'", "\\'", $_POST['family_at_adu']);


$uploaddir  = "/home/virtuals/ilimi.org/applications/uploads/";

$result3 = mysqli_query($connect,
    "SELECT * FROM applicants WHERE email = '$email';");
		while ($row = mysqli_fetch_array($result3)) {
$id = $row['id'];

if (basename($_FILES['nationalExamUpload']['name']) != "") {

//$uploadfileOne = $uploaddir . basename($_FILES['nationalExamUpload']['name']);
echo "uploadFile:" . $uploadfileOne;
$tmp_nameOne = $_FILES["nationalExamUpload"]["tmp_name"];
echo "tmp_name" . $tmp_nameOne;
//$imageFileTypeOne = strtolower(pathinfo($uploadfileOne,PATHINFO_EXTENSION));
$new_nameOne="NationalExam"."$id".".".$imageFileTypeOne;
$national_exam_file = $new_nameOne;
echo "newname:" . $new_nameOne;
move_uploaded_file($tmp_nameOne, "$uploaddir"."$new_nameOne");

} else if($row['national_exam_file'] != "") {
	$national_exam_file = $row['national_exam_file'];

} 
else {
	$national_exam_file = "";
}

if (basename($_FILES['finalGradesUpload']['name']) != "") {
	
//$uploadfileTwo = $uploaddir . basename($_FILES['finalGradesUpload']['name']);
echo "uploadFile:" . $uploadfileTwo;
$tmp_nameTwo = $_FILES["finalGradesUpload"]["tmp_name"];
echo "tmp_name" . $tmp_nameTwo;
//$imageFileTypeTwo = strtolower(pathinfo($uploadfileTwo,PATHINFO_EXTENSION));
$new_nameTwo="FinalGrades"."$id".".".$imageFileTypeTwo;
$final_grades_file = $new_nameTwo;
echo "newname:" . $new_nameTwo;
move_uploaded_file($tmp_nameTwo, "$uploaddir"."$new_nameTwo");

} else if($row['final_grades_file'] != "") {
	$final_grades_file = $row['final_grades_file'];

} 
else {
	$final_grades_file = "";
}

if (basename($_FILES['transcriptsUpload']['name']) != "") {
	
//$uploadfileThree = $uploaddir . basename($_FILES['transcriptsUpload']['name']);
echo "uploadFile:" . $uploadfileThree;
$tmp_nameThree = $_FILES["transcriptsUpload"]["tmp_name"];
echo "tmp_name" . $tmp_nameThree;
//$imageFileTypeThree = strtolower(pathinfo($uploadfileThree,PATHINFO_EXTENSION));
$new_nameThree="Transcript"."$id".".".$imageFileTypeThree;
$transcripts_file = $new_nameThree;
echo "newname:" . $new_nameThree;
move_uploaded_file($tmp_nameThree, "$uploaddir"."$new_nameThree");

} else if($row['transcripts_file'] != "") {
	$transcripts_file = $row['transcripts_file'];

} 
else {
	$transcripts_file = "";
}

if (basename($_FILES['idUpload']['name']) != "") {
	
//$uploadfileFour = $uploaddir . basename($_FILES['idUpload']['name']);
echo "uploadFile:" . $uploadfileFour;
$tmp_nameFour = $_FILES["idUpload"]["tmp_name"];
echo "tmp_name" . $tmp_nameFour;
//$imageFileTypeFour = strtolower(pathinfo($uploadfileFour,PATHINFO_EXTENSION));
$new_nameFour="ID"."$id".".".$imageFileTypeFour;
$identity_file = $new_nameFour;
echo "newname:" . $new_nameFour;
move_uploaded_file($tmp_nameFour, "$uploaddir"."$new_nameFour");

} else if($row['identity_file'] != "") {
	$identity_file = $row['identity_file'];

} 
else {
	$identity_file = "";
}

if (basename($_FILES['letterUpload']['name']) != "") {
	
//$uploadfileFive = $uploaddir . basename($_FILES['letterUpload']['name']);
echo "uploadFile:" . $uploadfileFive;
$tmp_nameFive = $_FILES["letterUpload"]["tmp_name"];
echo "tmp_name" . $tmp_nameFive;
//$imageFileTypeFive = strtolower(pathinfo($uploadfileFive,PATHINFO_EXTENSION));
$new_nameFive="Letter"."$id".".".$imageFileTypeFive;
$letter_file = $new_nameFive;
echo "newname:" . $new_nameFive;
move_uploaded_file($tmp_nameFive, "$uploaddir"."$new_nameFive");

} else if($row['letter_file'] != "") {
	$letter_file = $row['letter_file'];

} 
else {
	$letter_file = "";
}

if (basename($_FILES['scholarshipUpload']['name']) != "") {
	
//$uploadfileSix = $uploaddir . basename($_FILES['scholarshipUpload']['name']);
echo "uploadFile:" . $uploadfileSix;
$tmp_nameSix = $_FILES["scholarshipUpload"]["tmp_name"];
echo "tmp_name" . $tmp_nameSix;
//$imageFileTypeSix = strtolower(pathinfo($uploadfileSix,PATHINFO_EXTENSION));
$new_nameSix="Scholarship"."$id".".".$imageFileTypeSix;
$scholarship_file = $new_nameSix;
echo "newname:" . $new_nameSix;
move_uploaded_file($tmp_nameSix, "$uploaddir"."$new_nameSix");

} else if($row['scholarship_file'] != "") {
	$scholarship_file = $row['scholarship_file'];

} 
else {
	$scholarship_file = "";
}

}


$result = mysqli_query($connect,
"UPDATE `applicants` 
    SET `contact_number`= '$contact_number' ,`date_of_birth`= '$date_of_birth' ,`gender`= '$gender' ,`country`= '$country' ,`city`= '$city' ,`citizenship`= '$citizenship' ,`type_of_diploma`= '$type_of_diploma' ,`diploma_date`= '$diploma_date' ,`final_Grade`= '$final_Grade' ,`marrital_status`= '$marrital_status' ,`desired_major`= '$desired_major' ,`first_time_applicant`= '$first_time_applicant' ,`learning_disability`= '$learning_disability' ,`career_aspirations`= '$career_aspirations' ,`scholarship`= '$scholarship' ,`guardian_one_name`= '$guardian_one_name' ,`guardian_one_life`= '$guardian_one_life' ,`guardian_one_relationship`= '$guardian_one_relationship' ,`guardian_one_phone_number`= '$guardian_one_phone_number' ,`guardian_one_email`= '$guardian_one_email' ,`guardian_one_education`= '$guardian_one_education' ,`guardian_one_employer`= '$guardian_one_employer' ,`guardian_one_job_title`= '$guardian_one_job_title' ,`guardian_two_name`= '$guardian_two_name' ,`guardian_two_life`= '$guardian_two_life' ,`guardian_two_relationship`= '$guardian_two_relationship' ,`guardian_two_phone_number`= '$guardian_two_phone_number' ,`guardian_two_email`= '$guardian_two_email' ,`guardian_two_education`= '$guardian_two_education' ,`guardian_two_employer`= '$guardian_two_employer' ,`guardian_two_job_title`= '$guardian_two_job_title' ,`essay_answer`= '$essay_answer' ,`source`= '$source' ,`status`= '$status' ,`family_at_adu`= '$family_at_adu' ,`other_applications`= '$other_applications',`national_exam_file`= '$national_exam_file' ,`final_grades_file`= '$final_grades_file' ,`transcripts_file`= '$transcripts_file' ,`identity_file`= '$identity_file' ,`letter_file`= '$letter_file', `scholarship_file`= '$scholarship_file' WHERE `email` = '$email'"
);
$_SESSION['applicationSave'] = True;
$_SESSION['readytogo'] = True;
header('location:application.php');
}
?>