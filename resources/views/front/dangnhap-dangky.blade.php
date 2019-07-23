@extends('master')
@section('content')
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Trang Chủ</a></li>
                <li class="active"> Đăng Nhập / Đăng Ký </li>
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
                            <h4> Đăng Nhập </h4>
                        </a>
                        <a  data-toggle="tab" href="#lg2">
                            <h4> Đăng Ký </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <span id="login_result"></span>
                                    <form id="login_form" action="" method="post">
                                        {{csrf_field()}}
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Ghi nhớ mật khẩu?</label>
                                                <a href="tai-khoan/quen-mat-khau">Quên mật khẩu?</a>
                                            </div>
                                            <button type="submit"><span>Đăng Nhập</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <span id="register_result"></span>
                                    <form id="register_form" action="" method="post">
                                        {{-- {{csrf_field()}} --}}
                                        <div class="form-group row col-md-12">
                                            <input type="text" name="hoten" class="form-control" placeholder="Nhập họ tên" required="">
                                        </div>
                                        <div class="form-group row col-md-12">
                                            <input class="col-md-8" type="text" id="ngaysinh" name="ngaysinh" class="form-control"  required="" autocomplete="off">
                                            <div class="col-md-4" style="padding-right: 0px">
                                                <select name="gioitinh" id="" class="form-control" >
                                                    <option value="0">Nam</option>
                                                    <option value="1">Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-md-12">
                                            <input type="email" name="email" placeholder="Email" class="form-control" required="" >
                                        </div>
                                        <div class="form-group row col-md-12">
                                            <input type="text" name="diachi" class="form-control" placeholder="Nhập địa chỉ" required="">
                                        </div>
                                        <div class="form-group row col-md-12">
                                            <input col-md-8 type="text" name="sdt" class="form-control" placeholder="Nhập sdt" required="">
                                        </div>
                                        <div class="form-group row col-md-12">
                                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                                        </div>
                                        <div class="form-group row col-md-12">
                                            <input type="password" name="confirmpassword" class="form-control" placeholder="Nhập lại mật khẩu">
                                        </div>
                                        <div class="button-box">
                                            <button type="submit"><span>Đăng ký</span></button>
                                        </div>
                                    </form>
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
        $('#ngaysinh').daterangepicker(
        {
            singleDatePicker: true,
            autoUpdateInput: false,
            startDate: moment().subtract(5475, 'days'),
            showDropdowns: true,
            minYear: parseInt(moment().format('YYYY'),10)-80,
            maxYear: parseInt(moment().format('YYYY'),10)-15,
        //maxYear: 2000,
      //endDate: moment().add(24, 'hour'),
  });
        $('#ngaysinh').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
        });
        $('#register_form').on('submit',function(event){
            event.preventDefault();
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                url:"dangky",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                dataType:"json",
                success:function(data){
                    var html ='';
                    if(data.errors)
                    {
                        html = '<div >';
                        for(var count = 0; count < data.errors.length; count++)
                        {
                           html += '<p>' + data.errors[count] + '</p>';
                       }
                       html += '</div>';
                   }
                   if(data.success)
                   {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#register_form')[0].reset();
                }
                $('#register_result').html(html);
            }
        })
        });
        $('#login_form').on('submit',function(event){
            event.preventDefault();
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                url:"dangnhap",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                dataType:"json",
                success:function(data){
                    var html ='';
                    if(data.errors)
                    {
                        html = '<div class="alert" style="color: red">' + data.errors + '</div>';
                        $('#login_result').html(html);
                    }
                    if(data.success)
                    {
                        window.location.href="index";
                        //$('#register_form')[0].reset();
                    }
                    // $('#login_result').html(html);
                }
            })
        });
    });
</script>
@endsection
