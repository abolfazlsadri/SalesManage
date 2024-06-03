<?php

namespace App\Services;

use App\Services\Contract\CommissionInterface;
use Illuminate\Support\Facades\DB;

class CommissionService implements CommissionInterface
{
    public function calculateCommission(int $employeeId): float
    {
        $employee = DB::table('employees')->find($employeeId);
        $orderCount = $employee->orders()->count('id');
        $totalPrice = $employee->orders()->sum('total_price');
        $commissionRate = $this->getCommissionRate($orderCount);

        return $totalPrice * $commissionRate;
    }

    private function getCommissionRate(float $orderCount): float
    {
        if ($orderCount <= 20) {
            return 0.05;
        } elseif ($orderCount <= 100) {
            return 0.10;
        } else {
            return 0.30;
        }
    }
}
