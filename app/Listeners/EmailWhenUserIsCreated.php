<?php

namespace App\Listeners;

use App\Events\VerifyEmail as EventsVerifyEmail;
use App\Mail\VerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailWhenUserIsCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventsVerifyEmail $event): void
    {
        Mail::to($event->user)->queue(new VerifyEmail($event->user));
    }
}
