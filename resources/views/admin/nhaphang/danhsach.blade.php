@extends('admin.layout.index')
@section('content')
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/quan-ly">Quản Lý</a>
      </li>
      <li class="breadcrumb-item active">Nhập Hàng</li>
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
              <th >MÃ ĐƠN ĐẶT HÀNG</th>
              <th >NGÀY NHẬP</th>
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
  <!-- Start Form Insert -->
  <div id="formModal" class="modal fade" role="dialog" >
   <div class="modal-dialog" style="max-width: 1000px;">
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
        <label class="control-label col-md-4" >Mã Đơn Đặt Hàng : </label>
        <div class="col-md-8">
         <select name="dondathang" id="dondathang" class="form-control">
          <option class="option_mon" value=""></option>
          @foreach($data as $dt)
          {
            <option class="option_mon{{$dt->id}}" value="{{$dt->id}}">{{$dt->id."---ngày đặt: ".$dt->ngaydat}}</option>
          }
          @endforeach()
        </select>
        <input  type="text" class="form-control" id="dondathang_">
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-4" >Ghi Chú : </label>
      <div class="col-md-8">
       <input type="text" name="ghichu" id="ghichu"  class="form-control" placeholder="Nhập Ghi Chú"  />
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
<table class="table table-bordered" id="table_detail" >
 <thead>
   <tr>
     <th>Mã Nguyên Liệu</th>
     <th>Nguyên Liệu</th>
     <th>Số Lượng</th>
     <th class="donvitinh">Đơn Vị Tính</th>
     <th class="quydoi">Tỷ Lệ Quy Đổi</th>
     <th>Đơn Giá</th>
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
     url: "admin/nhaphang/danh-sach",
   },
   columns:[
   {
    data: 'id',
    name: 'id',
    autoWidth:true,
  },
  {
    data: 'ma_ddh',
    name: 'ma_ddh',
    autoWidth:true,
  },
  {
    data: 'ngaynhap',
    name: 'ngaynhap',
    autoWidth:true,
    render:function(data)
    {
      return format_datetime(data);
    }
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
   var html='';
   $('#create_record').click(function(){
    $('.modal-title').text("Tạo Mới Dữ Liệu");
    $('#action_button').val("Add");
    $('#action').val("Add");
    $('#formModal').modal('show');
    $('#mamon').removeAttr('disabled');
    $("#table_addrow tr").remove();
    $('#nguyenlieu option').show();
    $('#sample_form')[0].reset();
    $('#form_result').html('');
    $('.quydoi').show();
    $('.donvitinh').show();
    $('.remove').show();
    $('#action_button').show();
    $('#dondathang').show();
    $('#dondathang_').hide();
    $('.select_nguyenlieu').show();
  });
   {{-- End Call Form --}}

   {{-- Start Submit --}}
   $('#sample_form').on('submit', function(event){
    event.preventDefault();
    var id_mon = $('#mamon').val();
    {{-- Start  Submit Insert --}}
    if($('#action').val() == 'Add')
      { var text = $('#table_addrow tr').length;
      //var text=$('#manguyenlieu').val();
      if(text>0)
      {
       $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"admin/nhaphang/add",
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
    }
  })
     }
   }
   {{-- End  Submit Insert --}}
   {{-- Start  Submit Edit --}}
   if($('#action').val() == "Edit")
   {
     $.ajax({
      url:"admin/congthuc/update",
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
    $('#nguyenlieu option').show();
    $('.select_nguyenlieu').hide();
    $('#dondathang').hide();
    $('#dondathang_').show();
    $.ajax({
     url:"admin/nhaphang/edit/"+id,
     dataType:"json",
     success:function(html){
      $('#dondathang_').val(html.data.ma_ddh);
      $('#ghichu').val(html.data.ghichu);
      //$('#trangthai').val(html.data.ma_ddh);
      $('#hidden_id').val(html.data.id);
      edit_field(html.data2);
      $('.quydoi').hide();
      $('.donvitinh').hide();
      $('.remove').hide();
      $('#action_button').hide();
      $('.modal-title').text("Cập Nhật Dữ Liệu");
      $('#action_button').val("Cập Nhật");
      $('#action').val("Edit");
      $('#formModal').modal('show');    }
    })
  });
   $('#dondathang').change(function(){
    $("#table_addrow tr").remove();
    var id = $(this).val();
    if(id!='')
    {
      $.ajax({
        url:'admin/nhaphang/dondathang/'+id,
        dataType:'json',
        success:function(data)
        {
          edit_field(data.data);
        }
      })
    }
  });
   function edit_field(data)
   {
    $.each(data,function(key,val){

      html = '<tr>';
      html += '<td style="width: 50px;"><input value='+val.manguyenlieu+' type="text" id="manguyenlieu" name="manguyenlieu[]" class="form-control"></td>';
      html += '<td style="max-width: 200px;" ><input type="text" id="tennguyenlieu'+val.manguyenlieu+'" name="tennguyenlieu[]" class="form-control"></td>';
      html += '<td style="max-width: 100px;" ><input type="text" id="soluong" name="soluong[]" value="'+val.soluong+'" class="form-control soluong"></td>';
      html += '<td class="donvitinh" ><select style="width: 135px;" name="donvitinh[]" id="donvitinh'+val.manguyenlieu+'" class="form-control donvitinh"><option value="0">Chai</option><option  value="1">Thùng</option><option  value="2">Kilogram</option><option  value="3">Cái</option></select></td>';
      html += '<td class="quydoi" style="max-width: 50px;" ><input type="text" id="quydoi" required="" name="quydoi[]" value="" class="form-control quydoi budget"></td>';
      html += '<td><input type="text" id="dongia'+val.manguyenlieu+'" name="dongia[]" required="" value="" class="form-control budget dongia "></td>';
      html += '<td><input type="text" id="note'+val.manguyenlieu+'" name="note[]" value="" class="form-control budget"></td>';
      html += '<td><button style="width:40px" type="button" value="'+val.manguyenlieu+'" name="remove" id="remove" class="btn btn-danger remove"><i id="fa" class="fa fa-trash"></i></button></td></tr>';
      html += '</tr>';
      $('#table_addrow').append(html);
      $('#tennguyenlieu'+val.manguyenlieu).val(val.tennguyenlieu);
      $('#donvitinh'+val.manguyenlieu).val(val.donvitinh);
      $('.option_nl'+val.manguyenlieu).hide();
      var sl=val.dongia;
      var note=val.dongia;
      if(sl ||note)
      {
        $('#dongia'+val.manguyenlieu).val(format_number(val.dongia));
        $('#note'+val.manguyenlieu).val(val.ghichu);
      }

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
     url:"admin/nhaphang/destroy/"+id,
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
  $(document).on('keyup','.dongia',function(){
    var number =$(this).val();
    var substring=number.substring(number.length-1,number.length);
    var sl;
    var pattern_number= /(([0-9])\b)/g;
    if(pattern_number.test(substring)==false)
    {
      sl=number.substring(0,number.length-1);
    }
    else
    {
      sl= number;
    }
    $(this).val(sl.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 "));
  });
  $(document).on('keydown','.dongia',function(){
    var number =$(this).val();
    number= number.toString().replace(/\s+/g,"");
    if((number-1)<0)
    {
      number=number.substring(1,number.length);
    }
    $(this).val(number);
  });
  $(document).on('keyup','.quydoi',function(){
    var number =$(this).val();
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
    $(this).val(sl.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 "));
  });
  $(document).on('keydown','.quydoi',function(){
    var number =$(this).val();
    number= number.toString().replace(/\s+/g,"");
    if((number-1)<0)
    {
      number=number.substring(1,number.length);
    }
    $(this).val(number);
  });
  $(document).on('keyup','.soluong',function(){
    var number =$(this).val();
    $(this).val(format_input_number(number));
  });
});
</script>
<script>
  $(document).ready(function(){
   function dynamic_field(id,name)
   {
    html = '<tr>';
    html += '<td style="width: 50px;"><input value='+id+' type="text" id="manguyenlieu" name="manguyenlieu[]" class="form-control"></td>';
    html += '<td style="max-width: 200px;" ><input type="text" id="tennguyenlieu'+id+'" name="tennguyenlieu[]" class="form-control"></td>';
    html += '<td style="max-width: 100px;" ><input type="text" id="soluong" name="soluong[]" value="" class="form-control soluong"></td>';
    html += '<td ><select style="width: 135px;" name="donvitinh[]" id="donvitinh'+id+'"class="form-control"><option value="0">Chai</option><option  value="1">Thùng</option><option  value="2">Kilogram</option><option  value="3">Cái</option></select></td>';
    html += '<td style="max-width: 50px;" ><input type="text" required="" id="quydoi" name="quydoi[]" value="" class="form-control budget quydoi"></td>';
    html += '<td><input type="text" id="dongia" name="dongia[]" required="" value="" class="form-control budget dongia"></td>';
    html += '<td><input type="text" id="note" name="note[]" value="" class="form-control budget"></td>';
    html += '<td><button style="width:40px" type="button" value="'+id+'" name="remove" id="remove" class="btn btn-danger remove"><i id="fa" class="fa fa-trash"></i></button></td></tr>';
    html += '</tr>';
    $('#table_addrow').append(html);
    $('#tennguyenlieu'+id).val(name);
  }
  {{-- Start Click Append row --}}
  $('#nguyenlieu').change(function(){
    var id = $(this).val();
    if(id!='null')
    {
      var name= $('.option_nl'+id).text();
      dynamic_field(id,name);
      $('.option_nl'+id).hide();
    }
  });
  {{-- End Click Append row --}}
  {{-- Start Click Remove row --}}
  $(document).on('click', '.remove', function(){
    $(this).closest("tr").remove();
    var id = $(this).val();
    $('.option_nl'+id).show();
  });
  {{-- Start Click Remove row --}}
  {{-- Start Click Delete detail --}}
  $(document).on('click','.remove_detail',function(){
    var id = $(this).attr('id');
    var ma_nl=$('#manguyenlieu'+id).val();
    $.ajax({
      url:'admin/congthuc/chi-tiet/delete/'+id,
      dataType:'json',
      success:function(data)
      {
        var html='';
        html = '<div class="alert alert-success">' + data.success + '</div>';
        $('#form_result').html(html);
        setTimeout(function(){
         $('#form_result').html('');
       }, 2000);  
        $('.option_nl'+ma_nl).removeAttr('hidden');
      }
    })
    $(this).closest("tr").remove();
  });
  {{-- End Click Delete detail --}}
  {{-- Start Click Update detail --}}
  $(document).on('click','.update', function(){
    var id = $(this).attr('id');
    var formData= new FormData();
    formData.append('dinhluong',$('#dinhluong'+id).val());
    formData.append('donvitinh',$('#donvitinh'+id).val());
    formData.append('ghichu',$('#note'+id).val());
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url:'admin/congthuc/chi-tiet/update/'+id,
      method:'POST',
      data:formData,
      contentType: false,
      cache: false,
      processData: false,
      dataType:'json',
      success:function(data)
      {
        html = '<div class="alert alert-success">' + data.success + '</div>';
        $('#form_result').html(html);
        setTimeout(function(){
         $('#form_result').html('');
       }, 2000);
      }
    })
  });
  {{-- End Click Update detail --}}
  {{-- Start Click Add detail --}}
  $(document).on('click', '.add', function(){
    var ma_ct=$('#hidden_id').val();
    var id = $(this).val();
    var formData= new FormData();
    formData.append('manguyenlieu',$('#manguyenlieu'+id).val());
    formData.append('dinhluong',$('#dinhluong'+id).val());
    formData.append('donvitinh',$('#donvitinh'+id).val());
    formData.append('ghichu',$('#note'+id).val());
    if($('#dinhluong'+id).val()=='')
    {
      var html='';
      html = '<div class="alert alert-danger">Vui lòng nhập định lượng</div>';
      $('#form_result').html(html);
      setTimeout(function(){
       $('#form_result').html('');
     }, 2000);
    }
    else
    {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'admin/congthuc/chi-tiet/add/'+ma_ct,
        method:'POST',
        data:formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType:'json',
        success:function(data)
        {
          $('#add'+id).attr('hidden',true);
          $('#remove'+id).attr('hidden',true);
          html = '<div class="alert alert-success">' + data.success + '</div>';
          $('#form_result').html(html);
          setTimeout(function(){
           $('#form_result').html('');
         }, 2000);
        }
      })
    }
  });
  {{-- Start Click Add detail --}}
});
</script>
@endsection
