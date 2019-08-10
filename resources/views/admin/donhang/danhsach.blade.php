@extends('admin.layout.index')
@section('content')
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/quan-ly">Quản Lý</a>
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
      <div class="table-responsive" style="overflow-y: scroll; height: 480px;">
        <table class="table table-bordered table-striped" id="data_table" width="100%"  cellspacing="0">
         <thead>
          <tr>
            <th >MÃ</th>
            <th >NGÀY ĐẶT</th>
            <th >THÀNH TIỀN</th>
            <th >SHIP</th>
            <th >GHI CHÚ</th>
            <th >TRẠNG THÁI</th>
            <th >THANH TOÁN</th>
            <th >Thao Tác</th>
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
      <div class="col-md-7 ngaydat">Ngày Đặt : </div>
      <div class="col-md-5 tongtien">Tổng Tiền :</div>
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
      <div class="col-md-5 phi_ship">Phí Ship :</div>
      <div class="col-md-7 hinh_thuc">Thanh Toán :</div>
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
    <button name="action_print" id="" title="In" class="btn btn-warning"><a id="action_print" href="admin/printbill/1" class="fa fa-print"></a></button>
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
        this.api().columns(5).every( function () {
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
      dom: 'lBfrtip',
      buttons: [
      {
        extend: 'print',
        messageTop: 'Danh Sách Đơn Hàng',
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
      'columnsToggle'//show ra cac button ẩn/hiện cột
      //'colvis' //show ra button chọn cột muốn ẩn/hiện 
      ],
      select: true,
      "order":[1,'desc'],
      "iDisplayLength": 50,
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      //processing: true, // nếu render data thì tắt processing,serverside,autofill
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
    render:function(data)
    {
      return format_number(data);
    }
  },
  {
    data:'phi_giao_hang',
    name:'phi_giao_hang'
  },
  {
    data: 'ghichu',
    name: 'ghichu',
    autoWidth:true,
    visible:false,
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
    data: 'pay',
    name: 'pay',
    render:function(data)
    {
      if(data==1)
      {
        return "Online"
      }
      else
      {
        return "Tiền Mặt"
      }
    },
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
    // Start Filter
    $('#action_fill').click(function(){
      //table.destroy();
      var date=$('.daterange').val();
      if(date.length>1)
      {
        for(var i=0;i<=date.length;i++)
        {
          date= date.replace('/',"-");
        }
        var table= $('#data_table').DataTable({
          destroy: true,
          initComplete: function () {
            this.api().columns(5).every( function () {
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
          });
          column.data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+format_trangthai(d)+'</option>' )
          } );
        } );
          },
          dom: 'lBfrtip',
          buttons: ['excel',
          {
            extend: 'print',
            messageTop: 'Danh Sách Đơn Hàng',
            exportOptions: {
            columns: ':visible'
            }
          },
          'columnsToggle'//show ra cac button ẩn/hiện cột
            //'colvis' //show ra button chọn cột muốn ẩn/hiện 
          ],
          select: true,
          "iDisplayLength": 50,
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        //"order":[1,'desc'],
        processing: true,
        serverSide: true,
        //autoFill: true,
      // "ordering": false,
      // "info":     false
    //bStateSave: false,
    //"lengthChange": false, hiển thị số lượng dòng được hiển thị
    //"ordering": false,
    //"info":     false,
    ajax:{
     url: 'admin/donhang/filt/'+date,
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
    render:function(data)
    {
      return format_number(data);
    }
  },
  {
    data:'phi_giao_hang',
    name:'phi_giao_hang'
  },
  {
    data: 'ghichu',
    name: 'ghichu',
    autoWidth:true,
    visible:false,
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
    data: 'pay',
    name: 'pay',
    render:function(data)
    {
      if(data==1)
      {
        return "Online"
      }
      else
      {
        return "Tiền Mặt"
      }
    },
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
      }
    });
    // End Filter
  });
</script>
<script>
  $(document).ready(function(){
    $('#action_print').printPage();
    //$('.buttons-colvis span').text('Ẩn/Hiện');
    $('.daterange').daterangepicker({
        //timePicker24Hour: true,
        startDate: moment(),
        endDate: moment().startOf('hour').add(24, 'hour'),
        locale: {
          format: 'Y/MM/DD'
        }
      });
    $('.daterange').val('');
    $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
      $('.daterange').val('');
      window.location.reload();

    });
    {{-- Start Submit --}}
    $('#sample_form').on('submit', function(event){
      event.preventDefault();
    });
    {{-- End Submit --}}
    {{-- Start  Get Edit --}}
    $(document).on('click', '.edit', function(event){
      event.preventDefault();
      var id = $(this).attr('id');
      $('#action_print').attr('href','admin/printbill/'+id);
      $('#form_result').html('');
      $('.modal-title').text("Chi Tiết Đơn Hàng "+id);
      $('#formModal').modal('show');
      $('#action_xuly').show();
      $('#action_huy').show();
      //$('#action_huy').hide();
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
          if(v.pay==1)
          {
           $('#action_huy').hide();
         }
          if(v.trangthai==1)//đơn hàng đã được xử lý
          {
            //$('#action_xuly').removeAttr('hide');
            $('#action_xuly').addClass('btn_width').val('Hoàn Thành');

          }
          if(v.trangthai==3 ||v.trangthai==2) //đơn hàng đã hoàn thành hoặc đã hủy
          {
            $('#action_xuly').hide();
            $('#action_huy').hide();
          }
          row+='<tr>'
          row+='<td>'+v.mamon+'</td>'
          row+='<td>'+v.tenmon+'</td>'
          row+='<td>'+v.soluong+'</td>'
          row+='<td>'+format_number(v.dongia)+'</td>'
          row+='</tr>'
          var date=v.ngaydat;
          v.diachi=v.diachi==null?"":v.diachi;
          v.sdt=v.sdt==null?"":v.sdt;
          v.phi_giao_hang=v.phi_giao_hang==null?"":v.phi_giao_hang;
          v.pay=v.pay==1?"VN Pay":"Tiền Mặt";
          $('.ngaydat').text("Ngày : "+format_datetime(date));
          $('.tongtien').text("Tổng Tiền : "+format_number(v.thanhtien));
          $('.diachi').text("Địa Chỉ : "+v.diachi);
          $('.sdt').text("SĐT Người Nhận : "+v.sdt);
          v.ghichu=v.ghichu==null?"":v.ghichu;
          v.makhuyenmai=v.makhuyenmai==null?"":v.makhuyenmai;
          $('.ghichu').text("Ghi Chú : "+v.ghichu);
          $('.makhuyenmai').text("Mã Khuyến Mãi : "+v.makhuyenmai);
          $('.phi_ship').text("Phí Ship : "+v.phi_giao_hang);
          $('.hinh_thuc').text("Thanh Toán : "+v.pay);
          $('.trangthai').text("Trạng Thái : "+format_trangthai(v.trangthai));
          $('#hidden_id').val(v.id);
        });
      });
      $('.body_table_detail').html(row);
    }
    {{-- Start Confirm Delete --}}
    $('#ok_button').click(function(){
      $.ajax({
        url:"admin/donhang/destroy/"+id,
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
</script>
@endsection
