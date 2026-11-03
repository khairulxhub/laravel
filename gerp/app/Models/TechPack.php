<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechPack extends Model
{
    use HasFactory;

    protected $fillable = [
        'style_id',
        'tech_pack_no',
        'version',
        'product_type',
        'fabric',
        'gsm',
        'color',
        'size_range',
        'construction',
        'washing',
        'status',
        'file_path',
        'notes',
    ];

    /**
     * Tech Pack belongs to a Style.
     */
    public function style()
    {
        return $this->belongsTo(Style::class);
    }
}
