<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="robots" content="noindex, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Begin SEO -->

    <!-- Primary Meta Tags -->
    <title>Smart Coffee</title>
    <base href="{{ asset('') }}">
    <meta name="title" content="STU Coffee">
    <meta name="description" content="Smart Coffee">

    <!-- Open Graph / Facebook -->
    {{-- <meta property="og:type" content="website">
    <meta property="og:url" content="https://khotemplate.vn/preview/template-thuc-uong-va-do-an-nhanh-dr03/index.html">
    <meta property="og:title" content="Template Thức Uống Và Đồ Ăn Nhanh | KhoTemplateVN">
    <meta property="og:description" content="Template thức uống và đồ ăn nhanh cung cấp đầy đủ mọi chức năng cho người dùng giúp việc quảng cáo thương hiệu, quảng cáo sản phẩm dễ dàng, chuẩn seo, chuẩn responsive.">
    <meta property="og:image" content="assets/img/slider/slider-2.jpg"> --}}

    <!-- Twitter -->
    {{-- <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://khotemplate.vn/preview/template-thuc-uong-va-do-an-nhanh-dr03/index.html">
    <meta property="twitter:title" content="Template Thức Uống Và Đồ Ăn Nhanh | KhoTemplateVN">
    <meta property="twitter:description" content="Template thức uống và đồ ăn nhanh cung cấp đầy đủ mọi chức năng cho người dùng giúp việc quảng cáo thương hiệu, quảng cáo sản phẩm dễ dàng, chuẩn seo, chuẩn responsive."> --}}
    <meta property="twitter:image" content="assets/img/slider/slider-2.jpg">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- End SEO -->

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/footer-logo2.PNG">
    <!-- all css here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/chosen.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link href="bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="daterangepicker/daterangepicker.css" />
