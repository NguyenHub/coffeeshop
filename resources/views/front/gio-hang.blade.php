@extends('master')
@section('content')
<div class="breadcrumb-area gray-bg">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="index.html">Trang Chủ</a></li>
				<li class="active">Giỏ Hàng </li>
			</ul>
		</div>
	</div>
</div>
<!-- shopping-cart-area start -->
<div class="cart-main-area pt-95 pb-100">
	<div class="container">
		<h3 class="page-title">Chi tiết giỏ hàng</h3>
		<div class="row">
			<div class="col-lg-12 col-md-8 col-12 col-sm-8">
				<div class="col-lg-12 col-md-8 col-12 col-sm-8 table-content ">
					<table  >
						<thead>
							<tr>
								<th>Hình Ảnh</th>
								<th>Sản Phẩm</th>
								<th>Đơn Giá</th>
								<th>Số Lượng</th>
								<th>Thành Tiền</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if(Session::has('cart'))
							@foreach($product_cart as $cart)
							<tr>
								<td class="product-thumbnail">
									<a href="#"><img style="height: 80px; width: 80px" src="hinhanh/upload/{{$cart['item']['hinhanh']}}"></a>
								</td>
								<td class="product-name"><a href="#">{{$cart['item']['tenmon']}}</a></td>
								<td class="product-price-cart"><span class="amount">{{$cart['item']['dongia']}}</span></td>
								<td class="product-quantity">
									<div class="cart-plus-minus2">
										<div class="dec qtybutton decrement" id="{{$cart['item']['id']}}">-</div>
										<input readonly="" type="text" class="cart-plus-minus-box"  name="qtybutton" value="{{$cart['qty']}}">
										<div class="inc qtybutton increment" id="{{$cart['item']['id']}}">+</i></div>
									</div></td>
									<td class="product-subtotal">{{$cart['qty']*$cart['item']['dongia']}}</td>
									<td class="product-remove">
										<a class="del_item" id="{{$cart['item']['id']}}" ><i class="fa fa-times" title="Xóa"></i></a>
									</td>
								</tr>
								@endforeach
								@else
								<tr>
									<td colspan="6"><h5>Giỏ Hàng Rỗng</h5>
									</td>
								</tr>
								@endif
							</tbody>
						</table>
					</div>
					{{-- <div class="col-lg-4 col-md-8">
						<div class="grand-totall">
							<div class="title-wrap">
								<h4 class="cart-bottom-title section-bg-gary-cart">Giỏ Hàng</h4>
							</div>
							<h5>Tạm tính <span class="price_cart"></span></h5>
							<h5>Giảm giá <span class="discount_cart"></span></h5>
							<div class="total-shipping">
								<h5>Phí giao hàng 
									<span class="ship" style="float: right;"></span>
								</h5>
								<ul>
									<li><input type="checkbox"> Standard <span>$20.00</span></li>
									<li><input type="checkbox"> Express <span>$30.00</span></li>
								</ul>
							</div>
							<div id="codekm_resutl"></div>
							<div class="input-group">

								
								<input class="form-control" type="text" id="codekm" name="codekm" required=""/>
								<span class="input-group-btn">
									<button id="makm" class="btn btn-warning" type="submit">Áp dụng</button>
								</span>
							</div>
							<h4 class="grand-totall-title" style="
							padding-top: 10px;">Tổng Tiền<span class="tong-tien"></span></h4>
							<a href="#">THANH TOÁN</a>
						</div>
					</div> --}}
					{{-- <div class="row">
						<div class="col-lg-12">
							<div class="cart-shiping-update-wrapper">
								<div class="cart-shiping-update">
									<a href="#">Continue Shopping</a>
								</div>
								<div class="cart-clear">
									<a href="#">Clear Shopping Cart</a>
								</div>
							</div>
						</div>
					</div> --}}
					{{-- <div class="col-lg-4 col-md-6">
						<div class="cart-tax">
							<div class="title-wrap">
								<h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
							</div>
							<div class="tax-wrapper">
								<p>Enter your destination to get a shipping estimate.</p>
								<div class="tax-select-wrapper">
									<div class="tax-select">
										<label>
											* Country
										</label>
										<select class="email s-email s-wid">
											<option>Bangladesh</option>
											<option>Albania</option>
											<option>Åland Islands</option>
											<option>Afghanistan</option>
											<option>Belgium</option>
										</select>
									</div>
									<div class="tax-select">
										<label>
											* Region / State
										</label>
										<select class="email s-email s-wid">
											<option>Bangladesh</option>
											<option>Albania</option>
											<option>Åland Islands</option>
											<option>Afghanistan</option>
											<option>Belgium</option>
										</select>
									</div>
									<div class="tax-select">
										<label>
											* Zip/Postal Code
										</label>
										<input type="text">
									</div>
									<button class="cart-btn-2" type="submit">Get A Quote</button>
								</div>
							</div>
						</div>
					</div> --}}
					{{-- <div class="col-lg-4 col-md-6">
						<div class="discount-code-wrapper">
							<div class="title-wrap">
								<h4 class="cart-bottom-title section-bg-gray">MÃ GIẢM GIÁ</h4> 
							</div>
							<div class="discount-code">
								<p>Nhập mã giảm giá nếu có</p>
								<form id="codekm_form">
									<input type="text" id="codekm" name="codekm" required=""/>
									<input id="makm" class="btn btn-warning" type="submit" value="Áp Dụng"/>
								</form>
							</div>
						</div>
					</div> --}}
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 ">
					<div class="cart-shiping-update-wrapper">
						<div class="cart-shiping-update">
							<a href="index">Tiếp Tục Mua Hàng</a>
						</div>
						<div class="cart-clear">
							<a href="gio-hang/thanh-toan">Thanh Toán</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){
		//load_cart();
		

		$(document).on('click','.del_item',function(){
			var id = $(this).attr('id');
			$.ajax({
				url:"delete-cart/"+id,
				dataType:"json",
				success:function(cart)
				{
					load_cart(cart.cart);
					load_mini_cart(cart.cart);
				}
			})
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
					load_mini_cart(cart.cart);
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
					load_mini_cart(cart.cart);
				}
				
			})
		 });
	});
</script>
@endsection