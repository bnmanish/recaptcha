<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reCAPTCHA Demo Form</title>

    <!-- Google reCAPTCHA Script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#0f172a,#1e293b,#334155);
            overflow:hidden;
        }

        .background-circle{
            position:absolute;
            border-radius:50%;
            filter:blur(60px);
            opacity:0.4;
        }

        .circle1{
            width:300px;
            height:300px;
            background:#38bdf8;
            top:-50px;
            left:-50px;
        }

        .circle2{
            width:250px;
            height:250px;
            background:#8b5cf6;
            bottom:-50px;
            right:-50px;
        }

        .container{
            width:420px;
            background:rgba(255,255,255,0.08);
            border:1px solid rgba(255,255,255,0.15);
            backdrop-filter:blur(15px);
            border-radius:20px;
            padding:35px;
            color:#fff;
            position:relative;
            z-index:2;
            box-shadow:0 10px 30px rgba(0,0,0,0.4);
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

        .subtitle{
            font-size:14px;
            color:#cbd5e1;
            margin-bottom:25px;
            line-height:1.6;
        }

        .form-group{
            margin-bottom:18px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-size:14px;
        }

        input{
            width:100%;
            padding:14px;
            border:none;
            border-radius:12px;
            outline:none;
            background:rgba(255,255,255,0.12);
            color:#fff;
            font-size:15px;
        }

        input::placeholder{
            color:#cbd5e1;
        }

        .captcha-box{
            margin:20px 0;
            display:flex;
            justify-content:center;
        }

        button{
            width:100%;
            padding:15px;
            border:none;
            border-radius:12px;
            background:linear-gradient(90deg,#06b6d4,#3b82f6);
            color:white;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s ease;
        }

        button:hover{
            transform:translateY(-2px);
            box-shadow:0 8px 20px rgba(59,130,246,0.4);
        }

        .footer-note{
            margin-top:18px;
            font-size:12px;
            color:#94a3b8;
            text-align:center;
            line-height:1.5;
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

        @media(max-width:480px){
            .container{
                width:92%;
                padding:25px;
            }

            h1{
                font-size:24px;
            }
        }
    </style>
</head>
<body>

    <div class="background-circle circle1"></div>
    <div class="background-circle circle2"></div>

    <div class="container">

        <div class="demo-badge">
            DEMO PAGE
        </div>

        <h1>Google reCAPTCHA v2 Integration</h1>

        <p class="subtitle">
            This is a simple demo page showing how to implement Google reCAPTCHA in a PHP form to protect against bots and spam submissions.
        </p>

        <form action="action_page.php" method="POST">

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="captcha-box">
                <!-- Replace YOUR_SITE_KEY with your Google Site Key -->
                <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
            </div>

            <button type="submit">
                Verify & Submit
            </button>

        </form>

        <div class="code-note">
            <strong>Important:</strong><br>
            Replace <b>YOUR_SITE_KEY</b> with your actual Google reCAPTCHA Site Key.
            <br><br>
            In your <b>action_page.php</b> file, verify the CAPTCHA using your Secret Key.
        </div>

        <div class="footer-note">
            Demo UI for learning reCAPTCHA implementation in PHP.
        </div>

    </div>

</body>
</html>