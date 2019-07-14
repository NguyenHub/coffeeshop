@extends('admin.layout.index')
@section('content')
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Đơn Hàng</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
      {{-- <div class="card-header">
        <i class="fas fa-table"></i>
      </div> --}}

      <div class="row card-body">
        <div class="form-group row col-md-8">
          <label class="control-label col-md-2" >Từ Ngày </label>
          <div class="col-md-5">
           <input type="text" name="name"  class="form-control daterange" autocomplete="off" />
         </div>
         <div class="col-md-1"><button id="action_fill" class="btn btn-success">Lọc</button></div>
       </div>
       <div class="form-group row col-md-2">
            <select class="form-control" name="" id="select_trangthai">
              <option value="">ALL</option>
            </select>
       </div>
       <div class="table-responsive">
        <table class="table table-bordered table-striped " id="data_table" width="100%" cellspacing="0">
         <thead>
          <tr>
            <th >MÃ</th>
            <th >NGÀY ĐẶT</th>
            <th >THÀNH TIỀN</th>
            <th >GHI CHÚ</th>
            <th >TRẠNG THÁI</th>
            <th >CẬP NHẬT</th>
            <th >Thao Tác
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
    <h4 class="modal-title"></h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>     
  </div>
  <div class="modal-body">
   <span id="form_result" style="color: green;"></span>
   <form id="sample_form" class="form-horizontal">
    {{csrf_field()}}
    <div class="form-group row">
      <div class="col-md-6 ngaydat">Ngày Đặt : </div>
      <div class="col-md-6 tongtien">Tổng Tiền :</div>
    </div>
    <div class="form-group row">
      <div class="col-md-12 diachi">Địa Chỉ :</div>
    </div>
    <div class="form-group row">
      <div class="col-md-12 sdt">SĐT Người Nhận :</div>
    </div>
    <div class="form-group row">
      <div class="col-md-12 ghichu">Ghi Chú :</div>
    </div>
    <div class="form-group row">
      <div class="col-md-12 makhuyenmai">Mã Khuyến Mãi :</div>
    </div>
    <div class="form-group row">
      <div class="col-md-12 trangthai">Trạng Thái :</div>
    </div>
    <div>
      <table class="table table-bordered table-striped ">
       <thead>
         <tr>
           <td>MÃ</td>
           <td>TÊN</td>
           <td>SL</td>
           <td>ĐƠN GIÁ</td>
         </tr>
       </thead>
       <tbody class="body_table_detail">

       </tbody>
     </table>
   </div>
   <br />
   <div class="form-group" align="center">
    <input type="hidden" name="action" id="action" />
    <input type="hidden" name="hidden_id" id="hidden_id" />
    <input type="submit" name="action_button" id="action_xuly" class="btn btn-warning" value="Xử Lý" />
    <input type="submit" name="action_button" id="action_huy" class="btn btn-warning" value="Hủy Đơn" />
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
        <h2 class="modal-title_confirm">Xác Nhận Hủy !</h2>
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
    var table= $('#data_table').DataTable({
      initComplete: function () {
        this.api().columns(4).every( function () {
          var column = this;
          var select = $('#select_trangthai')
          .appendTo('#select_trangthai')//headder hoặc footer
          .on( 'change', function () {
            var val = $.fn.dataTable.util.escapeRegex(
              $(this).val()
              );

            column
            .search( val ? '^'+val+'$' : '', true, false )
            .draw();
          } );

          column.data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+format_trangthai(d)+'</option>' )
          } );
        } );
      },
      "order":[1,'desc'],
      processing: true,
      serverSide: true,
      autoFill: true,
      // "ordering": false,
      // "info":     false
    //bStateSave: false,
    //"lengthChange": false, hiển thị số lượng dòng được hiển thị
    //"ordering": false,
    //"info":     false,
    ajax:{
     url: "admin/donhang/danh-sach",
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
    "render": function(data)
    {
      return  format_datetime(data);
    }
  },
  {
    data: 'thanhtien',
    name: 'thanhtien',
    autoWidth:true,
  },
  {
    data: 'ghichu',
    name: 'ghichu',
    autoWidth:true,
  },
  {
    data: 'trangthai',
    name: 'trangthai',
    orderable: false,
    autoWidth:true,
    "render":function(data)
    {
      return format_trangthai(data);
    }
  },
  {
    data: 'updated_at',
    name: 'updated_at',
    autoWidth:true,
  },
  {
    data: 'action',
    name: 'action',
    orderable: false,
    autoWidth:true,
  }
  ]
});
    $('.daterange').daterangepicker(
    {
      //singleDatePicker: true,
      //timePicker: true,
      autoUpdateInput: false,
      //startDate: moment(),
      endDate: moment().add(24, 'hour'),
      locale: {
        cancelLabel: 'Clear'
      }
    });
    $('.daterange').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
    });

    $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });
    // $.fn.dataTableExt.fnFilter.push(
    //   function( settings, data, dataIndex ) {
    //     date=$('.daterange').val();
    //     start_date= date.substr(0,10);
    //     end_date= date.substr(13,10);
    //     var datetime = data[1] ; // use data for the age column

    //     if ( (  start_date=='' && end_date=='' ) ||
    //       ( start_date=='' && datetime <= end_date ) ||
    //      ( start_date <= datetime   && end_date=='' ) ||
    //      ( start_date <= datetime   && datetime <= end_date ) )
    //     {
    //       return true;
    //     }
    //     return false;
    //   }
    //   );
    $('#action_fill').click(function(){
      table.draw();
    });
  });
