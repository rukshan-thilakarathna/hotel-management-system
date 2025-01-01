<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #ddd; background-color: #ffffff;">
        <!-- Header -->
        <tr>
            <td align="center" bgcolor="#4CAF50" style="padding: 20px 0;">
                <h1 style="color: #ffffff; margin: 0;">Zadok-Enterprises Booking Confirmation</h1>
            </td>
        </tr>

        <!-- Body -->
        <tr>
            <td style="padding: 20px;">
                <p style="font-size: 16px; color: #333333;">
                    Dear <strong>{{ $bookingDetails['user_name'] }}</strong>,
                </p>

                <p style="font-size: 16px; color: #333333;">
                    Your room booking has been successfully confirmed. Below are your booking details:
                </p>

                <table border="0" cellpadding="5" cellspacing="0" width="100%" style="margin: 20px 0; border: 1px solid #ddd;">
                    <tr>
                        <td style="background-color: #f2f2f2; font-weight: bold;">Room ID</td>
                        <td>{{ $bookingDetails['room_id'] }}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #f2f2f2; font-weight: bold;">Check-in</td>
                        <td>{{ $bookingDetails['checkin'] }}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #f2f2f2; font-weight: bold;">Check-out</td>
                        <td>{{ $bookingDetails['checkout'] }}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #f2f2f2; font-weight: bold;">Adults</td>
                        <td>{{ $bookingDetails['adults'] }}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #f2f2f2; font-weight: bold;">Children</td>
                        <td>{{ $bookingDetails['children'] }}</td>
                    </tr>

                    <tr>
                        <td style="background-color: #f2f2f2; font-weight: bold;">Only Room Charge (Without Other Charges)</td>
                        <td>{{ $bookingDetails['Only_room_price'] }} {{ env('CURRENCY') }} </td>
                    </tr>

                </table>

                <p style="font-size: 16px; color: #333333;">
                    If you have any questions or need further assistance, feel free to contact our support team.
                </p>

                <p style="font-size: 16px; color: #333333;">
                    Thank you for choosing <strong>Zadok-Enterprises</strong>. We look forward to serving you!
                </p>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td align="center" bgcolor="#4CAF50" style="padding: 10px; color: #ffffff;">
                <p style="margin: 0; font-size: 14px;">&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
                <p style="margin: 0; font-size: 14px;">
                    Contact Us: <a href="mailto:support@example.com" style="color: #ffffff; text-decoration: underline;">support@example.com</a>
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
