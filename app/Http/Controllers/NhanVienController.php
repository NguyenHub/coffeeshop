<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
use App\LoaiNhanVien;
use App\ChucVu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
class NhanVienController extends Controller
{
	public function index()
	{
		$loainhanvien=LoaiNhanVien::all();
		$chucvu=ChucVu::all();
		if(request()->ajax())
		{
			return datatables()->of(DB::table('nhan_vien')
				->join('chuc_vu','nhan_vien.machucvu','=','chuc_vu.id')
				->join('loai_nhan_vien','nhan_vien.maloai','=','loai_nhan_vien.id')
				->select('nhan_vien.*','chuc_vu.tenchucvu','loai_nhan_vien.tenloai')
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
		return view('admin.nhanvien.danhsach',['loainhanvien'=>$loainhanvien,'chucvu'=>$chucvu]);
	}
	public function add( Request $request)
	{
		$validator =Validator::make($request->all(),[
			'tennhanvien'=>'bail|regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,7})+([\s]*)+([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,7}))$/|min:5|max:50',
			'email'=>'bail|regex:/^([a-zA-Z0-9_\.\-])+\@([a-zA-Z0-9_\.\-])+([a-zA-Z0-9]{2,4})+$/|required|unique:nhan_vien,email',
			'cmnd'=>'bail|digits:9|required|unique:nhan_vien,cmnd',
			'sdt' => 'bail|regex:/(^(0[1-9])+([0-9]{8,10}))$/|unique:nhan_vien,sdt',
		],
		[
			'tennhanvien.regex'=>'Tên nhân viên không hợp lệ',
			'tennhanvien.min'=>'Tên nhân viên quá ngắn',
			'tennhanvien.max'=>'Tên nhân viên quá dài',
			'email.regex'=>'Vui lòng nhập đúng định dạng email',
			'email.unique'=>'Email đã tồn tại',
			'cmnd.regex'=>'Số chứng minh không hợp lệ',
			'cmnd.digits'=>'Vui lòng nhập đủ 9 số',
			'cmnd.unique'=>'Số chứng minh đã tồn tại',
			'sdt.regex'=>'Số điện thoại không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data = new NhanVien;
			$data->tennhanvien=ucwords($request->tennhanvien);
			$data->ngaysinh=date('Y-m-d',strtotime(str_replace("/", "-",$request->ngaysinh)));
			$data->gioitinh=$request->gioitinh;
			$data->email=$request->email;
			$data->password=bcrypt($request->email);
			$data->sdt=$request->sdt;
			$data->trangthai=0;
			$data->diachi=$request->diachi;
			$data->machucvu=$request->chucvu;
			$data->maloai=$request->loainhanvien;
			$data->cmnd=$request->cmnd;
			$data->ngayvaolam=date('Y-m-d',strtotime(str_replace("/", "-",$request->ngayvaolam)));
			$data->ghichu=$request->ghichu;
			$data->created_at=date('Y-m-d H:m:s');
			$data->save();
			return response()->json(['success' => 'Thêm Thành Công!']);
		}

	}
	public function destroy($id)
	{
		$data = NhanVien::find($id);
		$data->delete();
		return response()->json(['success' => 'Xóa Thành Công!']);
	}
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = NhanVien::find($id);
			$ngaysinh=date('d/m/Y',strtotime($data->ngaysinh));
			$ngayvaolam=date('d/m/Y',strtotime($data->ngayvaolam));
			return response()->json(['data' => $data,'ngaysinh'=>$ngaysinh,'ngayvaolam'=>$ngayvaolam]);
		}
	}
	public function update(Request $request)
	{
		$validator =Validator::make($request->all(),[
			'tennhanvien'=>'bail|regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,7})+([\s]*)+([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,7}))$/|min:5|max:50',
			'email'=>'bail|regex:/^([a-zA-Z0-9_\.\-])+\@([a-zA-Z0-9_\.\-])+([a-zA-Z0-9]{2,4})+$/|required|unique:nhan_vien,email,'.$request->hidden_id,
			'cmnd'=>'bail|digits:9|required|unique:nhan_vien,cmnd,'.$request->hidden_id,
			'sdt' => 'bail|regex:/(^(0[1-9])+([0-9]{8,10}))$/|unique:nhan_vien,sdt,'.$request->hidden_id,
		],
		[
			'tennhanvien.regex'=>'Tên nhân viên không hợp lệ',
			'tennhanvien.min'=>'Tên nhân viên quá ngắn',
			'tennhanvien.max'=>'Tên nhân viên quá dài',
			'email.regex'=>'Vui lòng nhập đúng định dạng email',
			'email.unique'=>'Email đã tồn tại',
			'tennhanvien.regex'=>'Tên nhân viên không hợp lệ',
			'cmnd.regex'=>'Số chứng minh không hợp lệ',
			'cmnd.digits'=>'Vui lòng nhập đủ 9 số',
			'cmnd.unique'=>'Số chứng minh đã tồn tại',
			'sdt.regex'=>'Số điện thoại không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data =NhanVien::find($request->hidden_id);
			$data->tennhanvien=ucwords($request->tennhanvien);
			$data->ngaysinh=date('Y-m-d',strtotime(str_replace("/", "-",$request->ngaysinh)));
			$data->gioitinh=$request->gioitinh;
			$data->email=$request->email;
			$data->password=bcrypt($request->email);
			$data->sdt=$request->sdt;
			$data->trangthai=$request->trangthai;
			$data->diachi=$request->diachi;
			$data->machucvu=$request->chucvu;
			$data->maloai=$request->loainhanvien;
			$data->cmnd=$request->cmnd;
			$data->ngayvaolam=date('Y-m-d',strtotime(str_replace("/", "-",$request->ngayvaolam)));
			$data->ghichu=$request->ghichu;
			$data->updated_at=date('Y-m-d H:m:s');
			$data->save();
			return response()->json(['success' => 'Cập Nhật Thành Công!']);
		}
	}
	public function getLogin()
	{
		return view('admin/dang-nhap');
	}
	public function getLogout()
	{
		Auth::guard('nhan_vien')->logout();
		return view('admin/dang-nhap');
	}
	public function postLogin(Request $request)
	{
		$login=['email'=>$request->email,'password'=>$request->password];
		if(Auth::guard('nhan_vien')->attempt($login))
		{
            //return redirect('admin/trang-chu');
            //return response()->json(['errors' => 'Đăng Nhập Thành Công!']);
            //return view('admin/trang-chu');
			return response()->json(['success' => 'Email hoặc mật khẩu không đúng!']);
		}
		else
		{

			return response()->json(['errors' => 'Email hoặc mật khẩu không đúng!']);
		}
	}
	public function getCapnhat($id)
	{
		if(request()->ajax())
		{
			$data = DB::table('nhan_vien')
			->join('chuc_vu','nhan_vien.machucvu','=','chuc_vu.id')
			->join('loai_nhan_vien','nhan_vien.maloai','=','loai_nhan_vien.id')
			->select('nhan_vien.*','chuc_vu.tenchucvu','loai_nhan_vien.tenloai')
			->first();
			return response()->json(['data' => $data]);
		}
	}
	public function postCapnhat(Request $request)
	{
		if($request->changepassword=='on')
		{
			$validator=Validator::make($request->all(),[
				'tennhanvien'=>'bail|regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,7})+([\s]*)+([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,7}))$/|min:5|max:50',
				'sdt' => 'bail|regex:/(^(0[1-9])+([0-9]{8,10}))$/|unique:nhan_vien,sdt,'.$request->id,
				'newpassword'=>'bail|min:8|max:32|regex:/^(?=.*?[A-Z]{1,})(?=.*?[a-z]{1,})+(?=.*?[0-9]{1,})$/',
				'renewpassword'=>'bail|same:newpassword'
			],
			[
				'tennhanvien.regex'=>'Tên nhân viên không hợp lệ',
				'tennhanvien.min'=>'Tên nhân viên quá ngắn',
				'tennhanvien.max'=>'Tên nhân viên quá dài',
				'tennhanvien.regex'=>'Tên nhân viên không hợp lệ',
				'sdt.regex'=>'Số điện thoại không hợp lệ',
				'sdt.unique'=>'Số điện thoại đã tồn tại',
				'newpassword.regex'=>'Mật khẩu mới không hợp lệ',
				'renewpassword.same'=>'Nhập lại mật khẩu chưa đúng',
			]);
			if($validator->fails())
			{
				return response()->json(['errors' => $validator->errors()->all()]);
			}
			else
			{
				$data =NhanVien::find($request->id);
				$data->tennhanvien=ucwords($request->tennhanvien);
				$data->ngaysinh=$request->ngaysinh;
				$data->gioitinh=$request->gioitinh;
				$data->password=bcrypt($request->newpassword);
				$data->sdt=$request->sdt;
				$data->diachi=$request->diachi;
				$data->ghichu=$request->ghichu;
				$data->updated_at=date('Y-m-d H:m:s');
				if(Hash::check($request->oldpassword,$data->password))
				{
					$data->save();
					return response()->json(['success' => 'Cập Nhật Thành Công!']);
				}
				$errors=array('0'=>'Mật khẩu cũ chưa đúng!');
				return response()->json(['errors' => $errors]);
			}
		}
		else
		{
			$validator =Validator::make($request->all(),[
				'tennhanvien'=>'bail|regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,7})+([\s]*)+([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,7}))$/|min:5|max:50',
				'sdt' => 'bail|regex:/(^(0[1-9])+([0-9]{8,10}))$/|unique:nhan_vien,sdt,'.$request->id,
			],
			[
				'tennhanvien.regex'=>'Tên nhân viên không hợp lệ',
				'tennhanvien.min'=>'Tên nhân viên quá ngắn',
				'tennhanvien.max'=>'Tên nhân viên quá dài',
				'tennhanvien.regex'=>'Tên nhân viên không hợp lệ',
				'sdt.regex'=>'Số điện thoại không hợp lệ',
				'sdt.unique'=>'Số điện thoại đã tồn tại',
			]);
		}
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data =NhanVien::find($request->id);
			$data->tennhanvien=ucwords($request->tennhanvien);
			$data->ngaysinh=$request->ngaysinh;
			$data->gioitinh=$request->gioitinh;
			$data->sdt=$request->sdt;
			$data->diachi=$request->diachi;
			$data->ghichu=$request->ghichu;
			$data->updated_at=date('Y-m-d H:m:s');
			$data->save();
			return response()->json(['success' => 'Cập Nhật Thành Công!']);
		}
	}
}
