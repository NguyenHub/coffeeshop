@extends('admin.layout.index')
@section('content')
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/quan-ly">Quản Lý</a>
      </li>
      <li class="breadcrumb-item active">Sản Phẩm</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
      {{-- <div class="card-header">
        <i class="fas fa-table"></i>
      </div> --}}

      <div class="row card-body">
        <div class="table-responsive" style="overflow-y: scroll; height: 480px;">
          <table class="table table-bordered table-striped " id="data_table" width="100%" cellspacing="0">
           <thead>
            <tr>
              <th >MÃ</th>
              <th >LOẠI </th>
              <th >TÊN </th>
              <th >ĐƠN GIÁ</th>
              <th >HÌNH</th>
              <th >GHI CHÚ</th>
              <th >TRẠNG THÁI</th>
              <th >CREATED_AT</th>
              <th >UPDATED_AT</th>
              <th >
                <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Tạo mới</button>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
  {{-- Start Form Insert --}}
  <div id="formModal" class="modal fade" role="dialog" >
   <div class="modal-dialog">
    <div class="modal-content" style="width: 650px">
     <div class="modal-header">
      <h4 class="modal-title"></h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>     
    </div>
    <div class="modal-body">
     <span id="form_result"></span>
     <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group row">
        <label class="control-label col-md-4" >Loại SP : </label>
        <div class="col-md-8">
         <select name="maloai" id="maloai" class="form-control">
           @foreach($data as $dt)
           {
            <option value="{{$dt->id}}">{{$dt->id."-".$dt->tenloai}}</option>
          }
          @endforeach()
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-4" >Tên Món * : </label>
      <div class="col-md-8">
       <input type="text" name="tenmon" id="tenmon" class="form-control" placeholder="Nhập Tên Món" required="" autocomplete="off" />
     </div>
   </div>
   <div class="form-group row">
    <label class="control-label col-md-4" >Đơn Giá * : </label>
    <div class="col-md-8">
     <input type="text" name="dongia" id="dongia" class="form-control" placeholder="Nhập Đơn Giá" required=""  autocomplete="off" />
   </div>
 </div>
 <div class="form-group row">
  <label class="control-label col-md-4" >Ghi Chú : </label>
  <div class="col-md-8">
   <input type="text" name="ghichu" id="ghichu" class="form-control" autocomplete="off" placeholder="Nhập Ghi Chú"  />
 </div>
</div>
<div class="form-group row" id="select_trangthai">
  <label class="control-label col-md-4" >Trạng Thái : </label>
  <div class="col-md-8">
   <select  name="trangthai" id="trangthai" class="form-control">
    <option value="0">Còn hàng</option>
    <option id="option" disabled="" value="1">Hết hàng</option>
  </select>
</div>
</div>
<div class="form-group row">
  <label class="control-label col-md-4" >Hình Ảnh : </label>
  <div class="col-md-8">
    <div class="file-loading"> 
      <input id="input-b6" name="hinhanh" type="file" placeholder="Chọn file">
    </div>
  </div>
</div>
<div class="form-group row">
 <label class="control-label col-md-4" >Mô Tả : </label>
</div> 
<div class="form-group row">
  {{-- <label class="control-label col-md-12" >Mô Tả : </label> --}}
  <div class="col-md-12">
    <textarea class="form-control" name="mota" id="mota">
    </textarea>
    {{-- <input type="textaria" name="mota" id="mota" class="form-control" placeholder=""  /> --}}
  </div>
</div>  
<br/>
<div class="form-group" align="center">
  <input type="hidden" name="action" id="action" />
  <input type="hidden" name="hidden_id" id="hidden_id" />
  <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
</div>
</form>
</div>
</div>
</div>
</div>
{{-- End Form Insert --}}
{{-- Start Form Confirm --}}
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title_confirm">Xác Nhận !</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <span id="confirm_result"></span>
       <h4 class="modal-delete" align="center" style="margin:0;"></h4>
     </div>
     <div class="modal-footer">
       <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
     </div>
   </div>
 </div>
</div>
{{-- End Form Confirm --}}
<!-- /.container-fluid -->

<!-- Sticky Footer -->
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © Your Website 2019</span>
    </div>
  </div>
