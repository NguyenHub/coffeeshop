<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mon;
class DonHangController extends Controller
{
    public function index()
	{
		$data=Mon::all();
		if(request()->ajax())
		{
			return datatables()->of(CongThuc::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.donhang.danhsach',['data'=>$data]);
	}
}
