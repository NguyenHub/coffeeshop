<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    protected $table="luong";
    public $timestamps = false;

    public function chucvu()
    {
    	return $this->hasMany('App\ChucVu','maluong','id');
    }
}
