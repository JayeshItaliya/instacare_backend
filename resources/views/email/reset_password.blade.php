<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 150px;
        }

        .content {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #7ED1E6;
            color: #ffffff;
            text-decoration: none;
            border-radius: 3px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="{{ Helper::image_path('logo.svg') }}" alt="Logo">
        </div>
        <div class="content">
            <p>Hi {{ $name }}! Here is your login credentials</p><br>
            <p>Email: <strong>{{ $email }}</strong></p>
            <p>Password: <strong>{{ $password }}</strong></p>
        </div>
        <div class="footer">
            © {{ data('Y') }} Instacare. All rights reserved.
        </div>
    </div>
</body>

</html>
