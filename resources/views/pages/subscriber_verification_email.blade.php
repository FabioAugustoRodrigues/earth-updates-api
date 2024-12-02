<!DOCTYPE html>
<html>

<head>
    <title>Email Verification</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <main class="p-3 bg-light" style="height: 100vh;">
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-4 bg-white rounded shadow-sm p-4">
                    <h1>Email Verification</h1>

                    <p id="success-message" class="text-success mt-3" style="display: none;"></p>
                    <b id="error-message" class="text-danger mt-3" style="display: none;"></b>
                </div>
            </div>
        </div>
    </main>

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
                $('#success-message')
                    .html(
                        `<strong>Welcome aboard!</strong> 
                         Your email has been successfully verified, and you're now part of our exclusive community. 
                         Starting today, you'll receive daily newsletters with the latest news and earth updates!`
                    ).show();
                $('#error-message').hide();
            },
            error: function(error) {
                const response = error.responseJSON;
                const message = response.message

                $('#error-message').text(message).show();
                $('#success-message').hide();
            }
        });
    })
</script>

</html>