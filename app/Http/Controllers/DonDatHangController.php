<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonDatHang;
use App\NhaCungCap;
use App\NguyenLieu;
use App\ChiTietDonDatHang;
use DB;
use Validator;
use Mail;
class DonDatHangController extends Controller
{
	public function index()
	{
		$data1=NhaCungCap::select('id','tennhacungcap')->get();
		$nguyenlieu=NguyenLieu::select('id','tennguyenlieu')->get();
		if(request()->ajax())
		{
			return datatables()->of(DB::table('don_dat_hang')
				->join('nha_cung_cap','don_dat_hang.manhacungcap','=','nha_cung_cap.id')
				->select('nha_cung_cap.tennhacungcap','don_dat_hang.*')
				->latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm" title="Cập nhật">Sửa</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" title="Xóa">Xóa</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.dathang.danhsach',['data'=>$data1,'nguyenlieu'=>$nguyenlieu]);
	}
	public function add( Request $request)
	{
		//dd($request);
		$validator =Validator::make($request->all(),[
			// 'tenkhuyenmai'    =>  'required',
			// 'soluong'    =>  'required',
			'ghichu.*'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			if(count($request->manguyenlieu)>0)
			{
				$data = new DonDatHang;
				$data->manhacungcap=$request->ma_ncc;
				$data->ghichu=$request->ghichu;
				$data->ngaydat=date('Y-m-d H:i:s');
				$data->created_at=date('Y-m-d H:i:s');
				$data->save();
				$manguyenlieu = $request->manguyenlieu;
				$tennguyenlieu = $request->tennguyenlieu;
				$soluong = $request->soluong;
				$donvitinh = $request->donvitinh;
				$ghichu = $request->note;
				for($count = 0; $count < count($manguyenlieu); $count++)
				{
					$chitiet = array(
						'madonhang' => $data->id,
						'manguyenlieu' => $manguyenlieu[$count],
						'soluong'  => $soluong[$count],
						'donvitinh'  => $donvitinh[$count],
						'ghichu'  => $ghichu[$count],
					);
					$insert_data[] = $chitiet;
					$donhang=array(
						'manguyenlieu'=>$manguyenlieu[$count],
						'tennguyenlieu'=>$tennguyenlieu[$count],
						'soluong'=>$soluong[$count],
						'donvitinh'  => $donvitinh[$count],
						'ghichu'=>$ghichu[$count],
					);
					$donhang_data[] = $donhang;
				}
				ChiTietDonDatHang::insert($insert_data);
				$ncc=NhaCungCap::find($request->ma_ncc);
				$mail=$ncc->email;
				$dathang=array('dathang'=>$donhang_data);
				Mail::send('admin.dathang.sendmail',$dathang, function($message) use($mail) {
					$message->to($mail)->subject('SmartCoffee-Đơn Đặt Hàng');
				});
				return response()->json(['success' => 'Đặt Hàng Thành Công!']);
			}
			
		}
	}
	public function destroy($id)
	{
		$data = DonDatHang::find($id);
		$now=strtotime(date('Y-m-d H:i:s'));
		$day=strtotime($data->ngaydat);
		if(($now-$day)/(24*60*60)>=7)
		{
			$data->delete();
			$data2=ChiTietDonDatHang::Where('madonhang',$id);
			$data2->delete();
			return response()->json(['success' => 'Xóa Thành Công!']);
		}
		else
		{
			return response()->json(['errors' => 'Đơn Đặt Hàng Chưa Quá 7 Ngày-Không Thể Xóa!']);
		}
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = DonDatHang::select('manhacungcap','ngaydat','ghichu')
			->where('id',$id)
			->first();
			$data2=DB::table('chitiet_dondathang')
			->join('nguyen_lieu','chitiet_dondathang.manguyenlieu','=','nguyen_lieu.id')
			->select('nguyen_lieu.tennguyenlieu','chitiet_dondathang.manguyenlieu','chitiet_dondathang.soluong','chitiet_dondathang.donvitinh','chitiet_dondathang.ghichu')
			->where('chitiet_dondathang.madonhang',$id)
			->get();
			return response()->json(['data' => $data,'data2'=>$data2]);
		}
	}
}
