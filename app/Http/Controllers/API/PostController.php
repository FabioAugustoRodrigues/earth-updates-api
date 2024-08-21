<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\Post\CreatePostRequest;
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

}
