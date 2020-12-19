<?php
// include User file
include_once('User.php');
// Object creation
$userdata=new User();
    // Your code here to handle a successful verification
    if(isset($_POST['submit']))
    {
    require('recaptcha/constant.php');
    // Posted Values
    $fname=$_POST['firstName'];
    $lname=$_POST['lastName'];
    $uname=$_POST['userName'];
    $uemail=$_POST['emailAddress'];
    $upass=md5($_POST['password']);
    //reCAPTCHA validation
	if (isset($_POST['g-recaptcha-response'])) {
		
		require('recaptcha/component/recaptcha/src/autoload.php');		
		
		$recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY);

		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
		  if (!$resp->isSuccess()) {
				$output = json_encode(array('type'=>'error', 'text' => '<b>Captcha</b> Validation Required!', 'out' => $_POST['g-recaptcha-response'], 'remote-add' => $_SERVER['REMOTE_ADDR']));
				die($output);				
		  }	
	}
    //Function Calling
    $sql=$userdata->registerUser($fname,$lname,$uname, $uemail,$upass);
    if($sql)
    {
    // Message for successfull insertion
    echo "<script>alert('Registration successfull.');</script>";
    echo "<script>window.location.href='login.php'</script>";
    }
    else
    {
    // Message for unsuccessfull insertion
    echo "<script>window.location.href='register.php'</script>";
    }
    }

?>
