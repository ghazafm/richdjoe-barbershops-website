<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $table = 'places';

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'address',
    ];

    // Disable timestamps if your table does not have created_at and updated_at columns automatically managed
    public $timestamps = true;
}
