<?php
// This file should be named user_delete.php
session_start();
$id = $_GET['id'];
include('database_inc.php');
$result = mysqli_query($connect,
            "DELETE FROM `reviews` WHERE `id` = '$id';");
// send user back to users.php
$_SESSION['entryDeleted'] = True;
        header('location:admin.php'); 