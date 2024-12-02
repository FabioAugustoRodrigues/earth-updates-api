<!DOCTYPE html>
<html>

<head>
    <title>Today's Posts</title>
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Today's Posts</h1>

        @if($posts->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            No new posts were published today. Check back tomorrow!
        </div>
        @else
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ $post->url ?? '#' }}" class="text-decoration-none">
                                {{ $post->title }}
                            </a>
                        </h5>
                        <p class="card-text">
                            {{ $post->content }}
                        </p>
                        <p class="text-muted small mb-0">
                            Published on: {{ $post->created_at->format('F j, Y, g:i a') }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <footer class="mt-5 text-center">
            <p class="text-muted">You're receiving this email because you're subscribed to our updates.</p>
            <p><a href="#" class="text-decoration-none">Unsubscribe</a></p>
        </footer>
    </div>
</body>

</html>
