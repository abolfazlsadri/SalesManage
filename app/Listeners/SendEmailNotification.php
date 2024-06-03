<?php

namespace App\Listeners;

use App\Events\PlaceOrderEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailNotification
{
    public function handle(PlaceOrderEvent $event)
    {
        if (!$event->phoneNumber && $event->emailAddress) {
            // send email
        }
    }
}
