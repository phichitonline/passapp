<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        's_no', 's_name', 's_headname', 's_address', 'module1',
        'module2', 'module3', 'module4', 'module5', 'linetoken'
    ];
}
