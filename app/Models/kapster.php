<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapster extends Model
{
    use HasFactory;

    protected $table = 'kapster';

    protected $fillable = [
        'name', 
        'photo', 
        'place', 
        'schedule'
    ];
    
}
