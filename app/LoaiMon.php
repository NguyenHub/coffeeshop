<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiMon extends Model
{
    protected $table = "loai_mon";
	public $timestamps = false;
    public function mon()
    {
    	return $this->hasMany('App\Mon','maloai','id');
    }
}
