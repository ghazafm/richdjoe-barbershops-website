<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'transaction_logs';

    // The attributes that are mass assignable
    protected $fillable = [
        'id',
        'user_id',
        'user_name',
        'user_email',
        'kapster_id',
        'kapster_name',
        'service_id',
        'service_name',
        'schedule',
        'total_price',
        'service_status',
        'payment_status',
        'rating',
        'comment',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'schedule' => 'datetime',
        'total_price' => 'decimal:2',
        'rating' => 'integer',
    ];
}
