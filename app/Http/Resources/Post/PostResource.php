<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "sent_to_emails" => $this->sent_to_emails,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}