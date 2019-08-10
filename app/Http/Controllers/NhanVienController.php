<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
use App\LoaiNhanVien;
use App\ChucVu;
use App\Mon;
use App\LoaiMon;
use App\KhachHang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use App\PasswordReset;
use Mail;
class NhanVienController extends Controller
{
	public function getIndex()
	{
		return view('admin/trang-chu');
	}
	public function getSale()
	{
		$loai=LoaiMon::select('loai_mon.id','loai_mon.tenloai')->get();
		
		return view('admin/ban-hang',['loai'=>$loai]);
	}
	public function getJsonProduct($id)
	{
		if(request()->ajax())
		{
			if($id==0)
			{
				$sanpham=Mon::select('mon.id','mon.tenmon','mon.hinhanh')
				->where('mon.trangthai','!=',1)->get();
			}
			else
			{
				$sanpham=Mon::select('mon.id','mon.tenmon','mon.hinhanh')
				->where([['mon.maloai',$id],['mon.trangthai','!=',1]])->get();
			}
			return response()->json(['data'=>$sanpham]);
		}
	}
	public function searchProduct($key)
	{
		if(request()->ajax())
		{
			
			$sanpham=Mon::select('mon.id','mon.tenmon','mon.hinhanh')->where('mon.tenmon','like','%'.$key.'%')->get();

		}
		return response()->json(['data'=>$sanpham]);
	}
	public function searchCustomer($key)
	{
		if(request()->ajax())
		{
			
			$khachhang=KhachHang::select('khach_hang.id','khach_hang.tenkhachhang','khach_hang.diemtichluy')
			->orwhere('khach_hang.sdt',$key)
			->orwhere('khach_hang.email','like','%'.$key.'%')
			->get();
		}
		return response()->json(['data'=>$khachhang]);
	}
	public function getPrint($diem)
	{
		$giam=0;
		if($diem>=700)
		{
			$giam=Session('cart')->totalPrice*0.1;
		}
		if($diem>=500 && $diem<700)
		{
			$giam=Session('cart')->totalPrice*0.05;
		}
		return view('admin/print',['giam'=>$giam]);
	}
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
			$data->tennhanvien=$request->tennhanvien;
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
			$data->created_at=date('Y-m-d H:i:s');
			$data->save();
			return response()->json(['success' => 'Thêm Thành Công!']);
		}

	}
	public function destroy($id)
	{
		$data = NhanVien::find($id);
		$id_=Auth::guard('nhan_vien')->user()->id;
		if($id_!=$id && $data->trangthai==1)
		{
			$data->delete();
			return response()->json(['success' => 'Xóa Thành Công!']);
		}
		else
		{
			return response()->json(['success' => 'Xóa Thất Bại!']);
		}
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
			$data->tennhanvien=$request->tennhanvien;
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
			$data->updated_at=date('Y-m-d H:i:s');
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
	public function getManager()
	{
		return view('admin/quan-ly');
	}
	public function postLogin(Request $request)
	{
		$login=['email'=>$request->email,'password'=>$request->password,'trangthai'=>0];
		if(Auth::guard('nhan_vien')->attempt($login))
		{
            //return redirect('admin/trang-chu');
            //return response()->json(['errors' => 'Đăng Nhập Thành Công!']);
            //return view('admin/trang-chu');
			return response()->json(['success' => '']);
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
				$data->tennhanvien=$request->tennhanvien;
				$data->ngaysinh=$request->ngaysinh;
				$data->gioitinh=$request->gioitinh;
				$data->password=bcrypt($request->newpassword);
				$data->sdt=$request->sdt;
				$data->diachi=$request->diachi;
				$data->ghichu=$request->ghichu;
				$data->updated_at=date('Y-m-d H:i:s');
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
			$data->tennhanvien=$request->tennhanvien;
			$data->ngaysinh=$request->ngaysinh;
			$data->gioitinh=$request->gioitinh;
			$data->sdt=$request->sdt;
			$data->diachi=$request->diachi;
			$data->ghichu=$request->ghichu;
			$data->updated_at=date('Y-m-d H:i:s');
			$data->save();
			return response()->json(['success' => 'Cập Nhật Thành Công!']);
		}
	}
	public function resetPassWord(Request $request)
	{
		$data=NhanVien::Where('email',$request->email)->first();
		if($data!=null)
		{
			if($data->trangthai==0)
			{
				$data= new PasswordReset;
				$data->email=$request->email;
				$data->token=$request->_token;
				$data->status=0;
				$data->created_at=date('Y-m-d H:i:m');
				$data->save();
				$to_email = $request->email;
				$token=$request->_token;
				$dt = array("body" => "Khôi phục mật khẩu!",'email'=>$to_email,'token'=>$token);
				Mail::send('admin.mail-admin-reset-password',$dt, function($message) use ($to_email) {
					$message->to($to_email)->subject('Khôi Phục Mật Khẩu!');
				});
				return response()->json(['success'=>'Vui lòng kiểm tra email để khôi phục mật khẩu!']);
			}
		}
		else
		{
			return response()->json(['errors'=>'Email không tồn tại']);
		}
	}
	public function adminResetPassWord($email,$token)
	{
		$data =DB::table('password_resets')
		->select('password_resets.*')
		->Where([['email',$email],['token',$token]])
		->orderBy('created_at','desc')
		->limit(1)
		->first();
		if($data->status==0)
		{
			return view('admin/khoi-phuc-mat-khau',['email'=>$email,'token'=>$token]);

		}
		else
		{
			return redirect('admin/dangnhap');
		}
	}
	public function postResetPassWord(Request $req)
	{
		$validator =Validator::make($req->all(),[
			// 'password'=>'bail|min:8|max:32|regex:/(?=.*?[A-Z]{1,})(?=.*?[a-z]{1,})(?=.*?[0-9]{1,})$/',
			'password'=>'bail|min:8|max:32',
			'confirmpassword'=>'bail|same:password',
		],
		[
			//'password.regex'=>'Mật khẩu không hợp lệ',
			'password.min'=>'Mật khẩu phải từ 8-32 ký tự',
			'password.max'=>'Mật khẩu phải từ 8-32 ký tự',
			'confirmpassword.same'=>'Nhập lại mật khẩu chưa đúng'

		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data=NhanVien::where('email',$req->email)->first();
			$data->password=bcrypt($req->password);
			$data->save();
			DB::table('password_resets')
			->select('password_resets.*')
			->Where([['email',$req->email],['token',$req->token_reset]])
			->orderBy('created_at','desc')
			->limit(1)
			->update(['status'=>1]);
			return response()->json(['success'=>'Khôi phục mật khẩu thành công!']);
		}
	}
}
