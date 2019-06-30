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
								{{-- <tr>
									<td class="product-thumbnail">
										<a href="#"><img src="assets/img/cart/cart-3.jpg" alt=""></a>
									</td>
									<td class="product-name"><a href="#">PRODUCTS NAME HERE </a></td>
									<td class="product-price-cart"><span class="amount">$260.00</span></td>
									<td class="product-quantity">
										<div class="cart-plus-minus">
											<input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
										</div>
									</td>
									<td class="product-subtotal">$110.00</td>
									<td class="product-remove">
										<a href="#"><i class="fa fa-pencil"></i></a>
										<a href="#"><i class="fa fa-times"></i></a>
									</td>
								</tr> --}}
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
		load_cart();
		function load_cart(){
			$.ajax({
				url:'gio-hang',
				dataType:'json',
				success:function(cart)
				{
					console.log(cart.cart);
					var row='';//mini cart
					var html='';//cart
					if(cart.cart==null)
					{
						$('.count_cart').text(0);
						$('.price_cart').text(0);
						row+='<div class="shopping-cart-btn">'
						row+='<a >Giỏ Hàng Rỗng</a>'
						row+='</div>'
						html+='<tr>'
						html+='<td colspan="6"><h5>Giỏ Hàng Rỗng</h5>'
						html+='</td>'
						html+='</tr>'
						$('#mini_cart').html(row);
						$('tbody').html(html);
					}		
					else
					{
						$('.count_cart').text(cart.cart.totalQty);
						$('.price_cart').text(cart.cart.totalPrice);

						$.each(cart,function(key,value){
							row+='<ul>'
							$.each(value.items,function(k,v){
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
								row+='<a class="del" id="'+v.item.id+'"><i class="ion ion-close"></i></a>'
								row+='</div>'
								row+='</li>'
							//cart
							html+='<tr>'
							html+='<td class="product-thumbnail">'
							html+='<a href="#"><img style="height: 80px; width: 80px" src={{URL::to('/')}}/hinhanh/upload/'+v.item.hinhanh+'></a>'
							html+='</td>'
							html+='<td class="product-name"><a href="#">'+v.item.tenmon+'</a></td>'
							html+='<td class="product-price-cart"><span class="amount">'+v.item.dongia+'</span></td>'
							html+='<td class="product-quantity">'
							html+='<div class="cart-plus-minus">'
							html+='<div class="dec qtybutton decrement" id="'+v.item.id+'">-</div>'
							html+='<input readonly="" type="text" class="cart-plus-minus-box"  name="qtybutton" value="'+v.qty+'">'
							html+='<div class="inc qtybutton increment" id="'+v.item.id+'">+</i></div>'
							html+='</div></td>'
							html+='<td class="product-subtotal">'+v.price+'</td>'
							html+='<td class="product-remove">'
							html+='<a class="del" id="'+v.item.id+'" ><i class="fa fa-times" title="Xóa"></i></a>'
							html+='</td>'
							html+='</tr>'
						})
							row+='</ul>'
							row+='<div class="shopping-cart-total">'
							row+='<h4>Tổng tiền : <span class="shop-total">'+value.totalPrice+'</span></h4>'
							row+='</div>'
							row+='<div class="shopping-cart-btn">'
							row+='<a href="gio-hang">Xem Giỏ Hàng</a>'
							row+='<a href="gio-hang/thanh-toan">Thanh Toán</a>'
							row+='</div>'
							if(value.totalPrice>50000)
							{
								$('.ship').text(0);
								$('.tong-tien').text(0+value.totalPrice);
							}
							else
							{
								$('.ship').text(15000);
								$('.tong-tien').text(15000+value.totalPrice);
							}
						});
						$('#mini_cart').html(row);
						$('tbody').html(html);
					}
				}
			})
		}
		
		$(document).on('click','.del',function(){
			var id = $(this).attr('id');
			$.ajax({
				url:"delete-cart/"+id,
				dataType:"json",
				success:function()
				{

				}
			})
			load_cart();
		});
		$(document).on('click','.increment',function(){
			var id =$(this).attr('id');
			//alert(id);
			$.ajax({
				url:"add-to-cart/"+id,
				dataType:"json",
				success:function()
				{
					//$('#count_cart').text(html.cart.totalQty);
					//$('#price_cart').text(html.cart.totalPrice);
				}
				
			})
			load_cart();
		});
		$(document).on('click','.decrement',function(){
			var id =$(this).attr('id');
			//alert(id);
			$.ajax({
				url:"reduce-item/"+id,
				dataType:"json",
				success:function()
				{
					//$('#count_cart').text(html.cart.totalQty);
					//$('#price_cart').text(html.cart.totalPrice);
				}
				
			})
			load_cart();
		});
	});
</script>
@endsection