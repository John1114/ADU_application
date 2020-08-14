<?php
// This file should be named user_delete.php
session_start();
$id = $_GET['id'];
$password = $_POST['password'];
include('database_inc.php');
if ($password != "skasowacprofil") {
	$_SESSION['incorrectlogin'] = True;
	header('location:removeProfileConfirm.php');
} else {
	$result = mysqli_query($connect,
            "DELETE FROM `applicants` WHERE `id` = '$id';");
// send user back to users.php
$_SESSION['entryDeleted'] = True;
        header('location:applicants.php'); 
}
