<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
