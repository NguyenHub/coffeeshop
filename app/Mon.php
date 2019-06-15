<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mon extends Model
{
    protected $table="mon";
    public $timestamps=false;
    public function loai_mon()
    {
    	return $this->belongsTo('App\LoaiMon','maloai','id');
    }
    public function congthuc()
    {
    	return $this->belongsTo('App\CongThuc','mamon','id');
    }
}
