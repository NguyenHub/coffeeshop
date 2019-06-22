<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class NhanVien extends Authenticatable
{
	use Notifiable;
	protected $guard = 'nhan_vien';
	protected $table="nhan_vien";
	public $timestamps=false;
	protected $fillable = [
        'email', 'password',
    ];
	
}
