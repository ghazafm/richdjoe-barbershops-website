<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapster extends Model
{
    use HasFactory;

    protected $table = 'kapsters';

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'photo',
        'place',
        'schedule',
        'created_at',
        'updated_at'
    ];

    // Disable timestamps if your table does not have created_at and updated_at columns automatically managed
    public $timestamps = true;
}
