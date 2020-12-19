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
    $countries = array
	(
		'AF' => 'Afghanistan',
		'AX' => 'Aland Islands',
		'AL' => 'Albania',
		'DZ' => 'Algeria',
		'AS' => 'American Samoa',
		'AD' => 'Andorra',
		'AO' => 'Angola',
		'AI' => 'Anguilla',
		'AQ' => 'Antarctica',
		'AG' => 'Antigua And Barbuda',
		'AR' => 'Argentina',
		'AM' => 'Armenia',
		'AW' => 'Aruba',
		'AU' => 'Australia',
		'AT' => 'Austria',
		'AZ' => 'Azerbaijan',
		'BS' => 'Bahamas',
		'BH' => 'Bahrain',
		'BD' => 'Bangladesh',
		'BB' => 'Barbados',
		'BY' => 'Belarus',
		'BE' => 'Belgium',
		'BZ' => 'Belize',
		'BJ' => 'Benin',
		'BM' => 'Bermuda',
		'BT' => 'Bhutan',
		'BO' => 'Bolivia',
		'BA' => 'Bosnia And Herzegovina',
		'BW' => 'Botswana',
		'BV' => 'Bouvet Island',
		'BR' => 'Brazil',
		'IO' => 'British Indian Ocean Territory',
		'BN' => 'Brunei Darussalam',
		'BG' => 'Bulgaria',
		'BF' => 'Burkina Faso',
		'BI' => 'Burundi',
		'KH' => 'Cambodia',
		'CM' => 'Cameroon',
		'CA' => 'Canada',
		'CV' => 'Cape Verde',
		'KY' => 'Cayman Islands',
		'CF' => 'Central African Republic',
		'TD' => 'Chad',
		'CL' => 'Chile',
		'CN' => 'China',
		'CX' => 'Christmas Island',
		'CC' => 'Cocos (Keeling) Islands',
		'CO' => 'Colombia',
		'KM' => 'Comoros',
		'CG' => 'Congo',
		'CD' => 'Congo, Democratic Republic',
		'CK' => 'Cook Islands',
		'CR' => 'Costa Rica',
		'CI' => 'Cote D\'Ivoire',
		'HR' => 'Croatia',
		'CU' => 'Cuba',
		'CY' => 'Cyprus',
		'CZ' => 'Czech Republic',
		'DK' => 'Denmark',
		'DJ' => 'Djibouti',
		'DM' => 'Dominica',
		'DO' => 'Dominican Republic',
		'EC' => 'Ecuador',
		'EG' => 'Egypt',
		'SV' => 'El Salvador',
		'GQ' => 'Equatorial Guinea',
		'ER' => 'Eritrea',
		'EE' => 'Estonia',
		'ET' => 'Ethiopia',
		'FK' => 'Falkland Islands (Malvinas)',
		'FO' => 'Faroe Islands',
		'FJ' => 'Fiji',
		'FI' => 'Finland',
		'FR' => 'France',
		'GF' => 'French Guiana',
		'PF' => 'French Polynesia',
		'TF' => 'French Southern Territories',
		'GA' => 'Gabon',
		'GM' => 'Gambia',
		'GE' => 'Georgia',
		'DE' => 'Germany',
		'GH' => 'Ghana',
		'GI' => 'Gibraltar',
		'GR' => 'Greece',
		'GL' => 'Greenland',
		'GD' => 'Grenada',
		'GP' => 'Guadeloupe',
		'GU' => 'Guam',
		'GT' => 'Guatemala',
		'GG' => 'Guernsey',
		'GN' => 'Guinea',
		'GW' => 'Guinea-Bissau',
		'GY' => 'Guyana',
		'HT' => 'Haiti',
		'HM' => 'Heard Island & Mcdonald Islands',
		'VA' => 'Holy See (Vatican City State)',
		'HN' => 'Honduras',
		'HK' => 'Hong Kong',
		'HU' => 'Hungary',
		'IS' => 'Iceland',
		'IN' => 'India',
		'ID' => 'Indonesia',
		'IR' => 'Iran, Islamic Republic Of',
		'IQ' => 'Iraq',
		'IE' => 'Ireland',
		'IM' => 'Isle Of Man',
		'IL' => 'Israel',
		'IT' => 'Italy',
		'JM' => 'Jamaica',
		'JP' => 'Japan',
		'JE' => 'Jersey',
		'JO' => 'Jordan',
		'KZ' => 'Kazakhstan',
		'KE' => 'Kenya',
		'KI' => 'Kiribati',
		'KR' => 'Korea',
		'KW' => 'Kuwait',
		'KG' => 'Kyrgyzstan',
		'LA' => 'Lao People\'s Democratic Republic',
		'LV' => 'Latvia',
		'LB' => 'Lebanon',
		'LS' => 'Lesotho',
		'LR' => 'Liberia',
		'LY' => 'Libyan Arab Jamahiriya',
		'LI' => 'Liechtenstein',
		'LT' => 'Lithuania',
		'LU' => 'Luxembourg',
		'MO' => 'Macao',
		'MK' => 'Macedonia',
		'MG' => 'Madagascar',
		'MW' => 'Malawi',
		'MY' => 'Malaysia',
		'MV' => 'Maldives',
		'ML' => 'Mali',
		'MT' => 'Malta',
		'MH' => 'Marshall Islands',
		'MQ' => 'Martinique',
		'MR' => 'Mauritania',
		'MU' => 'Mauritius',
		'YT' => 'Mayotte',
		'MX' => 'Mexico',
		'FM' => 'Micronesia, Federated States Of',
		'MD' => 'Moldova',
		'MC' => 'Monaco',
		'MN' => 'Mongolia',
		'ME' => 'Montenegro',
		'MS' => 'Montserrat',
		'MA' => 'Morocco',
		'MZ' => 'Mozambique',
		'MM' => 'Myanmar',
		'NA' => 'Namibia',
		'NR' => 'Nauru',
		'NP' => 'Nepal',
		'NL' => 'Netherlands',
		'AN' => 'Netherlands Antilles',
		'NC' => 'New Caledonia',
		'NZ' => 'New Zealand',
		'NI' => 'Nicaragua',
		'NE' => 'Niger',
		'NG' => 'Nigeria',
		'NU' => 'Niue',
		'NF' => 'Norfolk Island',
		'MP' => 'Northern Mariana Islands',
		'NO' => 'Norway',
		'OM' => 'Oman',
		'PK' => 'Pakistan',
		'PW' => 'Palau',
		'PS' => 'Palestinian Territory, Occupied',
		'PA' => 'Panama',
		'PG' => 'Papua New Guinea',
		'PY' => 'Paraguay',
		'PE' => 'Peru',
		'PH' => 'Philippines',
		'PN' => 'Pitcairn',
		'PL' => 'Poland',
		'PT' => 'Portugal',
		'PR' => 'Puerto Rico',
		'QA' => 'Qatar',
		'RE' => 'Reunion',
		'RO' => 'Romania',
		'RU' => 'Russian Federation',
		'RW' => 'Rwanda',
		'BL' => 'Saint Barthelemy',
		'SH' => 'Saint Helena',
		'KN' => 'Saint Kitts And Nevis',
		'LC' => 'Saint Lucia',
		'MF' => 'Saint Martin',
		'PM' => 'Saint Pierre And Miquelon',
		'VC' => 'Saint Vincent And Grenadines',
		'WS' => 'Samoa',
		'SM' => 'San Marino',
		'ST' => 'Sao Tome And Principe',
		'SA' => 'Saudi Arabia',
		'SN' => 'Senegal',
		'RS' => 'Serbia',
		'SC' => 'Seychelles',
		'SL' => 'Sierra Leone',
		'SG' => 'Singapore',
		'SK' => 'Slovakia',
		'SI' => 'Slovenia',
		'SB' => 'Solomon Islands',
		'SO' => 'Somalia',
		'ZA' => 'South Africa',
		'GS' => 'South Georgia And Sandwich Isl.',
		'ES' => 'Spain',
		'LK' => 'Sri Lanka',
		'SD' => 'Sudan',
		'SR' => 'Suriname',
		'SJ' => 'Svalbard And Jan Mayen',
		'SZ' => 'Swaziland',
		'SE' => 'Sweden',
		'CH' => 'Switzerland',
		'SY' => 'Syrian Arab Republic',
		'TW' => 'Taiwan',
		'TJ' => 'Tajikistan',
		'TZ' => 'Tanzania',
		'TH' => 'Thailand',
		'TL' => 'Timor-Leste',
		'TG' => 'Togo',
		'TK' => 'Tokelau',
		'TO' => 'Tonga',
		'TT' => 'Trinidad And Tobago',
		'TN' => 'Tunisia',
		'TR' => 'Turkey',
		'TM' => 'Turkmenistan',
		'TC' => 'Turks And Caicos Islands',
		'TV' => 'Tuvalu',
		'UG' => 'Uganda',
		'UA' => 'Ukraine',
		'AE' => 'United Arab Emirates',
		'GB' => 'United Kingdom',
		'US' => 'United States',
		'UM' => 'United States Outlying Islands',
		'UY' => 'Uruguay',
		'UZ' => 'Uzbekistan',
		'VU' => 'Vanuatu',
		'VE' => 'Venezuela',
		'VN' => 'Viet Nam',
		'VG' => 'Virgin Islands, British',
		'VI' => 'Virgin Islands, U.S.',
		'WF' => 'Wallis And Futuna',
		'EH' => 'Western Sahara',
		'YE' => 'Yemen',
		'ZM' => 'Zambia',
		'ZW' => 'Zimbabwe',
	);
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
	global $wpdb;
	$wpdb->insert("wp_location_track", array(
	   "name" => $user_name,
	   "company_name" => $company_name,
	   "company_address" => $phone,
	   "city" => $cityname,
	   "zipcode" => $zipcode,
	   "country_name" => $country,
	   "phone_number" => $phone_number,
	   "fax_number" => $fax_number,
	   "email" => $user_email,
	   "website_link" => $website,
	   "role_details" => $yourrole,
	   "message" => $content
	));
	$toEmail = "socialmecpl@gmail.com";
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