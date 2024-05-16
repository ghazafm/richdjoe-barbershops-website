<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'kapster_id', 'service_id', 'transaction_date', 'total_price', 'rating', 'comment',
    ];
}
