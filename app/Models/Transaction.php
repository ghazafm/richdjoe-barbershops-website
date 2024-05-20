<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'customer_id', 'kapster_id', 'service_id', 'total_price',
        'service_status', 'payment_status', 'rating', 'comment', 
        'created_at', 'updated_at'
    ];

    // Automatically manage created_at and updated_at fields
    public $timestamps = true;
    
}
