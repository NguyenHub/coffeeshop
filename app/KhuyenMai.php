<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    protected $table="khuyen_mai";
    public $timestamps=false;
	public function donhang()
	{
		return $this->hasMany('App\DonHang','makhuyenmai','id');
	}
}
