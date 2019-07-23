@extends('admin.layout.index')
@section('content')
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/trangchu">Trang chủ</a>
      </li>
      <li class="breadcrumb-item active">Khách Hàng</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
      {{-- <div class="card-header">
        <i class="fas fa-table"></i>
      </div> --}}

      <div class="row card-body">
        <div class="table-responsive">
          <table class="table table-striped " id="data_table" width="100%" cellspacing="0">
           <thead>
            <tr>
              <th >MÃ</th>
              <th >TÊN </th>
              <th >SDT</th>
              <th >EMAIL</th>
              <th >GIỚI TÍNH</th>
              <th >NGÀY SINH</th>
              <th >ĐỊA CHỈ</th>
              <th >DIỂM</th>
              <th >LOẠI</th>
              <th >TRẠNG THÁI</th>
              <th >TẠO LÚC</th>
              
              <th >Thao tác
                <button style="width: 30px" type="button" name="create_record" id="create_record" class="btn btn-success btn-sm" title="Thêm"><i class="fa fa-plus"></i></button></th>
              </tr>
            </thead>
{{--             <tfoot>
              <tr>
                <th >MÃ</th>
                <th >LOẠI KM</th>
                <th >TÊN KM</th>
                <th >SỐ LƯỢNG</th>
                <th >GIÁ TRỊ</th>
                <th >MÃ CODE</th>
                <th >BẮT ĐẦU</th>
                <th >KẾT THÚC</th>
                <th >GHI CHÚ</th>
                <th >CREATED_AT</th>
                <th >UPDATED_AT</th>
                <th hidden="" >Action
                  <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Tạo mới</button></th>
                </tr>
              </tfoot> --}}
            </table>
          </div>
        </div>
        {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
      </div>
    </div>
    {{-- Start Form Insert --}}
    <div id="formModal" class="modal fade" role="dialog" >
     <div class="modal-dialog">
      <div class="modal-content" style="width: 650px">
       <div class="modal-header">
        <h4 class="modal-title">Thêm Khách Hàng</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>     
      </div>
      <div class="modal-body">
       <span id="form_result"></span>
       <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group row">
          <label class="control-label col-md-3" >Họ Tên * : </label>
          <div class="col-md-8">
           <input type="text" name="tenkhachhang" id="tenkhachhang" class="form-control" placeholder="Nhập Tên" required="" />
         </div>
       </div>
       <div class="form-group row">
        <label class="control-label col-md-3" >SDT * : </label>
        <div class="col-md-5">
         <input type="text" name="sdt" id="sdt" class="form-control" required=""  />
       </div>
       <div class="col-md-3">
        <select name="gioitinh" id="gioitinh" class="form-control">
          <option value="0">Nam</option>
          <option value="1">Nữ</option>
        </select>
      </div>
    </div>
    <div class="form-group row update">
      <label class="control-label col-md-3" >Địa Chỉ : </label>
      <div class="col-md-8">
       <input type="text" name="diachi" id="diachi" disabled="" class="form-control" />
     </div>
   </div>
   <div class="form-group row">
    <label class="control-label col-md-3" >Email  : </label>
    <div class="col-md-8">
     <input type="text" name="email" id="email" class="form-control"  />
   </div>
 </div>
   {{-- <div class="form-group row">
    <label class="control-label col-md-3" >Địa Chỉ  : </label>
    <div class="col-md-8">
     <input type="text" name="diachi" id="diachi" class="form-control" required=""  />
   </div>
 </div> --}}
 <div class="form-group row update">
  <label class="control-label col-md-3" >Loại KH : </label>
  <div class="col-md-3">
   <select id="loaikhachhang" disabled="" name="loaikhachhang" class="form-control">
    @foreach ($loai as $l)
    <option value="{{$l->id}}">{{$l->tenloai}}</option>
    @endforeach
  </select>
</div>
<label class="control-label col-md-2" >Điểm : </label>
<div class="col-md-3">
 <input type="text" name="diem" disabled="" id="diem" class="form-control"  />
</div>
</div>
<div class="form-group row update">
  <label class="control-label col-md-3" >Ngày Tạo  : </label>
  <div class="col-md-5">
   <input type="text" name="ngaytao" disabled="" id="ngaytao" class="form-control"/>
 </div>
 <div class="col-md-3">
  <select name="trangthai" id="trangthai" class="form-control">
    <option value="1">Hoạt Động</option>
    <option value="0">Khóa</option>
  </select>
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
    //columnDefs: [ //có thể custom hiển thị ở đây hoặc column[]
    //{
      //"className":'text-center',"targets":0    //   "render": function(data,type,row)
    //   {
    //     return data +'('+ row['tenkhuyenmai']+')';
    //   },
    //   "targets":0 //render cho cột số 0
    //},
    // //{"visible":false,"targets":2}//ẩn đi cột số 2
    //],
    "iDisplayLength": 10,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing: true,
    serverSide: true,
    ajax:{
     url: "admin/khachhang/danh-sach",
   },
   columns:[
   {
    data: 'id',
    name: 'id',
    width:'5px'
  },
  {
    data: 'tenkhachhang',
    name: 'tenkhachhang',
  },
  {
    data: 'sdt',
    name: 'sdt',
    //visible:false
    // "render": function(data)
    // {
    //   var d = new Date(data);
    //   return  d.getDate()+"-"+(d.getMonth()+1)+"-"+d.getFullYear();
    // }
  },
  {
    data: 'email',
    name: 'email',
  },
  {
    data: 'gioitinh',
    name: 'gioitinh',
    "render": function(data)
    {
      if(data==0)
      {
        return "Nam";
      }
      return "Nữ";
    }
  },
  {
    data: 'ngaysinh',
    name: 'ngaysinh',
    visible:false,
  },
  {
    data: 'diachi',
    name: 'diachi',
    visible:false,
  },
  {
    data: 'diemtichluy',
    name: 'diemtichluy',
  },
  {
    data: 'tenloai',
    name: 'tenloai',
  },
  {
    data: 'trangthai',
    name: 'trangthai',
    visible:false,
  },
  {
    data: 'created_at',
    name: 'created_at',
    visible:false,
  },
  {
    data: 'action',
    name: 'action',
    orderable: false,
    className:'text-center',
    width:'100px'
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
      $('.update').attr('hidden',true);
      $('#email').removeAttr('disabled');
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
        url:"admin/khachhang/add",
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
       $.ajax({
        url:"admin/khachhang/update",
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
      $('.update').removeAttr('hidden');
      $('#email').attr('disabled',true);
      $.ajax({
       url:"admin/khachhang/edit/"+id,
       dataType:"json",
       success:function(html){
        $('#tenkhachhang').val(html.data.tenkhachhang);
        $('#ngaysinh').val(html.ngaysinh);
        $('#gioitinh').val(html.data.gioitinh);
        $('#email').val(html.data.email);
        $('#sdt').val(html.data.sdt);
        $('#diachi').val(html.data.diachi);
        $('#loaikhachhang').val(html.data.loaikhachhang);
        $('#ngaytao').val(format_datetime(html.data.created_at));
        $('#trangthai').val(html.data.trangthai);
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text("Cập Nhật Dữ Liệu");
        $('#action_button').val("Cập Nhật");
        $('#action').val("Edit");
        $('#formModal').modal('show');
        $('#action_button').attr('disabled',true);
        $('.form-control').change(function()
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
       url:"admin/khachhang/destroy/"+id,
       beforeSend:function(){
        $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
        var html ='';
        if(data.errors)
        {
          html = '<div class="alert alert-danger">' + data.errors + '</div>';
        }
        if(data.success)
        {
          html = '<div class="alert alert-success">' + data.success + '</div>';
        }
        $('#confirm_result').html(html);
        setTimeout(function()
        {
          $('#confirmModal').modal('hide');
          $('#data_table').DataTable().ajax.reload();
        }, 1000);
      }
    })
    });
    {{-- End Confirm Delete --}}
  });
</script>
@endsection
