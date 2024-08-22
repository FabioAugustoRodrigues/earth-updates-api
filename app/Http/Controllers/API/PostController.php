<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    protected $postService;

    public function __construct(
        PostService $postService
    ) {
        $this->postService = $postService;
    }

    public function store(CreatePostRequest $request)
    {
        $post = $this->postService->create($request->validated());

        return $this->sendResponse(new PostResource($post), "Post created successfully.", 201);
    }

    public function getPostsToday(Request $request)
    {
        return $this->sendResponse(new PostCollection($this->postService->getPostsToday()), "Posts successfully recovered.", 200);
    }

    public function getPostsThisWeek(Request $request)
    {
        return $this->sendResponse(new PostCollection($this->postService->getPostsThisWeek()), "Posts successfully recovered.", 200);
    }

    public function getAllPosts(Request $request)
    {
        return $this->sendResponse(new PostCollection($this->postService->getAllPosts()), "Posts successfully recovered.", 200);
    }

}
