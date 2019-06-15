@extends('admin.layout.index')
@section('content')
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/trangchu">Trang chủ</a>
      </li>
      <li class="breadcrumb-item active">Nguyên Liệu</li>
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
              <th >TÊN NGUYÊN LIỆU</th>
              <th >SỐ LƯỢNG</th>
              <th >DVT</th>
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
  <div id="formModal" class="modal fade" role="dialog" >
   <div class="modal-dialog">
    <div class="modal-content" style="width: 650px">
     <div class="modal-header">
      <h4 class="modal-title">Thêm Nguyên Liệu</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>     
    </div>
    <div class="modal-body">
     <span id="form_result"></span>
     <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group row">
        <label class="control-label col-md-4" >Tên Nguyên Liệu * : </label>
        <div class="col-md-8">
         <input type="text" name="tennguyenlieu" id="tennguyenlieu" class="form-control" placeholder="Nhập Tên Nguyên Liệu" required="" />
       </div>
     </div>
    <div class="form-group row">
      <label class="control-label col-md-4" >Số Lượng : </label>
      <div class="col-md-8">
       <input type="text" name="soluong" id="soluong" class="form-control" placeholder="Nhập Số Lượng"  />
     </div>
   </div>
   <div class="form-group row">
      <label class="control-label col-md-4" >Đơn Vị Tính : </label>
      <div class="col-md-8">
        <select name="donvitinh" id="donvitinh"  class="form-control">
          <option value="0">Cái</option>
          <option value="1">Gram</option>
        </select>
      </div>
    </div>
<div class="form-group row">
  <label class="control-label col-md-4" >Ghi Chú : </label>
  <div class="col-md-8">
   <input type="text" name="ghichu" id="ghichu" class="form-control" placeholder="Nhập Ghi Chú"  />
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
    "order":[[0,"desc"]],// sắp xếp cột giảm dần
    retrieve: true,
    // columnDefs: [ //có thể custom hiển thị ở đây hoặc column[]
    // {
    //   "render": function(data,type,row)
    //   {
    //     return data +'('+ row['tenkhuyenmai']+')';
    //   },
    //   "targets":0 //render cho cột số 0
    // },
    // //{"visible":false,"targets":2}//ẩn đi cột số 2
    // ],
    "iDisplayLength": 10,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing: true,
    serverSide: true,
    ajax:{
     url: "admin/nguyenlieu/danh-sach",
   },
   columns:[
   {
    data: 'id',
    name: 'id',
  },
  {
    data: 'tennguyenlieu',
    name: 'tennguyenlieu'
  },
  {
    data: 'soluong',
    name: 'soluong'
  },
  {
    data: 'donvitinh',
    name: 'donvitinh',
    "render":function(data){
      if(data==0)
      {
        return "Cái";
      }
      return "Gram";
    }
  },
  {
    data: 'ghichu',
    name: 'ghichu'
  },
  {
    data: 'created_at',
    name: 'created_at',
    visible:false //ẩn cột
  },
  {
    data: 'updated_at',
    name: 'updated_at',
    visible:false //ẩn cột
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
    var html='';
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
        url:"admin/nguyenlieu/add",
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
        url:"admin/nguyenlieu/update",
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
        $('#sample_form')[0].reset();
        setTimeout(function(){
         $('#formModal').modal('hide');
         $('#data_table').DataTable().ajax.reload();
       }, 2000);
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
       url:"admin/nguyenlieu/edit/"+id,
       dataType:"json",
       success:function(html){
        $('#tennguyenlieu').val(html.data.tennguyenlieu);
        $('#soluong').val(html.data.soluong);
        $('#donvitinh').val(html.data.donvitinh);
        $('#ghichu').val(html.data.ghichu);
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text("Cập Nhật Dữ Liệu");
        $('#action_button').val("Cập Nhật");
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
    {{-- Start Confirm Delete --}}
    $('#ok_button').click(function(){
      $.ajax({
       url:"admin/nguyenlieu/destroy/"+id,
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
