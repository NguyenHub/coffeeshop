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
<body onload="window.print()">
	<div class="body">
		<p><strong>SMART COFFEE</strong></p>
		<p>180 Cao Lỗ, Phường 4, Quận 8</p>
		<p>TEL: 0387370052</p>
		<p>HÓA ĐƠN TÍNH TIỀN</p>
		<div class="">Ngày: {{$donhang->ngaydat}}</div>
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
				<td width="20%">STT</td>
				<td width="60%">Sản Phẩm</td>
				<td width="20%">SL</td>
				<td width="30%">GIÁ</td>
			</thead>
			<tbody>
				@php
				$gia=0;
				@endphp
				@foreach($chitiet as $key=> $ct)
				<tr id="cart_item" class="" style="padding-top: 30px;">
					<td class="">{{$key}}</td>
					<td class="">{{$ct->tenmon}}</td>
					<td class="">{{$ct->soluong}}</td>
					<td class="">{{$ct->dongia}}</td>
				</tr>
				@php
				$gia+=$ct->soluong*$ct->dongia;
				@endphp
				@endforeach
				<tr >
					<td colspan="2" ="">Tổng Tiền (vnd):</td>
					<td></td>
					<td colspan="2">{{number_format($gia)}}</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2">Giảm Giá (vnd):</td>
					<td></td>
					<td colspan="2">{{number_format($gia+$donhang->phi_giao_hang-$donhang->thanhtien)}}</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2">Ship (vnd):</td>
					<td></td>
					<td colspan="2">{{number_format($donhang->phi_giao_hang)}}</td>
					<td></td>
				</tr>
				<tr >
					<td colspan="2">Thành Tiền (vnd):</td>
					<td></td>
					<td colspan="2">{{number_format($donhang->thanhtien)}}</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>
<script type="text/javascript">
	//window.location.href='admin/ban-hang';
</script>