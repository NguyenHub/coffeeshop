<!DOCTYPE html>
<html lang="en">
<head>
	<style>
	.body{
		width: 50%;
		/*height: 300px;*/
		position:absolute;
		/*background-color: red;*/
		left: 25%;
		right: 25%;
		/*transform: translate(-50%,-50%);*/
	}
	.stt{
		left: 0px;
		position: absolute;
	}
	.name_item{
		left: 40px;
		position: absolute;
	}
	.price_item{
		right: 0px;
		position: absolute;
	}
	.qty_item{
		right: 70px;
		position: absolute;
	}
	p{
		text-align: center;
	}
	.table {
		width: 100%;
		margin-bottom: 1rem; 
		background-color: transparent;
		border-collapse: collapse;
	}
	.table-bordered {
		/*border: 1px solid #dee2e6;*/
	}
	thead {
		display: table-header-group;
		vertical-align: middle;
		border-color: inherit;
	}
	tr {
		display: table-row;
		vertical-align: inherit;
		border-color: inherit;
	}
	.table-bordered thead td, .table-bordered thead td {
		border-bottom-width: 2px;
	}
	.table thead td {
		vertical-align: bottom;
		border-bottom: 2px solid #dee2e6;
	}
	.table-bordered th, .table-bordered td {
		/*border: 1px solid #dee2e6;*/
	}
	.table th, .table td {
		padding-top: 0.75rem;
		vertical-align: top;
		/*border-top: 1px solid #dee2e6;*/
	}
	tbody {
		display: table-row-group;
		vertical-align: middle;
		/*border-color: inherit;*/
	}
	td {
		display: table-cell;
		vertical-align: inherit;
	}
</style>
</head>
<body>
	<div class="body">
		
		<p><strong>SMART COFFEE</strong></p>
		<p>180 Cao Lỗ, Phường 4, Quận 8</p>
		<p>TEL: 0387370052</p>
		<p>HÓA ĐƠN TÍNH TIỀN</p>
		<div class="">Ngày: {{date('d-m-Y H:i')}}</div>
		<div class="">Nhân Viên: {{Auth::guard('nhan_vien')->user()->tennhanvien}}</div>
		<div class="">Hình Thức Thanh Toán: Tiền Mặt</div>
		<table class="table table-bordered ">
			<thead>
				<td width="20%">STT</td>
				<td width="60%">Sản Phẩm</td>
				<td width="20%">SL</td>
				<td width="30%">GIÁ</td>
			</thead>
			@if(Session::has('cart'))
			<tbody>
				@php
				$i=1;
				@endphp
				@foreach($product_cart as $key=> $cart)
				<tr id="cart_item" class="" style="padding-top: 30px;">
					<td class="">{{$i}}</td>
					<td class="">{{$cart['item']['tenmon']}}</td>
					<td class="">{{$cart['qty']}}</td>
					<td class="">{{number_format($cart['item']['dongia'])}}</td>
				</tr>
				@php
				$i++;
				@endphp
				@endforeach
				@endif
				<tr >
					<td colspan="2" ="">Tổng Tiền (vnd):</td>
					<td></td>
					<td colspan="2">{{number_format(Session('cart')->totalPrice)}}</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2">Giảm Giá (vnd):</td>
					<td></td>
					<td colspan="2">{{number_format($giam)}}</td>
					<td></td>
				</tr>
				<tr >
					<td colspan="2">Thành Tiền (vnd):</td>
					<td></td>
					<td colspan="2">{{number_format(Session('cart')->totalPrice-$giam)}}</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>

