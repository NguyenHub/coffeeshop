<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mon;
use App\Cart;
use App\KhuyenMai;
use App\DonHang;
use App\ChiTietDonHang;
use App\LoaiMon;
use App\TinTuc;
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
  $mon=Mon::paginate(4)->Where('mon.trangthai','!=',1);
  return view('front/trangchu',['mon'=>$mon]);
}
public function productIndex(Request $request)
{
  $mon=Mon::Where('mon.trangthai','!=',1)->paginate(9);
  $loai=LoaiMon::all();
  return view('front.san-pham',['mon' => $mon,'loai'=>$loai]);
}
public function getBlog()
{
  $tintuc=TinTuc::all();
  return view('front.tin-tuc',['tintuc' => $tintuc]);
}
public function getDetailBlog($id)
  {
    $data=TinTuc::find($id);
    return view('front/chi-tiet-tin-tuc',['data'=>$data]);
  }
public function getProduct()
{
  $mon=Mon::Where('mon.trangthai','!=',1)->paginate(9);
  return view('front.san-pham2', compact('mon'))->render();
}
public function productType($id)
{
  $mon=Mon::where([['mon.maloai',$id],['mon.trangthai','!=',1]])->paginate(6);
  return view('front.san-pham2', compact('mon'));
}
public function getProductType($type)
{
  $mon=Mon::where([['mon.maloai',$type],['mon.trangthai','!=',1]])->paginate(6);
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
public function get_jsonUser()
{
  $khachhang=Auth::guard('khach_hang')->check()?Auth::guard('khach_hang')->user():null;
  return response()->json(['khachhang'=>$khachhang]);
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
  if($khuyenmai!=null)//mã giảm giá có tồn tại
  {
    if(strtotime(date('Y-m-d H:i:s'))<=strtotime($khuyenmai->ngayketthuc)&&strtotime(date('Y-m-d H:i:s'))>=strtotime($khuyenmai->ngaybatdau))//mã còn hạn
    {
      //dd($khuyenmai->soluong);
      if($khuyenmai->soluong!=0)
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
  else
  {
    return response()->json(['error'=>'Mã giảm giá không hợp lệ!']);
  }
}
public function getBill(Request $request)//lưu đơn hàng online
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
  $donhang->pay=$request->pay;
  $donhang->created_at=date('Y-m-d 00:00:00');
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
  if($request->pay==0)
  {
    if($id!=null)
    {
      $ten=Auth::guard('khach_hang')->check()?Auth::guard('khach_hang')->user()->tenkhachhang:'';
      $email=Auth::guard('khach_hang')->user()->email;
      $don_hang=DonHang::find($donhang->id);
      $data=DB::table("chitiet_donhang")
      ->join('mon','chitiet_donhang.mamon','mon.id')
      ->select('mon.tenmon','chitiet_donhang.dongia','chitiet_donhang.soluong')
      ->Where('chitiet_donhang.madonhang',$donhang->id)
      ->get();
      $dt = array('ten'=>$ten,'data'=>$data,'donhang'=>$don_hang);
      Mail::send('front.mail-bill-online',$dt, function($message) use ($email) {
       $message->to($email)->subject('Đặt Hàng Thành Công - Thông Tin Đơn Hàng!');
     });
    }
    Session::forget('cart');
    return response()->json(['success'=>'Đặt Hàng Thành Công!']);
  }
  ///Xử lí online
  if($request->pay==1)
  {
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
    $vnp_TmnCode = "C58UO9V2"; //Mã website tại VNPAY 
    $vnp_HashSecret = "JIUZJBMAQQDVWLHRWNMXNYVFDHGSQTFK"; //Chuỗi bí mật
    $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://127.0.0.1:8000/return-vnpay";
    $vnp_TxnRef = $donhang->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = $request->order_desc;
    $vnp_OrderType = $request->order_type;
    $vnp_Amount = $request->thanhtien * 100;
    $vnp_Locale = $request->language;
    $vnp_BankCode = $request->bank_code;
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    $inputData = array(
      "vnp_Version" => "2.0.0",
      "vnp_TmnCode" => $vnp_TmnCode,
      "vnp_Amount" => $vnp_Amount,
      "vnp_Command" => "pay",
      "vnp_CreateDate" => date('YmdHis'),
      "vnp_CurrCode" => "VND",
      "vnp_IpAddr" => $vnp_IpAddr,
      "vnp_Locale" => $vnp_Locale,
      "vnp_OrderInfo" => $vnp_OrderInfo,
      "vnp_OrderType" => $vnp_OrderType,
      "vnp_ReturnUrl" => $vnp_Returnurl,
      "vnp_TxnRef" => $vnp_TxnRef,
    );
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
      $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
      if ($i == 1) {
        $hashdata .= '&' . $key . "=" . $value;
      } else {
        $hashdata .= $key . "=" . $value;
        $i = 1;
      }
      $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
   // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
      $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
      $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
    }
    return response()->json(['thanhtoan'=>$vnp_Url]);
  }
}
public function return(Request $request){
  $id=Auth::guard('khach_hang')->check()?Auth::guard('khach_hang')->user()->id:null;
 $id_bill = $request->vnp_TxnRef;//id của đơn hàng
 $donhang=DonHang::find($id_bill);
 if($request->vnp_ResponseCode == "00") //thành công update database trả json
 {
  if($id!=null)
  {
    Session::forget('cart');
    $data=DB::table("chitiet_donhang")
    ->join('mon','chitiet_donhang.mamon','mon.id')
    ->select('mon.tenmon','chitiet_donhang.dongia','chitiet_donhang.soluong')
    ->Where('chitiet_donhang.madonhang',$id_bill)
    ->get();
    $ten=Auth::guard('khach_hang')->check()?Auth::guard('khach_hang')->user()->tenkhachhang:'';
    $email=Auth::guard('khach_hang')->user()->email;
    $dt = array('ten'=>$ten,'data'=>$data,'donhang'=>$donhang);
    Mail::send('front.mail-bill-online',$dt, function($message) use ($email) {
     $message->to($email)->subject('Đặt Hàng Thành Công - Thông Tin Đơn Hàng!');
   });
  }
  return redirect('index')->with('success' ,'Thanh toán đơn hàng thành công');      
}
else
{
  $donhang->trangthai=3;
  $donhang->save();
  return redirect('index')->with('errors' ,'Lỗi trong quá trình thanh toán');
}
}
public function postBill(Request $request)//lưu bill tại quầy
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
  $donhang->created_at=date('Y-m-d 00:00:00');
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
  $data=DB::table('chitiet_donhang')
      //->join('mon','chitiet_donhang.mamon','mon.id')
  ->join('cong_thuc','chitiet_donhang.mamon','cong_thuc.mamon')
  ->join('chitiet_congthuc','cong_thuc.id','chitiet_congthuc.macongthuc')
  ->select('chitiet_donhang.soluong','chitiet_congthuc.dinhluong','chitiet_congthuc.manguyenlieu')
  ->where('chitiet_donhang.madonhang',$donhang->id)
  ->get();
  if($data!='')
  {
    foreach ($data as $value) 
    {
      DB::table('nguyen_lieu')->where('nguyen_lieu.id',$value->manguyenlieu)->decrement('nguyen_lieu.soluong',$value->dinhluong*$value->soluong);
    }
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
    ->Where([['mon.tenmon','like','%'.$request->key.'%'],['mon.trangthai','!=',1]])
    ->get();

  }
  else
  {
    $mon=DB::table('mon')
    ->select('mon.id','mon.tenmon','mon.hinhanh','mon.dongia','mon.maloai')
    ->Where('mon.maloai','=',$request->loai)
    ->Where('mon.tenmon','like','%'.$request->key.'%')
    ->Where('mon.trangthai','!=',1)
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
public function getDataChart($date)
{
  $year=date('Y');
  $data=DB::table('don_hang')
  ->select('don_hang.created_at',DB::raw('count(don_hang.created_at) as sl'))
  ->whereMonth('ngaydat', '=', $date)
  ->whereYear('ngaydat', '=', $year)
  ->groupBy('don_hang.created_at')->get();
  $doanhthu=DB::table('don_hang')
  ->select(DB::raw('sum(don_hang.thanhtien) as doanhthu'))
  ->whereMonth('ngaydat', '=', $date)
  ->whereYear('ngaydat', '=', $year)
  ->groupBy('don_hang.created_at',)->get();
  $sanpham=DB::table('don_hang')
  ->join('chitiet_donhang','don_hang.id','=','chitiet_donhang.madonhang')
  ->select(DB::raw('sum(chitiet_donhang.soluong) as sanpham'))
  ->whereMonth('ngaydat', '=', $date)
  ->whereYear('ngaydat', '=', $year)
  ->groupBy('don_hang.created_at',)->get();
  return response()->json(['data'=>$data,'doanhthu'=>$doanhthu,'sanpham'=>$sanpham]);
}
public function getDayBillChart() //lấy đơn hàng theo ngày
{ 
  $year=date('Y');
  $month=date('m');
  $day=date('d');
  $hour=date('H');
  $array= Array();
  for ($i=0; $i <=$hour ; $i++) { 
  $start_date=$year.'-'.$month.'-'.$day." ".$i.":0:0";
  $end_date=$year.'-'.$month.'-'.$day." ".($i+1).":0:0";
 $billday=DB::table('don_hang')
 ->select(DB::raw('count(don_hang.ngaydat) as soluong'))
 ->Where('don_hang.ngaydat','>=',$start_date)
 ->Where('don_hang.ngaydat','<',$end_date)
 ->groupBy('don_hang.created_at')
 ->first();
 if($billday==null)
 {
  $soluong=0;
 }
 else
 {
  $soluong=$billday->soluong;
 }
 $time=$i<10?'0'.$i:$i;
 $array[$time.'h']=$soluong;
  }
  return response()->json(['billday'=>$array]);
}
public function getDataBarChart()
{
  $phanloai=DB::table('loai_mon')
  ->join('mon','loai_mon.id','=','mon.maloai')
  ->select('loai_mon.tenloai',DB::raw('count(mon.maloai) as soluong'))
  ->groupBy('loai_mon.tenloai')
  ->get();
  $banchay=DB::table('don_hang')
  ->join('chitiet_donhang','don_hang.id','chitiet_donhang.madonhang')
  ->join('mon','chitiet_donhang.mamon','=','mon.id')
  ->select('mon.tenmon',DB::raw('sum(chitiet_donhang.soluong) as soluong'))
  ->Where('don_hang.trangthai',2)
  ->groupBy('mon.tenmon','chitiet_donhang.mamon')
  ->get();
  return response()->json(['phanloai'=>$phanloai,'banchay'=>$banchay]);
}
}
