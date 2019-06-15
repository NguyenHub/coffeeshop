<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhuyenMai;
use Validator;
class KhuyenMaiController extends Controller
{
	public function index()
	{
		if(request()->ajax())
		{
			return datatables()->of(KhuyenMai::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm" title="Cập Nhật" style="width:30px"><i class="fa fa-edit"  ></i></button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" title="Xóa" style="width:30px"><i class="fa fa-trash"></i></button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.khuyenmai.danhsach');
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			// 'tenkhuyenmai'    =>  'required',
			// 'soluong'    =>  'required',
			'soluong'=>'bail|regex:/([0-9]{2,9})$/|nullable',
			'giatri'    =>  'bail|regex:/([0-9]{1,9})$/',
			'code_km'=>'bail|regex:/([0-9a-zA-Z]{2,9})$/|unique:khuyen_mai,code_km',
			'ngaybatdau'=>'bail|before:ngayketthuc|after:tomorrow',
			'ngayketthuc'=>'bail|after:ngaybatdau',
			'ghichu'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'soluong.regex'=>'Số lượng không hợp lệ ',
			'giatri.regex'=>'Giá trị không không hợp lệ ',
			'code_km.regex'=>'Mã code không hợp lệ',
			'code_km.unique'=>'Mã code đã tồn tại',
			'ngaybatdau.before'=>'Ngày bắt đầu phải sớm hơn ngày kết thúc',
			'ngaybatdau.after'=>'Ngày bắt đầu không hợp lệ',
			'ngayketthuc.after'=>'Ngày kết thúc phải sau ngày bắt đầu',
			'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			if($request->loaikhuyenmai==0 && (($request->giatri)/1000)!=0)
			{
				$errors=array('0'=>'Giá trị tiền giảm không hợp lệ');
				return response()->json(['errors' => $errors]);
			}
			else if($request->loaikhuyenmai==1 && (($request->giatri)>100))
			{
				$errors=array('0'=>'Giá trị % giảm không hợp lệ');
				return response()->json(['errors' => $errors]);
			}
			else
			{
				$khuyenmai = new KhuyenMai;
				$khuyenmai->tenkhuyenmai=$request->tenkhuyenmai;
				$khuyenmai->loaikhuyenmai=$request->loaikhuyenmai;
				$khuyenmai->giatri=$request->giatri;
				$khuyenmai->soluong=$request->soluong;
				$khuyenmai->code_km=$request->code_km;
				$khuyenmai->ngaybatdau=$request->ngaybatdau;
				$khuyenmai->ngayketthuc=$request->ngayketthuc;
				$khuyenmai->ghichu=$request->ghichu;
				$khuyenmai->created_at=date('Y-m-d H:m:s');
				$khuyenmai->save();
				return response()->json(['success' => 'Thêm Thành Công!']);
			}
			
		}

	}
	public function destroy($id)
	{
		$data = KhuyenMai::find($id);
		$data->delete();
		return response()->json(['success' => 'Xóa Thành Công!']);
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = KhuyenMai::find($id);
			$batdau= date("Y-m-dTH:i",strtotime($data->ngaybatdau));
			$ketthuc= date("Y-m-dTH:i",strtotime($data->ngayketthuc));
			$batdau=str_replace("UTC", "T", $batdau);
			$ketthuc=str_replace("UTC", "T", $ketthuc);
			return response()->json(['data' => $data,'batdau'=>$batdau,'ketthuc'=>$ketthuc]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
			'soluong'=>'bail|regex:/([0-9]{2,9})$/|nullable',
			'giatri'    =>  'bail|regex:/([0-9]{1,9})$/',
			'code_km'=>'bail|regex:/([0-9a-zA-Z]{2,9})$/|unique:khuyen_mai,code_km,'.$request->hidden_id,
			'ngaybatdau'=>'bail|before:ngayketthuc|after:tomorrow',
			'ngayketthuc'=>'bail|after:ngaybatdau',
			'ghichu'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'soluong.regex'=>'Số lượng không hợp lệ ',
			'giatri.regex'=>'Giá trị không không hợp lệ ',
			'code_km.regex'=>'Mã code không hợp lệ',
			'code_km.unique'=>'Mã code đã tồn tại',
			'ngaybatdau.before'=>'Ngày bắt đầu phải sớm hơn ngày kết thúc',
			'ngaybatdau.after'=>'Ngày bắt đầu không hợp lệ',
			'ngayketthuc.after'=>'Ngày kết thúc phải sau ngày bắt đầu',
			'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			if($request->loaikhuyenmai==0 && (($request->giatri)/1000)!=0)
			{
				$errors=array('0'=>'Giá trị tiền giảm không hợp lệ');
				return response()->json(['errors' => $errors]);
			}
			else if($request->loaikhuyenmai==1 && (($request->giatri)>100))
			{
				$errors=array('0'=>'Giá trị % giảm không hợp lệ');
				return response()->json(['errors' => $errors]);
			}
			else
			{
				$khuyenmai = KhuyenMai::find($request->hidden_id);
				$khuyenmai->tenkhuyenmai=$request->tenkhuyenmai;
				$khuyenmai->loaikhuyenmai=$request->loaikhuyenmai;
				$khuyenmai->giatri=$request->giatri;
				$khuyenmai->soluong=$request->soluong;
				$khuyenmai->code_km=$request->code_km;
				$khuyenmai->ngaybatdau=$request->ngaybatdau;
				$khuyenmai->ngayketthuc=$request->ngayketthuc;
				$khuyenmai->ghichu=$request->ghichu;
				$khuyenmai->updated_at=date('Y-m-d H:m:s');
				$khuyenmai->save();
				return response()->json(['success' => 'Cập Nhật Thành Công!']);
			}
			
		}
	}
}
