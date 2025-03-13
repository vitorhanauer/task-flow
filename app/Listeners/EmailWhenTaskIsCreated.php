<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use App\Mail\CreatedTask;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailWhenTaskIsCreated
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
    public function handle(TaskCreated $event): void
    {
        Mail::to($event->user)->queue(new CreatedTask($event->user->name));
    }
}
