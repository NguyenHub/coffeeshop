@extends('admin.layout.index')
@section('content')
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Loại Món</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
      {{-- <div class="card-header">
        <i class="fas fa-table"></i>
      </div> --}}

      <div class="row card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped " id="data_table" width="100%" cellspacing="0">
           <thead>
            <tr>
              <th >MÃ</th>
              <th >KHU VỰC</th>
              <th >GHI CHÚ</th>
              <th >CREATED_AT</th>
              <th >UPDATED_AT</th>
              <th >Action
                <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Tạo mới</button>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
  </div>
  {{-- Start Form Insert --}}
  <div id="formModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <h4 class="modal-title">Thêm Khu Vực</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>     
    </div>
    <div class="modal-body">
     <span id="form_result"></span>
     <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group row">
        <label class="control-label col-md-4" >Tên Khu Vực : </label>
        <div class="col-md-8">
         <input type="text" name="name" id="name" class="form-control" required="" />
       </div>
     </div>
     <div class="form-group row">
      <label class="control-label col-md-4">Ghi Chú : </label>
      <div class="col-md-8">
       <input type="text" name="note" id="note" class="form-control" />
     </div>
   </div>
   <br />
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
<script type="text/javascript">
  $(document).ready(function(){

   $('#data_table').DataTable({
    processing: true,
    serverSide: true,
    ajax:{
     url: "admin/khuvuc/danh-sach",
   },
   columns:[
   {
    data: 'id',
    name: 'id'
  },
  {
    data: 'tenkhuvuc',
    name: 'tenkhuvuc'
  },
  {
    data: 'ghichu',
    name: 'ghichu'
  },
  {
    data: 'created_at',
    name: 'created_at'
  },
  {
    data: 'updated_at',
    name: 'updated_at'
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
    {{-- Start Call Form --}}
    var html ='';
     $('#create_record').click(function(){
      $('.modal-title').text("Tạo Mới Dữ Liệu");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#formModal').modal('show');
      $('#sample_form')[0].reset();
      $('#form_result').html(html);
    });
    {{-- End Call Form --}}
    {{-- Start Submit --}}
    $('#sample_form').on('submit', function(event){
      event.preventDefault();
      {{-- Start  Submit Insert --}}
      if($('#action').val() == 'Add')
      {
       $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"admin/khuvuc/add",
        method:"POST",
        data: new FormData(this),
        contentType: false,
        cache:false,
        processData: false,
        dataType:"json",
        success:function(data)
        {
         var html = '';
         if(data.errors)
         {
          html = '<div class="alert alert-danger">';
          for(var count = 0; count < data.errors.length; count++)
          {
           html += '<p>' + data.errors[count] + '</p>';
         }
         html += '</div>';
       }
       if(data.success)
       {
        html = '<div class="alert alert-success">' + data.success + '</div>';
        $('#sample_form')[0].reset();
        $('#data_table').DataTable().ajax.reload();
      }
      $('#form_result').html(html);
    }
  })
     }
     {{-- End  Submit Insert --}}
     {{-- Start  Submit Edit --}}
     if($('#action').val() == "Edit")
     {
       $.ajax({
        url:"admin/khuvuc/update",
        method:"POST",
        data:new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType:"json",
        success:function(data)
        {
         var html = '';
         if(data.errors)
         {
          html = '<div class="alert alert-danger">';
          for(var count = 0; count < data.errors.length; count++)
          {
           html += '<p>' + data.errors[count] + '</p>';
         }
         html += '</div>';
       }
       if(data.success)
       {
        html = '<div class="alert alert-success">' + data.success + '</div>';
      //$('#sample_form')[0].reset();
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
      var id = $(this).attr('id');
      $('#form_result').html('');
      $.ajax({
       url:"admin/khuvuc/edit/"+id,
       dataType:"json",
       success:function(html){
        $('#name').val(html.data.tenkhuvuc);
        $('#note').val(html.data.ghichu);
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text("Cập Nhật Khu Vực");
        $('#action_button').val("OK");
        $('#action').val("Edit");
        $('#formModal').modal('show');
        $('#action_button').attr('disabled',true);
        $('input').change(function()
          {
            $('#action_button').attr('disabled',false);
          });
      }
    })
    });
    {{-- End  Get Edit --}}
    {{-- Start Call Confirm Form Delete --}}
    var id;
    $(document).on('click', '.delete', function(){
      id = $(this).attr('id');
      $('#confirmModal').modal('show');
      $('.modal-delete').text("Bạn Có Muốn Xóa ?");
    });
    {{-- End Call Confirm Form Delete --}}
    {{-- Start Confirm Delete --}}
    $('#ok_button').click(function(){
      $.ajax({
       url:"admin/khuvuc/destroy/"+id,
       beforeSend:function(){
        $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
        setTimeout(function(){
        $('#confirmModal').modal('hide');
         $('#data_table').DataTable().ajax.reload();
       }, 2000);
        $('#ok_button').text('OK');
      }
    })
    });
    {{-- End Confirm Delete --}}
  });
</script>
@endsection
