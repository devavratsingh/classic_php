<?php
if($_POST)
{
require('constant.php');
    
    $user_name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $company_name = filter_var($_POST["cname"], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
    $cityname = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
    $zipcode = filter_var($_POST["zip"], FILTER_SANITIZE_STRING);
    $country = filter_var($_POST["country"], FILTER_SANITIZE_STRING);
    $phone_number = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $fax_number = filter_var($_POST["fax"], FILTER_SANITIZE_STRING);
    $user_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $website = filter_var($_POST["website"], FILTER_SANITIZE_STRING);
    $yourrole = filter_var($_POST["yourole"], FILTER_SANITIZE_STRING);
    $content   = filter_var($_POST["content"], FILTER_SANITIZE_STRING);
    
	foreach ($countries as $key => $value) {
		if($key == $country){
			$country = $value;
		}
    }

    if(empty($user_name)) {
		$empty[] = "<b>Name</b>";		
	}
	if(empty($company_name)) {
		$empty[] = "<b>Company Name</b>";		
	}
	if(empty($address)) {
		$empty[] = "<b>Address</b>";		
	}
	if(empty($cityname)) {
		$empty[] = "<b>City Name</b>";		
	}
	if(empty($zipcode)) {
		$empty[] = "<b>Zipcode</b>";		
	}
	if(empty($phone_number)) {
		$empty[] = "<b>Phone Number</b>";		
	}
	if(empty($fax_number)) {
		$empty[] = "<b>Fax Number</b>";		
	}
	if(empty($user_email)) {
		$empty[] = "<b>Email</b>";
	}
	if(empty($website)) {
		$empty[] = "<b>Website</b>";
	}
	if(empty($yourrole)) {
		$empty[] = "<b>Website</b>";
	}
	if(empty($content)) {
		$empty[] = "<b>Description</b>";
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
	
	$toEmail = "sales@mecpl.com";
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
                    <td width="24%"><strong>Company Name :</strong></td>
                    <td width="76%" align="left">'.$company_name.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>Company Address :</strong></td>
                    <td width="76%" align="left">'.$address.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>City :</strong></td>
                    <td width="76%" align="left">'.$cityname.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>Zip :</strong></td>
                    <td width="76%" align="left">'.$zipcode.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>Country :</strong></td>
                    <td width="76%" align="left">'.$country.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>Phone :</strong></td>
                    <td width="76%" align="left">'.$phone_number.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>Fax :</strong></td>
                    <td width="76%" align="left">'.$fax_number.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>Email :</strong></td>
                    <td width="76%" align="left">'.$user_email.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>Website :</strong></td>
                    <td width="76%" align="left">'.$website.'</td>
                  </tr>
									<tr>
                    <td width="24%"><strong>Your Role :</strong></td>
                    <td width="76%" align="left">'.$yourrole.'</td>
                  </tr>
				  <tr>
                    <td width="24%"><strong>Comments :</strong></td>
                    <td width="76%" align="left">'.$content.'</td>
                  </tr>';
								$mailBody.='</table>
						</td>
          </tr>
	<tr><td>&nbsp;</td></tr>

</table>';

	if (mail($toEmail, "Enquiry Mail", $mailBody, $mailHeaders)) {
	    $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_name .', thank you for the comments. We will get back to you shortly.'));
	    die($output);
	} else {
	    $output = json_encode(array('type'=>'error', 'text' => 'Unable to send email, please contact'.SENDER_EMAIL));
	    die($output);
	}
}
?>