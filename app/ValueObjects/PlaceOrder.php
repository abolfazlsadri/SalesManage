<?php

namespace App\ValueObjects;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class PlaceOrder
{
    private $employeeId;
    private $productId;
    private $quantity;
    private $totalPrice;
    private $phoneNumber;
    private $emailAddress;
    private $isApproved;

    public function __construct(
        int $employeeId,
        int $productId,
        int $quantity,
        float $totalPrice,
        ?string $phoneNumber = null,
        ?string $emailAddress = null,
        bool $isApproved = false
    ) {
        $this->validateData($employeeId, $phoneNumber, $emailAddress);

        $this->employeeId = $employeeId;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->totalPrice = $totalPrice;
        $this->phoneNumber = $phoneNumber;
        $this->emailAddress = $emailAddress;
        $this->isApproved = $isApproved;
    }

    private function validateData(int $employeeId, ?string $phoneNumber, ?string $emailAddress): void
    {
        $employee = DB::table('employees')->find($employeeId);

        if ($employeeId <= 0 || $employee) {
            throw new InvalidArgumentException('Invalid employee ID.');
        }

        if ($phoneNumber !== null && !preg_match('/^[0-9]{10}$/', $phoneNumber)) {
            throw new InvalidArgumentException('Invalid phone number.');
        }

        if ($emailAddress !== null && !filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email address.');
        }
    }

    public function toArray(): array
    {
        return [
            'employee_id' => $this->employeeId,
            'product_id' => $this->productId,
            'quantity' => $this->quantity,
            'total_price' => $this->totalPrice,
            'phone_number' => $this->phoneNumber,
            'email_address' => $this->emailAddress,
            'is_approved' => $this->isApproved,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['employee_id'],
            $data['product_id'],
            $data['quantity'],
            $data['total_price'],
            $data['phone_number'] ?? null,
            $data['email_address'] ?? null,
            $data['is_approved'] ?? false
        );
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }
}
