<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mon;
use App\Cart;
use App\KhuyenMai;
use App\DonHang;
use App\ChiTietDonHang;
use Session;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
  public function getIndex() 
  {
   return view('admin/trang-chu');
 }
 public function Index()
 {
   if(request()->ajax())
   {
     $cart=Session('cart')?Session::get('cart'):null;
     return response()->json(['cart'=>$cart]);
   }

   $data=Mon::all();
   return view('front/trangchu',['data'=>$data]);
 }
 public function getChiTiet ($id)
 {
   $data= Mon::find($id);
   return response()->json(['data'=>$data]);
 }
 public function getAddToCart(Request $req,$id){
  $product = Mon::find($id);
  $oldCart = Session('cart')?Session::get('cart'):null;
  $cart = new Cart($oldCart);
  $cart->add($product,$id);
  $req->session()->put('cart',$cart);
}
public function getCheckout()
{
  if(request()->ajax())
  {
    $khachang=Auth::guard('khach_hang')->check()?Auth::guard('khach_hang')->user():null;
    $cart=Session('cart')?Session::get('cart'):null;
    return response()->json(['cart'=>$cart]);
  }
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
}
public function getCart()
{
  if(request()->ajax())
  {
    $cart=Session('cart')?Session::get('cart'):null;
    return response()->json(['cart'=>$cart]);
  }
  return view('front/gio-hang');
}
public function getDiscount($code)
{ 
  $code=strtoupper($code);
  $khuyenmai=KhuyenMai::Where('code_km',$code)->first();
  if($khuyenmai!=null)
  {
    if(strtotime(date('Y-m-d H:i:m'))<=strtotime($khuyenmai->ngayketthuc)&&strtotime(date('Y-m-d H:i:m'))>=strtotime($khuyenmai->ngaybatdau))
    {
      if($khuyenmai->loaikhuyenmai==0)
      {
        $giam_gia= Session('cart')->totalPrice-$khuyenmai->giatri;
      }
      else
      {
        $giam_gia=Session('cart')->totalPrice*$khuyenmai->giatri/100;
      }
      $giam_gia=round($giam_gia,-3);
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
  $donhang=new DonHang;
  $donhang->makhachhang=$id;
  $donhang->ngaydat=date('Y-m-d H:m:i');
  $donhang->thanhtien=$request->thanhtien;
  $donhang->makhuyenmai=$request->makhuyenmai;
  $donhang->ghichu=$request->ghichu;
  $donhang->diachi=$request->diachi;
  $donhang->sdt=$request->sdt;
  $donhang->trangthai=0;
  $donhang->created_at=date('Y-m-d H:m:i');
  $donhang->save();
  $cart=Session('cart');
  foreach ($cart->items as $key => $value)
  {
    $bill_detail= new ChiTietDonHang;
    $bill_detail->madonhang=$donhang->id;
    $bill_detail->mamon=$key;
    $bill_detail->soluong=$value['qty'];
    $bill_detail->dongia=$value['price']/$value['qty'];
    $bill_detail->created_at=date('Y-m-d H:m:i');
    $bill_detail->save();
  }
  Session::forget('cart');
}
}
