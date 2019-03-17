<?php

require "../config.php";
session_start();
$id = $_SESSION['user']['id'];
$sql = "Update users set isLoggedIn = false where id ='$id'";
mysqli_query($conn,$sql);
session_destroy();
header('location:../login.php');
?>