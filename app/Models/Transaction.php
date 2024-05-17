<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // The table associated with the model (optional if it follows Laravel's naming conventions)
    protected $table = 'transactions';

    // The attributes that are mass assignable
    protected $fillable = [
        'customer_id',
        'kapster_id',
        'service_id',
        'transaction_date',
        'total_price',
        'service_status',
        'payment_status',
        'rating',
        'comment'
    ];

    // Optionally define relationships to other models
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function kapster()
    {
        return $this->belongsTo(Kapster::class, 'kapster_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
