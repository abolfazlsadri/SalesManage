<?php

namespace App\Services\Contract;

use App\Models\Order;
use App\ValueObjects\PlaceOrder;

interface PlaceOrderInterface
{
    public function placeOrder(PlaceOrder $placeOrder): Order;
}
