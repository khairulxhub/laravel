<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GarmentOrder extends Model
{
    protected $fillable = [
        'order_number',
        'po_number',
        'buyer_name',
        'style_number',
        'product_name',
        'order_type',
        'order_qty',
        'unit_price',
        'total_value',
        'order_date',
        'ex_factory_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'order_date' => 'date',
        'ex_factory_date' => 'date',
        'unit_price' => 'decimal:2',
        'total_value' => 'decimal:2',
    ];
}