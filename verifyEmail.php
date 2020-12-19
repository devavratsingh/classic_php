<?php
// include Function file
include_once('User.php');
// Object creation
$user=new User();

// Getting Post value
$uemail= $_POST["email"]; 
// Calling function
$rows=$user->checkNumRows($uemail);

if($rows > 0)
{
echo "<span style='color:red'> Email already associated with another account .</span>";
echo "<script>$('#submit').prop('disabled',true);</script>";
} else{

echo "<span style='color:green'> Email available for Registration .</span>";
echo "<script>$('#submit').prop('disabled',false);</script>";
}?>