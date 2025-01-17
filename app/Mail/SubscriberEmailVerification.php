<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriberEmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    protected $subscriber;

    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function build()
    {
        $from_email = env('MAIL_FROM_ADDRESS');
        $from_name = env('MAIL_FROM_NAME');

        $app_url = env('APP_URL');

        return $this->from($from_email, $from_name)
            ->subject('Email Verification')
            ->view('mail.subscriber_verification_email')
            ->with(['subscriber' => $this->subscriber, 'app_url' => $app_url]);
    }
}
