<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mon;
use App\Cart;
use App\KhuyenMai;
use App\DonHang;
use App\ChiTietDonHang;
use App\LoaiMon;
use Session;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Mail;
class PageController extends Controller
{
 public function getContact()
 {
  return view('front/lien-he');
}
public function Index()
{
  $mon=Mon::paginate(4);
  return view('front/trangchu',['mon'=>$mon]);
}
public function productIndex(Request $request)
{
  $mon=Mon::paginate(9);
  $loai=LoaiMon::all();
  return view('front.san-pham',['mon' => $mon,'loai'=>$loai]);
}
public function getProduct()
{
  $mon=Mon::paginate(9);
  return view('front.san-pham2', compact('mon'))->render();
}
public function productType($id)
{
  $mon=Mon::where('mon.maloai',$id)->paginate(3);
  return view('front.san-pham2', compact('mon'));
}
public function getProductType($type)
{
  $mon=Mon::where('mon.maloai',$type)->paginate(3);
  return view('front.san-pham2', compact('mon'))->render();
}
public function getChiTiet ($id)
{
 $data= Mon::find($id);
 return response()->json(['data'=>$data]);
}
public function getAddToCart(Request $req,$id,$sl){
  $product = Mon::find($id);
  $oldCart = Session('cart')?Session::get('cart'):null;
  $cart = new Cart($oldCart);
  $cart->add($product,$id,$sl);
  $req->session()->put('cart',$cart);
  $cart=Session('cart')?Session::get('cart'):null;
  return response()->json(['cart'=>$cart]);
}
public function getCheckout()
{
  // if(request()->ajax())
  // {
  //   $cart=Session('cart')?Session::get('cart'):null;
  //   $khachhang=Auth::guard('khach_hang')->check()?Auth::guard('khach_hang')->user():null;
  //   return response()->json(['cart'=>$cart,'khach_hang'=>$khachhang]);
  // }
   //$cart=Session('cart')?Session::get('cart'):null;
    //$khachhang=Auth::guard('khach_hang')->check()?Auth::guard('khach_hang')->user():null;
    //return response()->json(['cart'=>$cart,'khach_hang'=>$khachhang]);
  return view('front/thanh-toan');
}
public function getReduceItem($id)
{
  $oldCart = Session('cart')?Session::get('cart'):null;
  $cart = new Cart($oldCart);
  $cart->reduceByOne($id);
  Session::put('cart',$cart);
  if(Session('cart')->totalQty == 0)
    session()->forget('cart');
  $cart=Session('cart')?Session::get('cart'):null;
  return response()->json(['cart'=>$cart]);
}
public function get_jsonCart()
{
  $oldCart =Session::has('cart')?Session::get('cart'):null;
  $cart=new Cart($oldCart);
  $cart=Session('cart')?Session::get('cart'):null;
  return response()->json(['cart'=>$cart]);
}
public function getDelCart ($id)
{
  $oldCart =Session::has('cart')?Session::get('cart'):null;
  $cart=new Cart($oldCart);
  $cart->removeItem($id);
  Session::put('cart',$cart);
  if(Session('cart')->totalQty == 0)
  {
   session()->forget('cart');
 }
 $cart=Session('cart')?Session::get('cart'):null;
 return response()->json(['cart'=>$cart]);
}
public function getDeleteCart()
{
  session()->forget('cart');
  $cart=Session('cart')?Session::get('cart'):null;
  return response()->json(['cart'=>$cart]);
}
public function getCart()
{
  if(request()->ajax())
  {
    $cart=Session('cart')?Session::get('cart'):null;
    $khachhang=Auth::guard('khach_hang')->check()?Auth::guard('khach_hang')->user():null;
    return response()->json(['cart'=>$cart,'khach_hang'=>$khachhang]);
  }
  return view('front/gio-hang');
}
public function getDiscount($code)
{ 
  $code=strtoupper($code);
  $khuyenmai=KhuyenMai::Where('code_km',$code)->first();
  if($khuyenmai!=null)
  {
    if(strtotime(date('Y-m-d H:i:s'))<=strtotime($khuyenmai->ngayketthuc)&&strtotime(date('Y-m-d H:i:s'))>=strtotime($khuyenmai->ngaybatdau))
    {
      if($khuyenmai->loaikhuyenmai==0)
      {
        $giam_gia= Session('cart')->totalPrice-$khuyenmai->giatri;
        $giam_gia=$giam_gia<Session('cart')->totalPrice?Session('cart')->totalPrice:$giam_gia;
      }
      else
      {
        $giam_gia=Session('cart')->totalPrice*$khuyenmai->giatri/100;
      }
      //$giam_gia=round($giam_gia,-3);
      //echo round(14750,-3);
      return response()->json(['giam_gia'=>$giam_gia]);  
    }
    else
    {
      return response()->json(['error'=>'Mã giảm giá không hợp lệ!']);
    }
    
  }
  else
  {
    return response()->json(['error'=>'Mã giảm giá không hợp lệ!']);
  }
}
public function getBill(Request $request)
{
  $id=Auth::guard('khach_hang')->check()?Auth::guard('khach_hang')->user()->id:null;
  $email=Auth::guard('khach_hang')->check()?Auth::guard('khach_hang')->user()->email:null;
  $donhang=new DonHang;
  $donhang->makhachhang=$id;
  $donhang->ngaydat=date('Y-m-d H:i:s');
  $donhang->thanhtien=$request->thanhtien;
  $donhang->phi_giao_hang=$request->ship;
  $donhang->makhuyenmai=$request->makhuyenmai;
  $donhang->ghichu=$request->ghichu;
  $donhang->diachi=$request->diachi;
  $donhang->sdt=$request->sdt;
  $donhang->trangthai=0;
  $donhang->created_at=date('Y-m-d H:i:s');
  $donhang->save();
  $cart=Session('cart');
  foreach ($cart->items as $key => $value)
  {
    $bill_detail= new ChiTietDonHang;
    $bill_detail->madonhang=$donhang->id;
    $bill_detail->mamon=$key;
    $bill_detail->soluong=$value['qty'];
    $bill_detail->dongia=$value['price']/$value['qty'];
    $bill_detail->created_at=date('Y-m-d H:i:s');
    $bill_detail->save();
  }
  Session::forget('cart');
  if($id!=null)
  {
    $diem=$request->thanhtien/10000;
    DB::table('khach_hang')->where('khach_hang.id',$id)->increment('khach_hang.diemtichluy',$diem);
    $ten=Auth::guard('khach_hang')->check()?Auth::guard('khach_hang')->user()->tenkhachhang:'';
    $email=Auth::guard('khach_hang')->user()->email;
    $ship=$request->ship;
    $thanhtien = $request->thanhtien;
    $sdt=$request->sdt;
    $diachi=$request->diachi;
    $ngaydat=$donhang->ngaydat;
    $dt = array('ten'=>$ten, "sdt" => $sdt,'diachi'=>$diachi,'ship'=>$ship,'thanhtien'=>$thanhtien,'ngaydat'=>$ngaydat,'cart'=>$cart);
    Mail::send('front.mail-bill',$dt, function($message) use ($email) {
     $message->to($email)->subject('Đặt Hàng Thành Công - Thông Tin Đơn Hàng!');
   });
  }
  return response()->json();
}
public function postBill(Request $request)
{
  $cart=Session('cart');
  $donhang=new DonHang;
  $donhang->makhachhang=$request->id_khachhang;
  $donhang->ngaydat=date('Y-m-d H:i:s');
  $donhang->thanhtien=$request->thanhtien;
    //$donhang->phi_giao_hang=$request->ship;
    //$donhang->makhuyenmai=$request->makhuyenmai;
    //$donhang->ghichu=$request->ghichu;
    //$donhang->diachi=$request->diachi;
    //$donhang->sdt=$request->sdt;
  $donhang->trangthai=2;
  $donhang->created_at=date('Y-m-d H:i:s');
  $donhang->save();
  foreach ($cart->items as $key => $value)
  {
    $bill_detail= new ChiTietDonHang;
    $bill_detail->madonhang=$donhang->id;
    $bill_detail->mamon=$key;
    $bill_detail->soluong=$value['qty'];
    $bill_detail->dongia=$value['price']/$value['qty'];
    $bill_detail->created_at=date('Y-m-d H:i:s');
    $bill_detail->save();
  }
  if($request->id_khachhang!='')
  {
    $diem=$request->thanhtien/10000;
    DB::table('khach_hang')->where('khach_hang.id',$request->id_khachhang)->increment('khach_hang.diemtichluy',$diem);
  }
  $cart=Session::forget('cart');
  return response()->json(['cart'=>$cart]);
}
public function getSearch(Request $request)
{
  //dd($request->loai);
  if($request->loai==0)
  {
    $mon=DB::table('mon')
    ->select('mon.id','mon.tenmon','mon.hinhanh','mon.dongia','mon.maloai')
    ->Where('mon.tenmon','like','%'.$request->key.'%')
    ->get();

  }
  else
  {
    $mon=DB::table('mon')
    ->select('mon.id','mon.tenmon','mon.hinhanh','mon.dongia','mon.maloai')
    ->Where('mon.maloai','=',$request->loai)
    ->Where('mon.tenmon','like','%'.$request->key.'%')
    ->get();
  }
  return response()->json(['mon'=>$mon]);
}
public function getTaikhoan()
{
  $mon=Mon::all();
  $loai_mon=LoaiMon::all();
  if(request()->ajax())
  {
    $cart=Session('cart')?Session::get('cart'):null;
    $khachhang=Auth::guard('khach_hang')->check()?Auth::guard('khach_hang')->user():null;
    return response()->json(['cart'=>$cart,'khach_hang'=>$khachhang,'mon'=>$mon,'loai_mon'=>$loai_mon]);
  }
  return view('front/tai-khoan');
}
public function getDonHang($id)
{
  $donhang=DB::table('don_hang')
  ->select('don_hang.id','don_hang.ngaydat','don_hang.thanhtien','don_hang.trangthai')
  ->Where('don_hang.makhachhang',$id)
  ->get();
  return response()->json(['don_hang'=>$donhang]);
}
public function getChiTietDonHang($id)
{
  $chitiet_donhang=DB::table('don_hang')
  ->join('chitiet_donhang','don_hang.id','=','chitiet_donhang.madonhang')
  ->join('mon','chitiet_donhang.mamon','=','mon.id')
  ->select('chitiet_donhang.mamon','chitiet_donhang.soluong','chitiet_donhang.dongia','mon.tenmon','mon.hinhanh')
  ->Where('don_hang.id',$id)
  ->get();
  return response()->json(['chitiet_donhang'=>$chitiet_donhang]);

}
public function getDetail($id)
{
  $data = Mon::find($id);
  $data_relative=DB::table('mon')
  ->select('mon.*')
  ->where('mon.maloai','=',$data->maloai)
  ->where('mon.id','!=',$id)
  ->get();
  return view('front.chi-tiet',['data'=>$data,'data_relative'=>$data_relative]);
}
}
