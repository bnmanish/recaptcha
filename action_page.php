<?php


if(isset($_POST['submit'])){

	// token sent by form when recaptcha checked
	$recaptcha = $_POST['g-recaptcha-response'];
	$SECRET_KEY="SECRET_KEY";
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