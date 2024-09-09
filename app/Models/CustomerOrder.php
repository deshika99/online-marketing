<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;


    protected $table = 'customer_order';

    protected $fillable = [
        'order_code',
        'user_id',
        'customer_fname',
        'customer_lname',
        'phone',
        'email',
        'company_name',
        'address',
        'apartment',
        'city',
        'postal_code',
        'date',
        'total_cost',
        'discount',
        'vat',
    ];

}
