<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $table="ban";
    public $timestamps =false;
    public function donhang()
    {
    	return $this->hasMany('App\DonHang','madonhang','id');
    }
    public function khuvuc()
    {
    	return $this->belongsTo('App\KhuVuc','makhuvuc','id');
    }
}
