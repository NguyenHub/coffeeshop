@extends('master')
@section('content')
<!-- mobile-menu-area-end -->
<div class="breadcrumb-area gray-bg">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="index">Trang Chủ</a></li>
				<li class="active"> Giỏ Hàng </li>
				<li class="active"> Thanh Toán </li>
			</ul>
		</div>
	</div>
</div>
<!-- checkout-area start -->
<div class="checkout-area pb-80 pt-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="checkout-wrapper">
					<div id="faq" class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title"><span>1.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-1">Thông Tin Nhận Hàng</a></h5>
							</div>
							<div id="payment-1" class="panel-collapse collapse show">
								<div class="panel-body">
									<div class="billing-information-wrapper">
										@if(Auth::guard('khach_hang')->check())
										<div class="row">
											<div class="col-lg-6 col-md-6">
												<div class="billing-info">
													<label>Địa Chỉ</label>
													<input type="text" id="diachi" value="{{Auth::guard('khach_hang')->user()->diachi}}">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="billing-info">
													<label>Số Điện Thoại</label>
													<input type="text" id="sdt" value="{{Auth::guard('khach_hang')->user()->sdt}}">
												</div>
											</div>
										</div>
										@else
										<div class="row">
											<div class="col-lg-6 col-md-6">
												<div class="billing-info">
													<label>Địa Chỉ</label>
													<input type="text" id="diachi" name="diachi" value="" placeholder="Nhập địa chỉ nhập hàng">
													<p style="color: red;" id="diachi_result"></p>
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="billing-info">
													<label>Số Điện Thoại</label>
													<input type="text" id="sdt" name="sdt" value="" placeholder="Nhập số điện thoại">
													<p style="color: red;" id="sdt_result"></p>
												</div>
											</div>
										</div>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title"><span>2.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-5">Hình Thức Thanh Toán</a></h5>
							</div>
							<div id="payment-5" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="payment-info-wrapper">
										<div class="ship-wrapper">
											<div class="single-ship">
												<input type="radio" checked="" value="address" name="address">
												<label>Thanh Toán Khi Nhận Hàng</label>
											</div>
											<div class="single-ship">
												<input type="radio" value="dadress" name="address">
												<label>Credit Card (saved) </label>
											</div>
										</div>
										<div class="payment-info">
											<div class="row">
												<div class="col-lg-6 col-md-6">
													<div class="billing-info">
														<label>Name on Card </label>
														<input type="text">
													</div>
												</div>
												<div class="col-lg-6 col-md-6">
													<div class="billing-select">
														<label>Credit Card Type</label>
														<select>
															<option>American Express</option>
															<option>Visa</option>
															<option>MasterCard</option>
															<option>Discover</option>
														</select>
													</div>
												</div>
												<div class="col-lg-12 col-md-12">
													<div class="billing-info">
														<label>Credit Card Number </label>
														<input type="text">
													</div>
												</div>
											</div>
											<div class="expiration-date">
												<label>Expiration Date </label>
												<div class="row">
													<div class="col-lg-6 col-md-6">
														<div class="billing-select">
															<select>
																<option>Month</option>
																<option>January</option>
																<option>February</option>
																<option> March</option>
																<option>April</option>
																<option> May</option>
																<option>June</option>
																<option>July</option>
																<option>August</option>
																<option>September</option>
																<option> October</option>
																<option> November</option>
																<option> December</option>
															</select>
														</div>
													</div>
													<div class="col-lg-6 col-md-6">
														<div class="billing-select">
															<select>
																<option>Year</option>
																<option>2015</option>
																<option>2016</option>
																<option>2017</option>
																<option>2018</option>
																<option>2019</option>
																<option>2020</option>
																<option>2021</option>
																<option>2022</option>
																<option>2023</option>
																<option>2024</option>
																<option>2025</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12 col-md-12">
													<div class="billing-info">
														<label>Card Verification Number</label>
														<input type="text">
													</div>
												</div>
											</div>
										</div>
										<div class="billing-back-btn">
											<div class="billing-back">
												<a href="#"><i class="ion-arrow-up-c"></i> back</a>
											</div>
											<div class="billing-btn">
												<button type="submit">Continue</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title"><span>3.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-6">Xem Trước Đơn Hàng</a></h5>
							</div>
							<div id="payment-6" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="order-review-wrapper">
										<div class="order-review">
											<div class="table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th>Hình Ảnh</th>
															<th>Sản Phẩm</th>
															<th>Đơn Giá</th>
															<th>Số Lượng</th>
															<th>Thành Tiền</th>
														</tr>
													</thead>
													<tbody>
														{{-- tbody --}}
													</tbody>
													<tfoot>
														<tr>
															<td colspan="3">Tổng Tiền </td>
															<td class="price_cart" colspan="1"></td>
														</tr>
													</tfoot>
												</table>
											</div>
											{{-- <div class="billing-back-btn">
												<span>
													Forgot an Item?
													<a href="#"> Edit Your Cart.</a>

												</span>
												<div class="billing-btn">
													<button type="submit">Continue</button>
												</div>
											</div> --}}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<form id="dataform">
					<div class="grand-totall">
						<div class="title-wrap">
							<h4 class="cart-bottom-title section-bg-gary-cart">Giỏ Hàng</h4>
						</div>
						<h5>Tạm tính <span id="price_cart"></span></h5>
						<h5>Giảm giá <span class="discount_cart"></span></h5>
						<div id="ma_giam_gia"></div>
						<div class="total-shipping">
							<h5>Phí giao hàng 
								<span id="ship" style="float: right;"></span>
							</h5>
								{{-- <ul>
									<li><input type="checkbox"> Standard <span>$20.00</span></li>
									<li><input type="checkbox"> Express <span>$30.00</span></li>
								</ul> --}}
							</div>
							<div class="total-shipping">
								<input class="form-control" type="text" id="ghichu" name="ghichu" placeholder="Ghi chú đơn hàng">
							</div>
							<div id="codekm_resutl" style="color: red;"></div>
							<div class="input-group">
								<input class="form-control" type="text" id="codekm" name="codekm" required="" placeholder="Nhập mã khuyến mãi" />
								<span class="input-group-btn">
									<button id="makm" class="btn btn-warning" type="submit">Áp dụng</button>
								</span>
							</div>
							<h5 class="grand-totall-title" style="
							padding-top: 10px;">Tổng Tiền<span class="tong-tien"></span></h5>
							<h4 class="grand-totall-title" style="
							padding-top: 10px;"><span class="da_giam"></span></h4>
							<a  id="thanh-toan">THANH TOÁN</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
{{-- Start Form Confirm --}}
<div id="confirmModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title_confirm">Xác Nhận !</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<span id="confirm_result"></span>
				<h4 class="modal-delete" align="center" style="margin:0;">Đặt Hàng Thành Công</h4>
			</div>
			{{-- <div class="modal-footer">
				<button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div> --}}
		</div>
	</div>
