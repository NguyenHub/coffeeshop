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
  <link href="source/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="source/css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
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
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Mật khẩu</label>
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
          <a class="d-block small" href="forgot-password.html">Quên mật khẩu?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="source/vendor/jquery/jquery.min.js"></script>
  <script src="source/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="source/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script>
        $('#login_form').on('submit',function(envent){
        envent.preventDefault('admin/trang-chu');
        //alert('sagf');
        $.ajax({
          header:{
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
              html='<div class="alert alert-danger">'+data.errors+'</div>';
              $('#login_result').html(html);
            }
            else
            {
              window.location.href="admin/trang-chu";
            }
          }
        })
      });
  </script>
</body>
</html>