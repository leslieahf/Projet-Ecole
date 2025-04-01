<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use Illuminate\Auth\Events\Authenticated;
use App\Listeners\IncrementLoginCount;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Authenticated::class => [
            IncrementLoginCount::class,
        ],
    ];
}
