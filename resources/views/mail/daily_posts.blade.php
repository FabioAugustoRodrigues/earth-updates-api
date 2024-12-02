<!DOCTYPE html>
<html>
<head>
    <title>Today's Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #444;
        }
        .post {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .post:last-child {
            border-bottom: none;
        }
        .post-title {
            font-size: 18px;
            font-weight: bold;
            color: #007BFF;
        }
        .post-title a {
            text-decoration: none;
        }
        .post-content {
            margin-top: 10px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #888;
            text-align: center;
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
                        {{ Str::limit($post->content, 100) }}
                    </div>
                    <div class="post-date" style="font-size: 12px; color: #666;">
                        Published on: {{ $post->created_at->format('F j, Y, g:i a') }}
                    </div>
                </div>
            @endforeach
        @endif

        <div class="footer">
            <p>You're receiving this email because you're subscribed to our updates.</p>
            <p><a>Unsubscribe</a></p>
        </div>
    </div>
</body>
</html>
