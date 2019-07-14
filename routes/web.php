<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});
Route::get('index',
	[
		'as'=>'trangchu',
		'uses'=>'PageController@Index'
	]);
Route::get('lien-he',
	[
		'as'=>'lien-he',
		'uses'=>'PageController@getContact'
	]);
Route::get('san-pham',
	[
		'as'=>'san-pham',
		'uses'=>'PageController@productIndex'
	]);
Route::get('dangnhap-dangky',
	[
		'as'=>'dangnhap-dangky',
		'uses'=>'KhachHangController@LoginOrRegister'
	])->middleware('khachhang_login');
Route::get('xacnhan-dangky/{email}',
	[
		'as'=>'xacnhan-dangky',
		'uses'=>'KhachHangController@getConfirm'
	]);
Route::get('tai-khoan/quen-mat-khau',
	[
		'as'=>'tai-khoan/quen-mat-khau',
		'uses'=>'KhachHangController@getResetPass'
	])->middleware('khachhang_login');
Route::post('tai-khoan/quen-mat-khau',
	[
		'as'=>'tai-khoan/quen-mat-khau',
		'uses'=>'KhachHangController@postResetPass'
	]);
Route::get('tai-khoan/khoi-phuc-mat-khau/{emai}/{token}',
	[
		'as'=>'tai-khoan/khoi-phuc-mat-khau',
		'uses'=>'KhachHangController@resetPassWord',
	])->middleware('khachhang_login');
Route::post('khoi-phuc-mat-khau',
	[
		'as'=>'khoi-phuc-mat-khau',
		'uses'=>'KhachHangController@postResetPassWord',
	]);
Route::post('dangky',
	[
		'as'=>'dangky',
		'uses'=>'KhachHangController@postRegister'
	]);
Route::post('dangnhap',
	[
		'as'=>'dangnhap',
		'uses'=>'KhachHangController@postLogin'
	]);
Route::get('khachhang/dangxuat',
	[
		'as'=>'dangxuat',
		'uses'=>'KhachHangController@getLogout'
	]);
Route::get('khach-hang/tai-khoan',
	[
		'as'=>'khach-hang/tai-khoan',
		'uses'=>'PageController@getTaikhoan'
	])->middleware('khachhang_login');
Route::post('khach-hang/cap-nhat',
	[
		'as'=>'khach-hang/cap-nhat',
		'uses'=>'KhachHangController@getTaikhoanUpdate'
	]);
Route::get('khach-hang/don-hang/{id}',
	[
		'as'=>'khach-hang/don-hang',
		'uses'=>'PageController@getDonHang'
	])->middleware('khachhang_login');
Route::get('don-hang/chi-tiet/{id}',
	[	
		'as'=>'don-hang/chi-tiet',
		'uses'=>'PageController@getChiTietDonHang'
	])->middleware('khachhang_login');
Route::get('admin/trangchu',
	[
		'as'=>'home',
		'uses'=>'PageController@getIndex'
	]);
Route::get('dangxuat',
	[
		'as'=>'home',
		'uses'=>'NhanVienController@getLogout'
	]);
Route::get('chitiet-sanpham/{id}',
	[
		'as'=>'chitiet-sanpham',
		'uses'=>'PageController@getChiTiet'
	]);
Route::get('add-to-cart/{id}/{sl}',
	[
		'as'=>'add-to-cart',
		'uses'=>'PageController@getAddToCart'
	]);
Route::get('reduce-item/{id}',
	[
		'as'=>'reduce-item',
		'uses'=>'PageController@getReduceItem'
	])->middleware('cart');
Route::get('san-pham/chi-tiet/{id}',
	[
		'as'=>'chi-tiet',
		'uses'=>'PageController@getDetail'
	]);
Route::get('sendmail',
	[
		'as'=>'sendmail',
		'uses'=>'KhachHangController@sendMail'
	]);
Route::get('delete-cart/{id}',
	[
		'as'=>'delete-cart',
		'uses'=>'PageController@getDelCart'
	])->middleware('cart');
Route::get('gio-hang',
	[
		'as'=>'gio-hang',
		'uses'=>'PageController@getCart'
	])->middleware('cart');
Route::get('gio-hang/thanh-toan',
	[
		'as'=>'gio-hang/thanh-toan',
		'uses'=>'PageController@getCheckout'
	])->middleware('cart');
Route::get('giam-gia/{code}',
	[
		'as'=>'giam-gia',
		'uses'=>'PageController@getDiscount'
	])->middleware('cart');
Route::post('dat-hang',
	[
		'as'=>'dat-hang',
		'uses'=>'PageController@getBill'
	])->middleware('cart');
Route::post('search',
	[
		'as'=>'search',
		'uses'=>'PageController@getSearch'
	]);
