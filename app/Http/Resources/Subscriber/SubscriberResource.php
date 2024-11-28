<?php

namespace App\Http\Resources\Subscriber;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriberResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "status" => $this->status,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}