</script>
<script>
  $(document).ready(function(){
    {{-- Start Submit --}}
    $('#sample_form').on('submit', function(event){
      event.preventDefault();
    });
    {{-- End Submit --}}
    {{-- Start  Get Edit --}}
    $(document).on('click', '.edit', function(event){
      event.preventDefault();
      var id = $(this).attr('id');
      $('#form_result').html('');
      $('.modal-title').text("Chi Tiết Đơn Hàng "+id);
      $('#formModal').modal('show');
      $('#action_xuly').attr('disabled',false);
      $('#action_huy').attr('disabled',false);
      $('#action_xuly').val('Xử Lý');
      $.ajax({
       url:"admin/donhang/chitiet/"+id,
       dataType:"json",
       success:function(chitiet){
        chiTietDonHang(chitiet);
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
    
    {{-- End Confirm Delete --}}
    {{-- Xủ lý đơn hàng --}}
    $('#action_xuly').click(function(){
      var value= $('#action_xuly').val();
      //alert(value);
      var trangthai =1;
      var id= $('#hidden_id').val();
      if(value=="Hoàn Thành")
      {
        var trangthai =2;
      }
      $.ajax({
       url:"admin/donhang/xuly/"+id+"/"+trangthai,
       success:function()
       {
        $('#form_result').text('Xử lý đơn hàng thành công!');
        $('#data_table').DataTable().ajax.reload();
        setTimeout(function(){
          $('#form_result').text('');
          $('#formModal').modal('hide');
        }, 2000);
      }
    })
    });
    {{--End xử lý đơn hàng --}}
    {{--Hủy đơn hàng --}}
    $('#action_huy').click(function(){
      var id= $('#hidden_id').val();
      var trangthai =3;
      $('#confirmModal').modal('show');
      $('#ok_button').click(function(){
        $.ajax({
         url:"admin/donhang/xuly/"+id+"/"+trangthai,
         success:function()
         {
          $('#confirmModal').modal('hide');
          $('#form_result').text('Hủy đơn hàng thành công!');
          setTimeout(function(){
            $('#form_result').text('');
            $('#data_table').DataTable().ajax.reload();
            $('#formModal').modal('hide');
          }, 2000);
        }
      })
      });
    });
    {{--End hủy đơn hàng --}}
    function chiTietDonHang(chitiet)
    { 
      var row='';
      $.each(chitiet,function(key,value){
        $.each(value,function(k,v){
          if(v.trangthai==1)//đơn hàng đã được xử lý
          {
            //$('#action_xuly').removeAttr('hide');
            $('#action_xuly').addClass('btn_width').val('Hoàn Thành');

          }
          if(v.trangthai==3 ||v.trangthai==2) //đơn hàng đã hoàn thành hoặc đã hủy
          {
            $('#action_xuly').attr('disabled',true);
            $('#action_huy').attr('disabled',true);
          }
          row+='<tr>'
          row+='<td>'+v.mamon+'</td>'
          row+='<td>'+v.tenmon+'</td>'
          row+='<td>'+v.soluong+'</td>'
          row+='<td>'+v.dongia+'</td>'
          row+='</tr>'
          var date=v.ngaydat;
          $('.ngaydat').text("Ngày Đặt : "+format_datetime(date));
          $('.tongtien').text("Tổng Tiền : "+format_number(v.thanhtien));
          $('.diachi').text("Địa Chỉ : "+v.diachi);
          $('.sdt').text("SĐT Người Nhận : "+v.sdt);
          v.ghichu=v.ghichu==null?"":v.ghichu;
          v.makhuyenmai=v.makhuyenmai==null?"":v.makhuyenmai;
          $('.ghichu').text("Ghi Chú : "+v.ghichu);
          $('.makhuyenmai').text("Mã Khuyến Mãi : "+v.makhuyenmai);
          $('.trangthai').text("Trạng Thái : "+format_trangthai(v.trangthai));
          $('#hidden_id').val(v.id);
        });
      });
      $('.body_table_detail').html(row);
    }
  });
</script>
<script>
</script>
@endsection
