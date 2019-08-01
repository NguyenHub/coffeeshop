<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChucVu;
use App\Luong;
use Validator;
class ChucVuController extends Controller
{
    public function index()
	{//t dang thu lam cai chuc vu
		//cai mon load kieu kia thi bthg
		$luong = Luong::all();
		// $luong=response() ->json([$luong]);
		// if(request()->ajax())
		//  {				
		// 	$table= datatables()->of(ChucVu::latest()->get())
		// 	->addColumn('action', function($data){
		// 		$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
		// 		$button .= '&nbsp;&nbsp;';
		// 		$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
		// 		return $button;
		// 	})
		// 	->rawColumns(['action'])
		// 	->make(true);
		// 	return (['table'=>$table]);//chổ này nêu t return keu nay thi nó gửi cái json loại qa đc
		// }
		if(request()->ajax())
		 {				
			return datatables()->of(ChucVu::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.chucvu.danhsach',['luong'=>$luong]);
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			'tenchucvu'=>'unique:chuc_vu,tenchucvu',
		],
		[
			'tenchucvu.unique'=>'Chức vụ đã tồn tại',
		]);

        //$validator = Validator::make($request->all(), $rules);

		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data = new ChucVu;
			//$tenchucvu= strtolower($request->tenchucvu);
			$data->tenchucvu=ucwords($request->tenchucvu);
			$data->maluong=$request->luongcoban;
			$data->created_at=date('Y-m-d H:i:s');
			$data->save();
			return response()->json(['success' => 'Thêm Thành Công!']);
		}

	}
	public function destroy($id)
	{
		$data = ChucVu::find($id);
		$data->delete();
		return response()->json(['success' => 'Xóa Thành Công!']);
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = ChucVu::find($id);
			return response()->json(['data' => $data]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
				'tenchucvu'=>'unique:chuc_vu,tenchucvu,'.$request->hidden_id,
		],
		[
			'tenchucvu.unique'=>'Tên chức vụ đã tồn tại',
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data = ChucVu::find($request->hidden_id);
			$data->tenchucvu=$request->tenchucvu;
			$data->maluong=$request->luongcoban;
			$data->updated_at=date('Y-m-d H:i:s');
			$data->update();
			return response()->json(['success' => 'Cập Nhật Thành Công']);
		}
	}
}
