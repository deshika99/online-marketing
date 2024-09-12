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
        'product_id',
        'quantity',
        'date',
        'cost',
    ];


    public function order()
    {
        return $this->belongsTo(CustomerOrder::class, 'order_code', 'order_code');
    }

    
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id'); 
    }
}
