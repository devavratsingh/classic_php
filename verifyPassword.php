<?php
// include Function file
include_once('User.php');
// Object creation
$user=new User();

// Getting Post value
$uPass= md5($_POST["passW"]); 
$uid = $_POST["uid"];
$proFile = $user->getProfile($uid);
if($proFile){
    $userData = mysqli_fetch_array($proFile);
    $savedPass = $userData['user_pass'];
    if($uPass == $savedPass){ ?>
        <div class="valid-tooltip" style="display: block;">
            Your Old Password is Correct.
        </div>
    <?php
    } else { ?>
        <div class="invalid-tooltip" style="display: block;">
            Your Old Password is Inorrect.
        </div>
    <?php }
}
?>