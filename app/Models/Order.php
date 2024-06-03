<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fallible = ['employee_id', 'product_id', 'quantity', 'total_price', 'is_approved', 'phone_number', 'email_address'];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
