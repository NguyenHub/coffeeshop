<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <base href="{{ asset('') }}">
  <title>STU-Coffee</title>
  <!-- Custom fonts for this template-->
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/footer-logo2.PNG">
  <link href="source/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="source/css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark">

  <div class="container">
    {{-- Start login form --}}
    <div class="card card-login mx-auto mt-5" id="login">
      <div class="card-header">Đăng nhập</div>
      <div class="card-body">
        <form method="post" action="admin/login" id="login_form" class="form-horizontal" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <span id="login_result"></span>
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control password" placeholder="Password" required="required">
              <label for="inputPassword">Mật khẩu<i id="show_password" style="float: right;" class="fa fa-eye show_password" title="Hiển thị mật khẩu"></i></label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Nhớ mật khẩu
              </label>
            </div>
          </div>
          <input type="submit" name="action_button" id="action_button" class="btn btn-primary btn-block" value="Đăng Nhập" />
        </form>
        <div class="text-center">
          <!-- <a class="d-block small mt-3" href="register.html">Register an Account</a> -->
          <a class="d-block small" href="" id="forgot">Quên mật khẩu?</a>
        </div>
      </div>
    </div>
    {{-- End login form --}}
    {{-- Start reset password form --}}
    <div class="card card-login mx-auto mt-5" id="form_reset_password">
      <div class="card-header">Khôi Phục Mật Khẩu</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Bạn Quên Mật Khẩu?</h4>
          <p>Nhập địa chỉ email. Chúng tôi sẽ gửi email xác nhận khôi phục mật khẩu.</p>
        </div>
        <form id="reset_form">
          {{csrf_field()}}
          <span id="reset_result"></span>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
              <label for="email">Email</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" href="login.html">Khôi Phục</button>
        </form>
        <div class="text-center">
          <a class="d-block small" href="" id="show_login">Đăng Nhập</a>
        </div>
      </div>
    </div>
    {{-- End reset password form --}}
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="source/vendor/jquery/jquery.min.js"></script>
  <script src="source/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="source/vendor/jquery-easing/jquery.easing.min.js"></script>
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
      $('#form_reset_password').hide();
      $('#forgot').click(function(envent){
        envent.preventDefault();
        $('#login').hide();
        $('#form_reset_password').show();
      });
      $('#show_login').click(function(envent){
        envent.preventDefault();
        $('#login').show();
        $('#form_reset_password').hide();
      })
      $('#login_form').on('submit',function(envent){
        envent.preventDefault('admin/trang-chu');
        //alert('sagf');
        $.ajax({
          headers:{
            //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
          },
          url:"admin/login",
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          success:function(data)
          {
            var html='';
            if(data.errors)
            {
              html='<div style="color:red;">'+data.errors+'</div>';
              $('#login_result').html(html);
            }
            else
            {
              window.location.href="admin/trang-chu";
            }
          }
        })
      });
      $('#reset_form').on('submit',function(envent){
        envent.preventDefault();
        $.ajax({
          headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
          },
          url:"admin/reset-password",
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          success:function(data)
          {
            var html='';
            if(data.errors)
            {
              html='<div style="color:red;">'+data.errors+'</div>';
            }
            else
            {
              html='<div style="color:green;">'+data.success+'</div>';
            }
            $('#reset_result').html(html);

          }
        })
      });
    });
  </script>
</body>
</html>