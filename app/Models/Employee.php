<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    protected $fallible = ['name'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
