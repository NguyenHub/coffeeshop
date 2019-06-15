<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongThuc extends Model
{
    protected $table="cong_thuc";
    public $timestamps=false;
    public function mon()
    {
    	return $this->belongsTo('App\Mon','mamon','id');
    }
    // public function congthuc_chitiet()
    // {
    // 	return $this->belongsTo('App\ChiTietCongThuc','macongthuc','id');
    // }
}
