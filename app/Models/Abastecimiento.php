<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abastecimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'products_id',
        'cantidad_id',
        'valor'
    ];
}
