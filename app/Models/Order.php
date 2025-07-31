<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'order_number',
        'first_name',
        'last_name',
        'email',
        'phone',
        'notes',
        'amount',
        'currency',
        'payment_status',
        'stripe_charge_id'
    ];
}
