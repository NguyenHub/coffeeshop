<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiNhanVien;
use App\NhanVien;
use Validator;
class LoaiNhanVienController extends Controller
{
	public function index()
	{
		if(request()->ajax())
		{
			return datatables()->of(LoaiNhanVien::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.loainhanvien.danhsach');
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			'tenloai'    =>  'required|unique:loai_nhan_vien,tenloai',
			// 'note'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'tenloai.unique'=>'Tên loại đã tồn tại',
			// 'note.regex'=>'Mô tả không hợp lệ',
			// 'note.max'=>'Mô tả quá dài',
		]);

        //$validator = Validator::make($request->all(), $rules);

		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data = new LoaiNhanVien;
			$data->tenloai=$request->tenloai;
			$data->created_at=date('Y-m-d H:m:s');
			$data->save();
        //LoaiMon::create($form_data);

			return response()->json(['success' => 'Thêm Thành Công!']);
		}

	}
	public function destroy($id)
	{
		$nhavien=NhanVien::Where('maloai',$id)->count('maloai');
		if($nhavien<1)
		{
			$data = LoaiNhanVien::find($id);
			$data->delete();
			return response()->json(['success' => 'Xóa Thành Công!']);
		}
		else
		{
			$errors=array('0'=>'Tồn tại nhân viên thuộc loại này!');
			return response()->json(['errors' => $errors]);
		}
		
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = LoaiNhanVien::find($id);
			return response()->json(['data' => $data]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
			'tenloai'    =>  'required|unique:loai_nhan_vien,tenloai,'.$request->hidden_id,
		],
		[
			'tenloai.unique'=>'Tên loại đã tồn tại',
		]);

        //$validator = Validator::make($request->all(), $rules);

		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data = LoaiNhanVien::find($request->hidden_id);
			$data->tenloai=$request->tenloai;
			$data->updated_at=date('Y-m-d H:m:s');
			$data->update();
			return response()->json(['success' => 'Cập Nhật Thành Công']);
		}
	}
}
