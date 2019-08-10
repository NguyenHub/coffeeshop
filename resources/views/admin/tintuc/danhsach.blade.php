@extends('admin.layout.index')
@section('content')
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/quan-ly">Quản Lý</a>
      </li>
      <li class="breadcrumb-item active">Tin Tức</li>
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
              <th >NV </th>
              <th >TIÊU ĐỀ </th>
              <th >HÌNH</th>
              <th >NỘI DUNG</th>
              <th >NGÀY TẠO</th>
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
  <div id="formModal" class="modal fade" role="dialog">
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
        <label class="control-label col-md-4" >Tiêu Đề * : </label>
        <div class="col-md-12">
          <textarea class="form-control" name="tieude" id="tieude" required="">
          </textarea>
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
        <label class="control-label col-md-4" >Nội Dung : </label>
      </div> 
      <div class="form-group row">
        {{-- <label class="control-label col-md-12" >Mô Tả : </label> --}}
        <div class="col-md-12">
          <textarea class="form-control" name="noidung" id="noidung">
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
<script> 
  CKEDITOR.replace( 'tieude', {
   height:100,
   uiColor: '#14B8C4',
   toolbar: [
   [ 'Source','Bold', 'Italic','Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
   [ 'FontSize', 'TextColor', 'BGColor' ]
   ],
 });
  CKEDITOR.replace( 'noidung');
</script>
<script type="text/javascript">
  $(document).ready(function(){
   $('#data_table').DataTable({
    retrieve: true,
    //columnDefs: [],
    "iDisplayLength": 10,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing: true,
    serverSide: true,
    ajax:{
     url: "admin/tintuc/danh-sach",
     dataType:"json",
   },
   "order":[0,'desc'],
   columns:[
   {
    data: 'id',
    name: 'id',
  },
  {
    data: 'manv',
    name: 'manv',
  },
  
  {
    data: 'tieude',
    name: 'tieude',
    render:function(data)
    {
      if(data.length>40)
      {
        return data.substring(0,40)+'...';
      }
      //visible:false
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
    data: 'noidung',
    name: 'noidung',
    render:function(data)
    {
      if(data.length>40)
      {
        return data.substring(0,40)+'...';
      }
      //visible:false
    }
  },
  {
    data: 'created_at',
    name: 'created_at',
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
    //$('.buttons-colvis').text('Ẩn Cột');
    {{-- Start Call Form --}}
    var html='';
    $('#create_record').click(function(){
      $('.modal-title').text("Tạo Mới Dữ Liệu");
      $('#action_button').val("Add");
      $('#action').val("Add");
      //$('#option').attr('disabled',true);
      $('#select_trangthai').attr('hidden',true);
      $('#formModal').modal('show');
      $('#sample_form')[0].reset();
      $('#form_result').html(html);
      $('.file-caption-name').attr('required',true);
      //CKEDITOR.instances['mota'].setData('');
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
        var tieude = CKEDITOR.instances['tieude'].getData();
        var noidung = CKEDITOR.instances['noidung'].getData();
        var formData=new FormData($('#sample_form')[0]);
        formData.append('tieude',tieude);
        formData.append('noidung',noidung);
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:"admin/tintuc/add",
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
          CKEDITOR.instances['tieude'].setData('');
          CKEDITOR.instances['noidung'].setData('');
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
        var noidung = CKEDITOR.instances['noidung'].getData();
        var tieude = CKEDITOR.instances['tieude'].getData();
        var formData=new FormData($('#sample_form')[0]);
        formData.append('tieude',tieude);
        formData.append('noidung',noidung);
        $.ajax({
          url:"admin/tintuc/update",
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
       url:"admin/tintuc/edit/"+id,
       dataType:"json",
       success:function(html){
        //$('#maloai').val(html.data.maloai);
        //$('#tenmon').val(html.data.tenmon);
        ///$('#dongia').val(html.data.dongia);
        //$('#ghichu').val(html.data.ghichu);
        CKEDITOR.instances['tieude'].setData(html.data.tieude);
        CKEDITOR.instances['noidung'].setData(html.data.noidung);
        //$('#trangthai').val(html.data.trangthai);
        //$('.kv-file-remove').hide();
        //$('.kv-file-remove').hide();
        //$('.kv-file-zoom').hide();
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
       url:"admin/tintuc/destroy/"+id,
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
