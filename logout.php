<?php 
session_start();
include_once 'User.php';
$user = new User();
$user->logout();
header("location:index.php");

?>