Route::get('admin/dangnhap','NhanVienController@getLogin');
Route::post('admin/login','NhanVienController@postLogin');
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){	
	Route::group(['prefix'=>'loaimon'],function(){
		Route::resource('danh-sach','LoaiMonController');
		Route::post('add','LoaiMonController@add');
		Route::get('destroy/{id}', 'LoaiMonController@destroy');
		Route::get('edit/{id}', 'LoaiMonController@edit');
		Route::post('update','LoaiMonController@update');
	});
	Route::group(['prefix'=>'mon'],function(){
		Route::resource('danh-sach','MonController');
		Route::post('add','MonController@add');
		Route::get('destroy/{id}', 'MonController@destroy');
		Route::get('edit/{id}', 'MonController@edit');
		Route::post('update','MonController@update');
	});
	Route::group(['prefix'=>'congthuc'],function(){
		Route::resource('danh-sach','CongThucController');
		Route::post('add','CongThucController@add');
		Route::get('destroy/{id}', 'CongThucController@destroy');
		Route::get('edit/{id}', 'CongThucController@edit');
		Route::post('update','CongThucController@update');
	});
	Route::group(['prefix'=>'nguyenlieu'],function(){
		Route::resource('danh-sach','NguyenLieuController');
		Route::post('add','NguyenLieuController@add');
		Route::get('destroy/{id}', 'NguyenLieuController@destroy');
		Route::get('edit/{id}', 'NguyenLieuController@edit');
		Route::post('update','NguyenLieuController@update');
	});
	Route::group(['prefix'=>'khuvuc'],function(){
		Route::resource('danh-sach','KhuVucController');
		Route::post('add','KhuVucController@add');
		Route::get('destroy/{id}', 'KhuVucController@destroy');
		Route::get('edit/{id}', 'KhuVucController@edit');
		Route::post('update','KhuVucController@update');
	});
	Route::group(['prefix'=>'ban'],function(){
		Route::resource('danh-sach','BanController');
		Route::post('add','BanController@add');
		Route::get('destroy/{id}', 'BanController@destroy');
		Route::get('edit/{id}', 'BanController@edit');
		Route::post('update','BanController@update');
	});
	Route::group(['prefix'=>'donhang'],function(){
		Route::resource('danh-sach','DonHangController');
		Route::post('add','DonHangController@add');
		Route::get('destroy/{id}', 'DonHangController@destroy');
		Route::get('xuly/{id}/{trangthai}', 'DonHangController@xuly');
		Route::get('chitiet/{id}', 'DonHangController@chitiet');
		Route::post('update','DonHangController@update');
	});
	Route::group(['prefix'=>'loaikhachhang'],function(){
		Route::resource('danh-sach','LoaiKhachHangController');
		Route::post('add','LoaiKhachHangController@add');
		Route::get('destroy/{id}', 'LoaiKhachHangController@destroy');
		Route::get('edit/{id}', 'LoaiKhachHangController@edit');
		Route::post('update','LoaiKhachHangController@update');
	});
	Route::group(['prefix'=>'khuyenmai'],function(){
		Route::resource('danh-sach','KhuyenMaiController');
		Route::post('add','KhuyenMaiController@add');
		Route::get('destroy/{id}', 'KhuyenMaiController@destroy');
		Route::get('edit/{id}', 'KhuyenMaiController@edit');
		Route::post('update','KhuyenMaiController@update');
	});
	Route::group(['prefix'=>'luong'],function(){
		Route::resource('danh-sach','LuongController');
		Route::post('add','LuongController@add');
		Route::get('destroy/{id}', 'LuongController@destroy');
		Route::get('edit/{id}', 'LuongController@edit');
		Route::post('update','LuongController@update');
	});
	Route::group(['prefix'=>'chucvu'],function(){
		Route::resource('danh-sach','ChucVuController');
		Route::post('add','ChucVuController@add');
		Route::get('destroy/{id}', 'ChucVuController@destroy');
		Route::get('edit/{id}', 'ChucVuController@edit');
		Route::post('update','ChucVuController@update');
	});
	Route::group(['prefix'=>'loainhanvien'],function(){
		Route::resource('danh-sach','LoaiNhanVienController');
		Route::post('add','LoaiNhanVienController@add');
		Route::get('destroy/{id}', 'LoaiNhanVienController@destroy');
		Route::get('edit/{id}', 'LoaiNhanVienController@edit');
		Route::post('update','LoaiNhanVienController@update');
	});
	Route::group(['prefix'=>'nhanvien'],function(){
		Route::resource('danh-sach','NhanVienController');
		Route::post('add','NhanVienController@add');
		Route::get('destroy/{id}', 'NhanVienController@destroy');
		Route::get('edit/{id}', 'NhanVienController@edit');
		Route::post('update','NhanVienController@update');
		Route::get('capnhat/{id}', 'NhanVienController@getCapnhat');
		Route::post('capnhat', 'NhanVienController@postCapnhat');
	});
	Route::group(['prefix'=>'calam'],function(){
		Route::resource('danh-sach','CaLamController');
		Route::post('add','CaLamController@add');
		Route::get('destroy/{id}', 'CaLamController@destroy');
		Route::get('edit/{id}', 'CaLamController@edit');
		Route::post('update','CaLamController@update');
	});
});