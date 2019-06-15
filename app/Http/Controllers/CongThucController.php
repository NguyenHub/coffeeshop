<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CongThuc;
use App\Mon;
use App\NguyenLieu;
use App\ChiTietCongThuc;
use Validator;
class CongThucController extends Controller
{
	public function index()
	{
		$data=Mon::all();
		$nguyenlieu=NguyenLieu::all();
		if(request()->ajax())
		{
			return datatables()->of(CongThuc::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.congthuc.danhsach',['data'=>$data,'nguyenlieu'=>$nguyenlieu]);
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			// 'tenkhuyenmai'    =>  'required',
			// 'soluong'    =>  'required',
			//'nguyenlieu.*'=>'required|unique:chitiet_congthuc,macongthuc,manguyenlieu',
			'dinhluong.*'=>'bail|regex:/([0-9]{1,9})$/',
			'ghichu.*'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'nguyenlieu.unique'=>'Nguyên liệu bị trùng',
			'dinhluong.regex'=>'Định lượng không không hợp lệ ',
			'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			if(count($request->nguyenlieu)>0)
			{
				$data = new CongThuc;
				$data->mamon=$request->mamon;
				$data->tencongthuc=ucwords($request->tencongthuc);
				$data->ghichu=$request->ghichu;
				$data->created_at=date('Y-m-d H:m:s');
				$data->save();
				//CongThuc::insert($data)->id;
				// $manguyenlieu = $request->nguyenlieu;
				// $dinhluong = $request->dinhluong;
				// $donvitinh = $request->donvitinh;
				// $ghichu = $request->note;
				// for($count = 0; $count < count($manguyenlieu); $count++)
				// {
				// 	$chitiet = array(
				// 		'macongthuc' => 14,
				// 		'manguyenlieu' => $manguyenlieu[$count],
				// 		'dinhluong'  => $dinhluong[$count],
				// 		'donvitinh'  => $donvitinh[$count],
				// 		'ghichu'  => $ghichu[$count]
				// 	);
				// 	$insert_data[] = $chitiet; 
					
				// }
				// ChiTietCongThuc::insert($insert_data);
				return response()->json(['success' => 'Thêm Thành Công!','lastid'=>$lastid]);
			}
			
		}

	}
	function insert(Request $request)
	{
		if($request->ajax())
		{
			$rules = array(
				'first_name.*'  => 'required',
				'last_name.*'  => 'required'
			);
			$error = Validator::make($request->all(), $rules);
			if($error->fails())
			{
				return response()->json([
					'error'  => $error->errors()->all()
				]);
			}

			$first_name = $request->first_name;
			$last_name = $request->last_name;
			for($count = 0; $count < count($first_name); $count++)
			{
				$data = array(
					'first_name' => $first_name[$count],
					'last_name'  => $last_name[$count]
				);
				$insert_data[] = $data; 
			}

			ChiTietCongThuc::insert($insert_data);
			return response()->json([
				'success'  => 'Data Added successfully.'
			]);
		}
	}
	public function destroy($id)
	{
		$data = CongThuc::find($id);
		$data->delete();
		return response()->json(['success' => 'Xóa Thành Công!']);
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = Mon::find($id);
			return response()->json(['data' => $data]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
			// 'tenkhuyenmai'    =>  'required',
			// 'soluong'    =>  'required',
			'tenmon'=>'required|unique:mon,tenmon,'.$request->hidden_id,
			'dongia'=>'bail|regex:/([0-9]{1,9})$/',
			'ghichu'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'dongia.regex'=>'Giá trị không không hợp lệ ',
			'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			if(($request->dongia % 500)!=0)
			{
				$errors=array('0'=>'Đơn giá không hợp lệ');
				return response()->json(['errors' => $errors]);
			}
			else
			{
				$data = Mon::find($request->hidden_id);
				$data->maloai=$request->maloai;
				$data->tenmon=ucwords($request->tenmon);
				$data->dongia=$request->dongia;
				$data->trangthai=$request->trangthai;
				$data->ghichu=$request->ghichu;
				$data->updated_at=date('Y-m-d H:m:s');
				$data->save();
				return response()->json(['success' => 'Cập Nhật Thành Công!']);
			}

		}
	}
}
