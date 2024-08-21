<?php

namespace App\Traits;

use App\Exceptions\DomainException;
use App\Models\Post;

trait PostFinder
{
    public function findPostOrFail(int $id): Post
    {
        $post = Post::find($id);

        if (!$post) {
            throw new DomainException(['Post not found.'], 404);
        }

        return $post;
    }
}
