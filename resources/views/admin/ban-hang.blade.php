@extends('admin.layout.index')
@section('content')
<div id="content-wrapper">
  <div class="row">


    <!-- Icon Cards-->
    <div class="col-md-8">
      <div class="col-md-12" style="padding-right: 15px;">
       <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
          @foreach($loai as $lsp)
          <li class="nav-item dropdown no-arrow mx-1">
            <a href="" class="load_sp" id="{{$lsp->id}}"><div class="nav-link dropdown-toggle " >{{$lsp->tenloai}}</div></a>
          </li>
          @endforeach
        </ul>
        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
          <div class="input-group">
            <input type="text" id="search_sp" class="form-control" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
          {{-- <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div> --}}
        </div>
      </form>
    </nav>
  </div>
  <div class="col-md-12 row " style="padding-top: 15px; overflow-y: scroll; height: 480px;" id="product">

  </div>
</div>
<div class="col-md-4" style="padding-right: 20px;">

  <form action="" id="form_data">
    <div class="form-group row">
      <div class="form-label-group col-md-10">
        <input type="text" class="form-control" name="khachhang" id="khachhang_search" placeholder="Khách Hàng">
        <label style="padding-left: 20px;" for="khachhang_search">Khách Hàng</label>
        <div id="search_result"  class="search-content"></div>
      </div>
      <div class="print"><a href="admin/ban-hang/print" id="print"><i class="fa fa-print" title="In"></i></a></div>
    </div>
    <div class="form-group">
      <div class="form-label-group">
        <input type="hidden" class="form-control" name="id_khachhang" id="id_khachhang">
      </div>
    </div>
  </form>
  <div id="cart_body" class="col-md-12">
    {{-- <div id="cart_item" class="row" style="border-bottom: 1px solid #e5e5e5;padding-top: 30px;">
      <div>TEEN</div>
      <div class="qty_item"><i class="fa fa-minus-circle"></i>SL<i class="fa fa-plus-circle"></i></div>
      <div class="price_item">Gia</div>
    </div> --}}
  </div>
</div>

  {{-- <div class="row" style="background-color: red; height: 50px;">

  </div> --}}

  <!-- Sticky Footer -->
  {{-- <footer style="min-width:100%; max-height: 30px; " class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright © Your Website 2019</span>
      </div>
    </div>
  </footer> --}}
