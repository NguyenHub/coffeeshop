<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiKhachHang extends Model
{
	protected $table='loai_khach_hang';
	public $timestamps=false;
	public function khachhang()
	{
		return $this->hasMany('App\KhachHang','maloai','id');
	}
}
