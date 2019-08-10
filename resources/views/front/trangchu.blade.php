@extends('master')
@section('content')
@include('slide')
{{-- <div class="banner-area row-col-decrease pt-100 pb-75 clearfix">
	<div class="container">
		<div class="banner-left-side mb-20">
			<div class="single-banner">
				<div class="hover-style">
					<a href="#"><img src="assets/img/banner/banner-1.jpg" alt=""></a>
				</div>
			</div>
		</div>
		<div class="banner-right-side mb-20">
			<div class="single-banner mb-20">
				<div class="hover-style">
					<a href="#"><img src="assets/img/banner/banner-2.jpg" alt=""></a>
				</div>
			</div>
			<div class="single-banner">
				<div class="hover-style">
					<a href="#"><img src="assets/img/banner/banner-3.jpg" alt=""></a>
				</div>
			</div>
		</div>
	</div>
</div> --}}
{{-- <div class="product-area pb-70">
	<div class="custom-container">
		<div class="product-tab-list-wrap text-center mb-40">
			<div class="product-tab-list nav">
				<a class="active" href="#tab1" data-toggle="tab">
					<h4>All </h4>
				</a>
				<a href="#tab2" data-toggle="tab">
					<h4>Food </h4>
				</a>
				<a href="#tab3" data-toggle="tab">
					<h4> Drink </h4>
				</a>
			</div>
		</div>
		<div class="tab-content jump">
			<div id="tab1" class="tab-pane active"> --}}
				{{-- <div id="show_mon" class="row">
					@foreach($mon as $sp)
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
							<div class="product-img">
								<a href="" class="detail" id="{{$sp->id}}">
									<img alt="" src="hinhanh/upload/{{$sp->hinhanh}}" >
								</a>
								<div class="product-action" >
									<div class="pro-action-left">
										<a href="" title="Chọn Mua " class="addToCart_byOne" id="{{$sp->id}}"><i class="ion-android-cart"></i> Chọn Mua</a>
									</div>
									<div class="pro-action-right"> --}}
										{{-- <a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a> --}}
									{{-- 	<a title="Chi Tiết" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
										<a href="san-pham/chi-tiet/{{$sp->id}}" title="Chi Tiết" class="" id="{{$sp->id}}" href="#"><i class="ion-android-open"></i></a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h4>
									<a >{{$sp->tenmon}}</a>
								</h4>
								<div class="product-price-wrapper">
									<span>{{$sp->dongia}}</span> --}}
									{{-- <span class="product-price-old">{{$dt->dongia}} </span> --}}
								{{-- </div>
							</div>
						</div>
					</div>
					@endforeach
				</div> --}}
			{{-- </div>
			<div id="tab2" class="tab-pane">
				<div class="row"> --}}
					{{-- <div class="custom-col-5">
						<div class="product-wrapper mb-25">
							<div class="product-img">
								<a href="product-details.html">
									<img src="assets/img/product/product-10.jpg" alt="">
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
						</div>
					</div> --}}
				{{-- </div>
			</div>
			<div id="tab3" class="tab-pane">
				<div class="row"> --}}
					{{-- <div class="custom-col-5">
						<div class="product-wrapper mb-25">
							<div class="product-img">
								<a href="product-details.html">
									<img src="assets/img/product/product-5.jpg" alt="">
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
						</div>
					</div> --}}
			{{-- 	</div>
			</div>
		</div> --}}
		{{-- <div style="float: right;">{{$mon->links()}}</div> --}}
{{-- 	</div>
</div> --}}
{{-- <div class="banner-area">
	<div class="container">
		<div class="discount-overlay bg-img pt-130 pb-130" style="background-image:url(assets/img/banner/banner-4.jpg);">
			<div class="discount-content text-center">
				<h3>It’s Time To Start <br>Your Own Revolution By Laurent</h3>
				<p>Exclusive Offer -10% Off This Week</p>
				<div class="banner-btn">
					<a href="#">Order Now</a>
				</div>
			</div>
		</div>
	</div>
</div> --}}
<div class="best-food-area pt-100 pb-95">
	<div class="custom-container">
		<div class="row">
			<div class="best-food-width-1">
				<div class="single-banner">
					<div class="hover-style">
						<a href="#"><img src="assets/img/slider/banner_web_007fa9c13b95415cbcb983f497a5b20c_master.jpg" alt="" style="min-height: 290px;"></a>
					</div>
				</div>
			</div>
			<div class="best-food-width-2">
				<div class="product-top-bar section-border mb-25">
					<div class="section-title-wrap">
						<h3 class="section-title section-bg-white">Sản Phẩm Nổi Bật</h3>
					</div>
					<div class="product-tab-list-2 nav section-bg-white">
						{{-- <a class="active" href="san-pham" data-toggle="tab">
							<h4>All </h4>
						</a>
						<a data-toggle="tab">
							<h4>Food </h4>
						</a>
						<a  data-toggle="tab">
							<h4> Drink </h4>
						</a> --}}
					</div>
				</div>
				<div class="tab-content jump">
					<div id="tab4" class="tab-pane active">
						<div class="product-slider-active owl-carousel product-nav">
							@foreach($mon as $sp)
							<div class="product-wrapper">
								<div class="product-img">
									<a href="" class="detail" id="{{$sp->id}}">
										<img src="hinhanh/upload/{{$sp->hinhanh}}" style="height: 178px;" alt="">
									</a>
									<div class="product-action">
										<div class="pro-action-left">
											<a title="Chọn Mua" href="" class="addToCart_byOne" id="{{$sp->id}}"><i class="ion-android-cart"></i> Chọn Mua</a>
										</div>
										<div class="pro-action-right">
											<a href="san-pham/chi-tiet/{{$sp->id}}" title="Chi Tiết" class="" id="{{$sp->id}}"><i class="ion-android-open"></i></a>
										</div>
									</div>
								</div>
								<div class="product-content">
									<h4>
										<a href="san-pham/chi-tiet/{{$sp->id}}">{{$sp->tenmon}}</a>
									</h4>
									<div class="product-price-wrapper">
										<span>{{$sp->dongia}}</span>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div id="tab5" class="tab-pane">
						<div class="product-slider-active owl-carousel product-nav">

							<div class="product-wrapper">
								<div class="product-img">
									<a href="product-details.html">
										<img src="assets/img/product/product-5.jpg" alt="">
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
							</div>
							<div class="product-wrapper">
								<div class="product-img">
									<a href="product-details.html">
										<img src="assets/img/product/product-6.jpg" alt="">
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
										<span>$90.00</span>
										<span class="product-price-old">$100.00 </span>
									</div>
								</div>
							</div>
							<div class="product-wrapper">
								<div class="product-img">
									<a href="product-details.html">
										<img src="assets/img/product/product-8.jpg" alt="">
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
						</div>
					</div>
					<div id="tab6" class="tab-pane">
						<div class="product-slider-active owl-carousel product-nav">
							<div class="product-wrapper">
								<div class="product-img">
									<a href="product-details.html">
										<img src="assets/img/product/product-9.jpg" alt="">
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
							</div>
							<div class="product-wrapper">
								<div class="product-img">
									<a href="product-details.html">
										<img src="assets/img/product/product-10.jpg" alt="">
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
							</div>
							<div class="product-wrapper">
								<div class="product-img">
									<a href="product-details.html">
										<img src="assets/img/product/product-1.jpg" alt="">
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
										<span>$50.00</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="best-food-width-1 mrg-small-35">
				<div class="single-banner">
					<div class="hover-style">
						<a href="#"><img src="assets/img/slider/800x400_kv_83f1030bb97a4e15921a31d595404e82_master.jpg" alt="" style="min-height: 290px"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="brand-logo-area pb-100">
	<div class="container">
		<div class="brand-logo-active owl-carousel">
			<div class="single-brand-logo">
				<img alt="" src="assets/img/brand-logo/logo-1.png">
			</div>
			<div class="single-brand-logo">
				<img alt="" src="assets/img/brand-logo/logo-2.png">
			</div>
			<div class="single-brand-logo">
				<img alt="" src="assets/img/brand-logo/logo-3.png">
			</div>
			<div class="single-brand-logo">
				<img alt="" src="assets/img/brand-logo/logo-4.png">
			</div>
			<div class="single-brand-logo">
				<img alt="" src="assets/img/brand-logo/logo-5.png">
			</div>
			<div class="single-brand-logo">
				<img alt="" src="assets/img/brand-logo/logo-2.png">
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){
	})
</script>
@endsection
