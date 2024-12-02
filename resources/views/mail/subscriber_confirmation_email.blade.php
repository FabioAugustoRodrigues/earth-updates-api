<!DOCTYPE html>
<html>

<head>
    <title>Email Confirmation</title>

    <style>
        body {
            font-family: 'Verdana', sans-serif;
            line-height: 1.6;
            color: #444;
            background-color: #e9f0f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 70%;
            max-width: 500px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #33c9a6;
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            margin: 15px 0;
            font-size: 16px;
        }

        a {
            color: #33c9a6;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #33c9a6;
            padding: 10px 20px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #33c9a6;
            color: white;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Email Confirmation</h1>
        <p>Hello, {{ $subscriber->name }}! Welcome to TerraUpdates Newsletter!</p>
        <p>To confirm your email address and get started, click the button below:</p>
        <p><a href="{{ $app_url }}/api/subscribers/confirm-token/{{ $subscriber->token }}">Confirm Email</a></p>

        <div class="footer">
            <p>If you didn't sign up, ignore this email.</p>
        </div>
    </div>
</body>

</html>
