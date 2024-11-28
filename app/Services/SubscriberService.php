<?php

namespace App\Services;

use App\Enums\SubscriberStatus;
use App\Exceptions\DomainException;
use App\Models\Subscriber;
use App\Traits\SubscriberFinder;

class SubscriberService
{
    use SubscriberFinder;

    public function create(array $data)
    {
        $existingSubscriber = $this->findSubscriberByEmail($data['email']);
        if ($existingSubscriber) {
            throw new DomainException(['E-mail is already in use.'], 409);
        }

        $data['token'] = substr(md5(microtime()), 0, 10);
        $data['status'] = SubscriberStatus::WAITING_VERIFICATION;

        return Subscriber::create($data);
    }

    public function verifyToken(string $token)
    {
        $subscriber = $this->findSubscriberByToken($token);
        if (!$subscriber) {
            throw new DomainException(['Subscriber not found.'], 404);
        }

        if ($subscriber->status !== SubscriberStatus::WAITING_VERIFICATION) {
            throw new DomainException(['Subscriber already verified.'], 400);
        }

        $subscriber->status = SubscriberStatus::ACTIVE;
        $subscriber->save();

        return $subscriber;
    }
}
