<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use Illuminate\Support\Facades\Auth;
use Validator;
class TinTucController extends Controller
{
	public function index()
	{
		if(request()->ajax())
		{				
			return datatables()->of(TinTuc::latest()->get())
			->addColumn('action', function($data){
				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
				$button .= '&nbsp;&nbsp;';
				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
				return $button;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('admin.tintuc.danhsach');
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			'tieude'=>'max:200',
		],
		[
			'tieude.max'=>'Tiêu đề quá dài',
		]);

        //$validator = Validator::make($request->all(), $rules);

		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$file=$request->file('hinhanh');
			$name=$file->getClientOriginalName();
			$file->move('hinhanh/upload/',$name);
			$data = new TinTuc;
			$data->manv=Auth::guard('nhan_vien')->user()->id;
			$data->tieude=$request->tieude;
			$data->noidung=$request->noidung;
			$data->hinhanh=$name;
			$data->created_at=date('Y-m-d H:i:s');
			$data->save();
			return response()->json(['success' => 'Thêm Thành Công!']);
		}
	}
	public function destroy($id)
	{
		$data = TinTuc::find($id);
		$data->delete();
		return response()->json(['success' => 'Xóa Thành Công!']);
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = TinTuc::find($id);
			return response()->json(['data' => $data]);
		}
	}
	public function update(Request $request)
	{
		$file=$request->file('hinhanh');
		if($file!=null)
		{
			$validator =Validator::make($request->all(),[

				'tieude'=>'max:200',
			],
			[
				'tieude.max'=>'Tiêu đề quá dài',
			]);
			if($validator->fails())
			{
				return response()->json(['errors' => $validator->errors()->all()]);
			}
			else
			{
				$name=$file->getClientOriginalName();
				$file->move('hinhanh/upload/',$name);
				$data = TinTuc::find($request->hidden_id);
				$data->tieude=$request->tieude;
				$data->noidung=$request->noidung;
				$data->hinhanh=$name;
				$data->updated_at=date('Y-m-d H:i:s');
				$data->save();
				return response()->json(['success' => 'Cập Nhật Thành Công!']);
			}
		}
		else
		{
			$validator =Validator::make($request->all(),[
				'tieude'=>'max:200',
			],
			[
				'tieude.max'=>'Tiêu đề quá dài',
			]);
			if($validator->fails())
			{
				return response()->json(['errors' => $validator->errors()->all()]);
			}
			else
			{
				$data = TinTuc::find($request->hidden_id);
				$data->tieude=$request->tieude;
				$data->noidung=$request->noidung;
				$data->updated_at=date('Y-m-d H:i:s');
				$data->save();
				return response()->json(['success' => 'Cập Nhật Thành Công!']);
			}
		}
	}
}
