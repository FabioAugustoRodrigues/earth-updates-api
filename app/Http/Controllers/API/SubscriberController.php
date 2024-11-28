<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\Subscriber\CreateSubscriberRequest;
use App\Http\Resources\Subscriber\SubscriberResource;
use App\Mail\SubscriberConfirmationEmail;
use App\Services\SubscriberService;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends BaseController
{
    protected $subscriberService;

    public function __construct(
        SubscriberService $subscriberService
    ) {
        $this->subscriberService = $subscriberService;
    }

    public function store(CreateSubscriberRequest $request)
    {
        $subscriber = $this->subscriberService->create($request->validated());

        Mail::to($subscriber->email)->send(new SubscriberConfirmationEmail($subscriber));

        return $this->sendResponse(new SubscriberResource($subscriber), "Subscriber created successfully and confirmation email sent.", 201);
    }

}
