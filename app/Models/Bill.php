<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = [
        'bill_name',
        'bill_total',
        'customer_id',
        'customer_email',
        'customer_fullname',
        'customer_phone',
        'ship_fullname',
        'ship_phone',
        'ship_address',
        'is_payment',
        'is_type',
    ];
}
