<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 30px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-height: 60px;
        }
        .header {
            text-align: center;
        }
        .header h2 {
            color: #0b7bcc;
            margin-bottom: 5px;
        }
        .content {
            font-size: 16px;
            line-height: 1.6;
            margin-top: 20px;
            color: #333;
        }
        .verification-code {
            background-color: #f0f6fb;
            border: 1px dashed #0b7bcc;
            text-align: center;
            font-size: 24px;
            padding: 15px;
            margin: 20px 0;
            font-weight: bold;
            color: #0b7bcc;
            border-radius: 6px;
            letter-spacing: 3px;
        }
        .footer {
            text-align: center;
            font-size: 13px;
            color: #777;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<div class="email-container">
    <!-- Logo -->
    <div class="logo">
        <a href="{{ url('/') }}">
            <img src="https://i.ibb.co/Q3bj8CSn/LOGO-removebg-preview.png" alt="Hospital Logo" border="0">
        </a>
    </div>

    <!-- Header -->
    <div class="header">
        <h2>Welcome to Omnisana Hospital!</h2>
        <p>We’re excited to have you on board 🎉</p>
    </div>

    <!-- Content -->
    <div class="content">
        <p>
            Thank you for registering with <strong>Omnisana Hospital</strong>.  
            Your account will give you access to our hospital management system,  
            where you can manage appointments, patient information, and more.
        </p>

        <p>
            To complete your registration, please verify your email address by using the code below:
        </p>

        <div class="verification-code">
            {{ $otp_code }}
        </div>

        <p>
            This code will expire in <strong>{{ $expiresIn ?? '5 minutes' }}</strong>.  
            If you didn’t create this account, kindly ignore this message.
        </p>

        <p>
            We look forward to supporting you and ensuring you get the best out of our platform.
        </p>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; {{ date('Y') }} Omnisana Hospital. All rights reserved.
    </div>
</div>

</body>
</html>
