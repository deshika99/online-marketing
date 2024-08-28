<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aff_Customer extends Model
{
    use HasFactory;
    protected $table = 'aff_customers';

    protected $fillable = [
        'name',
        'address',
        'district',
        'DOB',
        'gender',
        'NIC',
        'contactno',
        'email',
        'password',
        'status',
    ];
}