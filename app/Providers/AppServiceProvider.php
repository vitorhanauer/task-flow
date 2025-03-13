<?php

namespace App\Providers;

use App\Events\TaskCreated;
use App\Events\VerifyEmail;
use App\Listeners\EmailWhenTaskIsCreated;
use App\Listeners\EmailWhenUserIsCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class
        ],
        VerifyEmail::class => [
            EmailWhenUserIsCreated::class
        ],
        TaskCreated::class => [
            EmailWhenTaskIsCreated::class
        ]
        ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
