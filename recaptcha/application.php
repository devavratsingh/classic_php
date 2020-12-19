<?php
if($_POST)
{
require('constant.php');
    
    $user_name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $phonenumber = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
    $postapply = filter_var($_POST["postapply"], FILTER_SANITIZE_STRING);
    $taxfile = filter_var($_POST["tax_file"], FILTER_SANITIZE_STRING);
    
    if(empty($user_name)) {
		$empty[] = "<b>Name</b>";		
	}
	if(empty($phonenumber)) {
		$empty[] = "<b>Phone Number</b>";		
	}
	if(empty($email)) {
		$empty[] = "<b>Email Address</b>";		
	}
	if(empty($postapply)) {
		$empty[] = "<b>Applied Post</b>";		
	}
	if(empty($taxfile)) {
		$empty[] = "<b>Tax File</b>";		
	}

	
	if(!empty($empty)) {
		$output = json_encode(array('type'=>'error', 'text' => implode(", ",$empty) . ' Required!'));
        die($output);
	}
	
	if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
	    $output = json_encode(array('type'=>'error', 'text' => '<b>'.$user_email.'</b> is an invalid Email, please correct it.'));
		die($output);
	}
	
	//reCAPTCHA validation
	if (isset($_POST['g-recaptcha-response'])) {
		
		require('component/recaptcha/src/autoload.php');		
		
		$recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY);

		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		  if (!$resp->isSuccess()) {
				$output = json_encode(array('type'=>'error', 'text' => '<b>Captcha</b> Validation Required!'));
				die($output);				
		  }	
	}
	
	$toEmail = "socialmecpl@mecpl.com";
	$mailHeaders = "MIME-Version: 1.0" . "\r\n";
    $mailHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
    $mailHeaders .= "From: <" . $user_email . ">\r\n";
    $mailHeaders .= 'Cc: socialmecpl@gmail.com' . "\r\n";
	$mailHeaders  = "Content-Type: text/html; charset=ISO-8859-1rn";
	$mailBody='<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
            <tr>
                <td align="left" style="font:Open Sans, sans-serif; font-size:12px; color:#175293; font-weight:bold;">Dear Administrator</td>
            </tr>

			<tr><td>&nbsp;</td></tr>

			 				 <tr>
                <td align="left" style="font:Arial, Helvetica, sans-serif;font-size:12px;color:#175293; font-weight:bold;">You have received inquiry From:-'.$user_name.'</td>
              </tr>

			   <tr><td>&nbsp;</td></tr>

							 <tr>
                <td align="left" style="font:Arial, Helvetica, sans-serif;font-size:12px;color:#175293; font-weight:bold;">Details are as follows.</td>
              </tr>

              <tr><td>&nbsp;</td></tr>

              <tr>';

						     $mailBody.='<td><table width="100%" border="0" cellspacing="2" cellpadding="2">
								 <tr>
                    <td width="24%"><strong>Name :</strong></td>
                    <td width="76%" align="left">'.$user_name.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>Phone Number :</strong></td>
                    <td width="76%" align="left">'.$phonenumber.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>Email Address :</strong></td>
                    <td width="76%" align="left">'.$email.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>City :</strong></td>
                    <td width="76%" align="left">'.$postapply.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>Zip :</strong></td>
                    <td width="76%" align="left">'.$taxfile.'</td>
                  </tr>';
								$mailBody.='</table>
						</td>
          </tr>
	<tr><td>&nbsp;</td></tr>

</table>';

	if (mail($toEmail, "Application Email", $mailBody, $mailHeaders)) {
	    $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_name .', thank you for the comments. We will get back to you shortly.'));
	    die($output);
	} else {
	    $output = json_encode(array('type'=>'error', 'text' => 'Unable to send email, please contact'.SENDER_EMAIL));
	    die($output);
	}
}
?>