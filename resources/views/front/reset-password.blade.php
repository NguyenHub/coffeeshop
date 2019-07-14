@extends('master')
@section('content')
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index">Trang Chủ</a></li>
                <li class="active"> Tài Khoản / Quên Mật Khẩu </li>
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
                                    <form id="reset_form" action="" method="post">
                                        {{-- {{csrf_field()}} --}}
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                        <div class="button-box">
                                            {{-- <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Ghi nhớ mật khẩu?</label>
                                                <a href="#">Quên mật khẩu?</a>
                                            </div> --}}
                                            <button type="submit"><span>Xác Nhận</span></button>
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
        $('#reset_form').on('submit',function(event){
            event.preventDefault();
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                url:"tai-khoan/quen-mat-khau",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                dataType:"json",
                success:function(data){
                    var html ='';
                    if(data.error)
                    {
                        html = '<div class="alert" style="color: red" >' + data.error + '</div>';
                    }
                    if(data.success)
                    {
                         html = '<div class="alert" style="color: green" >' + data.success + '</div>';
                         $('#reset_form')[0].reset();
                    }
                    $('.reset_result').html(html);
             }
         })
        });
    });
</script>
@endsection
