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

        $data['token'] = $this->generateToken();
        $data['status'] = SubscriberStatus::WAITING_VERIFICATION;

        return Subscriber::create($data);
    }

    public function verifyToken(string $email, string $token)
    {
        $subscriber = $this->verifySubscriberByEmailAndToken($email, $token);

        if ($subscriber->status !== SubscriberStatus::WAITING_VERIFICATION) {
            throw new DomainException(['Subscriber already verified.'], 400);
        }

        $subscriber->status = SubscriberStatus::ACTIVE;
        $subscriber->token = $this->generateToken();
        $subscriber->save();

        return $subscriber;
    }

    public function delete(string $email, string $token)
    {
        $subscriber = $this->verifySubscriberByEmailAndToken($email, $token);

        $subscriber->delete();
    }

    public function verifySubscriberByEmailAndToken(string $email, string $token): Subscriber
    {
        $subscriber = $this->findSubscriberByEmail($email);
        if (!$subscriber) {
            throw new DomainException(['Subscriber not found.'], 404);
        }

        if ($subscriber->token !== $token) {
            throw new DomainException(['Invalid token.'], 400);
        }

        return $subscriber;
    }

    public function generateToken(int $length = 10): string
    {
        return substr(md5(microtime()), 0, $length);
    }
}
