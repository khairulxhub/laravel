<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;

    protected $fillable = [
        'style_name',
        'style_no',
        'buyer_id',
        'season',
        'status',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }

    /**
     * Style has many Tech Packs.
     */
    public function techPacks()
    {
        return $this->hasMany(TechPack::class);
    }
}