</div>
{{-- End Form Confirm --}}
@endsection
@section('script')
<script>
	$(document).ready(function(){
		load_cart();
		function load_cart(){
			$.ajax({
				url:'gio-hang/thanh-toan',
				dataType:'json',
				success:function(cart){
					var row='';//mini cart
					var html='';//cart
					if(cart.null)
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
						//$('#sdt').val(khachhang.khachhang.sdt);
						$('.count_cart').text(cart.cart.totalQty);
						$('.price_cart').text(cart.cart.totalPrice);
						$('#price_cart').text(cart.cart.totalPrice);


						$.each(cart,function(key,value){
							//$('#diachi').val(value.diachi);
							//$('#sdt').val(value.sdt);
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
							html+='<td class="product-subtotal">'+v.qty+'</td>'
							html+='<td class="product-subtotal">'+v.price+'</td>'
							html+='</tr>'
						})
							row+='</ul>'
							row+='<div class="shopping-cart-total">'
							row+='<h4>Tổng tiền : <span class="shop-total">'+value.totalPrice.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ")+" đ"+'</span></h4>'
							row+='</div>'
							row+='<div class="shopping-cart-btn">'
							row+='<a href="gio-hang">Xem Giỏ Hàng</a>'
							row+='<a href="checkout.html">Thanh Toán</a>'
							row+='</div>'
							if(value.totalPrice>50000)
							{
								$('#ship').text(0);
								$('.tong-tien').text(0+value.totalPrice);
							}
							else
							{
								$('#ship').text(15000);
								$('.tong-tien').text(15000+value.totalPrice);
							}
						});
						$('#mini_cart').html(row);
						$('tbody').html(html);
					}
				}
			})
		}
		//hàm kiểm tra mã km
		$('#makm').click(function(event){
			event.preventDefault();
			var code=$('#codekm').val();
			$('.tong-tien').removeClass('line-through');
			$('#codekm_resutl').text('');
			$('.discount_cart').text('');
			$('.da_giam').text('');
			$('#ma_giam_gia').text('');
			if(code!='')
			{
				$.ajax({
					url:"giam-gia/"+code,
					dataType:"json",
					success:function(html)
					{
						if(html.error)
						{
							$('#codekm_resutl').text(html.error);
						}
						else
						{
							$('#ma_giam_gia').text(code);
							var tien_chua_giam=$('#price_cart').text();
							if(html.giam_gia>tien_chua_giam)
							{
								html.giam_gia=tien_chua_giam;
							}
							var ship =Number($('#ship').text());
							$('.tong-tien').addClass('line-through');
							$('.discount_cart').text(html.giam_gia);
							$('.da_giam').text(ship+=(tien_chua_giam-html.giam_gia));
						}

						
					}
				})
			}
		});
		$(document).on('click','.del',function(event){
			event.preventDefault();
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
		$('#thanh-toan').click(function(){
			$('#diachi_result').text('');
			$('#sdt_result').text('');
			var diachi = $('#diachi').val();
			var sdt = $('#sdt').val();
			var pattern_sdt= /(^(0{1})+(\d{9}))$/;
			var ok=pattern_sdt.exec(sdt);
			var error=new Array();
			if(!ok)
			{
				$('#sdt_result').text('Số điện thoại không hợp lệ!');
			}
			if(diachi=='')
			{
				$('#diachi_result').text('Địa chỉ không hợp lệ!');
			}
			else
			{
				var formData=new FormData($('#dataform')[0]);
				formData.append('diachi',$('#diachi').val());
				formData.append('sdt',$('#sdt').val());
				formData.append('makhuyenmai',$('#ma_giam_gia').text());
				formData.append('thanhtien',$('.tong-tien').text());
				$.ajax({
					headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
					method:'POST',
					url:'dat-hang',
					// data: {
					// 	'_token': $('meta[name="csrf-token"]').attr('content'),
					// 	'diachi': $('input[name=diachi]').val(),
					// 	'sdt': $('input[name=sdt]').val(),
					// },
					data:formData,
					contentType:false,
					processData:false,
					cache:false,
					dataType:'json',
					success:function(){
						// $('#confirmModal').modal('show');
						// setTimeout(function(){
						// 	$('#confirmModal').modal('hide');
						// 	window.location.href="index";
						// }, 2000);
					}

				})
				$('#confirmModal').modal('show');
						setTimeout(function(){
							$('#confirmModal').modal('hide');
							window.location.href="index";
						}, 2000);
			}

		});
		function validation(){//hàm kiểm tra thông tin nhận hàng
			var diachi = $('#diachi').val();
			var sdt = $('#sdt').val();
			var pattern_sdt= /(^(0{1})+(\d{9}))$/;
			var ok=pattern_sdt.exec(sdt);
			var error=new Array();
			if(!ok)
			{
				$('#sdt_result').text('Số điện thoại không hợp lệ!');
			}
			if(diachi='')
			{
				$('#diachi_result').text('Địa chỉ không hợp lệ!');
			}	
			//console.log(error);
		}
	});
</script>
@endsection