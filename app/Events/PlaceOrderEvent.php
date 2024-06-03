<?php

namespace App\Events;

use App\ValueObjects\PlaceOrder;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PlaceOrderEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $phoneNumber;
    public $emailAddress;

    public function __construct(PlaceOrder $placeOrder)
    {
        $this->phoneNumber = $placeOrder->getPhoneNumber();
        $this->emailAddress = $placeOrder->getEmailAddress();
    }

    public function broadcastOn(): PrivateChannel
    {
        return new PrivateChannel('channel-name');
    }
}
