@extends('admin.layout.index')
@section('content')
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/quan-ly">Quản Lý</a>
      </li>
      <li class="breadcrumb-item active">Đặt Hàng</li>
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
              <th >NGÀY ĐẶT </th>
              <th >GHI CHÚ</th>
              <th >NHÀ CUNG CẤP</th>
              <th >
                <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Tạo mới</button>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
  </div>
  <!-- Start Form Insert -->
  <div id="formModal" class="modal fade" role="dialog" >
   <div class="modal-dialog" style="max-width: 850px;">
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
        <label class="control-label col-md-4" >NCC : </label>
        <div class="col-md-8">
         <select name="ma_ncc" id="ma_ncc" class="form-control">
           @foreach($data as $dt)
           {
            <option class="option_mon{{$dt->id}}" value="{{$dt->id}}">{{$dt->id."-".$dt->tennhacungcap}}</option>
          }
          @endforeach()
        </select>
      </div>
    </div>
    {{-- <div class="form-group row">
      <label class="control-label col-md-4" >Tên Công Thức * : </label>
      <div class="col-md-8">
       <input type="text" name="tencongthuc" id="tencongthuc" class="form-control" placeholder="Nhập Tên Công Thức" required="" />
     </div>
   </div> --}}
   <div class="form-group row">
    <label class="control-label col-md-4" >Ghi Chú : </label>
    <div class="col-md-8">
     <input type="text" name="ghichu" id="ghichu" class="form-control" placeholder="Nhập Ghi Chú"  />
   </div>
 </div>
 <div class="form-group row select_nguyenlieu">
  <label class="control-label col-md-4" >Nguyên Liệu : </label>
  <div class="col-md-8">
   <select name="nguyenlieu" id="nguyenlieu" class="form-control">
    <option class="" id="" value="null"></option>
    @foreach($nguyenlieu as $nl)
    {
      <option class="option_nl{{$nl->id}}" id="{{$nl->id}}" value="{{$nl->id}}">{{$nl->tennguyenlieu}}</option>
    }
    @endforeach()
  </select>
</div>
</div>
<div class="form-group row ngaydat">
  <label class="control-label col-md-4" >Ngày Đặt : </label>
  <div class="col-md-8">
   <input type="text" name="ngaydat" id="ngaydat" class="form-control" />
 </div>
</div>
<table class="table table-bordered" id="table_detail" >
 <thead>
   <tr>
     <th>Mã</th>
     <th>Nguyên Liệu</th>
     <th>Số Lượng</th>
     <th>DVT</th>
     <th>Ghi Chú</th>
     <th></th>
   </tr>
 </thead>
 <tbody id="table_addrow">
   {{-- <tr >
     <td>
         <select name="nguyenlieu[]" id="nguyenlieu" class="form-control">
           @foreach($nguyenlieu as $nl)
           {
            <option value="{{$nl->id}}">{{$nl->id."-".$nl->tennguyenlieu}}</option>
          }
          @endforeach()
        </select>
      </td>
     <td><input type="text" name="dinhluong[]" class="form-control"></td>    
     <td>
       <select name="donvitinh[]" id="donvitinh" class="form-control">
            <option value="0">Gram</option>
             <option value="1">Mililit</option>
        </select>
     </td>
     <td><input type="text" name="ghichu2[]" class="form-control budget"></td>
     <td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a></td>
   </tr>
 </tr> --}}
</tbody>
</table>
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
<!-- End Form Insert -->
<!-- Start Form Confirm -->
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
<!-- End Form Confirm -->
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
    retrieve: true,
    columnDefs: [],
    "iDisplayLength": 10,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing: true,
    serverSide: true,
    ajax:{
     url: "admin/dathang/danh-sach",
   },
   columns:[
   {
    data: 'id',
    name: 'id',
    autoWidth:true,
  },
  {
    data: 'ngaydat',
    name: 'ngaydat',
    autoWidth:true,
    render:function(data)
    {
      return format_datetime(data);
    }
  },
  {
    data: 'ghichu',
    name: 'ghichu',
    autoWidth:true,
  },
  {
    data: 'tennhacungcap',
    name: 'tennhacungcap',
  },
  {
    data: 'action',
    name: 'action',
    orderable: false,
    autoWidth:true,
  }
  ]
});
 });
