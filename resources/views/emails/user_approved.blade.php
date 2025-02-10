<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Approved</title>
</head>
<body style="background-color: #f3f4f6; padding: 20px; font-family: Arial, sans-serif;">
    <table align="center" width="600" style="background: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <!-- Logo -->
        {{-- <tr>
            <td align="center" style="padding-bottom: 20px;">
                <img src="{{ $message->embed(public_path('images/abm-logo.svg')) }}" alt="ABM Logo" style="width: 150px;">

            </td>
        </tr> --}}

        <!-- Title -->
        <tr>
            <td align="center">
                <h2 style="color: #333; font-size: 24px; margin-bottom: 10px;">Congratulations, {{ $username }}! </h2>
                <p style="color: #555; font-size: 16px;">Your application has been approved. You can now access the system.</p>
            </td>
        </tr>

        <!-- Welcome Message and Login Button -->
        <tr>
            <td align="center" style="padding-top: 20px;">
                <h3 style="color: #333; font-size: 20px; margin-bottom: 10px;">Welcome to the ABMK Family, {{ $username }}!</h3>
                <p style="color: #555; font-size: 16px; margin-bottom: 20px;">We are thrilled to have you on board. Enjoy your journey with us!</p>
                <a href="{{ url('/login') }}" style="background: #4CAF50; color: white; text-decoration: none; padding: 12px 20px; border-radius: 5px; font-size: 16px; display: inline-block;">
                    Log In
                </a>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td align="center" style="padding-top: 30px;">
                <p style="color: #888; font-size: 14px;">If you have any questions, please contact support.</p>
                <p style="color: #888; font-size: 14px;">&copy; {{ date('Y') }} ABM Kedah. All rights reserved.</p>
            </td>
        </tr>
    </table>
</body>
</html>
