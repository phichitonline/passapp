<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeget extends Model
{
    use HasFactory;
    protected $fillable = [
        'getid','get_name'
    ];
}
