<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $secretKey = "YOUR_SECRET_KEY_HERE";

    $captcha = $_POST['g-recaptcha-response'];

    if (!$captcha) {
        die("Please complete the CAPTCHA.");
    }

    $verifyURL = "https://www.google.com/recaptcha/api/siteverify";

    $data = [
        'secret' => $secretKey,
        'response' => $captcha
    ];

    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);

    $response = file_get_contents($verifyURL, false, $context);

    $responseKeys = json_decode($response, true);

    if ($responseKeys['success']) {

        echo "Form submitted successfully!";

    } else {

        echo "reCAPTCHA verification failed.";

    }
}

?>