<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguyenLieu;
use App\ChiTietCongThuc;
use Validator;
class NguyenLieuController extends Controller
{
	public function index()
	{
		if(request()->ajax())
		{
			return datatables()->of(NguyenLieu::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.nguyenlieu.danhsach');
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			// 'tenkhuyenmai'    =>  'required',
			// 'soluong'    =>  'required',
			'tennguyenlieu'=>'unique:nguyen_lieu,tennguyenlieu',
			//'soluong'=>'bail|regex:/([0-9]{1,9})$/',
			'ghichu'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'tennguyenlieu.unique'=>'Tên nguyên liệu đã tồn tại',
			//'soluong.regex'=>'Số lượng không hợp lệ ',
			'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data = new NguyenLieu;
			$data->tennguyenlieu= mb_strtoupper($request->tennguyenlieu,'UTF-8');
			$data->soluong=0;
			$data->donvitinh=$request->donvitinh;
			$data->ghichu=$request->ghichu;
			$data->created_at=date('Y-m-d H:i:s');
			$data->save();
			return response()->json(['success' => 'Thêm Thành Công!']);
		}
	}
	public function destroy($id)
	{
		$data = NguyenLieu::find($id);
		$count=ChiTietCongThuc::where('chitiet_congthuc.manguyenlieu',$id)->count();
		if($count<1)
		{
			$data->delete();
			return response()->json(['success' => 'Xóa Thành Công!']);
		}
		else
		{
			return response()->json(['errors' => 'Nguyên Liệu Có Trong Công Thức-Không Thể Xóa!']);
		}
		
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = NguyenLieu::find($id);
			return response()->json(['data' => $data]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
			// 'tenkhuyenmai'    =>  'required',
			// 'soluong'    =>  'required',
			'tennguyenlieu'=>'unique:nguyen_lieu,tennguyenlieu,'.$request->hidden_id,
			'soluong'=>'bail|regex:/([0-9]{1,9})$/',
			'ghichu'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'tennguyenlieu.unique'=>'Tên nguyên liệu đã tồn tại',
			'soluong.regex'=>'Số lượng không hợp lệ ',
			'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data = NguyenLieu::find($request->hidden_id);
			$data->tennguyenlieu=mb_strtoupper($request->tennguyenlieu,'UTF-8');
			$data->soluong=$request->soluong;
			$data->donvitinh=$request->donvitinh;
			$data->ghichu=$request->ghichu;
			$data->updated_at=date('Y-m-d H:i:s');
			$data->save();
			return response()->json(['success' => 'Cập Nhật Thành Công!']);
		}
	}
}
