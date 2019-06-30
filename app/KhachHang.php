<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticable;
class KhachHang extends Authenticable
{
	use Notifiable;
	protected $guard ='khach_hang';
    protected $table="khach_hang";
    public $timestamps=false;
}
