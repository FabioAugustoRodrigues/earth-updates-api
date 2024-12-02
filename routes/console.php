<?php

use App\Console\Commands\SendDailyEmails;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('send:daily-emails', function () {
    $this->call(SendDailyEmails::class);
})->purpose('Send daily email to subscribers with today\'s posts');
