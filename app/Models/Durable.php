<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Durable extends Model
{
    use HasFactory;
    protected $fillable = [
        'fasgrp','pass_number','pass_type_name','pass_name','depcode','str1','fastype','pur_date','pass_price','salvag','method',
        'str_date','life','rate','noid','name','model','serial_no','company','type','div','receive','perunit','kmoney',
        'tmoney','docno','expire_doc','status','note-1','image_filename','image_filename2','image_filename3','manual_file1',
        'memo_text','status4_date','status9_date','repair_status','locationgps','manual_link','user_id'
    ];
}
