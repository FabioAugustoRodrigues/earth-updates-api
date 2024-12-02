<!DOCTYPE html>
<html>

<head>
    <title>Today's Posts</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 650px;
            margin: 30px auto;
            padding: 25px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #33c9a6;
            text-align: center;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .post {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eeeeee;
        }

        .post:last-child {
            border-bottom: none;
        }

        .post-title {
            font-size: 22px;
            font-weight: bold;
            color: #2c3e50;
        }

        .post-title a {
            color: #33c9a6;
            text-decoration: none;
        }

        .post-title a:hover {
            text-decoration: underline;
        }

        .post-content {
            margin-top: 12px;
            font-size: 16px;
            color: #555;
        }

        .post-date {
            font-size: 14px;
            color: #777;
            margin-top: 8px;
        }

        .footer {
            margin-top: 40px;
            font-size: 14px;
            text-align: center;
            color: #888;
        }

        .footer a {
            color: #33c9a6;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Today's Posts</h1>

        @if($posts->isEmpty())
        <p>No new posts were published today. Check back tomorrow!</p>
        @else
        @foreach($posts as $post)
        <div class="post">
            <div class="post-title">
                <a href="{{ $post->url ?? '#' }}">{{ $post->title }}</a>
            </div>
            <div class="post-content">
                {{ Str::limit($post->content, 120) }}
            </div>
            <div class="post-date">
                Published on: {{ $post->created_at->format('F j, Y, g:i a') }}
            </div>
        </div>
        @endforeach
        @endif

        <div class="footer">
            <p>You're receiving this email because you're subscribed to our updates.</p>
            <p><a href="#">Unsubscribe</a></p>
        </div>
    </div>
</body>

</html>