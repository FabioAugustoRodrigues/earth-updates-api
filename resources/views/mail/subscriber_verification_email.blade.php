<!DOCTYPE html>
<html>

<head>
    <title>Email Verification</title>

    <link href="{{ url('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Email Verification</h1>
        <p>Hello, {{ $subscriber->name }}! Welcome to TerraUpdates Newsletter!</p>
        <p>To verify your email address and get started, click the button below:</p>

        <a href="{{ $app_url }}/subscribers/{{  $subscriber->email }}/verify/{{ $subscriber->token }}" class="btn-theme">
            Verify Email
        </a>

        <div class="footer">
            <p>If you didn't sign up, ignore this email.</p>
        </div>
    </div>
</body>

</html>