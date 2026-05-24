<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invisible reCAPTCHA Demo</title>

    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#0f172a;
        }

        .box{
            width:400px;
            background:#1e293b;
            padding:35px;
            border-radius:20px;
            color:white;
            box-shadow:0 10px 30px rgba(0,0,0,0.4);
        }

        h2{
            margin-bottom:10px;
            font-size:28px;
        }

        p{
            color:#cbd5e1;
            font-size:14px;
            margin-bottom:20px;
            line-height:1.6;
        }

        input{
            width:100%;
            padding:14px;
            margin-bottom:15px;
            border:none;
            border-radius:10px;
            background:#334155;
            color:white;
            outline:none;
            font-size:15px;
        }

        input::placeholder{
            color:#cbd5e1;
        }

        input:focus{
            border:1px solid #38bdf8;
        }

        .error{
            color:#f87171;
            font-size:13px;
            margin-top:-10px;
            margin-bottom:12px;
            display:none;
        }

        button{
            width:100%;
            padding:14px;
            border:none;
            border-radius:10px;
            background:#3b82f6;
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#2563eb;
        }

        .footer{
            margin-top:18px;
            text-align:center;
            font-size:12px;
            color:#94a3b8;
        }

        .demo-badge{
            display:inline-block;
            padding:6px 14px;
            background:#f59e0b;
            color:#111827;
            font-weight:bold;
            border-radius:50px;
            font-size:13px;
            margin-bottom:15px;
        }

        h1{
            font-size:28px;
            margin-bottom:10px;
        }

        .code-note{
            margin-top:18px;
            background:rgba(255,255,255,0.08);
            padding:12px;
            border-radius:10px;
            font-size:13px;
            color:#e2e8f0;
            line-height:1.6;
        }

    </style>

</head>
<body>

    <div class="box">

        <div class="demo-badge">
            DEMO PAGE
        </div>

        <h1>Google invisible reCAPTCHA v2 Integration</h1>

        <p class="subtitle">
            This is a simple demo page showing how to implement Google reCAPTCHA in a PHP form to protect against bots and spam submissions.
        </p>

        <form id="demoForm" action="action_page.php" method="POST">

            <!-- Name -->

            <input
                type="text"
                id="name"
                name="name"
                placeholder="Enter Name"
            >

            <div id="nameError" class="error">
                Please enter your name
            </div>

            <!-- Email -->

            <input
                type="email"
                id="email"
                name="email"
                placeholder="Enter Email"
            >

            <div id="emailError" class="error">
                Please enter valid email
            </div>

            <!-- Invisible reCAPTCHA Button -->

            <button
                class="g-recaptcha"
                data-sitekey="YOUR_SITE_KEY"
                data-callback="onSubmit"
                data-action="submit">

                Submit Form

            </button>

        </form>

        <div class="code-note">
            <strong>Important:</strong><br>
            Replace <b>YOUR_SITE_KEY</b> with your actual Google reCAPTCHA Site Key.
            <br><br>
            In your <b>action_page.php</b> file, verify the CAPTCHA using your Secret Key.
        </div>

    </div>

    <script>

        function validateForm() {

            let isValid = true;

            let name =
                document.getElementById("name").value.trim();

            let email =
                document.getElementById("email").value.trim();

            let nameError =
                document.getElementById("nameError");

            let emailError =
                document.getElementById("emailError");

            // Hide previous errors
            nameError.style.display = "none";
            emailError.style.display = "none";

            // Name Validation
            if(name === ""){

                nameError.style.display = "block";

                isValid = false;
            }

            // Email Validation
            let emailPattern =
                /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if(email === ""){

                emailError.innerHTML =
                    "Please enter email";

                emailError.style.display = "block";

                isValid = false;

            }else if(!emailPattern.test(email)){

                emailError.innerHTML =
                    "Please enter valid email";

                emailError.style.display = "block";

                isValid = false;
            }

            return isValid;
        }

        function onSubmit(token) {

            if(validateForm()){

                document.getElementById("demoForm").submit();

            }else{

                grecaptcha.reset();
            }
        }

    </script>

</body>
</html>