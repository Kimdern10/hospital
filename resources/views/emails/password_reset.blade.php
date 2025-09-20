<!-- resources/views/emails/password_reset.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
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
            <img src="https://i.ibb.co/Q3bj8CSn/LOGO-removebg-preview.png" 
                 alt="Hospital Logo" 
                 width="160" 
                 height="80" 
                 style="display:block; border:0;">
        </a>
    </div>

    <!-- Header -->
    <div class="header">
        <h2>Password Reset Request</h2>
        <p>We received a request to reset your password</p>
    </div>

    <!-- Content -->
    <div class="content">
        <p>
            Hi{{ isset($name) ? ' ' . e($name) : '' }},  
            You requested to reset your <strong>Omnisana Hospital</strong> account password.  
            Use the code below to reset it:
        </p>

        <div class="verification-code">
            {{ $code ?? '------' }}
        </div>

        <p>
            This code will expire in <strong>{{ $expiresIn ?? '5 minutes' }}</strong>.  
            Please do not share this code with anyone.
        </p>

        <p>
            If you didn’t request this password reset, please ignore this email or contact support immediately.
        </p>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; {{ date('Y') }} Omnisana Hospital. All rights reserved.
    </div>
</div>

</body>
</html>
