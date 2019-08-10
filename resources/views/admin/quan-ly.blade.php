@extends('admin.layout.index')
@section('content')
<div id="content-wrapper">

 <div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="admin/quan-ly">Quản Lý</a>
    </li>
    <li class="breadcrumb-item active">Biểu Đồ</li>
  </ol>

  <!-- Area Chart Example-->
  <div class="card mb-3 col-md-12">
    <div class="card-header row ">
      <div class="col-md-8">
        <i class="fas fa-chart-area"></i>
        Thống Kê Đơn Hàng
      </div>
      <div class="form-group col-md-4">
        <select name="" id="select_chart" class="form-control">
          <option value="1">Tháng 1</option>
          <option value="2">Tháng 2</option>
          <option value="3">Tháng 3</option>
          <option value="4">Tháng 4</option>
          <option value="5">Tháng 5</option>
          <option value="6">Tháng 6</option>
          <option value="7">Tháng 7</option>
          <option value="8">Tháng 8</option>
          <option value="9">Tháng 9</option>
          <option value="10">Tháng 11</option>
          <option value="11">Tháng 12</option>
          <option value="12">Tháng 13</option>
        </select>
      </div>
    </div>
    <div id="AreaChart" class="card-body">
      <canvas id="myAreaChart" width="100%" height="30"></canvas>
    </div>
    <div class="card-footer small text-muted row">Cập nhật lúc {{date('H:i')}} Doanh thu &nbsp <strong id="doanhthu"></strong> </div>
  </div>
  <div class="card mb-3 col-md-12">
    <div class="card-header row ">
      <div class="col-md-8">
        <i class="fas fa-chart-area"></i>
        Thống Kê Đơn Hàng Trong Ngày
      </div>
    </div>
    <div id="AreaChart" class="card-body">
      <canvas id="myBillPerDayChart" width="100%" height="30"></canvas>
    </div>
    <div class="card-footer small text-muted row">Cập nhật lúc {{date('H:i')}} Tổng: &nbsp <strong id="countbill"></strong></div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-chart-bar"></i>
        Biểu Đồ Phân Loại Sản Phẩm</div>
        <div class="card-body">
          <canvas id="myBarChart" width="100%" height="50"></canvas>
        </div>
        <div class="card-footer small text-muted">Cập nhật lúc {{date('H:i')}}</div>
      </div>
    </div>
    <div class="col-lg-6" >
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-chart-pie"></i>
        Biểu Đồ Số Lượng Sản Phẩm Bán Ra</div>
        <div class="card-body">
          <canvas id="myPieChart" width="100%" height="100"></canvas>
        </div>
        <div class="card-footer small text-muted">Cập nhật lúc {{date('H:i')}}</div>
      </div>
    </div>
  </div>

  {{-- <p class="small text-center text-muted my-5">
    <em>More chart examples coming soon...</em>
  </p>
  --}}
