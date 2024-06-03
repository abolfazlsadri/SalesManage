<?php

namespace App\Http\Controllers;

use App\Services\Contract\PlaceOrderInterface;
use App\ValueObjects\PlaceOrder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $placeOrderService;

    public function __construct(PlaceOrderInterface $placeOrderService)
    {
        $this->placeOrderService = $placeOrderService;
    }

    public function placeOrder(Request $request): JsonResponse
    {
        try {
            $placeOrder = PlaceOrder::fromArray($request->toArray());
            $order = $this->placeOrderService->placeOrder($placeOrder);

            return response()->json($order);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to place order.'], 500);
        }
    }
}
