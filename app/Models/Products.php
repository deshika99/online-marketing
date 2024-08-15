<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_description',
        'product_image',
        'normal_price',
        'is_affiliate',
        'affiliate_price',
        'commission_percentage',
        'total_price',
    ];
}
