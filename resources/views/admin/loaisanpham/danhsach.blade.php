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
          <table class="table table-bordered" id="data_table" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th >MÃ</th>
                <th >LOẠI</th>
                <th >NGÀY TẠO</th>
                <th >NGÀY CẬP NHẬT</th>
                <th class="text-center">
                  <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Tạo mới</button>
                </th>
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
      <h4 class="modal-title"></h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
     <span id="form_result"></span>
     <form id="sample_form" class="form-horizontal" >
      {{-- {{csrf_field()}} --}}
      <div class="form-group row">
        <label class="control-label col-sm-3" >Tên Loại : </label>
        <div class="col-sm-9">
         <input type="text" name="tenloai" id="tenloai" class="form-control"  placeholder="Nhập tên loại"  required="" autocomplete="off" />
       </div>
     </div>
         {{-- <div class="form-group row">
          <label class="control-label col-md-3">Last Name : </label>
          <div class="col-md-9">
           <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Your Title Here" />
         </div>
       </div> --}}
       <br />
       <div class="form-group" align="right">
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
     url: "admin/loaisanpham/danh-sach",
   },
   columns:[
   {
    data: 'id',
    name: 'id'
  },
  {
    data: 'tenloai',
    name: 'tenloai'
  },
  {
    data: 'created_at',
    name: 'created_at',
    visible:false,
  },
  {
    data: 'updated_at',
    name: 'updated_at',
    visible:false,
  },
  {
    data: 'action',
    name: 'action',
    orderable: false,
  }
  ]
});
 });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    // Star Call Form
    $('#create_record').click(function(){
      $('.modal-title').text("Thêm Loại Món");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#formModal').modal('show');
      $('#form_result').html('');
      $('#sample_form')[0].reset();
    });
   // Star Call Form
   //Start Submit
   $('#sample_form').on('submit', function(event){
    event.preventDefault();

    //Start Submit Add
    if($('#action').val() == 'Add')
    {
     $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url:'admin/loaisanpham/add',
      method:'POST',
      data: new FormData(this),
      contentType: false,
      cache:false,
      processData: false,
      dataType:"json",

      success:function(data)
      {
        console.log(data);
        var html = '';
        if(data.errors)
        {
          html = '<div">';
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
        //location.reload();
        $('#data_table').DataTable().ajax.reload();
        //location.reload();
      }
      $('#form_result').html(html);
    }
  })
   }
 //End Submit Add

  //Start Submit Edit
  if($('#action').val() == "Edit")
  {
   //$('#confirmModal').modal('show');
   //$('.modal-delete').text("Bạn Có Muốn Cập Nhật ?");
   //$('#ok_button').click(function(){
    //$('#confirmModal').modal('hide');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url:"admin/loaisanpham/update",
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
    //End Submit Edit
  });
   //End Submit

// Start Get Edit
$(document).on('click', '.edit', function(){
  $('#action_button').attr('disabled',true);
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"admin/loaisanpham/edit/"+id,
   dataType:"json",
   success:function(html){
    $('#tenloai').val(html.data.tenloai);
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("Cập Nhật Loại Món");
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
// End Get Edit

// Start Delete
var id;
$(document).on('click', '.delete', function(){
  id = $(this).attr('id');
  $('#confirmModal').modal('show');
  $('.modal-delete').text("Bạn Có Muốn Xóa ?");
  $('#ok_button').text('OK');
});

$('#ok_button').click(function(){
  $.ajax({
   url:"admin/loaisanpham/destroy/"+id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
  },
  success:function(data)
  {
    var html = '';
    if(data.errors)
    {
      html = '<div class="alert alert-danger">' + data.errors + '</div>';
    }
    if(data.success)
    {
      html = '<div style="color:green;">' + data.success + '</div>';
        //$('#sample_form')[0].reset();
        //$('#user_table').DataTable().ajax.reload();
      }

      $('#confirm_result').html(html);
      setTimeout(function()
      {
        $('#confirmModal').modal('hide');
      },2000);
      $('#data_table').DataTable().ajax.reload();
    }
  })
});
   //End Delete
});
</script>
@endsection