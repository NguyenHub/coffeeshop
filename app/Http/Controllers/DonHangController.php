<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mon;
use App\DonHang;
use DB;
class DonHangController extends Controller
{
    public function index()
	{
		//$data=Mon::all();
		if(request()->ajax())
		{
			return datatables()->of(DonHang::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.donhang.danhsach');
	}
	public function chitiet($id)
	{
		$chitiet=DB::table('don_hang')
					->join('chitiet_donhang','don_hang.id','chitiet_donhang.madonhang')
					->join('mon','chitiet_donhang.mamon','=','mon.id')
					->select('don_hang.*','chitiet_donhang.mamon','chitiet_donhang.soluong','chitiet_donhang.dongia','mon.tenmon')
					->where('don_hang.id',$id)
					->get();
		return response()->json(['chitiet'=>$chitiet]);
	}
	public function xuly($id,$trangthai)
	{
		$donhang = DonHang::find($id);
		$donhang->trangthai=$trangthai;
		$donhang->save();
	}
}
