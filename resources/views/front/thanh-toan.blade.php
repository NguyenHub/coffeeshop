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
										<div class="row">
											<div class="form-group col-lg-6 col-md-6">
												<div class="form-label-group">
													
													<input type="text" class="form-control" id="diachi" name="diachi" value="" placeholder="Nhập địa chỉ nhập hàng">
													<label for="diachi">Địa Chỉ</label>
													<p style="color: red;" id="diachi_result"></p>
												</div>
											</div>
											<div class="form-group col-lg-6 col-md-6">
												<div class="form-label-group">
													<input type="text" id="sdt" name="sdt" value="" class="form-control" placeholder="Nhập số điện thoại">
													<label for="sdt">Số Điện Thoại</label>
													<p style="color: red;" id="sdt_result"></p>
												</div>
											</div>
										</div>
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
												<input type="radio" checked="" class="pay" value="0" id="cod" name="payment">
												<label>Thanh Toán Khi Nhận Hàng</label>
											</div>
											<div class="single-ship">
												<input type="radio" value="1" class="pay" id="online" name="payment">
												<label>Thanh Toán Online</label>
											</div>
										</div>
										<div class="payment-info">
											<div class="table-responsive">
												<form action="" id="create_form" method="post">       

													<div class="form-group">
														{{-- <label for="language">Loại hàng hóa </label> --}}
														<select name="order_type" id="order_type" class="form-control">
															{{-- <option value="topup">Nạp tiền điện thoại</option> --}}
															<option value="billpayment">Thanh toán hóa đơn</option>
															{{-- <option value="fashion">Thời trang</option> --}}
															{{-- <option value="other">Khác - Xem thêm tại VNPAY</option> --}}
														</select>
													</div>
													{{-- <div class="form-group">
														<label for="amount">Số tiền</label>
														<input class="form-control" id="amount"
														name="amount" readonly="" type="text"/>
													</div> --}}
													<div class="form-group">
														<label for="order_desc">Nội dung thanh toán</label>
														<textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>
													</div>
													<div class="form-group">
														<label for="bank_code">Ngân hàng</label>
														<select name="bank_code" id="bank_code" class="form-control">
															{{-- <option value="">Không chọn</option> --}}
															<option value="NCB"> Ngan hang NCB</option>
															<option value="AGRIBANK"> Ngan hang Agribank</option>
															<option value="SCB"> Ngan hang SCB</option>
															<option value="SACOMBANK">Ngan hang SacomBank</option>
															<option value="EXIMBANK"> Ngan hang EximBank</option>
															<option value="MSBANK"> Ngan hang MSBANK</option>
															<option value="NAMABANK"> Ngan hang NamABank</option>
															<option value="VNMART"> Vi dien tu VnMart</option>
															<option value="VIETINBANK">Ngan hang Vietinbank</option>
															<option value="VIETCOMBANK"> Ngan hang VCB</option>
															<option value="HDBANK">Ngan hang HDBank</option>
															<option value="DONGABANK"> Ngan hang Dong A</option>
															<option value="TPBANK"> Ngân hàng TPBank</option>
															<option value="OJB"> Ngân hàng OceanBank</option>
															<option value="BIDV"> Ngân hàng BIDV</option>
															<option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
															<option value="VPBANK"> Ngan hang VPBank</option>
															<option value="MBBANK"> Ngan hang MBBank</option>
															<option value="ACB"> Ngan hang ACB</option>
															<option value="OCB"> Ngan hang OCB</option>
															<option value="IVB"> Ngan hang IVB</option>
															<option value="VISA"> Thanh toan qua VISA/MASTER</option>
														</select>
													</div>
													<div class="form-group">
														<label for="language">Ngôn ngữ</label>
														<select name="language" id="language" class="form-control">
															<option value="vn">Tiếng Việt</option>
															<option value="en">English</option>
														</select>
													</div>

													{{-- <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán Popup</button>
													<button type="submit" class="btn btn-default">Thanh toán Redirect</button> --}}

												</form>
											</div>
										</div>
										{{-- <div class="billing-back-btn">
											<div class="billing-back">
												<a href="#"><i class="ion-arrow-up-c"></i> back</a>
											</div>
											<div class="billing-btn">
												<button type="submit">Continue</button>
											</div>
										</div> --}}
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
														@if(Session::has('cart'))
														@foreach($product_cart as $cart)
														<tr>
															<td class="product-thumbnail">
																<a href="#"><img style="height: 80px; width: 80px" src="hinhanh/upload/{{$cart['item']['hinhanh']}}"></a>
															</td>
															<td class="product-name"><a href="#">{{$cart['item']['tenmon']}}</a></td>
															<td class="product-price-cart"><span class="amount">{{$cart['item']['dongia']}}</span></td>
															<td class="product-subtotal">{{$cart['qty']}}</td>
															<td class="product-subtotal">{{$cart['item']['dongia']*$cart['qty']}}</td>
														</tr>
														@endforeach
														<tfoot>
															<tr>
																<td colspan="3">Tổng Tiền </td>
																<td class="price_cart" colspan="1">{{Session('cart')->totalPrice}}</td>
															</tr>
														</tfoot>
														@endif
													</tbody>
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
						<h5>Tạm tính 
							<span id="price_cart">
								@if(Session::has('cart'))
								{{Session('cart')->totalPrice}}
								@endif
							</span>
						</h5>
						<h5>Giảm giá <span class="discount_cart"></span></h5>
						<div id="ma_giam_gia"></div>
						<div class="total-shipping">
							<h5>Phí giao hàng 
								<span id="ship" style="float: right;">
									@if(Session::has('cart'))
									@if(Session('cart')->totalPrice>50000)
									{{0}}
									@else
									{{15000}}
									@endif
									@endif
								</span>
							</h5>
								{{-- <ul>
									<li><input type="checkbox"> Standard <span>$20.00</span></li>
									<li><input type="checkbox"> Express <span>$30.00</span></li>
								</ul> --}}
							</div>
							<div class="total-shipping">
								<input class="form-control" type="text" id="ghichu" name="ghichu" placeholder="Ghi chú đơn hàng" autocomplete="off">
							</div>
							<div id="codekm_resutl" style="color: red;"></div>
							<div class="input-group">
								<input class="form-control" type="text" id="codekm" name="codekm" required="" placeholder="Nhập mã khuyến mãi" autocomplete="off" />
								<span class="input-group-btn">
									<button style="height: 38px;" id="makm" class="btn btn-warning" type="submit">Áp dụng</button>
								</span>
							</div>
							<h5 class="grand-totall-title" style="
							padding-top: 10px;">Tổng Tiền<span class="tong-tien">
								@if(Session::has('cart'))
								@if(Session('cart')->totalPrice>50000)
								{{Session('cart')->totalPrice}}
								@else
								{{Session('cart')->totalPrice+15000}}
								@endif
							@endif</span></h5>
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
		$('#mini_cart').attr('hidden',true);
		//hàm kiểm tra mã km
		$('#create_form').hide();
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
							var ship =Number($('#ship').text());
							$('.tong-tien').addClass('line-through');
							$('.discount_cart').text(html.giam_gia);
							$('.da_giam').text(ship+=(tien_chua_giam-html.giam_gia));
						}
					}
				})
			}
		});
		$('#sdt').keyup(function(){
			var number = $(this).val()
			$(this).val(format_input_number(number));
		});
		// if($(this).is(":checked"))
		$("#online").click(function(){
			$('#create_form').show();
		});
		$("#cod").click(function(){
			$('#create_form').hide();
		})
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
				if($('.da_giam').text()!='')
				{
					$('.tong-tien').text($('.da_giam').text());
				}
				var formData=new FormData($('#dataform')[0]);
				formData.append('diachi',$('#diachi').val());
				formData.append('sdt',$('#sdt').val());
				formData.append('makhuyenmai',$('#ma_giam_gia').text());
				formData.append('thanhtien',$('.tong-tien').text());
				formData.append('ship',$('#ship').text());
				formData.append('pay',$("input[type='radio']:checked").val());
				if($("input[type='radio']:checked").val()==1)
				{
					formData.append('order_type',$('#order_type').val());
					formData.append('bank_code',$('#bank_code').val());
					formData.append('language',$('#language').val());
					formData.append('order_desc',$('#order_desc').val());
				}
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
					success:function(data)
					{
						if(data.thanhtoan)
						{
							window.location.href=''+data.thanhtoan+'';
						}
						else
						{
							$('#confirmModal').modal('show');
							setTimeout(function(){
								$('#confirmModal').modal('hide');
								window.location.href="index";
							},2000);
						}
					}
				})
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