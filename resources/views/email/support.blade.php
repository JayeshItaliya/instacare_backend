<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>

<body style="font-family: Arial, sans-serif;background-color: #f1f1f1;margin: 0;padding: 0;">
    <div
        style="max-width: 500px;margin: 0 auto;padding: 20px;background-color: #ffffff;border-radius: 5px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <div style="text-align: center;margin-bottom: 20px;">
            <img src="{{ Helper::image_path('logo.svg') }}" alt="Logo" style="max-width: 150px;">
        </div>
        <div style="padding: 20px;background-color: #f9f9f9;border-radius: 5px;">
            <h2>{{ $reason }}</h2>
            <p>{!! $msg !!}</p>
        </div>
        <div style="margin-top: 20px;text-align: center;">
            © {{ date('Y') }} Instacare. All rights reserved.
        </div>
    </div>
</body>

</html>
