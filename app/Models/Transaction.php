<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'user_id', 'kapster_id', 'service_id', 'total_price', 'schedule',
        'service_status', 'payment_status', 'rating', 'comment'
    ];

    
    protected $casts = [
        'schedule' => 'datetime',
    ];

    protected $attributes = [
        'service_status' => 'wait', // Default value for service_status
        'payment_status' => 'process', // Default value for payment_status
    ];
    // Automatically manage created_at and updated_at fields
    public $timestamps = true;


    public function setRatingAttribute($value)
    {
        if (!is_null($value) && ($value < 1 || $value > 5)) {
            throw new \InvalidArgumentException('Rating must be between 1 and 5.');
        }

        $this->attributes['rating'] = $value;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function kapster()
    {
        return $this->belongsTo(Kapster::class);
    }
}
