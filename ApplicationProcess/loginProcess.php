<?php
session_start();
include('database_inc.php');
$email = str_replace("'", "\\'", $_POST['email']);
$password = str_replace("'", "\\'", $_POST['password']);
if($password == "") {
    header('location:login.php');
}
if ($email == "1@1" & $password == "1") {
    $_SESSION['readytogo'] = True;
    $_SESSION['applicantEmail'] = $email;        
    $_SESSION['applicantid'] = $row['id'];
    header('location:application.php');
}
// echo "$reviewerName";
// echo "$applicantName";
// echo "$comments";
// echo "$finalGrade";
$result = mysqli_query($connect,
    "SELECT * FROM applicants WHERE email = '$email';");
if (mysqli_num_rows($result) == 0) {
    $_SESSION['incorrectlogin'] = True;
    header('location:login.php');
}
    while ($row = mysqli_fetch_array($result)) {
        if ($row['password'] == $password)
    { 
        $_SESSION['readytogo'] = True;
        $_SESSION['applicantEmail'] = $email;
        $_SESSION['applicantid'] = $row['id'];
        header('location:application.php');
    } else {
        $_SESSION['incorrectlogin'] = True;
    header('location:login.php');
    }
}
?>