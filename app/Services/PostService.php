<?php

namespace App\Services;

use App\Models\Post;
use App\Traits\PostFinder;
use Carbon\Carbon;

class PostService
{
    use PostFinder;

    public function create(array $data)
    {
        $data['sent_to_emails'] = 0;

        return Post::create($data);
    }

    public function getById(int $id)
    {
        return $this->findPostOrFail($id);
    }

    public function getPostsToday()
    {
        return Post::whereDate('created_at', Carbon::today())
                    ->orderBy('created_at', 'desc')
                    ->get();
    }

    public function getPostsThisWeek()
    {
        return Post::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->orderBy('created_at', 'desc')
                    ->get();
    }

    public function getAllPosts()
    {
        return Post::orderBy('created_at', 'desc')->get();
    }
}