<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    <h1>Contact </h1>
    <form action="" style="max-width:600px;">
        <div>
            <label for="">Name</label>
            <input type="text" readonly name="" id="" value="{{$details['name']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" readonly name="" id="" value="{{$details['email']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        
        <div>
            <label for="">Subject</label>
            <input type="text" readonly name="" id="" value="{{$details['subject']}}"  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
        </div>
        <div>
            <label for="">Message</label>
            <textarea name="" id=""  style="display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">{{$details['message']}}</textarea>
        </div>
    </form>
</body>
</html>