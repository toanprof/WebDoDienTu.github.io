<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Custommer extends Authenticatable
{
    use HasFactory;

    protected $table = 'custommers';

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'sex',
        'dob',
        'password',
        'is_active',
        'is_block',
        'hash',
        'hash_reset',
        'real_email',
    ];
}
