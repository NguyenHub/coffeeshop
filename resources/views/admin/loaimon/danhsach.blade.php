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
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th >MÃ</th>
                <th ">LOẠI</th>
                <th class="text-center">
                  <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Tạo mới</button>
                </th>
              </tr>
            </thead>
                {{-- <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </tfoot> --}}
                <tbody>
                  @foreach($loaimon as $loai)
                  <tr >
                    <td >{{$loai->id}}</td>
                    <td >{{$loai->tenloai}}</td>
                    <td >
                      <button id="{{$loai->id}}" class="create-modal btn btn-success btn-sm">
                        <i class="fa fa-eye" title="Cập nhật"></i>
                      </button>
                      <button type="button" id="{{$loai->id}}"  class=" edit create-modal btn btn-info btn-sm">
                        <i class="fa fa-edit" title="Cập nhật"></i>
                      </button>
                      <button type="button" id="{{$loai->id}}" class="delete create-modal btn btn-danger btn-sm ">
                        <i class="fa fa-trash" title="Xóa"></i>
                      </button>
                    </td>
                  </tr>
                  @endforeach()
                </tbody>
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
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group row">
            <label class="control-label col-sm-3" >Tên Loại : </label>
            <div class="col-sm-9">
             <input type="text" name="tenloai" id="tenloai" class="form-control"  placeholder="Nhập tên loại"  required="" />
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
    // Star Call Form
    $('#create_record').click(function(){
      $('.modal-title').text("Thêm Loại Món");
      $('#action_button').val("Add");
      $('#action').val("Add");
      $('#formModal').modal('show');
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
      url:'admin/loaimon/addPost',
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
        location.reload();
        //$('#user_table').DataTable().ajax.reload();
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
      url:"admin/loaimon/update",
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
       }
       if(data.success)
       {
        html = '<div class="alert alert-success">' + data.success + '</div>';
        //       $('#sample_form')[0].reset();
        //       $('#store_image').html('');
        //       $('#user_table').DataTable().ajax.reload();
        location.reload();
        }
        $('#form_result').html(html);

}
})
  //});
 }
    //End Submit Edit
  });
   //End Submit

// Start Get Edit
   $(document).on('click', '.edit', function(){
    var id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
     url:"admin/loaimon/edit/"+id,
     dataType:"json",
     success:function(html){
      //$('#first_name').val(html.data.first_name);
      $('#tenloai').val(html.loaimon.tenloai);
      //alert(html.loaimon.id);
      // $('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
      // $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
      $('#hidden_id').val(html.loaimon.id);
      $('.modal-title').text("Cập Nhật Loại Món");
      $('#action_button').val("Edit");
      $('#action').val("Edit");
      $('#formModal').modal('show');
    }
  })
  });
// End Get Edit

// Start Delete
   var user_id;
   $(document).on('click', '.delete', function(){
    user_id = $(this).attr('id');
    $('#confirmModal').modal('show');
    $('.modal-delete').text("Bạn Có Muốn Xóa ?");
  });

   $('#ok_button').click(function(){
    $.ajax({
     url:"admin/loaimon/destroy/"+user_id,
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
        html = '<div class="alert alert-success">' + data.success + '</div>';
        //$('#sample_form')[0].reset();
        //$('#user_table').DataTable().ajax.reload();
      }
    
    $('#confirm_result').html(html);
    setTimeout(function()
    {
      $('#confirmModal').modal('hide');
    //$('#user_table').DataTable().ajax.reload();
    }, 500000);
    location.reload();
    //$('#dataTable').DataTable().html.reload();
  }
})
  });
   //End Delete

  //  function addRow(data)
  //  {
  //   var row ='<tr>'+
  //   '<td>'+data.first_name+'</td>'+
  //   '<td ><button class="create-modal btn btn-success btn-sm"><i class="fa fa-eye" title="Cập nhật"></i></button>'+
  //   '<button type="button"  class=" create-modal btn btn-info btn-sm"><i class="fa fa-edit" title="Cập nhật"></i></button>'+
  //   '<button type="button" class="delete create-modal btn btn-danger btn-sm "><i class="fa fa-trash" title="Xóa"></i></button></td>'+
  //   '</tr>';
  // }
});
</script>
@endsection