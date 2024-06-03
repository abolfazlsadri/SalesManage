<?php

namespace App\Services;

use App\Events\PlaceOrderEvent;
use App\Models\Order;
use App\Services\Contract\PlaceOrderInterface;
use App\ValueObjects\PlaceOrder;

class PlaceOrderService implements PlaceOrderInterface
{
    public function placeOrder(PlaceOrder $placeOrder): Order
    {
        $order = new Order();
        $order->fill($placeOrder->toArray());
        $order->save();

        event(new PlaceOrderEvent($placeOrder));

        return $order;
    }
}