</script>
<script>
  $(document).ready(function(){
    $(document).on('keyup','.soluong',function(){
      var number = $(this).val();
    //   var diem=0;
    //   for(var i=0;i<number.length;i++)
    //   {
    //    var str=number.substring(i,i+1);
    //    if(str=='.')
    //    {
    //     diem++;
    //   }
    // }
    // var substring=number.substring(number.length-1,number.length);
    // var sl;
    // var pattern_number= /(([0-9]{1,5})\b)/g;
    // if(pattern_number.test(substring)==false)
    // {
    //   sl=number.substring(0,number.length-1);
    //   if(substring==".")
    //   {
    //     sl=number;
    //     if(diem>1)
    //     {
    //       sl=number.substring(0,number.length-1);
    //     }
    //   }
    // }
    // else
    // {
    //   sl= number;
    // }
    $(this).val(format_input_number(number));
  });
    var html='';
    $('#create_record').click(function(){
      $('.modal-title').text("Tạo Mới Dữ Liệu");
      $('#action_button').val("Đặt Hàng");
      $('#action').val("Add");
      $('#formModal').modal('show');
      $("#table_addrow tr").remove();
      $('#nguyenlieu option').removeAttr('hidden');
      $('.select_nguyenlieu').removeAttr('hidden');
      $('.ngaydat').attr('hidden',true);
      $('#sample_form')[0].reset();
      $('#form_result').html('');
      $('#action_button').show();
    });
    {{-- End Call Form --}}

    {{-- Start Submit --}}
    $('#sample_form').on('submit', function(event){
      event.preventDefault();
      var id_mon = $('#mamon').val();
      {{-- Start  Submit Insert --}}
      if($('#action').val() == 'Add')
        { var text = $('#table_addrow tr').length;
      if(text>0)
      {
       $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"admin/dathang/add",
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
        $("#table_addrow tr").remove();
        $('#nguyenlieu option').removeAttr('hidden');
        $('.option_mon'+id_mon).attr('disabled',true);
      }
      $('#form_result').html(html);
      setTimeout(function(){
       $('#form_result').html('');
     }, 1000);
    },
    error:function()
    {
      $('#form_result').html('Đặt hàng thất bại');
      setTimeout(function(){
       $('#form_result').html('');
     }, 1000);
    }
  })
     }
   }
   {{-- End  Submit Insert --}}
   {{-- Start  Submit Edit --}}
   if($('#action').val() == "Edit")
   {
     $.ajax({
      url:"admin/dathang/update",
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
      $("#table_addrow tr").remove();
      //$('.select_nguyenlieu').attr('hidden',true);
      $('.ngaydat').removeAttr('hidden');
      //$('#action_button').hide();
      $.ajax({
       url:"admin/dathang/edit/"+id,
       dataType:"json",
       success:function(html){
        $('#ma_ncc').val(html.data.manhacungcap);
        $('#ghichu').val(html.data.ghichu);
        $('#ngaydat').val(format_datetime(html.data.ngaydat));
        $('#hidden_id').val(html.data.id);
        edit_field(html.data2);
        $('.modal-title').text("Cập Nhật Dữ Liệu");
        $('#action_button').val("Đặt Lại");
        $('#action').val("Add");
        $('#formModal').modal('show');
      }
    })
    });
    function edit_field(data)
    {
      $.each(data,function(key,val){
        if(val.ghichu==null)
        {
          val.ghichu="";
        }
        html = '<tr>';
        html += '<td style="max-width: 80px;" ><input value='+val.manguyenlieu+' type="text" id="manguyenlieu" name="manguyenlieu[]" readonly="" class="form-control"></td>';
        html += '<td style="max-width: 200px;" ><input type="text" readonly="" id="tennguyenlieu'+val.manguyenlieu+'" name="tennguyenlieu[]" class="form-control"></td>';
        html += '<td style="max-width: 100px;" ><input type="text" id="soluong" name="soluong[]" value="'+val.soluong+'" class="form-control soluong"></td>';
        html += '<td><select name="donvitinh[]" id="donvitinh'+val.manguyenlieu+'" class="form-control"><option value="0">Chai</option><option  value="1">Thùng</option><option  value="2">Kilogram</option><option  value="3">Cái</option></select></td>';
        html += '<td><input type="text" id="note'+val.manguyenlieu+'" name="note[]" value="'+val.ghichu+'" class="form-control budget"></td>';
        html += '<td><button style="width:40px" type="button" value="'+val.manguyenlieu+'" name="remove" id="remove" class="btn btn-danger remove"><i id="fa" class="fa fa-trash"></i></button></td>';
        html += '</tr>';
        $('#table_addrow').append(html);
        $('#tennguyenlieu'+val.manguyenlieu).val(val.tennguyenlieu);
        $('#donvitinh'+val.manguyenlieu).val(val.donvitinh);
        $('.option_nl'+val.manguyenlieu).attr('hidden',true);
      })
    //}
    //else
    //{   
      //html += '<td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button></td></tr>';
      //$('#table_addrow').html(html);
    //}
  }
  {{-- End  Get Edit --}}
  {{-- Start Confirm Delete --}}
  $('#ok_button').click(function(){
    $.ajax({
     url:"admin/dathang/destroy/"+id,
     beforeSend:function(){
      $('#ok_button').text('Deleting...');
    },
    success:function(data)
    {
      var html="";
      if(data.errors)
      {
        html = '<div style="color:red;">' + data.errors + '</div>';
      }
      if(data.success)
      {
        html = '<div style="color:green;">' + data.success + '</div>';
      }
      $('#confirm_result').html(html);
      setTimeout(function(){
       $('#confirmModal').modal('hide');
       $('#confirm_result').html(html);
       $('#data_table').DataTable().ajax.reload();
     }, 1000);
      $('#ok_button').text('OK');
    }
  })
  });
  {{-- End Confirm Delete --}}
});
</script>
<script>
  $(document).ready(function(){
   function dynamic_field(id,name)
   {
    html = '<tr>';
    html += '<td style="max-width: 80px;" ><input value='+id+' type="text" id="manguyenlieu" name="manguyenlieu[]" readonly="" class="form-control"></td>';
    html += '<td style="max-width: 200px;" ><input type="text" id="tennguyenlieu'+id+'" name="tennguyenlieu[]" readonly="" class="form-control"></td>';
    html += '<td style="max-width: 100px;" ><input type="text" id="soluong" name="soluong[]" class="form-control soluong" required=""></td>';
    html += '<td><select name="donvitinh[]" id="donvitinh'+id+'" class="form-control"><option value="0">Chai</option><option  value="1">Thùng</option><option  value="2">Kilogram</option><option  value="3">Cái</option></select></td>';
    html += '<td><input type="text" name="note[]" id="note" class="form-control budget"></td>';
    html += '<td><button style="width:40px" type="button" value="'+id+'" name="remove" id="remove'+id+'" class="btn btn-danger remove"><i id="fa" class="fa fa-trash"></i></button></td></tr>';
    $('#table_addrow').append(html);
    $('#tennguyenlieu'+id).val(name);
    //}
    //else
    //{   
      //html += '<td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button></td></tr>';
      //$('#table_addrow').html(html);
    //}
  }
  {{-- Start Click Append row --}}
  $('#nguyenlieu').change(function(){
    var id = $(this).val();
    if(id!='null')
    {
      var name= $('.option_nl'+id).text();
      dynamic_field(id,name);
      $('.option_nl'+id).attr('hidden',true);
    }
  });
  {{-- End Click Append row --}}
  {{-- Start Click Remove row --}}
  $(document).on('click', '.remove', function(){
    $(this).closest("tr").remove();
    var id = $(this).val();
    $('.option_nl'+id).removeAttr('hidden');
  });
  {{-- Start Click Remove row --}}
});
</script>
@endsection
