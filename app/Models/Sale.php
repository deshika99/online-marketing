<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [
        'product_id',
        'normal_price',
        'sale_rate',
        'sale_price',
        'end_date',
        'status',
    ];

    // Define relationships if necessary (e.g., with Product model)
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
