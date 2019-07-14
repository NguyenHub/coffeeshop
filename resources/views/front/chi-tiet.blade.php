@extends('master')
@section('content')
<div class="breadcrumb-area gray-bg">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="index">Trang Chủ</a></li>
				<li class="active">Chi Tiết Sản Phẩm</li>
			</ul>
		</div>
	</div>
</div>
<div class="product-details pt-100 pb-90">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="product-details-img">
					<img class="zoompro" src="hinhanh/upload/{{$data->hinhanh}}" data-zoom-image="hinhanh/upload/{{$data->hinhanh}}" alt="{{$data->hinhanh}}"/>
					{{-- <div id="gallery" class="mt-20 product-dec-slider owl-carousel">
						<a data-image="assets/img/product-details/product-detalis-l1.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl1.jpg">
							<img src="assets/img/product-details/product-detalis-s1.jpg" alt="">
						</a>
						<a data-image="assets/img/product-details/product-detalis-l2.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl2.jpg">
							<img src="assets/img/product-details/product-detalis-s2.jpg" alt="">
						</a>
						<a data-image="assets/img/product-details/product-detalis-l3.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl3.jpg">
							<img src="assets/img/product-details/product-detalis-s3.jpg" alt="">
						</a>
						<a data-image="assets/img/product-details/product-detalis-l4.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl4.jpg">
							<img src="assets/img/product-details/product-detalis-s4.jpg" alt="">
						</a>
						<a data-image="assets/img/product-details/product-detalis-l5.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl5.jpg">
							<img src="assets/img/product-details/product-detalis-s5.jpg" alt="">
						</a>
						<a data-image="assets/img/product-details/product-detalis-l2.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl2.jpg">
							<img src="assets/img/product-details/product-detalis-s2.jpg" alt="">
						</a>
					</div> --}}
					{{-- <span>-29%</span> --}}
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="product-details-content">
					<h3>{{$data->tenmon}}</h3>
					<div class="rating-review">
						{{-- <div class="pro-dec-rating">
							<i class="ion-android-star-outline theme-star"></i>
							<i class="ion-android-star-outline theme-star"></i>
							<i class="ion-android-star-outline theme-star"></i>
							<i class="ion-android-star-outline theme-star"></i>
							<i class="ion-android-star-outline"></i>
						</div>
						<div class="pro-dec-review">
							<ul>
								<li>32 Reviews </li>
								<li> Add Your Reviews</li>
							</ul>
						</div> --}}
					</div>
					<span>{{number_format($data->dongia)}} vnđ</span>
					{{-- <div class="in-stock">
						<p>Available: <span>In stock</span></p>
					</div> --}}
					{{-- <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. </p> --}}
					{{-- <div class="pro-dec-feature">
						<ul>
							<li><input type="checkbox"> Chicken Popeyes: <span>  $4.99</span></li>
							<li><input type="checkbox"> Organic Smoothie : <span> $9.99</span></li>
							<li><input type="checkbox"> Beef Burger With Extra Cheese: <span> Red  $16.99</span></li>
							<li><input type="checkbox"> Fries McDonald's: <span>$14.99</span></li>
						</ul>
					</div> --}}

					<div class="pro-details-cart-wrap">
						<div class="shop-list-cart-wishlist">
							<a title="Thêm Vào Giỏ Hàng" href="" class="addToCart2" id="{{$data->id}}">
								<i class="ion-android-cart"></i>
							</a>
							{{-- <a title="Wishlist" href="#">
								<i class="ion-ios-heart-outline"></i>
							</a> --}}
						</div>
						<div class="product-quantity">
							<div class="cart-plus-minus">
								<input id="" class="cart-plus-minus-box soluong" type="text" name="qtybutton">
							</div>
						</div>
					</div>
					<span id="result_addTocart2"><i class="fa fa-check"></i> Đã thêm vào giỏ hàng</span>
					{{-- <div class="pro-dec-categories">
						<ul>
							<li class="categories-title">Categories:</li>
							<li><a href="#">Fast Foods,</a></li>
							<li><a href="#"> Rich Foods, </a></li>
							<li><a href="#">Custom Orders,</a></li>
							<li><a href="#">Home Decor,</a></li>
							<li><a href="#">Weddings, </a></li>
						</ul>
					</div> --}}
					{{-- <div class="pro-dec-categories">
						<ul>
							<li class="categories-title">Tags: </li>
							<li><a href="#"> Cheesy,</a></li>
							<li><a href="#"> Fast Food, </a></li>
							<li><a href="#"> French Fries,</a></li>
							<li><a href="#"> Hamburger,</a></li>
							<li><a href="#"> Pizza </a></li>
						</ul>
					</div> --}}
					<div class="pro-dec-social">
						{!!$data->mota!!}
						{{-- <ul>
							<li><a class="tweet" href="#"><i class="ion-social-twitter"></i> Tweet</a></li>
							<li><a class="share" href="#"><i class="ion-social-facebook"></i> Share</a></li>
							<li><a class="google" href="#"><i class="ion-social-googleplus-outline"></i> Google+</a></li>
							<li><a class="pinterest" href="#"><i class="ion-social-pinterest"></i> Pinterest</a></li>
						</ul> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- <div class="description-review-area pb-100">
	<div class="container">
		<div class="description-review-wrapper">
			<div class="description-review-topbar nav text-center">
				<a class="active" data-toggle="tab" href="#des-details1">Description</a>
				<a data-toggle="tab" href="#des-details2">Tags</a>
				<a data-toggle="tab" href="#des-details3">Review</a>
			</div>
			<div class="tab-content description-review-bottom">
				<div id="des-details1" class="tab-pane active">
					<div class="product-description-wrapper">
						<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. </p>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
						<ul>
							<li>-  Typi non habent claritatem insitam</li>
							<li>-  Est usus legentis in iis qui facit eorum claritatem. </li>
							<li>-  Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</li>
							<li>-  Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</li>
						</ul>
					</div>
				</div>
				<div id="des-details2" class="tab-pane">
					<div class="product-anotherinfo-wrapper">
						<ul>
							<li><span>Tags:</span></li>
							<li><a href="#"> All,</a></li>
							<li><a href="#"> Cheesy,</a></li>
							<li><a href="#"> Fast Food,</a></li>
							<li><a href="#"> French Fries,</a></li>
							<li><a href="#"> Hamburger,</a></li>
							<li><a href="#"> Pizza</a></li>
						</ul>
					</div>
				</div>
				<div id="des-details3" class="tab-pane">
					<div class="rattings-wrapper">
						<div class="sin-rattings">
							<div class="star-author-all">
								<div class="ratting-star f-left">
									<i class="ion-star theme-color"></i>
									<i class="ion-star theme-color"></i>
									<i class="ion-star theme-color"></i>
									<i class="ion-star theme-color"></i>
									<i class="ion-star theme-color"></i>
									<span>(5)</span>
								</div>
								<div class="ratting-author f-right">
									<h3>tayeb rayed</h3>
									<span>12:24</span>
									<span>9 March 2018</span>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
						</div>
						<div class="sin-rattings">
							<div class="star-author-all">
								<div class="ratting-star f-left">
									<i class="ion-star theme-color"></i>
									<i class="ion-star theme-color"></i>
									<i class="ion-star theme-color"></i>
									<i class="ion-star theme-color"></i>
									<i class="ion-star theme-color"></i>
									<span>(5)</span>
								</div>
								<div class="ratting-author f-right">
									<h3>farhana shuvo</h3>
									<span>12:24</span>
									<span>9 March 2018</span>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
						</div>
					</div>
					<div class="ratting-form-wrapper">
						<h3>Add your Comments :</h3>
						<div class="ratting-form">
							<form action="#">
								<div class="star-box">
									<h2>Rating:</h2>
									<div class="ratting-star">
										<i class="ion-star theme-color"></i>
										<i class="ion-star theme-color"></i>
										<i class="ion-star theme-color"></i>
										<i class="ion-star theme-color"></i>
										<i class="ion-star"></i>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="rating-form-style mb-20">
											<input placeholder="Name" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="rating-form-style mb-20">
											<input placeholder="Email" type="text">
										</div>
									</div>
									<div class="col-md-12">
										<div class="rating-form-style form-submit">
											<textarea name="message" placeholder="Message"></textarea>
											<input type="submit" value="add review">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> --}}
