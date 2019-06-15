{{-- <!DOCTYPE html>
<html>
<head>
    <title>Multiple data send</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
    </script>
</head>
<body>
    <div class="container">
       <br>
       @if(Session::has('success'))
       <div class="alert alert-success">
           {{Session::get('success')}}
       </div>
       @endif
       <form action="/orders" method="POST">
           {{csrf_field()}}
           <section>
               <div class="panel panel-header">

                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <input type="text" name="customer_name" class="form-control" placeholder="Please enter your name">
                           </div></div>
                           <div class="col-md-6">
                               <div class="form-group">
                                   <input type="text" name="customer_address" class="form-control" placeholder="Please enter your Address">
                               </div></div>

                           </div></div>
                           <div class="panel panel-footer" >
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>
                                           <th>Product Name</th>
                                           <th>Brand</th>
                                           <th>Quantity</th>
                                           <th>Budget</th>
                                           <th>Amount</th>
                                           <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr>
                                           <td><input type="text" name="product_name[]" class="form-control" required=""></td>
                                           <td><input type="text" name="brand[]" class="form-control"></td>    
                                           <td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>
                                           <td><input type="text" name="budget[]" class="form-control budget"></td>
                                           <td><input type="text" name="amount[]" class="form-control amount"></td>
                                           <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                                       </tr>
                                   </tr>
                               </tbody>
                               <tfoot>
                                   <tr>
                                       <td style="border: none"></td>
                                       <td style="border: none"></td>
                                       <td style="border: none"></td>
                                       <td>Total</td>
                                       <td><b class="total"></b> </td>
                                       <td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                                   </tr>
                               </tfoot>
                           </table>
                       </div>
                   </section>
               </form>
           </div>
           <script type="text/javascript">
            $('tbody').delegate('.quantity,.budget','keyup',function(){
                var tr=$(this).parent().parent();
                var quantity=tr.find('.quantity').val();
                var budget=tr.find('.budget').val();
                var amount=(quantity*budget);
                tr.find('.amount').val(amount);
                total();
            });
            function total(){
                var total=0;
                $('.amount').each(function(i,e){
                    var amount=$(this).val()-0;
                    total +=amount;
                });
                $('.total').html(total+".00 tk");    
            }
            $('.addRow').on('click',function(){
                addRow();
            });
            function addRow()
            {
                var tr='<tr>'+
                '<td><input type="text" name="product_name[]" class="form-control" required=""></td>'+
                '<td><input type="text" name="brand[]" class="form-control"></td>'+
                '<td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>'+
                '<td><input type="text" name="budget[]" class="form-control budget"></td>'+
                ' <td><input type="text" name="amount[]" class="form-control amount"></td>'+
                '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
                '</tr>';
                $('tbody').append(tr);
            };
            $('.remove').live('click',function(){
                // var last=$('tbody tr').length;
                // if(last==1){
                //     alert("you can not remove last row");
                // }
                // else{
                   $(this).parent().parent().remove();
               //}

           });
       </script>
   </body>
   </html>  --}}
   <html>
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">    
     <br />
     <h3 align="center">Dynamically Add / Remove input fields in Laravel 5.8 using Ajax jQuery</h3>
     <br />
     <div class="table-responsive">
      <form method="post" id="dynamic_form">
       <span id="result"></span>
       <table class="table table-bordered table-striped" id="user_table">
         <thead>
          <tr>
            <th width="35%">First Name</th>
            <th width="35%">Last Name</th>
            <th width="30%">Action</th>
          </tr>
        </thead>
        <tbody id="dynamic">
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2" align="right">&nbsp;</td>
            <td>
              @csrf
              <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
            </td>
          </tr>
        </tfoot>
      </table>
    </form>
  </div>
</div>
</body>
</html>

<script>
  $(document).ready(function(){

   var count = 1;

   dynamic_field(count);

   function dynamic_field(number)
   {
    html = '<tr>';
    html += '<td><input type="text" name="first_name[]" class="form-control" /></td>';
    html += '<td><input type="text" name="last_name[]" class="form-control" /></td>';
    if(number > 1)
    {
      html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
      $('#dynamic').append(html);
    }
    else
    {   
      html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
      $('#dynamic').html(html);
    }
  }

  $(document).on('click', '#add', function(){
    count++;
    dynamic_field(count);
  });

  $(document).on('click', '.remove', function(){
    count--;
    $(this).closest("tr").remove();
  });

  $('#dynamic_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:'',
      method:'post',
      data:$(this).serialize(),
      dataType:'json',
      beforeSend:function(){
        $('#save').attr('disabled','disabled');
      },
      success:function(data)
      {
        if(data.error)
        {
          var error_html = '';
          for(var count = 0; count < data.error.length; count++)
          {
            error_html += '<p>'+data.error[count]+'</p>';
          }
          $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
        }
        else
        {
          dynamic_field(1);
          $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
        }
        $('#save').attr('disabled', false);
      }
    })
  });

});
</script>