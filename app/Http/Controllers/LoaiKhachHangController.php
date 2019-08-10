<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiKhachHang;
use App\KhachHang;
use Validator;
class LoaiKhachHangController extends Controller
{
    public function index()
	{
		if(request()->ajax())
		{
			return datatables()->of(LoaiKhachHang::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.loaikhachhang.danhsach');
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			'tenloai'    =>  'required|unique:loai_khach_hang,tenloai',
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
			$loaikhach = new LoaiKhachHang;
			$loaikhach->tenloai=$request->tenloai;
			$loaikhach->created_at=date('Y-m-d H:i:s');
			$loaikhach->save();
        //LoaiMon::create($form_data);

			return response()->json(['success' => 'Thêm Thành Công!']);
		}

	}
	public function destroy($id)
	{
		$loaikhach = LoaiKhachHang::find($id);
		$count=KhachHang::Where('khach_hang.loaikhachhang',$id)->count();
		if($count<1)
		{
			$loaikhach->delete();
			return response()->json(['success' => 'Xóa Thành Công!']);
		}
		else
		{
			return response()->json(['errors' => 'Tồn Khách Hàng Thuộc Loại Này-Xóa Thất Bại!']);
		}
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = LoaiKhachHang::find($id);
			return response()->json(['data' => $data]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
			'tenloai'    =>  'required|unique:loai_khach_hang,tenloai,'.$request->hidden_id,
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
			$loaikhach = LoaiKhachHang::find($request->hidden_id);
			$loaikhach->tenloai=$request->tenloai;
			$loaikhach->updated_at=date('Y-m-d H:i:s');
			$loaikhach->update();
			return response()->json(['success' => 'Cập Nhật Thành Công']);
		}
	}
}
