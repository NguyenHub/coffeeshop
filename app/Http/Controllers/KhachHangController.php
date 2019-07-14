<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\KhachHang;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\PasswordReset;
use Mail;
use DB;
//use Illuminate\Support\Facades\Mail;
//use App\Mail\SendMail;
class KhachHangController extends Controller
{
	public function LoginOrRegister()
	{
		return view('front/dangnhap-dangky');
	}
	public function postLogin(Request $request)
	{
		//$email_verified_at=null;
		$login=['email'=>$request->email,'password'=>$request->password,'trangthai'=>1];
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
			//return redirect()->back();
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
			'hoten.regex'=>'Tên không hợp lệ',
			'hoten.min'=>'Tên quá ngắn',
			'hoten.max'=>'Tên quá dài',
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
			$hoten=$request->hoten;
			$to_email = $request->email;
			$dt = array('name'=>$hoten, "body" => "Vui lòng xác minh tài khoản để hoàn thành đăng ký!",'email'=>$to_email);
			Mail::send('front.mail',$dt, function($message) use ($to_email) {
				$message->to($to_email)->subject('Xác Nhận Đăng Ký!');
			});
			return response()->json(['success' => 'Đăng Ký Thành Công-Vui Lòng Kiểm Tra Email Để Xác Nhận Tài Khoản!']);
		}
	}
	public function getTaikhoanUpdate(Request $request)
	{
		if($request->changepassword=='on')
		{
			$validator=Validator::make($request->all(),[
				'hoten'=>'bail|regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,7})+([\s]*)+([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,7}))$/|min:5|max:50',
				'sdt' => 'bail|regex:/(^(0[1-9])+([0-9]{8,10}))$/|unique:khach_hang,sdt,'.$request->id,
				'new_password'=>'bail|min:8|max:32|regex:/^(?=.*?[A-Z]{1,})(?=.*?[a-z]{1,})+(?=.*?[0-9]{1,})$/',
				'confirm_password'=>'bail|same:new_password'
			],
			[
				'hoten.regex'=>'Tên không hợp lệ',
				'hoten.min'=>'Tên quá ngắn',
				'hoten.max'=>'Tên quá dài',
				'sdt.regex'=>'Số điện thoại không hợp lệ',
				'sdt.unique'=>'Số điện thoại đã tồn tại',
				'new_password.min'=>'Mật khẩu phải từ 8-32 ký tự',
				'new_password.min'=>'Mật khẩu phải từ 8-32 ký tự',
				'new_password.regex'=>'Mật khẩu mới không hợp lệ',
				'confirm_password.same'=>'Nhập lại mật khẩu chưa đúng',
			]);
			if($validator->fails())
			{
				return response()->json(['errors' => $validator->errors()->all()]);
			}
			else
			{
				$data =KhachHang::find($request->id);
				$data->tenkhachhang=ucwords($request->hoten);
				$data->ngaysinh=date('Y-m-d',strtotime(str_replace("/", "-",$request->ngaysinh)));
				$data->gioitinh=$request->gioitinh;
				$data->password=bcrypt($request->new_password);
				$data->sdt=$request->sdt;
				$data->diachi=$request->diachi;
				$data->updated_at=date('Y-m-d H:m:s');
				if(Hash::check($request->old_assword,$data->password))
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
				'hoten'=>'bail|regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,7})+([\s]*)+([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,7}))$/|min:5|max:50',
				'sdt' => 'bail|regex:/(^(0[1-9])+([0-9]{8,10}))$/|unique:khach_hang,sdt,'.$request->id,
			],
			[
				'hoten.regex'=>'Tên không hợp lệ',
				'hoten.min'=>'Tên quá ngắn',
				'hoten.max'=>'Tên quá dài',
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
			$data =KhachHang::find($request->id);
			$data->tenkhachhang=ucwords($request->hoten);
			$data->ngaysinh=date('Y-m-d',strtotime(str_replace("/", "-",$request->ngaysinh)));
			$data->gioitinh=$request->gioitinh;
			$data->sdt=$request->sdt;
			$data->diachi=$request->diachi;
			$data->updated_at=date('Y-m-d H:m:s');
			$data->save();
			return response()->json(['success' => 'Cập Nhật Thành Công!']);
		}
	}
	// public function sendMail()
	// {
	// 	// $to_name = 'Nguyen';
	// 	// $to_email = 'nguyen199735@gmail.com';
	// 	//$data = array('name'=>"Smart Coffee", "body" => "Xác Nhận");
	// 	// Mail::send('front.mail', $dt, function($message) use($to_email,$to_name) {
	// 	// 	$message->to($to_email, $to_name)
	// 	// 	->subject('Artisans Web Testing Mail');
	// 	// 	$message->from('smartcoffee@gmail.com','Artisans Web');
	// 	// });
	// 	//Mail::to('smartcoffee97@gmail.com')->send(new SendMail($data));
	// 	// Mail::send('front.mail', array('name'=>'Nguyen','body'=>'Body'), function($message){
	//  //        $message->to('nguyen199735@gmail.com', 'Visitor')->subject('Visitor Feedback!');
	//  //     });

	// }
	public function getResetPass()
	{
		return view('front/reset-password');
	}
	public function postResetPass(Request $req)
	{
		$data=KhachHang::Where('email',$req->email)->first();
		if($data!=null)
		{
			if($data->trangthai==1)
			{
				$data= new PasswordReset;
				$data->email=$req->email;
				$data->token=$req->_token;
				$data->status=0;
				$data->created_at=date('Y-m-d H:i:m');
				$data->save();
				$to_email = $req->email;
				$token=$req->_token;
				$dt = array("body" => "Khôi phục mật khẩu!",'email'=>$to_email,'token'=>$token);
				Mail::send('front.email-reset-password',$dt, function($message) use ($to_email) {
					$message->to($to_email)->subject('Khôi Phục Mật Khẩu!');
				});
				return response()->json(['success'=>'Vui lòng kiểm tra email để khôi phục mật khẩu!']);
			}
		}
		else
		{
			return response()->json(['error'=>'Email không tồn tại']);
		}

	}
	public function resetPassWord($email,$token)
	{
		$data =DB::table('password_resets')
		->select('password_resets.*')
		->Where([['email',$email],['token',$token]])
		->orderBy('created_at','desc')
		->limit(1)
		->first();
		if($data->status==0)
		{
			return view('front/khoi-phuc-mat-khau',['email'=>$email,'token'=>$token]);

		}
		else
		{
			return redirect('index');
		}
	}
	public function postResetPassWord(Request $req)
	{
		$validator =Validator::make($req->all(),[
			// 'password'=>'bail|min:8|max:32|regex:/(?=.*?[A-Z]{1,})(?=.*?[a-z]{1,})(?=.*?[0-9]{1,})$/',
			'password'=>'bail|min:8|max:32',
			'confirm_password'=>'bail|same:password',
		],
		[
			//'password.regex'=>'Mật khẩu không hợp lệ',
			'password.min'=>'Mật khẩu phải từ 8-32 ký tự',
			'password.max'=>'Mật khẩu phải từ 8-32 ký tự',
			'confirm_password.same'=>'Nhập lại mật khẩu chưa đúng'

		]);
		if($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()->all()]);
		}
		else
		{
			$data=KhachHang::where('email',$req->email)->first();
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
	public function getConfirm($email)
	{
		$data=KhachHang::Where('email',$email)->first();
		if($data->trangthai==0)
		{
			$data->email_verified_at=date('Y-m-d H:i:m');
			$data->trangthai=1;
			$data->save();
			return redirect('index');
		}
		else
		{
			return redirect('index');
		}
	}

}
