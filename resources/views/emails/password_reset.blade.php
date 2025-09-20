<!-- resources/views/emails/password_reset.blade.php -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Hospital Password Reset</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    /* simple responsive email-safe styles */
    body { margin:0; padding:0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial; background:#f4f6f8; color:#333; }
    .container { max-width:600px; margin:32px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 18px rgba(0,0,0,0.06); }
    .header { background:#0b7bcc; padding:20px; color:#fff; display:flex; align-items:center; gap:12px; }
    .logo { height:44px; width:auto; }
    .brand { font-size:18px; font-weight:700; }
    .content { padding:24px; }
    .h1 { font-size:20px; margin:0 0 8px 0; }
    .p { margin:0 0 16px 0; line-height:1.5; color:#444; }
    .otp-box { background:#f7f9fc; padding:18px; text-align:center; border-radius:8px; margin:16px 0; }
    .otp { font-size:28px; letter-spacing:4px; font-weight:700; margin:0; }
    .small { font-size:13px; color:#666; margin-top:8px; }
    .btn { display:inline-block; padding:12px 18px; border-radius:6px; background:#0b7bcc; color:#fff; text-decoration:none; font-weight:600; margin-top:12px; }
    .footer { background:#fafafa; padding:16px 24px; font-size:13px; color:#777; text-align:center; }
    @media (max-width:420px) {
      .container { margin:12px; }
      .otp { font-size:22px; }
    }
  </style>
</head>
<body>
  <div class="container" role="article" aria-roledescription="email">
    <div class="header">
      <!-- Replace src with your hospital logo or keep text -->
    <img src="https://i.ibb.co/Q3bj8CSn/LOGO-removebg-preview.png" alt="Hospital Logo" border="0">
      <div>
        <div class="brand">Omnisana Hospital</div>
        <div style="font-size:12px; opacity:0.9;">Account security team</div>
      </div>
    </div>

    <div class="content">
      <h1 class="h1">Password reset code</h1>

      <p class="p">
        Hi{{ isset($name) ? ' ' . e($name) : '' }},<br>
        We received a request to reset the password for your hospital account. Use the code below to continue. This code is valid for <strong>{{ $expiresIn ?? '5 minutes' }}</strong>.
      </p>

      <div class="otp-box" role="region" aria-label="One-time password">
        <!-- Primary OTP display -->
        <p class="otp">{{ $code ?? $body ?? '------' }}</p>
        <p class="small">Please do not share this code with anyone.</p>
      </div>

      <!-- Optional action button: if you have a reset URL include it in $resetUrl -->
      <!-- @if(!empty($resetUrl))
        <p style="text-align:center;">
          <a class="btn" href="{{ $resetUrl }}">Reset my password</a>
        </p>
      @endif -->

      <p class="p">
        If you didn't request a password reset, you can safely ignore this email or contact our support team.
      </p>

      <p class="small">Questions? Reply to this message or contact support at <a href="mailto:{{ $supportEmail ?? 'support@omnisana.example' }}">{{ $supportEmail ?? 'support@omnisana.example' }}</a>.</p>
    </div>

    <div class="footer">
      © {{ date('Y') }} Omnisana Hospital — keeping patient data safe and secure.
    </div>
  </div>
</body>
</html>
