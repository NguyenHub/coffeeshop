<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuNhap;
use App\DonDatHang;
use App\NguyenLieu;
use App\ChiTietPhieuNhap;
use DB;
use Validator;
class PhieuNhapController extends Controller
{
    public function index()
	{
		$data1=DonDatHang::select('don_dat_hang.id','don_dat_hang.ngaydat')
		->whereNotIn('don_dat_hang.id',function($query)
		{
			$query->select('ma_ddh')->from('phieu_nhap');
		})
		->get();
		$nguyenlieu=NguyenLieu::select('nguyen_lieu.id','nguyen_lieu.tennguyenlieu')->get();
		if(request()->ajax())
		{
			return datatables()->of(PhieuNhap::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.nhaphang.danhsach',['data'=>$data1,'nguyenlieu'=>$nguyenlieu]);
	}
	public function getDonDatHang($id)
	{
		$data=DB::table('chitiet_dondathang')
		->join('nguyen_lieu','chitiet_dondathang.manguyenlieu','=','nguyen_lieu.id')
		->select('nguyen_lieu.tennguyenlieu','chitiet_dondathang.id','chitiet_dondathang.manguyenlieu','chitiet_dondathang.soluong','chitiet_dondathang.donvitinh',)
		->Where('chitiet_dondathang.madonhang',$id)
		->get();
		return response()->json(['data'=>$data]);
	}
	public function add( Request $request)
	{
		//dd($request);
		//dd($request);
		$validator =Validator::make($request->all(),[
			// 'tenkhuyenmai'    =>  'required',
			// 'soluong'    =>  'required',
			//'mamon'=>'unique:cong_thuc,mamon',
			//'dinhluong.*'=>'bail|regex:/([0-9]{1,9})$/',
			//'ghichu.*'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			//'mamon.unique'=>'Sản phẩm đã có công thức',
			//'manguyenlieu.required'=>'Vui lòng chọn nguyên liệu',
			//'dinhluong.regex'=>'Định lượng không không hợp lệ ',
			//'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			if(count($request->manguyenlieu)>0)
			{
				//dd($request);
				$data = new PhieuNhap;
				$data->ngaynhap=date('Y-m-d H:i:s');
				$data->ma_ddh=$request->dondathang;
				$data->ghichu=$request->ghichu;
				$data->created_at=date('Y-m-d H:i:s');
				$data->save();
				$manguyenlieu = $request->manguyenlieu;
				$soluong = $request->soluong;
				$dongia = $request->dongia;
				$ghichu = $request->note;
				$quydoi = $request->quydoi;
				for($count = 0; $count < count($manguyenlieu); $count++)
				{
					$chitiet = array(
						'maphieunhap' => $data->id,
						'manguyenlieu' => $manguyenlieu[$count],
						'soluong'  => $soluong[$count],
						'dongia'  => str_replace(" ", "",$dongia[$count]),
						'ghichu'  => $ghichu[$count],
					);
					$insert_data[] = $chitiet;
					DB::table('nguyen_lieu')
					->where('id',$manguyenlieu[$count])
					->increment('soluong', str_replace(" ", "",$quydoi[$count])*$soluong[$count]);
				}
				ChiTietPhieuNhap::insert($insert_data);
				return response()->json(['success' => 'Thêm Thành Công!']);
			}
			
		}
	}
	public function destroy($id)
	{
		$data = PhieuNhap::find($id);
		$data->delete();
		$data2=ChiTietPhieuNhap::Where('maphieunhap',$id);
		$data2->delete();
		return response()->json(['success' => 'Xóa Thành Công!']);
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = PhieuNhap::find($id);
			$data2=DB::table('chitiet_phieunhap')
			->join('nguyen_lieu','chitiet_phieunhap.manguyenlieu','=','nguyen_lieu.id')
			->select('nguyen_lieu.tennguyenlieu','chitiet_phieunhap.*')
			->where('chitiet_phieunhap.maphieunhap',$id)
			->get();
			return response()->json(['data' => $data,'data2'=>$data2]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
			// 'tenkhuyenmai'    =>  'required',
			// 'soluong'    =>  'required',
			//'tenmon'=>'required|unique:mon,tenmon,'.$request->hidden_id,
			//'dongia'=>'bail|regex:/([0-9]{1,9})$/',
			'ghichu'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			//'dongia.regex'=>'Giá trị không không hợp lệ ',
			//'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data = CongThuc::find($request->hidden_id);
			$data->tencongthuc=$request->tencongthuc;
			$data->ghichu=$request->ghichu;
			$data->updated_at=date('Y-m-d H:i:s');
			$data->save();
			return response()->json(['success' => 'Cập Nhật Thành Công!']);
		}
	}
	public function UpdateDetail(Request $request, $id)
	{
		$data= ChiTietCongThuc::find($id);
		$data->dinhluong=$request->dinhluong;
		$data->donvitinh=$request->donvitinh;
		$data->ghichu=$request->ghichu;
		$data->save();
		return response()->json(['success'=>'Cập nhật thành công']);
	}
	public function AddDetail(Request $request, $id)
	{
		$data=new ChiTietCongThuc;
		$data->macongthuc=$id;
		$data->manguyenlieu=$request->manguyenlieu;
		$data->dinhluong=$request->dinhluong;
		$data->donvitinh=$request->donvitinh;
		$data->save();
		return response()->json(['success'=>'Thêm chi tiết thành công']);
	}
	public function DeleteDetail($id)
	{
		$data=ChiTietCongThuc::find($id);
		$data->delete();
		return response()->json(['success'=>'Xóa chi tiết thành công']);
	}
}
