@extends('master')
@section('content')
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index">Trang Chủ</a></li>
                <li class="active"> Tài Khoản / Khôi Phục Mật Khẩu </li>
            </ul>
        </div>
    </div>
</div>
<div class="login-register-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    {{-- <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> Đăng Nhập </h4>
                        </a>
                        <a  data-toggle="tab" href="#lg2">
                            <h4> Đăng Ký </h4>
                        </a>
                    </div> --}}
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <span class="reset_result"></span>
                                    <form id="reset_pass_form" action="" method="post">
                                        {{-- {{csrf_field()}} --}}
                                        <input type="hidden" name="token_reset" value="{{$token}}">
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{$email}}" readonly="">
                                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu mới" required="">
                                        <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu" required="">
                                        <div class="button-box">
                                            {{-- <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Ghi nhớ mật khẩu?</label>
                                                <a href="#">Quên mật khẩu?</a>
                                            </div> --}}
                                            <button type="submit"><span>Cập Nhật</span></button>
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
        $('#reset_pass_form').on('submit',function(event){
            event.preventDefault();
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                url:"khoi-phuc-mat-khau",
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
                        html += '<div">';
                        for(var count = 0; count < data.errors.length; count++)
                        {
                         html += '<p style="color:red;" >' + data.errors[count] + '</p>';
                     }
                     html += '</div>';
                     $('.reset_result').html(html);
                 }
                 if(data.success)
                 {
                   html = '<div class="alert" style="color: green" >' + data.success + '</div>';
                   $('.reset_result').html(html);
                   $('#reset_pass_form')[0].reset();
                   setTimeout(function(){
                    window.location.href="index";
                },2000);
               }
                    //$('.reset_result').html(html);
                }
            })
        });
    });
</script>
@endsection
