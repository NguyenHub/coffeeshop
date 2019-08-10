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
                                        <div class="form-group">
                                         <div class="form-label-group">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Ten" required="required" autofocus="autofocus">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                     <div class="form-label-group">
                                        <input type="password" id="password" name="password" class="form-control password" placeholder="Password" required="required" autofocus="autofocus" >
                                        <label for="password">Password <i id="show_password" style="float: right;" class="fa fa-eye show_password" title="Hiển thị mật khẩu"></i></label>
                                    </div>
                                </div>
                                <div class="button-box">
                                    <div class="login-toggle-btn">
                                        <input id="checkbox" type="checkbox">
                                        <label>Ghi nhớ mật khẩu?</label>
                                        <a href="tai-khoan/quen-mat-khau">Quên mật khẩu?</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger" style="width: 105px;">Đăng Nhập</button>
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
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="hoten" name="hoten" class="form-control" placeholder="Nhập họ tên" required="">
                                        <label for="hoten">Họ Tên</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <select style="height: 50px;" name="gioitinh" id="gioitinh" class="form-label-group" >
                                            <option value="0">Nam</option>
                                            <option value="1">Nữ</option>
                                        </select>
                                    </div>
                                    <div class="form-label-group col-md-4">
                                        <input type="text" id="ngaysinh" name="ngaysinh" class="form-control col-md-12"  required="" autocomplete="off">
                                        <label class="col-md-8" style="padding: 25px;" for="ngaysinh">Ngày Sinh</label>
                                    </div>
                                    <div class="form-label-group col-md-5">
                                            <input type="text" id="sdt" name="sdt" class="form-control col-md-12" placeholder="Nhập sdt" required="">
                                            <label style="padding-left: 25px;" class="col-md-8" for="sdt">SĐT</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="email" name="email" id="email_register" placeholder="Email" class="form-control" required="" >
                                        <label for="email_register">Email</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" name="diachi" class="form-control" id="diachi" placeholder="Nhập địa chỉ" required="">
                                        <label for="diachi">Địa Chỉ</label>
                                    </div>
                                    
                                </div>
                                {{-- <div class="form-group row col-md-12">
                                    <input col-md-8 type="text" name="sdt" class="form-control" placeholder="Nhập sdt" required="">
                                </div> --}}
                                <div class="form-group row">
                                    <div class="form-label-group col-md-6">
                                        <input type="password" name="password" id="password_register" class="form-control password" placeholder="Mật khẩu">
                                        <label style="padding-left:25px;padding-right: 25px;" for="password_register">Mật Khẩu<i id="show_password" style="float: right;" class="fa fa-eye show_password" title="Hiển thị mật khẩu"></i></label>
                                    </div>
                                    <div class="form-label-group col-md-6">
                                        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Nhập lại mật khẩu">
                                        <label style="padding-left: 25px;" for="confirmpassword">Nhập Lại Mật Khẩu</label>
                                    </div>
                                </div>
                                {{-- <div class="button-box">
                                    <button type="submit"><span>Đăng ký</span></button>
                                </div> --}}
                                <button type="submit" class="btn btn-danger" style="width: 105px;">Đăng Ký</button>
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
        $(document).on('click','#show_password',function(){
            $('.password').attr('type','text');
            $('.show_password').removeClass(' fa-eye');
            $('.show_password').addClass('fa-eye-slash');
        })
        $(document).on('click','.fa-eye-slash',function(){
            $('.password').attr('type','password');
            $('.show_password').addClass('fa-eye');
            $('.show_password').removeClass('fa-eye-slash');
        })
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
                        get_jsonUser();
                        window.history.back();
                    }
                    // $('#login_result').html(html);
                }
            })
        });
    });
</script>
@endsection
