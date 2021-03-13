<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'occupation', 'sex', 'eyes', 'hair', 'height', 'weight', 'date', 'time', 'location', 'crime_type', 'description', 'bail', 'image', 'status'];
}
