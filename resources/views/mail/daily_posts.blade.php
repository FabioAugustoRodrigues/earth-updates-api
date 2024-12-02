<!DOCTYPE html>
<html>

<head>
    <title>Today's Posts</title>
    
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
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