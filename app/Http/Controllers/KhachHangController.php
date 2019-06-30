<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class KhachHangController extends Controller
{
    public function LoginOrRegister()
    {
    	return view('front/dangnhap-dangky');
    }
    public function postLogin(Request $request)
    {
    	$login=['email'=>$request->email,'password'=>$request->password];
		if(Auth::guard('khach_hang')->attempt($login))
		{
            //return redirect('admin/trang-chu');
            //return response()->json(['errors' => 'Đăng Nhập Thành Công!']);
            //return view('admin/trang-chu');
			return response()->json(['success' => 'Đăng nhập thành công']);
			return redirect()->back();
		}
		else
		{

			return response()->json(['errors' => 'Email hoặc mật khẩu không đúng!']);
			return redirect()->back();
		}
    }
    public function getLogout()
    {
    	if(Auth::guard('khach_hang')->check())
    	{
    		Auth::guard('khach_hang')->logout();
			return redirect()->back();
    	}
    	else
    	{
    		return redirect()->back();
    	}
    }
    public function postRegister (Request $request)
    {
    	$validator =Validator::make($request->all(),[
			'hoten'=>'bail|regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,7})+([\s]*)+([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,7}))$/|min:5|max:50',
			'email'=>'bail|regex:/^([a-zA-Z0-9_\.\-])+\@([a-zA-Z0-9_\.\-])+([a-zA-Z0-9]{2,4})+$/|required|unique:khach_hang,email',
			'sdt' => 'bail|regex:/(^(0[1-9])+([0-9]{8,10}))$/|unique:khach_hang,sdt',
			//'password'=>'bail|min:8|max:32|regex:/^(?=.*?[A-Z]{1,})(?=.*?[a-z]{1,})+(?=.*?[0-9]{1,})$/',
			'confirmpassword'=>'bail|same:password',
		],
		[
			'hoten.regex'=>'Tên nhân viên không hợp lệ',
			'hoten.min'=>'Tên nhân viên quá ngắn',
			'hoten.max'=>'Tên nhân viên quá dài',
			'email.regex'=>'Vui lòng nhập đúng định dạng email',
			'email.unique'=>'Email đã tồn tại',
			'sdt.regex'=>'Số điện thoại không hợp lệ'
		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data = new KhachHang;
			$data->tenkhachhang=ucwords($request->hoten);
			$data->ngaysinh=$request->ngaysinh;
			$data->gioitinh=$request->gioitinh;
			$data->email=$request->email;
			$data->password=bcrypt($request->password);
			$data->sdt=$request->sdt;
			$data->trangthai=0;
			$data->loaikhachhang=2;
			$data->diachi=$request->diachi;
			//$data->machucvu=$request->chucvu;
			//$data->maloai=$request->loainhanvien;
			//$data->cmnd=$request->cmnd;
			//$data->ngayvaolam=$request->ngayvaolam;
			//$data->ghichu=$request->ghichu;
			$data->created_at=date('Y-m-d H:m:s');
			$data->save();
			return response()->json(['success' => 'Thêm Thành Công!']);
		}

    }
}
