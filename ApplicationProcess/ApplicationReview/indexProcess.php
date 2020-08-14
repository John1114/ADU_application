<?php
session_start();
$password = str_replace("'", "\\'", $_POST['password']);
if($password == "") {
    $_SESSION['incorrectlogin'] = True;
    header('location:index.php');
} elseif ($password == "polskadroga") {
    $_SESSION['loggedin'] = True;
    header('location:applicants.php');
} else {
    $_SESSION['incorrectlogin'] = True;
    header('location:index.php');
}

?>
