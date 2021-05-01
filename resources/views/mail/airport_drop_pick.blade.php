<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    <h1>Airport Pick Up/Drop Off Request </h1>
    <p>Customer Name : {{$customer['name']}}</p>
    <p>Customer Email : {{$customer['email']}}</p>
    <p>Customer Phone : {{$customer['phone']}}</p>
    <form action="" style="max-width:600px;">
        <div>
            <label for="">Pick Up Date </label>
            <input style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;" type="text" readonly name="" id="" value="{{$details['check_inDate']}}">
        </div>
        <div>
            <label for="">Pick Up Time</label>
            <input  type="text" readonly name="" id="" value="{{$details['check_inTime']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        <div>
            <label for="">Drop Off Date</label>
            <input type="text" readonly name="" id="" value="{{$details['check_outDate']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        <div>
            <label for="">Drop Off Time</label>
            <input type="text" readonly name="" id="" value="{{$details['check_outTime']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        <div>
            <label for="">Adult Per Room</label>
            <input type="text" readonly name="" id="" value="{{$details['adult_per_room']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        <div>
            <label for="">Child Per Room</label>
            <input type="text" readonly name="" id="" value="{{$details['child_per_room']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        <div>
            <label for="">Infants</label>
            <input type="text" readonly name="" id="" value="{{$details['infants']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        <div>
            <label for="">Name</label>
            <input type="text" readonly name="" id="" value="{{$details['name']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" readonly name="" id="" value="{{$details['email']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        <div>
            <label for="">Phone</label>
            <input type="text" readonly name="" id="" value="{{$details['phone']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        <div>
            <label for="">WhatsApp</label>
            <input type="text" readonly name="" id="" value="{{$details['whatsapp']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        <div>
            <label for="">Message</label>
            <textarea name="" id=""  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">{{$details['message']}}</textarea>
        </div>
    </form>
</body>
</html>