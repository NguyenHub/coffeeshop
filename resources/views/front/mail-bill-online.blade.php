<!DOCTYPE html>
<html lang="en">
<head>
	<style>
	.body{
		width: 50%;
		/*height: 300px;*/
		position:absolute;
		/*background-color: red;*/
		left: 55%;
		right: 55%;
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
	.table-bordered thead th, .table-bordered thead td {
		border-bottom-width: 2px;
	}
	.table thead th {
		vertical-align: bottom;
		border-bottom: 2px solid #dee2e6;
	}
	.table-bordered th, .table-bordered td {
		/*border: 1px solid #dee2e6;*/
	}
	.table th, .table td {
		padding: 0.75rem;
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
		<p>HÓA ĐƠN TẠM TÍNH</p>
		<div class="">Ngày: {{$donhang->ngaydat}}</div>
		<div class="">KH: {{$ten}}</div>
		<div class="">SDT: {{$donhang->sdt}}</div>
		<div class="">Dịa Chỉ: {{$donhang->diachi}}</div>
		<div class="">Hình Thức Thanh Toán: 
			@if($donhang->pay==0)
			{{'Cod'}}
			@else
			{{'VN Pay (online)'}}
			@endif
		</div>
		<table class="table table-bordered ">
			<thead>
				<th width="20%">STT</th>
				<th width="60%">Sản Phẩm</th>
				<th width="20%">SL</th>
				<th width="30%">GIÁ</th>
			</thead>
			<tbody>
				@php
				$tongtien=0;
				@endphp
				@foreach($data as $key=> $dt)
				<tr id="cart_item" class="" style="padding-top: 30px;">
					<td class="">{{$key}}</td>
					<td class="">{{$dt->tenmon}}</td>
					<td class="">{{$dt->soluong}}</td>
					<td class="">{{number_format($dt->dongia)}}</td>
				</tr>
				@php
				$tongtien+=$dt->soluong*$dt->dongia;
				@endphp
				@endforeach
				<tr >
					<td colspan="2">Tổng Tiền (vnd):</td>
					<td></td>
					<td colspan="2">{{number_format($tongtien)}}</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2">Ship (vnd):</td>
					<td></td>
					<td colspan="2">{{number_format($donhang->phi_giao_hang)}}</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2">Giảm Giá (vnd):</td>
					<td></td>
					<td colspan="2">{{number_format($tongtien-$donhang->thanhtien+$donhang->phi_giao_hang)}}</td>
					<td></td>
				</tr>
				<tr >
					<td colspan="2" >Thành Tiền (vnd):</td>
					<td></td>
					<td colspan="2">{{number_format($donhang->thanhtien)}}</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<p><strong>CẢM ƠN QUÝ KHÁCH !</strong></p>
	</div>
</body>
</html>

