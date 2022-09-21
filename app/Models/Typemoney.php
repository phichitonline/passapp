<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typemoney extends Model
{
    use HasFactory;
    protected $fillable = [
        'money_name'
    ];
}
