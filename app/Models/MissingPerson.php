<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissingPerson extends Model
{
    use HasFactory;

    protected $fillable = ['reportedBy', 'name', 'relationship', 'mobile', 'location', 'time', 'date', 'status', 'description', 'image'];
}
