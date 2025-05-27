<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #EAB308;
            color: #000;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('images/abm-logo.svg') }}" alt="ABM Logo" class="logo">
        <h1>Reset Your Password</h1>
    </div>

    <div class="content">
        <p>Hello,</p>
        <p>You are receiving this email because we received a password reset request for your account.</p>
        <p>Click the button below to reset your password:</p>
        
        <div style="text-align: center;">
            <a href="{{ $resetLink }}" class="button">
                Reset Password
            </a>
        </div>

        <p>If you did not request a password reset, no further action is required.</p>
        <p>This password reset link will expire in 60 minutes.</p>
    </div>

    <div class="footer">
        <p>If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:</p>
        <p>{{ $resetLink }}</p>
        <hr>
        <p>&copy; {{ date('Y') }} ABM Kedah. All rights reserved.</p>
    </div>
</body>
</html> 