<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\Contract\CommissionInterface;
use Illuminate\Http\JsonResponse;

class CommissionController extends Controller
{
    private $commissionService;

    public function __construct(CommissionInterface $commissionService)
    {
        $this->commissionService = $commissionService;
    }

    public function getCommission(int $employeeId): JsonResponse
    {
        try {
            $commission = $this->commissionService->calculateCommission($employeeId);

            return response()->json(['commission' => $commission]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to calculate commission.'], 500);
        }
    }
}
