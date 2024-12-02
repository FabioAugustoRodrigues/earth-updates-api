<!DOCTYPE html>
<html>

<head>
    <title>Email Verification</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Email Verification</h1>

        <p id="success-message" class="success-message" style="display: none;"></p>
        <p id="error-message" class="error-message" style="display: none;"></p>
    </div>

    <input type="hidden" id="token" value="{{ $token }}">
    <input type="hidden" id="email" value="{{ $email }}">
    <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const token = $('#token').val();
        const email = $('#email').val();
        const csrf_token = $('#csrf_token').val();

        $.ajax({
            url: `/api/subscribers/${email}/verify/${token}`,
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            success: function(response) {
                $('#success-message').text('Your email has been successfully verified!').show();
                $('#error-message').hide();
            },
            error: function(error) {
                $('#error-message').text('There was an issue verifying your email. Please try again later.').show();
                $('#success-message').hide();
            }
        });
    })
</script>

</html>