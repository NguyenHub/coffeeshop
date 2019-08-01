<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Luong;
use Validator;
class LuongController extends Controller
{
   public function index()
	{
		if(request()->ajax())
		{
			return datatables()->of(Luong::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.luong.danhsach');
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			'luongcoban'    =>  'required|unique:luong,luongcoban',
			// 'note'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'luongcoban.unique'=>'Tên loại đã tồn tại',
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
			$data = new Luong;
			$data->luongcoban=str_replace(" ", "", $request->luongcoban) ;
			$data->created_at=date('Y-m-d H:i:s');
			$data->save();
        //LoaiMon::create($form_data);
			return response()->json(['success' => 'Thêm Thành Công!']);
		}

	}
	public function destroy($id)
	{
		$data = Luong::find($id);
		$data->delete();
		return response()->json(['success' => 'Xóa Thành Công!']);
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = Luong::find($id);
			return response()->json(['data' => $data]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
			'luongcoban'    =>  'required|unique:luong,luongcoban,'.$request->hidden_id,
			// 'note'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'luongcoban.unique'=>'Tên loại đã tồn tại',
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
			$data = Luong::find($request->hidden_id);
			$data->luongcoban=str_replace(" ", "", $request->luongcoban) ;
			$data->updated_at=date('Y-m-d H:i:s');
			$data->update();
			return response()->json(['success' => 'Cập Nhật Thành Công']);
		}
	}
}
