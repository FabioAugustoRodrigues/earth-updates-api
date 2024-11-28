<!DOCTYPE html>
<html>

<head>
    <title>Email Confirmation</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            margin: 10px 0;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Email Confirmation</h1>
        <p>Hello, {{ $subscriber->name }}! Welcome to TerraUpdates Newsletter!</p>

        <p>Click <a href="{{ $app_url }}/api/subscribers/confirm-token/{{ $subscriber->token }}">here</a> to confirm your email.</p>
    </div>
</body>

</html>