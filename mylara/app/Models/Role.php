<?php

namespace App\Models;

use Illuminate\Database\Eloquent\attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class Role extends Model
{
    use HasFactory;
}