</head>
<body>
    <!-- header start -->
    @include('header')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal"  role="dialog">
        <div class="modal-dialog" role="document" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <!-- Thumbnail Large Image start -->
                            <div class="tab-content">
                                <div id="img" class="tab-pane fade show active">
                                    {{-- <img src="assets/img/product-details/product-detalis-l1.jpg" alt=""> --}}
                                </div>
                            {{-- <div id="pro-2" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l2.jpg" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l3.jpg" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l4.jpg" alt="">
                            </div> --}}
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        {{-- <div class="product-thumbnail">
                            <div class="thumb-menu owl-carousel nav nav-style" role="tablist">
                                <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/img/product-details/product-detalis-s1.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-2"><img src="assets/img/product-details/product-detalis-s2.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-3"><img src="assets/img/product-details/product-detalis-s3.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-4"><img src="assets/img/product-details/product-detalis-s4.jpg" alt=""></a>
                            </div>
                        </div> --}}
                        <!-- Thumbnail image end -->
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="modal-pro-content">
                            <h3 id="tenmon"></h3>
                            <div class="product-price-wrapper">
                                <span id="dongia"></span>
                                {{-- <span class="product-price-old">$162.00 </span> --}}
                            </div>
                            {{-- <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p> --}}  
                            {{-- <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Size*</label>
                                    <select class="select">
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value="">L</option>
                                    </select>
                                </div>
                                <div class="quickview-color-wrap">
                                    <label>Color*</label>
                                    <div class="quickview-color">
                                        <ul>
                                            <li class="blue">b</li>
                                            <li class="red">r</li>
                                            <li class="pink">p</li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="product-quantity">
                                <div class="cart-plus-minus">
                                    <input type="hidden" id="hidden_id">
                                    <input id="soluong" class="cart-plus-minus-box" type="text" name="qtybutton">
                                </div>
                                {{-- <a href="add-to-cart/3"><button class="addToCart" >Chọn Mua</button></a> --}}
                                <button class="addToCart" >Chọn Mua</button>
                            </div>
                            <span hidden="" id="result_addTocart"><i class="fa fa-check"></i> Đã thêm vào giỏ hàng</span>
                            {{-- <div id="mota"></div> --}}
                            {{--  <textarea id="mota" name="mota"></textarea> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
@yield('content')
@include('footer')

<!-- all js here -->
<script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/format.js"></script>
<script src="daterangepicker/moment.min.js"></script>
<script src="daterangepicker/daterangepicker.js"></script>
<script src="ckeditor/ckeditor.js"></script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmGmeot5jcjdaJTvfCmQPfzeoG_pABeWo"></script>
<script>
    function init() {
        var mapOptions = {
            zoom: 11,
            scrollwheel: false,
            center: new google.maps.LatLng(40.709896, -73.995481),
            styles: 
            [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#f53651"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road.highway.controlled_access","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#dddddd"},{"visibility":"on"}]}]
        };
        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.709896, -73.995481),
            map: map,
            icon: 'assets/img/icon-img/map.png',
            animation:google.maps.Animation.BOUNCE,
            title: 'Snazzy!'
        });
    }
    google.maps.event.addDomListener(window, 'load', init);
</script> --}}
@yield('script')
<script>
    function load_loai(loais)
    {
        var option='';
        option+='<option value="0">Tất cả</option>'
        $.each(loais,function(k,v){
            option+='<option value="'+v.id+'">'+v.tenloai+'</option>'
        });
        $('#select_loai').html(option);
    }
    function load_mini_cart(carts)
    {
        if(carts==null)
        {
            $('.count_cart').text(0);
            $('.price_cart').text(0);
            var row='';
            row+='<div class="shopping-cart-btn">'
            row+='<a >Giỏ Hàng Rỗng</a>'
            row+='</div>'
            $('#mini_cart').html(row);
        }       
        else
        {
            $('.count_cart').text(carts.totalQty);
            $('.price_cart').text(carts.totalPrice);
            var row='';
            row+='<ul>'
            $.each(carts.items,function(k,v){
                row+='<li class="single-shopping-cart">'
                row+='<div class="shopping-cart-img">'
                row+='<a><img style="height: 80px; width: 80px" alt="" src={{URL::to('/')}}/hinhanh/upload/'+v.item.hinhanh+'></a>'
                row+='</div>'
                row+='<div class="shopping-cart-title">'
                row+='<h4><a href="#">'+v.item.tenmon+'</a></h4>'
                row+='<h6>Qty: '+v.qty+'</h6>'
                row+='<span>'+v.price+'</span>'
                row+='</div>'
                row+='<div class="shopping-cart-delete">'
                row+='<a class="del_item" id="'+v.item.id+'"><i class="ion ion-close"></i></a>'
                row+='</div>'
                row+='</li>'
            })
            row+='</ul>'
            row+='<div class="shopping-cart-total">'
            row+='<h4>Tổng tiền : <span class="shop-total">'+carts.totalPrice+'</span></h4>'
            row+='</div>'
            row+='<div class="shopping-cart-btn">'
            row+='<a href="gio-hang">Xem Giỏ Hàng</a>'
            row+='<a href="gio-hang/thanh-toan">Thanh Toán</a>'
            row+='</div>'
            $('#mini_cart').html(row);
        }
    }
    function load_cart(carts){
        var html='';
        if(carts==null)
        {
            html+='<tr>'
            html+='<td colspan="6"><h5>Giỏ Hàng Rỗng</h5>'
            html+='</td>'
            html+='</tr>'
            $('tbody').html(html);
        }       
        else
        {
            $.each(carts.items,function(k,v){
                html+='<tr>'
                html+='<td class="product-thumbnail">'
                html+='<a href="#"><img style="height: 80px; width: 80px" src={{URL::to('/')}}/hinhanh/upload/'+v.item.hinhanh+'></a>'
                html+='</td>'
                html+='<td class="product-name"><a href="#">'+v.item.tenmon+'</a></td>'
                html+='<td class="product-price-cart"><span class="amount">'+v.item.dongia+'</span></td>'
                html+='<td class="product-quantity">'
                html+='<div class="cart-plus-minus2">'
                html+='<div class="dec qtybutton decrement" id="'+v.item.id+'">-</div>'
                html+='<input readonly="" type="text" class="cart-plus-minus-box"  name="qtybutton" value="'+v.qty+'">'
                html+='<div class="inc qtybutton increment" id="'+v.item.id+'">+</i></div>'
                html+='</div></td>'
                html+='<td class="product-subtotal">'+v.price+'</td>'
                html+='<td class="product-remove">'
                html+='<a class="del_item" id="'+v.item.id+'" ><i class="fa fa-times" title="Xóa"></i></a>'
                html+='</td>'
                html+='</tr>'
            })
            $('tbody').html(html);
        }
    }
    $('.detail').click(function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        $('#exampleModal').modal('show');
        $('#result_addTocart').attr('hidden',true);
        $.ajax({
            url:"chitiet-sanpham/"+id,
            dataType:"json",
            success:function(html)
            {
                $('#soluong').val(1);
                $('.addToCart').attr('id',html.data.id);
                $('#hidden_id').val(html.data.id);
                //CKEDITOR.instances['mota'].setData(html.data.mota);
                //$('#mota').instances.setData(html.data.mota);
                $('#tenmon').text(html.data.tenmon);
                $('#dongia').text(html.data.dongia);
                //$('#mota').val(html.data.mota);
                $('#img').html("<img src={{URL::to('/')}}/hinhanh/upload/"+html.data.hinhanh + ">");
                $('#exampleModal').modal('show');
            }
        })
    });
    $('#search').keyup(function(){
            //$('#search_result').html('');
            //$('.shopping-cart-content').slideToggle('hide');
            //$('#search_result').slideToggle('');
            var formData=new FormData();
            formData.append('key',$('#search').val());
            formData.append('loai',$('#select_loai').val());
            var key=$('#search').val();
            //alert(key);
            if(key=='')
            {
                $('#search_result').html('').removeClass('display-block');
            }
            if(key!='')
            {
                $.ajax({
                    headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                    url:'search',
                    method:"POST",
                    data:formData,
                    cache:false,
                    processData:false,
                    contentType:false,
                    dataType:"json",
                    success:function(mon){
                        var mons=mon.mon;
                        load_search(mons);
                    }
                })
            }
        })
    function load_search(mons){
        var ul='<ul>'
        $.each(mons,function(key,val){
            ul+='<li style="list-style: none;">'
            ul+='<div class="row">'
            ul+='<div class="col-md-3 col-3">'
            ul+='<a><img style="height: 30px; width: 30px" alt="" src={{URL::to('/')}}/hinhanh/upload/'+val.hinhanh+'></a>'
            ul+='</div>'
            ul+='<div class=" col-md-9 col-9">'
            ul+='<div class="col-md-12 col-12">'
            ul+='<span><a href="san-pham/chi-tiet/'+val.id+'">'+val.tenmon+'</a></span>'
            ul+='</div>'
            ul+='<div class="col-md-5 col-5">'
            ul+='<span>'+val.dongia+'</span>'
            ul+='</div>'
            ul+='</div>'
            ul+='</div>'
            ul+='</li>'
        })
        ul+='</ul>'
        $('#search_result').addClass('display-block');
        $('#search_result').html(ul);
    }
    function format_datetime(datetime)
    {
        var date=new Date(datetime);
        var day =date.getDate();
        var month =(date.getMonth()+1);
        var year =date.getFullYear();
        day=day<10?"0"+day:day;
        month=month<10?"0"+month:month;
        if(datetime.length>14)
        {
            var hour =date.getHours();
            var minute =date.getMinutes();
            var second =date.getSeconds();
            hour=hour<10?"0"+hour:hour;
            minute=minute<10?"0"+minute:minute;
            second=second<10?"0"+second:second;
            return  day+"/"+month+"/"+year+" "+hour+":"+minute+":"+second;
        }
        return  day+"/"+month+"/"+year;

    }
    function format_money(money)
    {
        return money.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
    }
    function format_trangthai(trangthai)
    {
        if(trangthai==0)
        {
          return "Chờ Xử Lý";
      }
      else if(trangthai==1)
      {
          return "Đã Xử Lý";
      }
      else if(trangthai==2)
      {
          return "Hoàn Thành";
      }
      else
      {
          return "Hủy";
      }
  }
  function load_mon(mons)
  { 
    var html='';
    $.each (mons, function(key,val){
        html+='<div class="custom-col-5">'
        html+='<div class="product-wrapper mb-25">'
        html+='<div class="product-img">'
        html+='<a href="" class="detail" id="'+val.id+'">'
        html+='<img alt="" src={{URL::to('/')}}/hinhanh/upload/'+val.hinhanh + '>'
        html+='</a>'
        html+='<div class="product-action" >'
        html+='<div class="pro-action-left">'
        html+='<a href="" title="Chọn Mua " class="addToCart_byOne" id="'+val.id+'"><i class="ion-android-cart"></i> Chọn Mua</a>'
        html+='</div>'
        html+='<div class="pro-action-right">'
        {{-- <a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a> --}}
        {{-- <a title="Chi Tiết" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a> --}}
        html+='<a href="" title="Chi Tiết" class="detail" id="'+val.id+'" href="#"><i class="ion-android-open"></i></a>'
        html+='</div>'
        html+='</div>'
        html+='</div>'
        html+='<div class="product-content">'
        html+='<h4>'
        html+='<a >'+val.tenmon+'</a>'
        html+='</h4>'
        html+='<div class="product-price-wrapper">'
        html+='<span>'+val.dongia+'</span>'
        {{-- <span class="product-price-old">{{$dt->dongia}} </span> --}}
        html+='</div>'
        html+='</div>'
        html+='</div>'
        html+='</div>'
    });
    $('#show_mon').html(html);
}

        //xem chi tiết sản phẩm

        function String_replace(string)
        {
            // for(int i=0; i<=string.length;i++)
            // {

            // }
            //&lt;p&gt;TRÀ ĐÀO CAM SẢ&lt;/p&gt;
             //return tring.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
             //var strings=string;
           //return string.toString().replace('<p>','');
            //string.toString().replace('</p>;','');
             //string;
            //console.log(string);
        }
        //thêm vào giỏ hàng với số lượng 1
        $('.addToCart_byOne').click(function(event){
            event.preventDefault();
            var id=$(this).attr('id');
            var sl=1;
            $.ajax({
                url:"add-to-cart/"+id+"/"+sl,
                dataType:"json",
                success:function(cart)
                {
                    load_mini_cart(cart.cart);              
                }
            })
        });
        //thêm vào giỏ hàng với số lượng tùy chọn
        $(document).on('click','.addToCart',function(event){
            event.preventDefault();
            //nếu giảm số lượng <1 thì lấy bằng 1
            $('.dec').click(function(){
                if($('#soluong').val()<1)
                {
                    $('#soluong').val(1);
                }
            });
            var id=$(this).attr('id');
            var sl=$('#soluong').val();
            $.ajax({
                url:"add-to-cart/"+id+"/"+sl,
                dataType:"json",
                success:function(cart)
                {

                    load_mini_cart(cart.cart);
                }
            })
            $('#result_addTocart').removeAttr('hidden');
            setTimeout(function(){
                $('#result_addTocart').attr('hidden',true);
            }, 1000);
        });
        //xóa item trong giỏ hàng
        $(document).on('click','.del_item',function(){
            var id = $(this).attr('id');
            $.ajax({
                url:"delete-cart/"+id,
                dataType:"json",
                success:function(cart)
                {

                    load_mini_cart(cart.cart);
                    load_cart(cart.cart);
                }
            })
        });
    </script>
</body>
</html>
