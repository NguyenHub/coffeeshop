<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table="chuc_vu";
     protected $fillable = [
        'tenchucvu', 'maluong'
    ];
    public $timestamps=false;
}
