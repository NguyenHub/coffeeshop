<!DOCTYPE html>
<html lang="en">
<head>
	<style>
	.table {
		width: 100%;
		margin-bottom: 1rem; 
		background-color: transparent;
		border-collapse: collapse;
	}
	.table-bordered {
		border: 1px solid #dee2e6;
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
		border: 1px solid #dee2e6;
	}
	.table th, .table td {
		padding: 0.75rem;
		vertical-align: top;
		border-top: 1px solid #dee2e6;
	}
	tbody {
		display: table-row-group;
		vertical-align: middle;
		border-color: inherit;
	}
	td {
		display: table-cell;
		vertical-align: inherit;
	}
</style>
</head>
<body>
	<p><strong> Thông Tin Đơn Hàng<strong></p>
	<div>Ngày Đặt: {{$ngaydat}}</div>
	<div>Tên Khách Hàng: {{$ten}}</div>
	<div>Số Điện Thoại: {{$sdt}}</div>
	<div>Địa Chỉ Nhận Hàng: {{$diachi}}</div>
	<table class="table table-bordered ">
		<thead>
			<th>Sản Phẩm</th>
			<th>Số Lượng</th>
			<th>Đơn Giá</th>
		</thead>
		<tbody>
			@foreach($cart->items as $carts)
			<tr>
				<td>{{$carts['item']['tenmon']}}</td>
				<td>{{$carts['item']['dongia']}}</td>
				<td>{{$carts['qty']}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div>Tạm Tính: {{$cart->totalPrice}}</div>
	<div>Phí Ship: {{$ship}}</div>
	<div>Khuyến Mãi: {{$cart->totalPrice+$ship-$thanhtien}}</div>
	<div>Thành Tiền: {{$thanhtien}}</div>
</body>
</html>
