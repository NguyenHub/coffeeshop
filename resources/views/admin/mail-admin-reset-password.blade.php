<!DOCTYPE html>
<html lang="en">
<head>
	<style>
	.btn{
		padding: 0.375rem 0.75rem;
		font-size: 1rem;
		line-height: 1.5;
		border-radius: 0.25rem;
		height: 45px;
	}
	.btn-info {
		color: #fff;
		background-color: #17a2b8;
		border-color: #17a2b8;
	}
</style>
</head>
<body>
	<p>{{ $body}}</p>
	<a href="http://127.0.0.1:8000/admin/khoi-phuc-mat-khau/{{ $email }}/{{$token}}"><button class="btn btn-info">Khôi Phục Mật Khẩu</button></a>
</body>
</html>