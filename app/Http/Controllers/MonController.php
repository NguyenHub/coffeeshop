<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\LoaiMon;
use App\Mon;
use Illuminate\Support\Facades\DB;
class MonController extends Controller
{
	// $data=DB::table('donhang')
	// ->select('donhang.*')
	// ->where('donhang.ma_kh','=',$id)
	// ->get();
	public function index()
	{
		$loai=LoaiMon::all();
		if(request()->ajax())
		{
			$phanloai= response()->json(['loai'=>$loai]);
			return datatables()->of(DB::table('mon')
				->join('loai_mon','mon.maloai','loai_mon.id')
				->select('mon.*','loai_mon.tenloai')
				->latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
			
		}
		return view('admin.sanpham.danhsach',['data'=>$loai]);
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			// 'tenkhuyenmai'    =>  'required',
			// 'soluong'    =>  'required',
			'tenmon'=>'required|unique:mon,tenmon',
			'dongia'=>'bail|regex:/([0-9]{1,9})$/',
			//'hinhanh' => 'image|mimes:jpg,png,gif',
			'hinhanh' => 'image',
			'ghichu'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'dongia.regex'=>'Giá trị không không hợp lệ ',
			'hinhanh.image' => 'Không đúng định dạng hình ảnh',
			'hinhanh.mimes'=>'Vui lòng chọn file .jpg,png,gif',
			'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$request->dongia=str_replace(" ", "", $request->dongia);
			if(($request->dongia % 500)!=0)
			{
				$errors=array('0'=>'Đơn giá không hợp lệ');
				return response()->json(['errors' => $errors]);
			}
			else
			{
				$file=$request->file('hinhanh');
				$name=$file->getClientOriginalName();
				$file->move('hinhanh/upload/',$name);
				$data = new Mon;
				$data->maloai=$request->maloai;
				$data->tenmon=ucwords($request->tenmon);
				$data->dongia=$request->dongia;
				$data->hinhanh=$name;
				$data->trangthai=$request->trangthai;
				$data->ghichu=$request->ghichu;
				$data->mota=$request->mota;
				$data->created_at=date('Y-m-d H:i:s');
				$data->save();
				//dd($data);
				return response()->json(['success' => 'Thêm Thành Công!']);
			}
			
		}

	}
	public function destroy($id)
	{
		$data = Mon::find($id);
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
		$file=$request->file('hinhanh');
		//$name=$file->getClientOriginalName();
		if($file!=null)
		{
			$validator =Validator::make($request->all(),[
				'tenmon'=>'required|unique:mon,tenmon,'.$request->hidden_id,
				'dongia'=>'bail|regex:/([0-9]{1,9})$/',
				//'hinhanh' => 'bail|image|mimes:jpg,png,gif',
				'ghichu'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
			],
			[
				'tenmon.unique'=>'Tên món đã tồn tại',
				'dongia.regex'=>'Giá trị không không hợp lệ ',
				'hinhanh.image' => 'Không đúng định dạng hình ảnh',
				'hinhanh.mimes'=>'Vui lòng chọn file .jpg,png,gif',
				'ghichu.regex'=>'Ghi chú không hợp lệ'
			]);
			if($validator->fails())
			{
				return response()->json(['errors' => $validator->errors()->all()]);
			}
			else
			{
				$request->dongia=str_replace(" ", "", $request->dongia);
				if(($request->dongia % 500)!=0)
				{
					$errors=array('0'=>'Đơn giá không hợp lệ');
					return response()->json(['errors' => $errors]);
				}
				else
				{
					$name=$file->getClientOriginalName();
					$file->move('hinhanh/upload/',$name);
					$data = Mon::find($request->hidden_id);
					$data->maloai=$request->maloai;
					$data->tenmon=ucwords($request->tenmon);
					$data->dongia=$request->dongia;
					$data->hinhanh=$name;
					$data->trangthai=$request->trangthai;
					$data->mota=$request->mota;
					$data->ghichu=$request->ghichu;
					$data->updated_at=date('Y-m-d H:i:s');
					$data->save();
					return response()->json(['success' => 'Cập Nhật Thành Công!']);
				}

			}
		}
		else
		{
			$validator =Validator::make($request->all(),[
				'tenmon'=>'required|unique:mon,tenmon,'.$request->hidden_id,
				'dongia'=>'bail|regex:/([0-9]{1,9})$/',
				'ghichu'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
			],
			[
				'tenmon.unique'=>'Tên món đã tồn tại',
				'dongia.regex'=>'Giá trị không không hợp lệ ',
				'ghichu.regex'=>'Ghi chú không hợp lệ'
			]);
			if($validator->fails())
			{
				return response()->json(['errors' => $validator->errors()->all()]);
			}
			else
			{
				$request->dongia=str_replace(" ", "", $request->dongia);
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
					$data->mota=$request->mota;
					$data->updated_at=date('Y-m-d H:i:s');
					$data->save();
					return response()->json(['success' => 'Cập Nhật Thành Công!']);
				}

			}
		}
	}
}
