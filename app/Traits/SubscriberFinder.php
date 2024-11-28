<?php

namespace App\Traits;

use App\Exceptions\DomainException;
use App\Models\Subscriber;

trait SubscriberFinder
{
    public function findSubscriberOrFail(int $id): Subscriber
    {
        $subscriber = Subscriber::find($id);

        if (!$subscriber) {
            throw new DomainException(['Subscriber not found.'], 404);
        }

        return $subscriber;
    }

    public function findSubscriberByEmail(string $email): Subscriber|null
    {
        $subscriber = Subscriber::where('email', '=', $email)->first();

        return $subscriber;
    }

    public function findSubscriberByToken(string $token): Subscriber|null
    {
        $subscriber = Subscriber::where('token', '=', $token)->first();

        return $subscriber;
    }
}
