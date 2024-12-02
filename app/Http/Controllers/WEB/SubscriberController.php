<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function verifyEmail($email, $token)
    {
        return view('pages.subscriber_verification_email', ['email' => $email, 'token' => $token]);
    }
}
