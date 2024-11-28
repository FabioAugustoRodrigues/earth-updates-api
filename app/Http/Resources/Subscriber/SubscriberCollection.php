<?php

namespace App\Http\Resources\Subscriber;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SubscriberCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection;
    }
}