<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    // Disable timestamps if your table does not have created_at and updated_at columns automatically managed
    public $timestamps = true;
}
