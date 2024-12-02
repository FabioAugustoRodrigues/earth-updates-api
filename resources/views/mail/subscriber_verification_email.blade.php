<!DOCTYPE html>
<html>

<head>
    <title>Email Verification</title>

    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <main class="p-3 bg-light" style="height: 100vh;">
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-4 bg-white rounded shadow-sm p-4">
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
            </div>
        </div>
    </main>
</body>

</html>