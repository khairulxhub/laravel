<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_name',
        'code',
        'email',
        'phone',
        'address',
        'country',
        'status',
        'notes',
    ];

    public function orders()
    {
        return $this->hasMany(GarmentOrder::class, 'buyer_name', 'name');
    }
}
