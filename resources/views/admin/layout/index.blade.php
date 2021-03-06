<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- <meta name="_token" content="{{csrf_token()}}" /> --}}
  <title>SmartCoffee</title>
  <base href="{{ asset('') }}">
  <!-- Favicon -->
  
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/footer-logo2.PNG">
  <!-- Custom fonts for this template-->
  <link href="source/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="source/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="source/css/sb-admin.css" rel="stylesheet" type="text/css">
  <link href="source/css/style.css" rel="stylesheet" type="text/css">
  <link href="bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" >
  <link rel="stylesheet" type="text/css" href="daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="bootstrap-fileinput/css/fileinput.css" media="all" type="text/css">
  <link href="bootstrap-fileinput/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>
  {{-- css boostrap4 datatable --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> --}}
  {{-- css select datable --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
  {{-- css button datable --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css">
</head>

<body id="page-top">
  @include('admin.layout.header')
  <div id="wrapper">

    <!-- Sidebar -->
    @include('admin.layout.sidebar')

    @yield('content')
  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Form Modal-->
  <div id="formThongtin" class="modal fade" role="dialog" >
   <div class="modal-dialog">
    <div class="modal-content" style="width: 650px">
     <div class="modal-header">
      <h4 class="modal-title">Thông Tin Cá Nhân</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>     
    </div>
    <div class="modal-body">
     <span id="detail_result" ></span>
     <form method="post" id="detail_form" class="form-horizontal" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="text" name="id" hidden="" id="id" value="{{Auth::guard('nhan_vien')->user()->id}}">
      <div class="form-group row">
        <label class="control-label col-md-3" >Họ Tên * : </label>
        <div class="col-md-8">
         <input type="text" name="tennhanvien" id="tennhanvien1" class="form-control" placeholder="Nhập Tên NV" required="" value="" />
       </div>
     </div>
     <div class="form-group row">
      <label class="control-label col-md-3" >Ngày Sinh * : </label>
      <div class="col-md-4">
        <input type="date"  name="ngaysinh" id="ngaysinh1" class="form-control" required=""  />
      </div>
      <div class="col-md-4">
        <select name="gioitinh" id="gioitinh1" class="form-control">
          <option value="0">Nam</option>
          <option value="1">Nữ</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-3" >Email * : </label>
      <div class="col-md-8">
       <input type="text" name="email" id="email1" class="form-control" required="" readonly=""  />
     </div>
   </div>
   <div class="form-group row">
    <label class="control-label col-md-3" >CMND * : </label>
    <div class="col-md-3">
     <input type="text" name="cmnd" id="cmnd1" class="form-control" required="" readonly="" />
   </div>
   <label class="control-label col-md-2" >SDT * : </label>
   <div class="col-md-3">
     <input type="text" name="sdt" id="sdt1" class="form-control" required=""  />
   </div>
 </div>
 <div class="form-group row">
  <label class="control-label col-md-3" >Địa Chỉ * : </label>
  <div class="col-md-8">
   <input type="text" name="diachi" id="diachi1" class="form-control" required=""  />
 </div>
</div>
<div class="form-group row">
  <label class="control-label col-md-3" >Loại Nhân Viên : </label>
  <div class="col-md-3">
    <input type="text" name="loainhanvien" id="loainhanvien1" class="form-control" readonly="">
  </div>
  <label class="control-label col-md-2" >Chức Vụ : </label>
  <div class="col-md-3">
    <input type="text" name="chucvu" id="chucvu1" class="form-control" readonly="">
  </div>
</div>
<div class="form-group row" >
  <label class="control-label col-md-3" >Ngày Vào Làm : </label>
  <div class="col-md-4">
   <input type="date" name="ngayvaolam" id="ngayvaolam1" class="form-control" required="" readonly="" />
 </div>
</div>
<div class="form-group row">
  <label class="control-label col-md-3" >Đổi Mật Khẩu : </label>
  <input type="checkbox" name="changepassword" id="changepassword" class="control-label col-md-1">
  <div class="col-md-7">
   <input type="password" name="oldpassword"  class="form-control password" placeholder="Nhập mật khẩu cũ" disabled="" required="" />
 </div>
</div>
<div class="form-group row">
  <label class="control-label col-md-3" > </label>
  <div class="col-md-8">
   <input type="password" name="newpassword" class="form-control password" placeholder="Nhập mật khẩu mới" disabled="" required="" />
 </div>
</div>
<div class="form-group row">
  <label class="control-label col-md-3" > </label>
  <div class="col-md-8">
   <input type="password" name="renewpassword" class="form-control password" placeholder="Nhập lại mật khẩu mới" disabled="" required="" />
 </div>
</div>
<br />
<div class="form-group" align="center">
  {{-- <input type="hidden" name="action" id="action" /> --}}
  {{-- <input type="hidden" name="hidden_id" id="hidden_id" /> --}}
  <input type="submit" name="action_button" id="button" class="btn btn-warning" value="Cập nhật" />
</div>
</form>
</div>
</div>
</div>
</div>
{{-- End Form Insert --}}
<!-- Bootstrap core JavaScript-->
<script src="source/vendor/jquery/jquery.min.js"></script>
<script src="source/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="source/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
{{--   <script src="source/vendor/chart.js/Chart.min.js"></script>
--}}  <script src="source/vendor/datatables/jquery.dataTables.js"></script>
<script src="source/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="source/js/sb-admin.min.js"></script>
<script src="source/js/format_number.js"></script>
<!-- Demo scripts for this page-->
<script src="source/js/demo/datatables-demo.js"></script>
{{-- <script src="source/js/demo/chart-area-demo.js"></script> --}}
{{-- <script src="bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script> --}}
<script src="daterangepicker/moment.min.js"></script>
<script src="daterangepicker/daterangepicker.js"></script>
<script src="bootstrap-fileinput/js/plugins/piexif.js" type="text/javascript"></script>
<script src="bootstrap-fileinput/js/plugins/sortable.js" type="text/javascript"></script>
<script src="bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="bootstrap-fileinput/js/locales/fr.js" type="text/javascript"></script>
<script src="bootstrap-fileinput/js/locales/es.js" type="text/javascript"></script>
<script src="bootstrap-fileinput/themes/fas/theme.js" type="text/javascript"></script>
<script src="bootstrap-fileinput/themes/explorer-fas/theme.js" type="text/javascript"></script>
<script src="bootstrap-fileinput/themes/gly/theme.js" type="text/javascript"></script>
<script src="bootstrap-fileinput/themes/gly/theme.min.js" type="text/javascript"></script>
<script src="js/jquery.printPage.js" type="text/javascript"></script>
{{-- <script src="bootstrap-fileinput/js/fileinput.js"></script>
<script src="bootstrap-fileinput/themes/fa/theme.js"></script> --}}
<script src="ckeditor/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>
<script src="source/vendor/chart.js/Chart.min.js"></script>
{{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
{{-- https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js
https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js --}}
<!-- scripts hiển thị button-->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<!-- scripts button boostraps 4 -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!-- scripts  button export pdf-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<!-- scripts  button export vfs-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<!-- scripts  button export excel-->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<!-- scripts  button print-->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<!-- scripts hover khi select dòng-->
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<!-- scripts  button select ẩn hiện cột-->
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

<!-- Custom scripts for all pages-->
<!-- Demo scripts for this page-->
{{-- <script src="source/js/demo/chart-area-demo.js"></script>
--}}{{-- <script src="source/js/demo/chart-bar-demo.js"></script> --}}
{{-- <script src="source/js/demo/chart-pie-demo.js"></script> --}}

@yield('script')
{{-- Start Call Form --}}
<script type="text/javascript">
  {{-- Start Call Confirm Form Delete --}}
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  var id;
  $(document).on('click', '.delete', function(){
    var html='';
    id = $(this).attr('id');
    $('#confirmModal').modal('show');
    $('.modal-delete').text("Bạn Có Muốn Xóa ?");
    $('#ok_button').text('OK');
    $('#confirm_result').html(html);
  });
  {{-- End Call Confirm Form Delete --}}
</script>
<script>
  $(document).ready(function(){
    getNewBill();
    function getNewBill()
  {
    $.ajax({
      url:'admin/getNewBill',
      dataType:'json',
      success:function(data)
      {
        $('#alertbill').text(data.newBill+data.shipBill)
        $('#newbill').text(data.newBill);
        $('#shipbill').text(data.shipBill);
      }
    })
  }
  setInterval(function(){
    getNewBill();
  },3000);
    $('#taikhoan').click(function(){
      var html='';
      $('#detail_result').html(html);
      var id=$('#id').val();
      $('#detail_form')[0].reset();
      $(".password").attr('disabled',true);
      $('#button').attr('disabled',true);
      $.ajax({
        url:'admin/nhanvien/capnhat/'+id,
        dataType:'json',
        success:function(html){
          $('#tennhanvien1').val(html.data.tennhanvien);
          $('#ngaysinh1').val(html.data.ngaysinh);
          $('#gioitinh1').val(html.data.gioitinh);
          $('#email1').val(html.data.email);
          $('#sdt1').val(html.data.sdt);
          $('#cmnd1').val(html.data.cmnd);
          $('#diachi1').val(html.data.diachi);
          $('#loainhanvien1').val(html.data.tenloai);
          $('#chucvu1').val(html.data.tenchucvu);
          $('#ngayvaolam1').val(html.data.ngayvaolam);
          $('.modal-title').text("Thông Tin Cá Nhân");
          $('input').change(function()
          {
            $('#button').attr('disabled',false);
          });
          $('#changepassword').change(function(){
            if($(this).is(":checked"))
            {
              $(".password").removeAttr('disabled');
            }
            else
            {
              $(".password").attr('disabled','');
            }
          })
        }
      })
      $('#formThongtin').modal('show');
    });
    {{-- Submit Form --}}
    $('#detail_form').on('submit',function(event){
      event.preventDefault();
          //var id=$('#id').val();
          $.ajax({
            header:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            url:'admin/nhanvien/capnhat',
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData: false,
            dataType:"json",
            success:function(data)
            {
              var html = '';
              if(data.errors)
              {
                html = '<div class ="alert alert-danger">';
                for(var count = 0; count<data.errors.length;count++)
                {
                  html+='<p>'+data.errors[count]+'</p>';
                }
                html+='</div>';
              }
              if(data.success)
              {
                html ='<div class="alert alert-success">'+data.success+'</div>';
              }
              $('#detail_result').html(html);
              setTimeout(function(){
               $('#detail_result').html('');
             }, 2000);
            }
          });
        });
  });
</script>
<script type="text/javascript">
  // $(function() {
  //   $('#datetimepicker1').datetimepicker({
  //     language: 'pt-BR'
  //   });
  // });
  function format_datetime(datetime)
  {
    var date=new Date(datetime);
    var day =date.getDate();
    var month =(date.getMonth()+1);
    var year =date.getFullYear();
    var hour =date.getHours();
    var minute =date.getMinutes();
    var second =date.getSeconds();
    day=day<10?"0"+day:day;
    month=month<10?"0"+month:month;
    hour=hour<10?"0"+hour:hour;
    minute=minute<10?"0"+minute:minute;
    second=second<10?"0"+second:second;
    return  day+"/"+month+"/"+year+" "+hour+":"+minute+":"+second;
  }
  function format_number(number)
  {
    return number.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
  }
  function format_trangthai(trangthai)
  {
    if(trangthai==0)
    {
      return "Chờ Xử Lý";
    }
    else if(trangthai==1)
    {
      return "Đã Xử Lý";
    }
    else if(trangthai==2)
    {
      return "Hoàn Thành";
    }
    else
    {
      return "Hủy";
    }
  }
  function format_input_number(number)
  {
    var sl;
    var diem=0;
    for(var i=0;i<number.length;i++)
    {
     var str=number.substring(i,i+1);
     if(str=='.')
     {
      diem++;
    }
  }
  var pattern_number= /([0-9.])+$/;
  //var pattern_dot= /([.]{1})\1+$/;
  if(pattern_number.test(number)==false)
  {
    sl=number.substring(0,number.length-1);
  }
  else
  {
    if(diem>1)
    {
     number=number.replace(".","");
   }
   sl= number;
 }
 return sl;
}
</script>
<script>  
  $(document).ready(function(){
    $('#search').keyup(function(){
      search_table($(this).val());  
    });  
    function search_table(value){  
      $('#data_table tr').each(function(){ 
        var found = 'false';  
        $(this).each(function(){  
          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
          {  
            found = 'true';  
          }  
        });  
        if(found == 'true')  
        {  
          $(this).show();  
        }  
        else  
        {  
          $(this).hide();  
        }  
      });  
    }  
  });  
</script>  
</body>

</html>
