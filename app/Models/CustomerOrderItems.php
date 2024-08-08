<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrderItems extends Model
{
    use HasFactory;
   

    protected $table = 'customer_order_items';

    protected $fillable = [
        'order_code',
        'item',
        'date',
        'cost',
    ];
}
