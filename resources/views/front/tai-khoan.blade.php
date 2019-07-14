@extends('master')
@section('content')
<div class="breadcrumb-area gray-bg">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="index">Trang Chủ</a></li>
				<li class="active"> Tài Khoản / Theo Dõi Đơn Hàng </li>
			</ul>
		</div>
	</div>
</div>
<div class="login-register-area pt-95 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-12 ml-auto mr-auto">
				<div class="login-register-wrapper">
					<div class="login-register-tab-list nav">
						<a class="active" data-toggle="tab" href="#lg1">
							<h4> Tài Khoản </h4>
						</a>
						<a  data-toggle="tab" href="#lg2">
							<h4 id="don_hang"> Đơn Hàng </h4>
						</a>
					</div>
					<div class="tab-content">
						<div id="lg1" class="tab-pane active">
							<div class="login-form-container">
								<div class="login-register-form">
									<span  id="update_result"></span>
									@if(Auth::guard('khach_hang')->check())
									<form id="update_form" action="" method="post">
										<input type="hidden" name="id" id="id_khachhang" value="{{Auth::guard('khach_hang')->user()->id}}">
										<div class="form-group row col-md-12">
											<input type="text" name="hoten" id="hoten" class="form-control" placeholder="Nhập họ tên" required="" value="{{Auth::guard('khach_hang')->user()->tenkhachhang}}">
										</div>
										<div class="form-group row col-md-12">
											<input class="col-md-8" type="text" id="ngaysinh" name="ngaysinh" class="form-control" value="{{date('d/m/Y',strtotime( Auth::guard('khach_hang')->user()->ngaysinh))}}"  required="" autocomplete="off">
											<div class="col-md-4" style="padding-right: 0px">
												<input type="hidden" id="hidden_gioitinh" value="{{Auth::guard('khach_hang')->user()->gioitinh}}">
												<select name="gioitinh" id="gioitinh" class="form-control" >
													<option value="0">Nam</option>
													<option value="1">Nữ</option>
												</select>
											</div>
										</div>
										<div class="form-group row col-md-12">
											<input type="email" id="email" name="email" placeholder="Email" class="form-control col-md-6" disabled="" value="{{Auth::guard('khach_hang')->user()->email}}" >
											<div class="col-md-1"></div>
											<input type="text" name="sdt" id="sdt" class="form-control col-md-5" placeholder="Nhập sdt" required="" value="{{Auth::guard('khach_hang')->user()->sdt}}">
										</div>
										<div class="form-group row col-md-12">
											<input type="text" name="diachi" id="diachi" class="form-control" placeholder="Nhập địa chỉ" required="" value="{{Auth::guard('khach_hang')->user()->diachi}}">
										</div>
										<input type="checkbox" name="changepassword" id="changepassword">Đổi mật khẩu
										<div class="form-group row col-md-6">
											<input type="password" name="old_password" class="form-control password" placeholder="Mật khẩu cũ" disabled="">
										</div>
										<div class="form-group row col-md-12">
											<input type="password" name="new_password" class="form-control col-md-6 password" placeholder="Mật khẩu mới" disabled="">
											<input type="password" name="confirm_password" class="form-control col-md-6 password" placeholder="Nhập lại mật khẩu" disabled="">
										</div>
										<button id="btn_update" type="submit" class="btn button-box" value="">Cập Nhật</button>										
									</form>
									@endif
								</div>
							</div>
						</div>
						<div id="lg2" class="tab-pane col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered table-striped " id="data_table" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th >Mã</th>
											<th >Ngày Đặt</th>
											<th >Thành tiền(VND)</th>
											<th >Trạng Thái</th>
											<th >Chi Tiết</th>
											<tr>
											</thead>
											<tbody id="body_donhang">

											</tbody>
										</table>
									</div>
								</div>
							</div>
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
		$('#btn_update').attr('disabled',true);
		$('#changepassword').change(function(){
			if($(this).is(":checked"))
			{
				$(".password").removeAttr('disabled');
			}
			else
			{
				$(".password").val('');
				$(".password").attr('disabled','');
			}
		});
		//Cập nhật thông tin cá nhân
		$('.form-control').on('change',function(){
			$('#btn_update').removeAttr('disabled');
		});
		$('#update_form').on('submit',function(event){
			event.preventDefault();

			$.ajax({
				headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},//chú ý 'headers'
				url:'khach-hang/cap-nhat',
				method:"POST",
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				dataType:'json',
				success:function(data)
				{
					var html ='';
					if(data.errors)
					{
						html = '<div >';
						for(var count = 0; count < data.errors.length; count++)
						{
							html += '<p style="color: red;" >' + data.errors[count] + '</p>';
						}
						html += '</div>';
					}
					if(data.success)
					{
						html = '<div style="color: green;" >' + data.success + '</div>';
					}
					$('#update_result').html(html);
					$('#btn_update').attr('disabled',true);
					setTimeout(function(){
						$('#update_result').html('');
					},3000)
				}
			})
		});
		function load_khachhang(khach_hang)
		{
			//console.log(khach_hang);
			$('#id_khachhang').val(khach_hang.id);
			$('#hoten').val(khach_hang.tenkhachhang);
			$('#ngaysinh').val(format_datetime(khach_hang.ngaysinh));
			$('#gioitinh').val(khach_hang.gioitinh);
			$('#sdt').val(khach_hang.sdt);
			$('#diachi').val(khach_hang.diachi);
			$('#email').val(khach_hang.email);
		}
		$('#ngaysinh').daterangepicker(
		{

			singleDatePicker: true,
      //timePicker: true,
      autoUpdateInput: false,

      startDate: moment().subtract(5475, 'days'),
      //endDate: moment().subtract(5475, 'days'),
      showDropdowns: true,
      minYear: parseInt(moment().format('YYYY'),10)-80,
      maxYear: parseInt(moment().format('YYYY'),10)-15,
    	//maxYear: 2000,
      //endDate: moment().add(24, 'hour'),
  });
		$('#ngaysinh').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('DD/MM/YYYY'));
		});
		$('#don_hang').click(function(){
			var id_khachhang=$('#id_khachhang').val();
			$.ajax({
				url:'khach-hang/don-hang/'+id_khachhang,
				dataType:'json',
				success:function(don_hang){
					load_donhang(don_hang.don_hang);
				}
			})
			//alert(id_khachhang);
		});
		function load_donhang(don_hang)
		{ var row='';
		if(don_hang=='')
		{
			row+='<tr >'
			row+='<td colspan="5" >Bạn Chưa Có Đơn Hàng</td>'
			row+='<tr>'
		}
		else
		{
			$.each(don_hang,function(key,val){
				row+='<tr>'
				row+='<td >'+val.id+'</td>'
				row+='<td >'+format_datetime(val.ngaydat)+'</td>'
				row+='<td >'+format_money(val.thanhtien)+'</td>'
				row+='<td >'+format_trangthai(val.trangthai)+'</td>'
				row+='<td ><a href="" class=" chitiet_donhang" id="'+val.id+'">Chi Tiết</a></td>'
				row+='</tr>'
				row+='<tr class="abc" id="chitiet'+val.id+'">'
				row+='</tr>'
			})
		}
		$('#body_donhang').html(row);
	}
	$(document).on('click','.chitiet_donhang',function(event){
		event.preventDefault();
		var id=$(this).attr('id');
		$.ajax({
			url:'don-hang/chi-tiet/'+id,
			dataType:'json',
			success:function(chitiet_donhang){
				load_chitiet_donhang(chitiet_donhang.chitiet_donhang,id);
			}
		})
	});
	$(document).on('dblclick','.chitiet_donhang',function(event){
		event.preventDefault();
		var id=$(this).attr('id');
		$('#chitiet'+id+'').html('');
	});
	function load_chitiet_donhang(chitiet_donhang,id)
	{ 
		var row='';

		if(chitiet_donhang=='')
		{
			// row+='<tr >'
			// row+='<td colspan="5" >Bạn Chưa Có Đơn Hàng</td>'
			// row+='<td colspan="5" >Bạn Chưa Có Đơn Hàng</td>'
			// row+='<td colspan="5" >Bạn Chưa Có Đơn Hàng</td>'
			// row+='<td colspan="5" >Bạn Chưa Có Đơn Hàng</td>'
			// row+='<tr>'
		}
		else
		{
			row+='<td colspan="5"><i id="'+id+'" class="ion ion-close close_chitiet" style="float: right;"></i>'
			row+='<table class="table table-striped">'
			$.each(chitiet_donhang,function(key,val){
				row+='<tr>'
				row+='<td ><img style="height: 30px; width: 30px" alt="" src={{URL::to('/')}}/hinhanh/upload/'+val.hinhanh+'></a></td>'
				row+='<td >'+val.tenmon+'</td>'
				row+='<td >'+val.soluong+'</td>'
				row+='<td >'+format_money(val.dongia)+'</td>'
				row+='</tr>'
			})
			row+='</table>'
			row+='</td>'
		}
		$('#chitiet'+id+'').html(row);
		//$('#chitiet_donhang').addClass('display-block');
	}

	$(document).on('click','.close_chitiet',function(event){
		event.preventDefault();
		var id=$(this).attr('id');
		$('#chitiet'+id+'').html('');
	});
});
</script>
@endsection