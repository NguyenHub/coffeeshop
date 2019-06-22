<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
    	return view('admin/trang-chu');
    }
     public function Index()
    {
    	return view('front/trangchu');
    }
}
