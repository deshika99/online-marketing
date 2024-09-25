<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemUser extends Model
{
    use HasFactory;
    protected $table = 'system_users';

    protected $fillable = [
        'name', 'email', 'contact', 'role', 'image_path', 'status',
    ];
}
