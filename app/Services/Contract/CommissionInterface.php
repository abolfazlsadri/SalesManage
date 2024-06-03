<?php

namespace App\Services\Contract;

interface CommissionInterface
{
    public function calculateCommission(int $employeeId): float;
}
