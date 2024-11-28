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
}
