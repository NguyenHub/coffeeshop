<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mon;
use App\DonHang;
use App\KhuyenMai;
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
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.donhang.danhsach');
	}
	public function fillDate($date)
	{
		$start=substr($date,0,10);
		$end=substr($date,13,10);
		if(request()->ajax())
		{
			return datatables()->of(DonHang::latest()
				->whereBetween('ngaydat',[$start,$end])
				->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
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
		$donhang->updated_at=date('Y-m-d H:m:i');
		$donhang->save();
		if($trangthai==1)
		{
			$data=DB::table('chitiet_donhang')
			//->join('mon','chitiet_donhang.mamon','mon.id')
			->join('cong_thuc','chitiet_donhang.mamon','cong_thuc.mamon')
			->join('chitiet_congthuc','cong_thuc.id','chitiet_congthuc.macongthuc')
			->select('chitiet_donhang.soluong','chitiet_congthuc.dinhluong','chitiet_congthuc.manguyenlieu')
			->where('chitiet_donhang.madonhang',$id)
			->get();
			if($data!='')
			{
				foreach ($data as $value) 
				{
					DB::table('nguyen_lieu')->where('nguyen_lieu.id',$value->manguyenlieu)->decrement('nguyen_lieu.soluong',$value->dinhluong*$value->soluong);
				}
			}
		}
		if($trangthai==2)
		{
			if($donhang->makhachhang!=null)
			{
				$diem=$donhang->thanhtien/10000;
				DB::table('khach_hang')->where('khach_hang.id',$donhang->makhachhang)->increment('khach_hang.diemtichluy',$diem);

			}
			if($donhang->makhuyenmai!=null)
			{
				$khuyenmai=KhuyenMai::where('khuyen_mai.code_km',$donhang->makhuyenmai)->first();
				if($khuyenmai->soluong!=null)
				{
					DB::table('khuyen_mai')->decrement('khuyen_mai.soluong',1);
				}
			}
		}
	}
	public function destroy($id)
	{
		$data=DonHang::find($id);
		if($data->trangthai==3)
		{
			$data->delete();
			return response()->json(['success'=>'Xóa Thành Công!']);
		}
		else
		{
			return response()->json(['errors'=>'Xóa Thất Bại!']);
		}
	}
	public function getNewBill()//hàm trả về chuỗi jon tạo thông báo đơn hàng
	{
		$data=DonHang::where('don_hang.trangthai',0)->count();
		$data2=DonHang::where('don_hang.trangthai',1)->count();
		return response()->json(['newBill'=>$data,'shipBill'=>$data2]);
	}
	public function printBill($id)
	{
		$donhang=DonHang::find($id);
		$data=DB::table('chitiet_donhang')
		->join('mon','chitiet_donhang.mamon','mon.id')
		->select('chitiet_donhang.soluong','chitiet_donhang.dongia','mon.tenmon')
		->where('chitiet_donhang.madonhang',$id)
		->get();
		return view('admin.printbill',['donhang'=>$donhang,'chitiet'=>$data]);
	}
}
