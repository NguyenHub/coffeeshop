<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CongThuc;
use App\Mon;
use App\NguyenLieu;
use App\ChiTietCongThuc;
use DB;
use Validator;
class CongThucController extends Controller
{
	public function index()
	{
		$data1=Mon::select('mon.id','mon.tenmon')
		// ->whereNotIn('mon.id',function($query)
		// {
		// 	$query->select('mamon')->from('cong_thuc');
		// })
		->get();
		$nguyenlieu=NguyenLieu::select('nguyen_lieu.id','nguyen_lieu.tennguyenlieu')->get();
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
		return view('admin.congthuc.danhsach',['data'=>$data1,'nguyenlieu'=>$nguyenlieu]);
	}
	public function add( Request $request)
	{
		//dd($request);
		$validator =Validator::make($request->all(),[
			// 'tenkhuyenmai'    =>  'required',
			// 'soluong'    =>  'required',
			'mamon'=>'unique:cong_thuc,mamon',
			'dinhluong.*'=>'bail|regex:/([0-9]{1,9})$/',
			'ghichu.*'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			'mamon.unique'=>'Sản phẩm đã có công thức',
			//'manguyenlieu.required'=>'Vui lòng chọn nguyên liệu',
			'dinhluong.regex'=>'Định lượng không không hợp lệ ',
			'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			if(count($request->manguyenlieu)>0)
			{
				$data = new CongThuc;
				$data->mamon=$request->mamon;
				$data->tencongthuc=ucwords($request->tencongthuc);
				$data->ghichu=$request->ghichu;
				$data->created_at=date('Y-m-d H:m:s');
				$data->save();
				$manguyenlieu = $request->manguyenlieu;
				$dinhluong = $request->dinhluong;
				$donvitinh = $request->donvitinh;
				$ghichu = $request->note;
				for($count = 0; $count < count($manguyenlieu); $count++)
				{
					$chitiet = array(
						'macongthuc' => $data->id,
						'manguyenlieu' => $manguyenlieu[$count],
						'dinhluong'  => $dinhluong[$count],
						'donvitinh'  => $donvitinh[$count],
						'ghichu'  => $ghichu[$count],
					);
					$insert_data[] = $chitiet; 
				}
				ChiTietCongThuc::insert($insert_data);
				return response()->json(['success' => 'Thêm Thành Công!']);
			}
			
		}
	}
	public function destroy($id)
	{
		$data = CongThuc::find($id);
		$data->delete();
		$data2=ChiTietCongThuc::Where('macongthuc',$id);
		$data2->delete();
		return response()->json(['success' => 'Xóa Thành Công!']);
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = CongThuc::find($id);
			$data2=DB::table('chitiet_congthuc')
			->join('nguyen_lieu','chitiet_congthuc.manguyenlieu','=','nguyen_lieu.id')
			->select('nguyen_lieu.tennguyenlieu','chitiet_congthuc.*')
			->where('chitiet_congthuc.macongthuc',$id)
			->get();
			return response()->json(['data' => $data,'data2'=>$data2]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
			// 'tenkhuyenmai'    =>  'required',
			// 'soluong'    =>  'required',
			//'tenmon'=>'required|unique:mon,tenmon,'.$request->hidden_id,
			//'dongia'=>'bail|regex:/([0-9]{1,9})$/',
			'ghichu'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
		],
		[
			//'dongia.regex'=>'Giá trị không không hợp lệ ',
			//'ghichu.regex'=>'Ghi chú không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data = CongThuc::find($request->hidden_id);
			$data->tencongthuc=$request->tencongthuc;
			$data->ghichu=$request->ghichu;
			$data->updated_at=date('Y-m-d H:m:s');
			$data->save();
			return response()->json(['success' => 'Cập Nhật Thành Công!']);
		}
	}
	public function UpdateDetail(Request $request, $id)
	{
		$data= ChiTietCongThuc::find($id);
		$data->dinhluong=$request->dinhluong;
		$data->donvitinh=$request->donvitinh;
		$data->ghichu=$request->ghichu;
		$data->save();
		return response()->json(['success'=>'Cập nhật thành công']);
	}
	public function AddDetail(Request $request, $id)
	{
		$data=new ChiTietCongThuc;
		$data->macongthuc=$id;
		$data->manguyenlieu=$request->manguyenlieu;
		$data->dinhluong=$request->dinhluong;
		$data->donvitinh=$request->donvitinh;
		$data->save();
		return response()->json(['success'=>'Thêm chi tiết thành công']);
	}
	public function DeleteDetail($id)
	{
		$data=ChiTietCongThuc::find($id);
		$data->delete();
		return response()->json(['success'=>'Xóa chi tiết thành công']);
	}
}
