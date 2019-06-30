function load_mini_cart()
		{
			@if(Session::has('cart'))
			var html='<ul>'
			@foreach($product_cart as $cart)
			+'<li class="single-shopping-cart">'
			+'<div class="shopping-cart-img">'
			+'<a><img style="height: 80px; width: 80px" alt="" src="hinhanh/upload/{{$cart['item']['hinhanh']}}"></a>'
			+'</div>'
			+'<div class="shopping-cart-title">'
			+'<h4><a href="#">{{$cart['item']['tenmon']}} </a></h4>'
			+'<h6>Qty: {{$cart['qty']}}</h6>'
			+'<span>{{ number_format($cart['qty'] *$cart['item']['dongia'])}}</span>'
			+'</div>'
			+'<div class="shopping-cart-delete">'
			+'<a class="" id="{{$cart['item']['id']}}"><i class="ion ion-close"></i></a>'
			+'</div>'
			+'</li>'
			@endforeach
			+'</ul>'
			+'<div class="shopping-cart-total">'
			{{-- <h4>Shipping : <span>$20.00</span></h4> --}}
			+'<h4>Tổng tiền : <span class="shop-total">{{Session('cart')->totalPrice}}</span></h4>'
			+'</div>'
			+'<div class="shopping-cart-btn">'
			+'<a href="cart-page.html">Xem Giỏ Hàng</a>'
			+'<a href="checkout.html">Thanh Toán</a>'
			+'</div>'
			@else
			html='<div class="shopping-cart-content">'
			+'<div class="shopping-cart-btn">'
			+'<a >Giỏ Hàng Rỗng</a>'
			+'</div>'
			+'</div>'
			@endif
			$('#mini_cart').html(html);
		}
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