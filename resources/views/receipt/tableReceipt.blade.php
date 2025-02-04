<!DOCTYPE html>
<html>
<head>
    <title>Reservation Details</title>
</head>
<body>
    {{-- <h3>Reservation Details</h3> --}}
    <h3>Dear {{ $reservation['username'] }},</h3>
    <p>Thank you for your reservation. Here are the details:</p>
    <ul>
        <li>Reservation ID: {{ $reservation['bookingCode'] }}</li>
        <li>Guests: {{ $reservation['guest'] }}</li>
        <li>Date: {{ $reservation['reservationDate'] }}</li>
        <li>Time: {{ $reservation['reservationTime'] }}</li>
    </ul>
    <p>We look forward to seeing you!</p>
</body>
</html>
