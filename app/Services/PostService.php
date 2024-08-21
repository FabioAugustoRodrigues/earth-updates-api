<?php

namespace App\Services;

use App\Models\Post;
use App\Traits\PostFinder;

class PostService
{
    use PostFinder;

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function getById(int $id)
    {
        return $this->findPostOrFail($id);
    }
}