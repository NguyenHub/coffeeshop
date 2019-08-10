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
    {{-- Start reset form --}}
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Cập Nhật Mật Khẩu Mới</div>
      <div class="card-body">
        <form method="post" id="reset_password_form" class="form-horizontal">
          {{csrf_field()}}
          <div class="form-group">
            <span id="reset_result"></span>
            <div class="form-label-group">
              <input type="hidden" name="token_reset" value="{{$token}}">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required" readonly="" value="{{$email}}" autofocus="autofocus">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Mật Khẩu Mới</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Password" required="required">
              <label for="confirmpassword">Nhập Lại Mật khẩu</label>
            </div>
          </div>
          <button type="submit" name="action_button" id="action_button" class="btn btn-primary btn-block" value="" >Khôi Phục</button> 
        </form>
      </div>
    </div>
    {{-- End reset form --}}
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="source/vendor/jquery/jquery.min.js"></script>
  <script src="source/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="source/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#reset_password_form').on('submit',function(envent){
        envent.preventDefault();
        $.ajax({
          headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
          },
          url:"admin/khoi-phuc-mat-khau",
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
              html = '<div style="color:red;">';
              for(var count = 0; count < data.errors.length; count++)
              {
               html += '<p>' + data.errors[count] + '</p>';
             }
             html += '</div>';
             $('#reset_result').html(html);
           }
           else
           {
               html = '<div style="color:green;">' + data.success + '</div>';
               $('#reset_result').html(html);
               setTimeout(function(){
                $('#reset_result').html('');
                window.location.href="admin/dangnhap";
               },2000);
            }
          }
        })
      });
    });
  </script>
</body>
</html>