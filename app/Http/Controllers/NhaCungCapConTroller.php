<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhaCungCap;
use Validator;
class NhaCungCapConTroller extends Controller
{
	public function index()
	{
		if(request()->ajax())
		{
			return datatables()->of(NhaCungCap::select('nha_cung_cap.*')
				->latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm" title="Cập nhật" style="width:30px"><i class="fa fa-edit" ></i></button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" title="Xóa" style="width:30px"><i class="fa fa-trash"  ></i></button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.nhacungcap.danhsach');
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			'ten_ncc'=>'bail|regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,7})+([\s]*)+([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,7}))$/|min:3|max:50',
			'email'=>'bail|regex:/^([a-zA-Z0-9_\.\-])+\@([a-zA-Z0-9_\.\-])+([a-zA-Z0-9]{2,4})+$/|required|unique:nha_cung_cap,email',
			'sdt' => 'bail|regex:/(^(0[1-9])+([0-9]{8,10}))$/|unique:nha_cung_cap,sdt',
		],
		[
			'ten_ncc.regex'=>'Tên nhà cung cấp không hợp lệ',
			'ten_ncc.min'=>'Tên nhà cung cấp quá ngắn',
			'ten_ncc.max'=>'Tên nhà cung cấp quá dài',
			'email.regex'=>'Vui lòng nhập đúng định dạng email',
			'email.unique'=>'Email đã tồn tại',
			'sdt.regex'=>'Số điện thoại không hợp lệ',
			'sdt.unique'=>'Số điện thoại đã tồn tại',
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data = new NhaCungCap;
			$data->tennhacungcap=$request->ten_ncc;
			$data->email=$request->email;
			$data->sdt=$request->sdt;
			$data->diachi=$request->diachi;
			$data->ghichu=$request->ghichu;
			$data->created_at=date('Y-m-d H:i:s');
			$data->save();
			return response()->json(['success' => 'Thêm Thành Công!']);
		}
	}
	public function destroy($id)
	{
		$data = NhaCungCap::find($id);
		$data->delete();
		return response()->json(['success' => 'Xóa Thành Công!']);
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = NhaCungCap::find($id);
			return response()->json(['data' => $data]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
			'ten_ncc'=>'bail|regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,7})+([\s]*)+([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,7}))$/|min:3|max:50',
			'email'=>'bail|regex:/^([a-zA-Z0-9_\.\-])+\@([a-zA-Z0-9_\.\-])+([a-zA-Z0-9]{2,4})+$/|required|unique:nha_cung_cap,email,'.$request->hidden_id,
			'sdt' => 'bail|regex:/(^(0[1-9])+([0-9]{8,10}))$/|unique:nha_cung_cap,sdt,'.$request->hidden_id,
		],
		[
			'ten_ncc.regex'=>'Tên nhà cung cấp không hợp lệ',
			'ten_ncc.min'=>'Tên nhà cung cấp quá ngắn',
			'ten_ncc.max'=>'Tên nhà cung cấp quá dài',
			'email.regex'=>'Vui lòng nhập đúng định dạng email',
			'email.unique'=>'Email đã tồn tại',
			'sdt.regex'=>'Số điện thoại không hợp lệ',
			'sdt.unique'=>'Số điện thoại đã tồn tại',
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data = NhaCungCap::find($request->hidden_id);
			$data->tennhacungcap=$request->ten_ncc;
			$data->email=$request->email;
			$data->sdt=$request->sdt;
			$data->diachi=$request->diachi;
			$data->ghichu=$request->ghichu;
			$data->created_at=date('Y-m-d H:i:s');
			$data->save();
			return response()->json(['success' => 'Cập Nhật Thành Công!']);
		}
	}
}
