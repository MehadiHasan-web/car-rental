
<!DOCTYPE html>
<html>
<head>
    <title>Your Rental Booking Confirmation</title>
</head>
<body>
    <h1>Thank you for your booking!</h1>
    <p>Dear {{ $rental->user->name }},</p>
    <p>Your rental has been confirmed.</p>
    <p>Details:</p>
    <ul>
        <li>Car: {{ $rental->car->name }}</li>
        <li>Start Date: {{ $rental->start_date }}</li>
        <li>End Date: {{ $rental->end_date }}</li>
        <li>Total Cost: ${{ $rental->total_cost }}</li>
    </ul>
    <p>We look forward to serving you!</p>
</body>
</html>
