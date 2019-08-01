<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ban;
Use App\KhuVuc;
use Validator;
use Illuminate\Support\Facades\DB;
class BanController extends Controller
{
	public function index()
	{
		$khuvuc = KhuVuc::all();
		if(request()->ajax())
		{
			return datatables()->of(DB::table('ban')
				->join('khu_vuc','ban.makhuvuc','khu_vuc.id')
				->select('ban.*','khu_vuc.tenkhuvuc')
				->latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.ban.danhsach',['khuvuc'=>$khuvuc]);
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			'soban'=>'regex:/([0-9]{1,3})$/|max:3'
		],
		[
			'soban.regex'=>'Số bàn không hợp lệ',
			'soban.max'=>'Số bàn quá lớn',
		]);

        //$validator = Validator::make($request->all(), $rules);

		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$ban = new Ban;
			$ban->makhuvuc=$request->khuvuc;
			$ban->soban=$request->soban;
			$ban->trangthai=$request->trangthai;
			$ban->created_at=date('Y-m-d H:i:s');
			$ban->save();
        //LoaiMon::create($form_data);

			return response()->json(['success' => 'Thêm Thành Công!']);
		}

	}
	public function destroy($id)
	{
		$ban = Ban::find($id);
		$ban->delete();
		return response()->json(['success' => 'Xóa Thành Công!']);
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = Ban::find($id);
			return response()->json(['data' => $data]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
				'soban'=>'regex:/([0-9]{1,3})$/|max:3'
		],
		[
			'soban.regex'=>'Số bàn không hợp lệ',
			'soban.max'=>'Số bàn quá lớn',
		]);

        //$validator = Validator::make($request->all(), $rules);

		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$ban = Ban::find($request->hidden_id);
			$ban->makhuvuc=$request->khuvuc;
			$ban->soban=$request->soban;
			$ban->trangthai=$request->trangthai;
			$ban->updated_at=date('Y-m-d H:i:s');
			$ban->update();
			return response()->json(['success' => 'Cập Nhật Thành Công']);
		}
	}
}
