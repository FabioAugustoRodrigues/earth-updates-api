<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Collection;

class DailyPostEmail extends Mailable
{
    public $posts;

    public function __construct(Collection $posts)
    {
        $this->posts = $posts;
    }

    public function build()
    {
        return $this->view('mail.daily_posts')
                    ->with([
                        'posts' => $this->posts,
                    ]);
    }
}
