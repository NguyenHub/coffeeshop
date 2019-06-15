<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CaLam;
use Validator;
class CaLamController extends Controller
{
    public function index()
	{
		if(request()->ajax())
		{
			return datatables()->of(CaLam::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm" title="Cập Nhật" style="width:30px"><i class="fa fa-edit"  ></i></button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" title="Xóa" style="width:30px"><i class="fa fa-trash"></i></button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.calam.danhsach');
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			'tenca'    =>  'unique:ca_lam,tenca',
			//'ngaybatdau'=>'bail|before:ngayketthuc|after:tomorrow',
			//'ngayketthuc'=>'bail|after:ngaybatdau',
			'ghichu'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'tenca.unique'=>'Tên ca đã tồn tại',
			//'ngaybatdau.before'=>'Ngày bắt đầu phải sớm hơn ngày kết thúc',
			//'ngaybatdau.after'=>'Ngày bắt đầu không hợp lệ',
			//'ngayketthuc.after'=>'Ngày kết thúc phải sau ngày bắt đầu',
			'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			
				$data = new CaLam;
				$data->tenca=$request->tenca;
				$data->giobatdau=$request->giobatdau;
				$data->gioketthuc=$request->gioketthuc;
				$data->ghichu=$request->ghichu;
				$data->created_at=date('Y-m-d H:m:s');
				$data->save();
				return response()->json(['success' => 'Thêm Thành Công!']);			
		}

	}
	public function destroy($id)
	{
		$data = CaLam::find($id);
		//$data->delete();
		return response()->json(['success' => 'Xóa Thành Công!']);
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = CaLam::find($id);
			return response()->json(['data' => $data]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
			'tenca'    =>  'unique:ca_lam,tenca,'.$request->hidden_id,
			//'ngaybatdau'=>'bail|before:ngayketthuc|after:tomorrow',
			//'ngayketthuc'=>'bail|after:ngaybatdau',
			'ghichu'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'tenca.unique'=>'Tên ca đã tồn tại',
			//'ngaybatdau.before'=>'Ngày bắt đầu phải sớm hơn ngày kết thúc',
			//'ngaybatdau.after'=>'Ngày bắt đầu không hợp lệ',
			//'ngayketthuc.after'=>'Ngày kết thúc phải sau ngày bắt đầu',
			'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			
				$data = CaLam::find($request->hidden_id);
				$data->tenca=$request->tenca;
				$data->giobatdau=$request->giobatdau;
				$data->gioketthuc=$request->gioketthuc;
				$data->ghichu=$request->ghichu;
				$data->created_at=date('Y-m-d H:m:s');
				$data->save();
				return response()->json(['success' => 'Cập Nhật Thành Công!']);			
		}

	}
}
