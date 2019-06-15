<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhuVuc;
use Validator;
class KhuVucController extends Controller
{
	public function index()
	{
		if(request()->ajax())
		{
			return datatables()->of(KhuVuc::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.khuvuc.danhsach');
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			'name'    =>  'required|unique:khu_vuc,tenkhuvuc',
			'note'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'name.unique'=>'Tên khu vực đã tồn tại',
			'note.regex'=>'Mô tả không hợp lệ',
			'note.max'=>'Mô tả quá dài',
		]);

        //$validator = Validator::make($request->all(), $rules);

		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$khuvuc = new KhuVuc;
			$khuvuc->tenkhuvuc=$request->name;
			$khuvuc->ghichu=$request->note;
			$khuvuc->created_at=date('Y-m-d H:m:s');
			$khuvuc->save();
        //LoaiMon::create($form_data);

			return response()->json(['success' => 'Thêm Thành Công!']);
		}

	}
	public function destroy($id)
	{
		$khuvuc = KhuVuc::find($id);
		$khuvuc->delete();
		return response()->json(['success' => 'Xóa Thành Công!']);
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = KhuVuc::find($id);
			return response()->json(['data' => $data]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
			'name'    =>  'required|unique:khu_vuc,tenkhuvuc,'.$request->hidden_id,
			'note'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'note.regex'=>'Mô tả không hợp lệ',
			'note.max'=>'Mô tả quá dài',
		]);

        //$validator = Validator::make($request->all(), $rules);

		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$khuvuc = KhuVuc::find($request->hidden_id);
			$khuvuc->tenkhuvuc=$request->name;
			$khuvuc->ghichu=$request->note;
			$khuvuc->updated_at=date('Y-m-d H:m:s');
			$khuvuc->update();
			return response()->json(['success' => 'Cập Nhật Thành Công']);
		}
	}
}
