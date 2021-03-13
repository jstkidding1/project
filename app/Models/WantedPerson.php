<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WantedPerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'region',
        'name',
        'alias',
        'reward',
        'criminal_case',
        'offense',
        'issuing_court',
        'sex',
        'height',
        'weight',
        'hair',
        'eye',
        'complexion',
        'other',
        'age',
        'date_birth',
        'place_birth',
        'citizen',
        'father_name',
        'mother_name',
        'address',
        'civil_status',
        'elementary',
        'secondary',
        'college',
        'status',
        'image',
    ];
}
