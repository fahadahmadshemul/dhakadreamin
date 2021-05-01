<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    
    <h3>Customer Name : {{$customer->name}}</h3>
    <h3>Customer Email : {{$customer->email}}</h3>
    <h3>Customer Phone : {{$customer->phone}}</h3>
    <h3>Room No : {{$room_no}}</h3>
    <table style="border: 1px solid #000">
        <thead>
          <tr>
            <th scope="col">Serial</th>
            <th scope="col">Service Category</th>
            <th scope="col">Service Name</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
          @foreach ($cart_collection as $item)
            <tr style="background:#ddd;">
                <th scope="row">{{$i}}</th>
                <td>{{$item->options->service_category_name}}</td>
                <td>{{$item->name}}</td>
            </tr>
            @php
                $i++;
            @endphp
          @endforeach
        </tbody>
    </table>
</body>
</html>