<div class="product-area pb-95">
	<div class="container">
		<div class="product-top-bar section-border mb-25">
			<div class="section-title-wrap">
				<h3 class="section-title section-bg-white">Sản Phẩm Liên Quan</h3>
			</div>
		</div>
		<div class="related-product-active owl-carousel product-nav">
			@foreach($data_relative as $dt)
			<div class="product-wrapper">
				<div class="product-img">
					<a href="" class="detail" id="{{$dt->id}}">
						<img style="min-width: 270px;min-height: 270px;" src="hinhanh/upload/{{$dt->hinhanh}}" alt="{{$dt->hinhanh}}">
					</a>
					<div class="product-action">
						<div class="pro-action-left">
							<a title="Chọn Mua" class="addToCart_byOne" id="{{$dt->id}}" href=""><i class="ion-android-cart"></i> Chọn Mua</a>
						</div>
						<div class="pro-action-right">
							{{-- <a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a> --}}
							<a title="Chi Tiết"  href="san-pham/chi-tiet/{{$dt->id}}"><i class="ion-android-open"></i></a>
						</div>
					</div>
				</div>
				<div class="product-content">
					<h4>
						<a href="san-pham/chi-tiet/{{$dt->id}}">{{$dt->tenmon}}</a>
					</h4>
					<div class="product-price-wrapper">
						<span>{{number_format($dt->dongia)}}</span>
						{{-- <span class="product-price-old">{{$dt->dongia}}</span> --}}
					</div>
				</div>
			</div>
			@endforeach
			{{-- <div class="product-wrapper">
				<div class="product-img">
					<a href="product-details.html">
						<img src="assets/img/product/product-2.jpg" alt="">
					</a>
					<div class="product-action">
						<div class="pro-action-left">
							<a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
						</div>
						<div class="pro-action-right">
							<a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a>
							<a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
						</div>
					</div>
				</div>
				<div class="product-content">
					<h4>
						<a href="product-details.html">PRODUCTS NAME HERE </a>
					</h4>
					<div class="product-price-wrapper">
						<span>$200.00</span>
					</div>
				</div>
			</div> --}}
			{{-- <div class="product-wrapper">
				<div class="product-img">
					<a href="product-details.html">
						<img src="assets/img/product/product-3.jpg" alt="">
					</a>
					<div class="product-action">
						<div class="pro-action-left">
							<a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
						</div>
						<div class="pro-action-right">
							<a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a>
							<a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
						</div>
					</div>
				</div>
				<div class="product-content">
					<h4>
						<a href="product-details.html">PRODUCTS NAME HERE </a>
					</h4>
					<div class="product-price-wrapper">
						<span>$90.00</span>
						<span class="product-price-old">$100.00 </span>
					</div>
				</div>
			</div>
			<div class="product-wrapper">
				<div class="product-img">
					<a href="product-details.html">
						<img src="assets/img/product/product-4.jpg" alt="">
					</a>
					<div class="product-action">
						<div class="pro-action-left">
							<a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
						</div>
						<div class="pro-action-right">
							<a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a>
							<a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
						</div>
					</div>
				</div>
				<div class="product-content">
					<h4>
						<a href="product-details.html">PRODUCTS NAME HERE </a>
					</h4>
					<div class="product-price-wrapper">
						<span>$50.00</span>
					</div>
				</div>
			</div>
			<div class="product-wrapper">
				<div class="product-img">
					<a href="product-details.html">
						<img src="assets/img/product/product-7.jpg" alt="">
					</a>
					<div class="product-action">
						<div class="pro-action-left">
							<a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
						</div>
						<div class="pro-action-right">
							<a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a>
							<a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
						</div>
					</div>
				</div>
				<div class="product-content">
					<h4>
						<a href="product-details.html">PRODUCTS NAME HERE </a>
					</h4>
					<div class="product-price-wrapper">
						<span>$100.00</span>
						<span class="product-price-old">$120.00 </span>
					</div>
				</div>
			</div> --}}
		</div>
	</div>