</div>
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
<!-- /.content-wrapper -->
@endsection
@section('script')
<script>
  $(document).ready(function (){
   var date = new Date();
   date=date.getMonth()+1;
   $('#select_chart').val(date);
   getDataChart(date);
   getDayBillChart();
   function format_datechart(datetime)
   {
    var date=new Date(datetime);
    var day =date.getDate();
    var month =(date.getMonth()+1);
    day=day<10?"0"+day:day;
    month=month<10?"0"+month:month;
    return  day+"/"+month;
  }
  function getDataChart(date)
  {
    $.ajax({
      url:'admin/getDataChart/'+date,
      dataType:'json',
      success:function(data)
      {
        var arr_date=new Array();
        var arr_number=new Array();
        var arr_target=new Array();
        var arr_product=new Array();
        var max=0;
        var sumBill=0;
        var sumTaget=0;
        $.each(data.data,function(key,val){
          sumBill+=val.sl;
          if(max<val.sl)
          {
            max=val.sl;
          }
          arr_date.push(format_datechart(val.created_at));
          arr_number.push(val.sl);
        })
        $.each(data.doanhthu,function(k,v){
          if(max<v.doanhthu)
          {
            max=v.doanhthu;
          }
          sumTaget+=v.doanhthu;
          arr_target.push(v.doanhthu/10000);
        })
        $.each(data.sanpham,function(k1,v1){
          arr_product.push(v1.sanpham);
        })
        max=max/10000;
        var ctx = $('#myAreaChart');
        load_AreaChart(arr_date,arr_number,arr_target,arr_product,ctx,max);
        $('#doanhthu').text(format_number(sumTaget)+' / '+sumBill+' đơn hàng');
      }
    })
  }
  function getDayBillChart()
  {
    $.ajax({
      url:'admin/getDayBillChart',
      dataType:'json',
      success:function(data)
      {
        var arr_time=new Array();
        var arr_number=new Array();
        var sum=0;
        $.each(data.billday,function(key,val){
          sum+=val;
          arr_time.push(key);
          arr_number.push(val);
          
        })
        $('#countbill').text(format_number(sum));
        var ctx = $('#myBillPerDayChart');
        var myLineChart;
        myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
        labels: arr_time,//mảng 1 chiều trục hoành
        datasets: [{
          label: "Đơn Hàng",
          lineTension: 0.3,
          backgroundColor: "rgba(0, 0, 0, 0)",
           //backgroundColor: "rgba(2,117,216,0.2)",
           borderColor: "rgba(2,117,216,1)",
           pointRadius: 5,
           pointBackgroundColor: "rgba(2,117,216,1)",
           pointBorderColor: "rgba(2,117,216,1)",
           pointHoverRadius: 5,
           pointHoverBackgroundColor: "rgba(2,117,216,1)",
           pointHitRadius: 50,
           pointBorderWidth: 2,
          data: arr_number,//mảng 1 chiều trục tung
        },
        ],
      },
      options: {
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 6
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              //max: max,//số thông kê max
              maxTicksLimit: 5
            },
            gridLines: {
              color: "rgba(0, 0, 0, .125)",
            }
          }],
        },
        legend: {
          display: true
        }
      }
    });
      }
    })
  }
  function load_AreaChart(arr_date,arr_number,arr_target,arr_product,ctx,max)
  {
    var myLineChart;
    myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: arr_date,//mảng 1 chiều trục hoành
        datasets: [{
          label: "Đơn Hàng",
          lineTension: 0.3,
          backgroundColor: "rgba(0, 0, 0, 0)",
           //backgroundColor: "rgba(2,117,216,0.2)",
           borderColor: "rgba(2,117,216,1)",
           pointRadius: 5,
           pointBackgroundColor: "rgba(2,117,216,1)",
           pointBorderColor: "rgba(2,117,216,1)",
           pointHoverRadius: 5,
           pointHoverBackgroundColor: "rgba(2,117,216,1)",
           pointHitRadius: 50,
           pointBorderWidth: 2,
          data: arr_number,//mảng 1 chiều trục tung
        },
        {
          label: "Doanh Thu(*10 000vnd)",
          lineTension: 0.3,
          backgroundColor: "rgba(0, 0, 0, 0)",
          borderColor: "rgba(153, 102, 255, 1)",
          pointRadius: 5,
          pointBackgroundColor: "rgba(153, 102, 255, 1)",
          pointBorderColor: "rgba(153, 102, 255, 1)",
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(2,117,216,1)",
          pointHitRadius: 50,
          pointBorderWidth: 2,
          data: arr_target,//mảng 1 chiều trục tung doanh thu
        },
        {
          label: "Sản Phẩm",
          lineTension: 0.3,
          backgroundColor: "rgba(0, 0, 0, 0)",
          borderColor: "rgba(255, 159, 64, 0.2)",
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 159, 64, 0.2)",
          pointBorderColor: "rgba(255, 159, 64, 0.2)",
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(2,117,216,1)",
          pointHitRadius: 50,
          pointBorderWidth: 2,
          data: arr_product,//mảng 1 chiều trục tung sản phẩm
        },
        ],
      },
      options: {
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 6
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              //max: max,//số thông kê max
              maxTicksLimit: 5
            },
            gridLines: {
              color: "rgba(0, 0, 0, .125)",
            }
          }],
        },
        legend: {
          display: true
        }
      }
    });
  }
  $('#select_chart').change(function(){
    var date =$(this).val();
    $('#myAreaChart').remove();
    $('#AreaChart').append('<canvas id="myAreaChart" width="100%" height="30"></canvas>');
    getDataChart(date);
  });
  getDataBarChart();
  function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }
  function getDataBarChart()
  {
    $.ajax({
      url:'admin/getDataBarChart',
      dataType:'json',
      success:function(data)
      {
        var arr_type=new Array();
        var arr_number=new Array();
        var arr_color=new Array();
        var arr_colorbar=new Array();
        var arr_sl=new Array();
        var arr_typename=new Array();
        $.each(data.phanloai,function(key,val){
          arr_type.push(val.tenloai);
          arr_number.push(val.soluong);
          arr_colorbar.push(getRandomColor());
        })
        load_BarChart(arr_type,arr_number,arr_colorbar);
        $.each(data.banchay,function(k,v){
          arr_typename.push(v.tenmon);
          arr_color.push(getRandomColor());
          arr_sl.push(v.soluong);
        })
        load_pieChart(arr_typename,arr_sl,arr_color);
        //$('#doanhthu').text(format_number(sumTaget)+' / '+sumBill+' đơn hàng');
      }
    })
  }
  function load_BarChart(arr_type,arr_number,arr_colorbar)
  {
    var ctx = $('#myBarChart');
    var myLineChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: arr_type,
        datasets: [{
          label: "Số Lượng",
          backgroundColor: arr_colorbar,
          borderColor: "rgba(2,117,216,1)",
          data: arr_number,
        }],
      },
      options: {
        scales: {
          xAxes: [{
            time: {
              unit: 'month'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 6
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              //max: 15000,
              maxTicksLimit: 5
            },
            gridLines: {
              display: true
            }
          }],
        },
        legend: {
          display: false
        }
      }
    });
  }
  function load_pieChart(arr_type,arr_sl,arr_color)
  {
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: arr_type,
        datasets: [{
          data: arr_sl,
          backgroundColor: arr_color,
        }],
      },
    });
  }
});
</script>
@endsection