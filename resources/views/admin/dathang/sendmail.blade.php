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
	<p>Đơn Đặt Hàng</p>
	<table class="table table-bordered ">
		<thead>
			<th>STT</th>
			<th>NGUYÊN LIỆU</th>
			<th>SỐ LƯỢNG</th>
			<th>DVT</th>
			<th>GHI CHÚ</th>
		</thead>
		<tbody>
			@foreach($dathang as $key=>$value)
			<tr>
				<td>{{$key}}</td>
				<td>{{$value['tennguyenlieu']}}</td>
				<td>{{$value['soluong']}}</td>
				<td>
					@if($value['donvitinh']==0)
					{{'Chai'}}
					@elseif($value['donvitinh']==1)
					{{'Thùng'}}
					@elseif($value['donvitinh']==2)
					{{'Kilogram'}}
					@else
					{{'Cái'}}
					@endif
				</td>
				<td>{{$value['ghichu']}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
