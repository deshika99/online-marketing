<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    protected $fillable = [
        'user_id', 'order_code','product_id', 'rating', 'comment', 'status',
    ];


    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id'); 
    }

    public function variations()
    {
        return $this->product()->hasMany(Variation::class, 'product_id', 'product_id');
    }

    public function orderItem()
    {
        return $this->hasOne(CustomerOrderItems::class, 'product_id', 'product_id')
                    ->where('order_code', $this->order_code); 
    }
}