</footer>
</div>
@endsection
@section('script')
<script> CKEDITOR.replace( 'mota', {
 height:100,
 uiColor: '#14B8C4',
 toolbar: [
 [ 'Source','Bold', 'Italic','Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
 [ 'FontSize', 'TextColor', 'BGColor' ]
 ],
 
});</script>
<script type="text/javascript">
  $(document).ready(function(){
   $('#data_table').DataTable({
    retrieve: true,
    //columnDefs: [],
    dom: 'lBfrtip',
    buttons: [
    {
      extend: 'print',
      messageTop: 'Danh Sách Sản Phẩm',
      exportOptions: {
          columns: ':visible' //in theo cột được hiển thị (phụ thuocj vào columnsToggle, hoặc colvis)
          //columns: [0,1,2,3,4]  // export theo số cột cố định
        }
      },
      {
        extend: 'excel',
        messageTop: 'Danh Sách Đơn Hàng',
        exportOptions: {
          columns: ':visible' //in theo cột được hiển thị (phụ thuocj vào columnsToggle, hoặc colvis)
          //columns: [0,1,2,3,4]  // export theo số cột cố định
        }
      }
      ,
      //'columnsToggle'//show ra cac button ẩn/hiện cột
      'colvis' //show ra button chọn cột muốn ẩn/hiện 
      ],
      select: true,
      "iDisplayLength": 10,
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      processing: true,
      serverSide: true,
      ajax:{
       url: "admin/sanpham/danh-sach",
       dataType:"json",
     },
     "order":[0,'desc'],
     columns:[
     {
      data: 'id',
      name: 'id',
    },
    {
      data: 'tenloai',
      name: 'tenloai',
    },
    {
      data: 'tenmon',
      name: 'tenmon'
    },
    {
      data: 'dongia',
      name: 'dongia',
      render:function (data)
      {
        return format_number(data);
      }
    },
    {
      data: 'hinhanh',
      name: 'hinhanh',
      orderable: false,
      render:function(data)
      {
        return "<img src={{URL::to('/')}}/hinhanh/upload/"+data+" class='img-thumbnail zoom'/>";
      },

    },
    {
      data: 'ghichu',
      name: 'ghichu',
      visible:false
    },
    {
      data: 'trangthai',
      name: 'trangthai',
      visible:false
    },
    {
      data: 'created_at',
      name: 'created_at',
      visible:false
    },
    {
      data: 'updated_at',
      name: 'updated_at',
      visible:false
    },
    {
      data: 'action',
      name: 'action',
      orderable: false
    }
    ]
  });
 });
</script>
<script>
  $(document).ready(function(){
    $('.buttons-colvis').text('Ẩn Cột');
    {{-- Start Call Form --}}
    var html='';
    $('#create_record').click(function(){
      $('.modal-title').text("Tạo Mới Dữ Liệu");
      $('#action_button').val("Add");
      $('#action').val("Add");
      //$('#option').attr('disabled',true);
      $('#select_trangthai').attr('hidden',true);
      $('#formModal').modal('show');
      $("#input-b6").fileinput({
        allowedFileTypes:'image',
        showUpload: false,
        dropZoneEnabled: false,
        //maxFileCount: 10,
        //elErrorContainer: '#kartik-file-errors',
        allowedFileExtensions: ["jpg", "png", "gif",'jpeg'],
        initialPreview:false,
        //mainClass: "input-group-lg"
      });
      $('#sample_form')[0].reset();
      $('#form_result').html(html);
      $('.file-caption-name').attr('required',true);
      CKEDITOR.instances['mota'].setData('');
    });
    {{-- End Call Form --}}
    {{-- Start Submit --}}
    $('#sample_form').on('submit', function(event){
      event.preventDefault();
      {{-- Start  Submit Insert --}}
      if($('#action').val() == 'Add')
      {
        //var val = $('textarea').val();
        //var t = document.myform.editor1.value;
        var content = CKEDITOR.instances['mota'].getData();
        var formData=new FormData($('#sample_form')[0]);
        formData.append('mota',content);
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:"admin/sanpham/add",
          method:"POST",
          data: formData,
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          success:function(data)
          {
           var html = '';
           if(data.errors)
           {
            html = '<div>';
            for(var count = 0; count < data.errors.length; count++)
            {
             html += '<p style="color:red;" >' + data.errors[count] + '</p>';
           }
           html += '</div>';
         }
         if(data.success)
         {
          html = '<div style="color:green;">' + data.success + '</div>';
          $('#sample_form')[0].reset();
          CKEDITOR.instances['mota'].setData('');
          $('#data_table').DataTable().ajax.reload();
        }
        $('#form_result').html(html);
        setTimeout(function(){
          $('#form_result').html('');
        },2000);
      }
    })
      }
      {{-- End  Submit Insert --}}
      {{-- Start  Submit Edit --}}
      if($('#action').val() == "Edit")
      {
        var content = CKEDITOR.instances['mota'].getData();
        var formData=new FormData($('#sample_form')[0]);
        formData.append('mota',content);
        $.ajax({
          url:"admin/sanpham/update",
          method:"POST",
          data:formData,
          contentType: false,
          cache: false,
          processData: false,
          dataType:"json",
          success:function(data)
          {
           var html = '';
           if(data.errors)
           {
            html = '<div style="color:red;">';
            for(var count = 0; count < data.errors.length; count++)
            {
             html += '<p>' + data.errors[count] + '</p>';
           }
           html += '</div>';
         }
         if(data.success)
         {
          html = '<div style="color:green;">' + data.success + '</div>';
          $('#sample_form')[0].reset();
          setTimeout(function(){
           $('#formModal').modal('hide');
           $('#data_table').DataTable().ajax.reload();
         }, 1000);
        }
        $('#form_result').html(html);
      }
    });
      }
      {{-- End Submit Edit --}}
    });
    {{-- End Submit --}}
    {{-- Start  Get Edit --}}
    $(document).on('click', '.edit', function(){
     $('#mota').val('');
     var id = $(this).attr('id');
     $('#form_result').html('');
     $('.file-caption-name').removeAttr('required');
     $.ajax({
       url:"admin/sanpham/edit/"+id,
       dataType:"json",
       success:function(html){
        $('#select_trangthai').removeAttr('hidden');
        $('#maloai').val(html.data.maloai);
        $('#tenmon').val(html.data.tenmon);
        $('#dongia').val(html.data.dongia);
        $('#ghichu').val(html.data.ghichu);
        CKEDITOR.instances['mota'].setData(html.data.mota);
        $('#mota').val(html.data.mota);
        $('#trangthai').val(html.data.trangthai);
        $("#input-b6").fileinput({
          allowedFileTypes:'image',
          allowedFileExtensions: ['jpg', 'png', 'gif','jpeg'],
          dropZoneEnabled: false,
          overwriteInitial: true,
          showUpload: false,
          initialPreview: [
          "<img class='file-preview-image kv-preview-data' src={{URL::to('/')}}/hinhanh/upload/"+html.data.hinhanh+">",
          ],
          initialCaption: html.data.hinhanh,
        });
        //$('.kv-file-remove').hide();
        $('.kv-file-remove').hide();
        $('.kv-file-zoom').hide();
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text("Cập Nhật Dữ Liệu");
        $('#action_button').val("Cập Nhật");
        $('#action').val("Edit");
        $('#formModal').modal('show');
        $('#option').removeAttr('disabled');
        //$('#action_button').attr('disabled',true);
        // $('.form-control').change(function()
        // {
        //   $('#action_button').attr('disabled',false);
        // });
        // $(document).keyup(function()
        // {
        //   $('#action_button').attr('disabled',false);
        // });
      }
    })
   });
    {{-- End  Get Edit --}}
    {{-- Start Confirm Delete --}}
    $('#ok_button').click(function(){
      $.ajax({
       url:"admin/sanpham/destroy/"+id,
       beforeSend:function(){
        $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
        setTimeout(function(){
         $('#confirmModal').modal('hide');
         $('#data_table').DataTable().ajax.reload();
       }, 1000);
        $('#ok_button').text('OK');
      }
    })
    });
    {{-- End Confirm Delete --}}
    $('#dongia').keyup(function(){
      var number =$('#dongia').val();
      var substring=number.substring(number.length-1,number.length);
      var sl;
      var pattern_number= /(([0-9]{1,5})\b)/g;
      if(pattern_number.test(substring)==false)
      {
        sl=number.substring(0,number.length-1);
      }
      else
      {
        sl= number;
      }
      $('#dongia').val(sl.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 "));
    });
    $('#dongia').keydown(function(){
      var number =$('#dongia').val();
      number= number.toString().replace(/\s+/g,"");
      $('#dongia').val(number);
    });
  });
</script>
@endsection