</div>
</div>
@endsection
@section('script')
<script>
  $('.navbar-brand').hide();
  $('.btn-link').hide();
  $('.search').hide();
  $('.sidebar').hide();
  $(document).ready(function(){
    get_jsonCart();
    function get_jsonCart()
    {
      $.ajax({
        url:'get_jsonCart',
        dataType:'json',
        success:function(data)
        {
          load_cart(data.cart);
        }
      })
    }
    function getJsonProduct(id)
    { 
      $.ajax({
        url:"admin/getgetJsonProduct/"+id,
        dataType:'json',
        success:function(data)
        {
          load_sp(data.data);
        }
      })
    }
    var id =0;
    getJsonProduct(id);
    function load_sp(data)
    {
      var html='';
      $.each(data,function(key,val){
        html+='<div class="product-width col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 mb-30 " style="padding-bottom: 30px;">'
        html+='<div class="product-wrapper">'
        html+='<div class="product-img">'
        html+='<img id="'+val.id+'" style="width: 190px;height: 150px;" src={{URL::to('/')}}/hinhanh/upload/'+val.hinhanh+' alt="">'
        html+='</div>'
        html+='<div class="product-content">'
        html+='<p>'+val.tenmon+'</p>'
        html+='</div>'
        html+='</div>'
        html+='</div>'
      })
      $('#product').html(html);
    }
    function load_cart(data)
    {
      var html='';
      if(data==null)
      {
       html+='';
       $('.print').hide();
     }
     else
     {
      $('.print').show();
       $.each(data.items,function(key,val){
        html+='<div id="cart_item" class="row" style="border-bottom: 1px solid #e5e5e5;padding-top: 30px;">'
        html+='<div>'+val.item.tenmon+'</div>'
        html+='<div class="qty_item"><i class="fa fa-minus-circle decrement" id="'+val.item.id+'"></i>'+val.qty+'<i class="fa fa-plus-circle increment" id="'+val.item.id+'"></i></div>'
        html+='<div class="price_item">'+val.item.dongia+'</div>'
        html+='</div>'
      })
       html+='<div id="total" class="row" style="border-bottom: 1px solid #e5e5e5;padding-top: 30px;">'
       html+='<div>'+data.totalQty+' sản phẩm</div>'
       html+='<h4 id="totalPrice" class="price_item">'+data.totalPrice+'</h4>'
       html+='</div>'
       html+='<div id="total" class="row" style="border-bottom: 1px solid #e5e5e5;padding-top: 30px;">'
       html+='<div>Giảm Giá</div>'
       html+='<h4 id="giam_gia" class="price_item">0</h4>'
       html+='</div>'
       html+='<div id="total" class="row" style="border-bottom: 1px solid #e5e5e5;padding-top: 30px;">'
       html+='<div>Thành Tiền</div>'
       html+='<h4 id="thanh_tien" class="price_item">'+data.totalPrice+'</h4>'
       html+='</div>'
       html+='<div id="total" class="row" style="padding-top: 30px;">'
       html+='<div class="col-md-4"><button id="delete_cart" class="btn btn-danger">Xóa</button></div>'
       html+='<div class="col-md-4"><button id="save" class="btn btn-success">Lưu</button></div>'
       html+='</div>'
      // html+='<div><button class="btn btn-success">Thanh Toán</button></div>'
    }

    $('#cart_body').html(html);
  }
  $('.load_sp').click(function(even){
    even.preventDefault();
    var id = $(this).attr('id');
    $('.load_sp').removeClass('line-through');
    $(this).addClass('line-through');
    $(this).attr('disabled',true);
    $('#product').html('');
    getJsonProduct(id);
  });
  $(document).on('click','img',function(){
    var id =$(this).attr('id');
    var sl=1;
    $.ajax({
      url:"add-to-cart/"+id+"/"+sl,
      dataType:"json",
      success:function(cart)
      {
        load_cart(cart.cart);              
      }
    })
  });
  $('#search_sp').keyup(function(){
    $('.load_sp').removeClass('line-through');
    var key=$(this).val();
    if(key!='')
    {
      $.ajax({
        url:'admin/searchProduct/'+key,
        dataType:'json',
        success:function(data)
        {
          $('#product').html('');
          load_sp(data.data);
        }
      })
    }
    else
    {
      var id =0;
      getJsonProduct(id);
    }
  });
  $(document).on('click','.increment',function(){
    var id =$(this).attr('id');
    var sl=1;
    $.ajax({
      url:"add-to-cart/"+id+"/"+sl,
      dataType:"json",
      success:function(cart)
      {
        load_cart(cart.cart);
      }

    })
  });
  $(document).on('click','.decrement',function(){
    var id =$(this).attr('id');
    $.ajax({
      url:"reduce-item/"+id,
      dataType:"json",
      success:function(cart)
      {
        load_cart(cart.cart);
      }
    })
  });
  $(document).on('click','#delete_cart',function(){
    $.ajax({
      url:'delete-cart',
      dataType:'json',
      success:function(cart)
      {
        load_cart(cart.cart);
      }
    })
  });
  $('#khachhang_search').keyup(function(){
    var key =$(this).val();
    if(key=='')
    {
      $('#search_result').html('').removeClass('display-block');
      $('#id_khachhang').val('');
      $('#giam_gia').text(0);
      $('#thanh_tien').text($('#totalPrice').text());
    }
    if(key!='')
    {
      $.ajax({
        url:'admin/searchCustomer/'+key,
        dataType:"json",
        success:function(data){
          load_search(data.data);
        }
      })
    }
  });
  function load_search(data){
    var ul='<ul>'
    $.each(data,function(key,val){
      val.diemtichluy=val.diemtichluy==null?0:val.diemtichluy;
      ul+='<li style="list-style: none;">'
      ul+='<div class="row">'
      ul+='<div class="col-md-12 col-12"><a id="'+val.id+'" href="'+val.diemtichluy+'" class="result">'+val.id+' - '+val.tenkhachhang+' -điểm: '+val.diemtichluy+'</a></div>'
      ul+='</div>'
      ul+='</li>'
    })
    ul+='</ul>'
    $('#search_result').addClass('display-block');
    $('#search_result').html(ul);
  }
  $(document).on('click','.result',function(even){
    even.preventDefault();
    var diem= $(this).attr('href');
    var id = $(this).attr('id')
    $('#id_khachhang').val(id);
    $('#search_result').html('').removeClass('display-block');
    $('#khachhang_search').val($(this).text());
    var price= $('#totalPrice').text();
    var giam;
    var thanhtien;
    if(diem>=700)
    {
      giam=price * 0.9;
      thanhtien = price-giam;
    }
    if(diem>=500 && diem<700)
    {
      giam=price * 0.95;
      thanhtien = price-giam;
    }
    $('#giam_gia').text(thanhtien);
    $('#thanh_tien').text(giam);
  });
  $(document).on('click','#save',function(){
    var formData = new FormData($('#form_data')[0]);
    formData.append('thanhtien',$('#thanh_tien').text());
    $.ajax({
      headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      },
      url:"admin/ban-hang/save",
      method:"POST",
      data: formData,
      contentType: false,
      cache:false,
      processData: false,
      dataType:"json",
          success:function(cart)
          {
             load_cart(cart.cart);
             $('#id_khachhang').val('');
             $('#khachhang_search').val('');
          }
        })
  });
    $('#print').printPage();
});
</script>
@endsection