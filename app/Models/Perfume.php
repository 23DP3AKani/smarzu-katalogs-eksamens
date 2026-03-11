<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfume extends Model
{
    protected $fillable = [
        'name', 
        'brand', 
        'short_description', 
        'gender', 
        'season', 
        'image_url'
    ];
}