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
        'place_id',
        'schedule'
    ];

    // Disable timestamps if your table does not have created_at and updated_at columns automatically managed
    public $timestamps = true;

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