</div>
{{-- <div class="footer-area black-bg-2 pt-70">
	<div class="footer-top-area pb-18">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="footer-about mb-40">
						<div class="footer-logo">
							<a href="index.html">
								<img src="assets/img/logo/footer-logo.png" alt="">
							</a>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
						<div class="payment-img">
							<a href="#">
								<img src="assets/img/icon-img/payment.png" alt="">
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="footer-widget mb-40">
						<div class="footer-title mb-22">
							<h4>Information</h4>
						</div>
						<div class="footer-content">
							<ul>
								<li><a href="about-us.html">About Us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Customer Service</a></li>
								<li><a href="#">Return Policy</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="footer-widget mb-40">
						<div class="footer-title mb-22">
							<h4>My Account</h4>
						</div>
						<div class="footer-content">
							<ul>
								<li><a href="my-account.html">My Account</a></li>
								<li><a href="#">Order History</a></li>
								<li><a href="wishlist.html">Wish List</a></li>
								<li><a href="#">Newsletter</a></li>
								<li><a href="#">Order History</a></li>
								<li><a href="#">International Orders</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="footer-widget mb-40">
						<div class="footer-title mb-22">
							<h4>Get in touch</h4>
						</div>
						<div class="footer-contact">
							<ul>
								<li>Address: 123 Main Street, Anytown, CA 12345 - USA.</li>
								<li>Telephone Enquiry: (012) 800 456 789-987 </li>
								<li>Email: <a href="#">Info@example.com</a></li>
							</ul>
						</div>
						<div class="mt-35 footer-title mb-22">
							<h4>Get in touch</h4>
						</div>
						<div class="footer-time">
							<ul>
								<li>Open:  <span>8:00 AM</span> - Close: <span>18:00 PM</span></li>
								<li>Saturday - Sunday: <span>Close</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom-area border-top-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-7">
					<div class="copyright">
						<p>Copyright © <a href="#">Fudink.</a> . All Right Reserved.</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-5">
					<div class="footer-social">
						<ul>
							<li><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-rss"></i></a></li>
							<li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-5 col-sm-5 col-xs-12">
						<!-- Thumbnail Large Image start -->
						<div class="tab-content">
							<div id="pro-1" class="tab-pane fade show active">
								<img src="assets/img/product-details/product-detalis-l1.jpg" alt="">
							</div>
							<div id="pro-2" class="tab-pane fade">
								<img src="assets/img/product-details/product-detalis-l2.jpg" alt="">
							</div>
							<div id="pro-3" class="tab-pane fade">
								<img src="assets/img/product-details/product-detalis-l3.jpg" alt="">
							</div>
							<div id="pro-4" class="tab-pane fade">
								<img src="assets/img/product-details/product-detalis-l4.jpg" alt="">
							</div>
						</div>
						<!-- Thumbnail Large Image End -->
						<!-- Thumbnail Image End -->
						<div class="product-thumbnail">
							<div class="thumb-menu owl-carousel nav nav-style" role="tablist">
								<a class="active" data-toggle="tab" href="#pro-1"><img src="assets/img/product-details/product-detalis-s1.jpg" alt=""></a>
								<a data-toggle="tab" href="#pro-2"><img src="assets/img/product-details/product-detalis-s2.jpg" alt=""></a>
								<a data-toggle="tab" href="#pro-3"><img src="assets/img/product-details/product-detalis-s3.jpg" alt=""></a>
								<a data-toggle="tab" href="#pro-4"><img src="assets/img/product-details/product-detalis-s4.jpg" alt=""></a>
							</div>
						</div>
						<!-- Thumbnail image end -->
					</div>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="modal-pro-content">
							<h3>PRODUCTS NAME HERE </h3>
							<div class="product-price-wrapper">
								<span>$120.00</span>
								<span class="product-price-old">$162.00 </span>
							</div>
							<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p>	
							<div class="quick-view-select">
								<div class="select-option-part">
									<label>Size*</label>
									<select class="select">
										<option value="">S</option>
										<option value="">M</option>
										<option value="">L</option>
									</select>
								</div>
								<div class="quickview-color-wrap">
									<label>Color*</label>
									<div class="quickview-color">
										<ul>
											<li class="blue">b</li>
											<li class="red">r</li>
											<li class="pink">p</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="product-quantity">
								<div class="cart-plus-minus">
									<input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
								</div>
								<button>Add to cart</button>
							</div>
							<span><i class="fa fa-check"></i> In stock</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal end --> --}}
@endsection
@section('script')
<script>
	$(document).ready(function(){
		$('.soluong').val(1);
		$('#result_addTocart2').attr('hidden',true);
		//thêm vào giỏ hàng với số lượng tùy chọn
		$(document).on('click','.addToCart2',function(event){
			event.preventDefault();
			//var sl= $('.soluong').val();
			//alert(sl);
            //nếu giảm số lượng <1 thì lấy bằng 1
            $('.dec').click(function(){
            	if($('.soluong').val()<1)
            	{
            		$('.soluong').val(1);
            	}
            });
            var id=$(this).attr('id');
            var sl=$('.soluong').val();
            $.ajax({
            	url:"add-to-cart/"+id+"/"+sl,
            	dataType:"json",
            	success:function(cart)
            	{

            		load_mini_cart(cart.cart);
            	}
            })
            $('#result_addTocart2').removeAttr('hidden');
            setTimeout(function(){
            	$('#result_addTocart2').attr('hidden',true);
            }, 1000);
        });
	});
</script>
@endsection