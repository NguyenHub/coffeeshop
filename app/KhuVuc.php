<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuVuc extends Model
{
    protected $table="khu_vuc";
    public $timestamps=false;
    // protected $fillable = [
    //  'id', 'tenkhuvuc', 'ghichu'
    // ];
    public function ban()
    {
    	return $this->hasMany('App\Ban','makhuvuc','id');
    }
}
