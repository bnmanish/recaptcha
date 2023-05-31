<?php
// SITE KEY : 6LejFFgmAAAAAC68RH3r9jr-Fx3XEFozaAOh_OEM
// SECRET KEY : 6LejFFgmAAAAAEdzi7Qjqki60LaO4kB-RV7GTqQo

if(isset($_POST['submit'])){

	// token sent by form when recaptcha checked
	$recaptcha = $_POST['g-recaptcha-response'];
	$SECRET_KEY="6LejFFgmAAAAAEdzi7Qjqki60LaO4kB-RV7GTqQo";
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=".$SECRET_KEY."&response=".$recaptcha;
	$response = json_decode(file_get_contents($url),true);
	// print_r($response);
	// exit();
	if($response['success']==true){
		echo "reCaptcha verification done";
	}else{
		echo $response['error-codes'][0];
	}

}