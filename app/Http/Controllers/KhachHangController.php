<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function LoginOrRegister()
    {
    	return view('front/dangnhap-dangky');
    }
}
