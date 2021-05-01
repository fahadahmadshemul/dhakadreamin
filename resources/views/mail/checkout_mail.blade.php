<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    <h1>New Reservation Request for Room Name : {{$details['title']}}</h1>
    <p>Customer Name : {{$details['customer_name']}}</p>
    <p>Customer Email : {{$details['customer_email']}}</p>
    <p>Customer Phone : {{$details['customer_phone']}}</p>
    <p>Check In : {{$details['check_in']}}</p>
    <p>Check Out : {{$details['check_out']}}</p>
    <p>Adult : {{$details['adult']}}</p>
    <p>Child : {{$details['child']}}</p>
    <p>Infants : {{$details['infant']}}</p>
</body>
</html>