@extends('master')
@section('content')
{{-- @include('slide') --}}
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
<div class="product-area pb-70">
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
{{-- 			<p>Typi non habent claritatem insitam est usus legentis in qui facit eorum claritatem, investigationes
demonstraverunt lectores legere me lius quod legunt saepius.</p> --}}
</div>
<div class="tab-content jump">
	<div id="tab1" class="tab-pane active">
		<div class="row">
			@foreach($data as $dt)
			<div class="custom-col-5">
				<div class="product-wrapper mb-25">
					<div class="product-img">
						<a href="" class="detail" id="{{$dt->id}}">
							<img src="hinhanh/upload/{{$dt->hinhanh}}" alt="{{$dt->hinhanh}}">
						</a>
						<div class="product-action">
							<div class="pro-action-left">
								<a title="Chọn Mua " href=""><i class="ion-android-cart"></i> Chọn Mua</a>
							</div>
							<div class="pro-action-right">
								{{-- <a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a> --}}
								{{-- <a title="Chi Tiết" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a> --}}
								<a title="Chi Tiết" class="detail" href="#"><i class="ion-android-open"></i></a>
							</div>
						</div>
					</div>
					<div class="product-content">
						<h4>
							<a href="product-details.html">{{$dt->tenmon}} </a>
						</h4>
						<div class="product-price-wrapper">
							<span>{{ number_format($dt->dongia)}} </span>
							{{-- <span class="product-price-old">{{$dt->dongia}} </span> --}}
						</div>
					</div>
				</div>
			</div>
			@endforeach
					{{-- <div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
					</div>
					<div class="custom-col-5">
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
									<span>$60.00</span>
									<span class="product-price-old">$70.00 </span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$190.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$150.00</span>
									<span class="product-price-old">$170.00 </span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$80.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$180.00</span>
									<span class="product-price-old">$190.00 </span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
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
									<span>$70.00</span>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
			</div>
			<div id="tab2" class="tab-pane">
				<div class="row">
					<div class="custom-col-5">
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
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$200.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$60.00</span>
									<span class="product-price-old">$70.00 </span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
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
									<span>$190.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$150.00</span>
									<span class="product-price-old">$170.00 </span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$80.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$180.00</span>
									<span class="product-price-old">$190.00 </span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$70.00</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="tab3" class="tab-pane">
				<div class="row">
					<div class="custom-col-5">
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
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$200.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$90.00</span>
									<span class="product-price-old">$100.00 </span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$50.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$60.00</span>
									<span class="product-price-old">$70.00 </span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
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
									<span>$190.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$150.00</span>
									<span class="product-price-old">$170.00 </span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$80.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
						<div class="product-wrapper mb-25">
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
									<span>$180.00</span>
									<span class="product-price-old">$190.00 </span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-col-5">
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
									<span>$70.00</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="banner-area">
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
</div>
<div class="best-food-area pt-100 pb-95">
	<div class="custom-container">
		<div class="row">
			<div class="best-food-width-1">
				<div class="single-banner">
					<div class="hover-style">
						<a href="#"><img src="assets/img/banner/banner-5.jpg" alt=""></a>
					</div>
				</div>
			</div>
			<div class="best-food-width-2">
				<div class="product-top-bar section-border mb-25">
					<div class="section-title-wrap">
						<h3 class="section-title section-bg-white">Best Food In Our Shop</h3>
					</div>
					<div class="product-tab-list-2 nav section-bg-white">
						<a class="active" href="#tab4" data-toggle="tab">
							<h4>All </h4>
						</a>
						<a href="#tab5" data-toggle="tab">
							<h4>Food </h4>
						</a>
						<a href="#tab6" data-toggle="tab">
							<h4> Drink </h4>
						</a>
					</div>
				</div>
				<div class="tab-content jump">
					<div id="tab4" class="tab-pane active">
						<div class="product-slider-active owl-carousel product-nav">
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
										<span>$100.00</span>
										<span class="product-price-old">$120.00 </span>
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
										<span>$200.00</span>
									</div>
								</div>
							</div>
							<div class="product-wrapper">
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
						<a href="#"><img src="assets/img/banner/banner-6.jpg" alt=""></a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal"  role="dialog">
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
							<div id="img" class="tab-pane fade show active">
								{{-- <img src="assets/img/product-details/product-detalis-l1.jpg" alt=""> --}}
							</div>
                            {{-- <div id="pro-2" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l2.jpg" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l3.jpg" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="assets/img/product-details/product-detalis-l4.jpg" alt="">
                            </div> --}}
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        {{-- <div class="product-thumbnail">
                            <div class="thumb-menu owl-carousel nav nav-style" role="tablist">
                                <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/img/product-details/product-detalis-s1.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-2"><img src="assets/img/product-details/product-detalis-s2.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-3"><img src="assets/img/product-details/product-detalis-s3.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-4"><img src="assets/img/product-details/product-detalis-s4.jpg" alt=""></a>
                            </div>
                        </div> --}}
                        <!-- Thumbnail image end -->
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                    	<div class="modal-pro-content">
                    		<h3 id="tenmon"></h3>
                    		<div class="product-price-wrapper">
                    			<span id="dongia"></span>
                    			{{-- <span class="product-price-old">$162.00 </span> --}}
                    		</div>
                    		{{-- <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p> --}}	
                            {{-- <div class="quick-view-select">
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
                            </div> --}}
                            <div class="product-quantity">
                            	<div class="cart-plus-minus">
                            		<input type="hidden" id="hidden_id">
                            		<input id="soluong" class="cart-plus-minus-box" type="text" name="qtybutton">
                            	</div>
                            	{{-- <a href="add-to-cart/3"><button class="addToCart" >Chọn Mua</button></a> --}}
                            	<button class="addToCart" >Chọn Mua</button>
                            </div>
                            <span hidden="" id="result_addTocart"><i class="fa fa-check"></i> Đã thêm vào giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
@endsection
@section('script')
<script>
	$(document).ready(function(){
		load_mini_cart(); //hàm load giỏ hàng
		function load_mini_cart(){
			$.ajax({
				url:'index',
				dataType:'json',
				success:function(cart)
				{
					if(cart.cart==null)
					{
						$('.count_cart').text(0);
						$('.price_cart').text(0);
						var row='';
						row+='<div class="shopping-cart-btn">'
						row+='<a >Giỏ Hàng Rỗng</a>'
						row+='</div>'
						$('#mini_cart').html(row);
					}		
					else
					{
					$('.count_cart').text(cart.cart.totalQty);
					$('.price_cart').text(cart.cart.totalPrice);
					var row='';
					$.each(cart,function(key,value){
						row+='<ul>'
						$.each(value.items,function(k,v){
							row+='<li class="single-shopping-cart">'
							row+='<div class="shopping-cart-img">'
							row+='<a><img style="height: 80px; width: 80px" alt="" src={{URL::to('/')}}/hinhanh/upload/'+v.item.hinhanh+'></a>'
							row+='</div>'
							row+='<div class="shopping-cart-title">'
							row+='<h4><a href="#">'+v.item.tenmon+'</a></h4>'
							row+='<h6>Qty: '+v.qty+'</h6>'
							row+='<span>'+v.price+'</span>'
							row+='</div>'
							row+='<div class="shopping-cart-delete">'
							row+='<a class="del" id="'+v.item.id+'"><i class="ion ion-close"></i></a>'
							row+='</div>'
							row+='</li>'
						})
						row+='</ul>'
						row+='<div class="shopping-cart-total">'
						row+='<h4>Tổng tiền : <span class="shop-total">'+value.totalPrice+'</span></h4>'
						row+='</div>'
						row+='<div class="shopping-cart-btn">'
						row+='<a href="gio-hang">Xem Giỏ Hàng</a>'
						row+='<a href="gio-hang/thanh-toan">Thanh Toán</a>'
						row+='</div>'
					});
					$('#mini_cart').html(row);
				}
				
			}
		})
		}
		//xem chi tiết sản phẩm
		$('.detail').click(function(event){
			event.preventDefault();
			var id = $(this).attr('id');
			$('#exampleModal').modal('show');
			$('#result_addTocart').attr('hidden',true);
			$.ajax({
				url:"chitiet-sanpham/"+id,
				dataType:"json",
				success:function(html)
				{
					$('#soluong').val(1);
					$('#hidden_id').val(html.data.id);
					$('#tenmon').text(html.data.tenmon);
					$('#dongia').text(html.data.dongia);
					$('#img').html("<img src={{URL::to('/')}}/hinhanh/upload/"+html.data.hinhanh + ">");
					$('#exampleModal').modal('show');
				}
			})
		});
		//nếu giảm số lượng <1 thì lấy bằng 1
		$('.dec').click(function(){
			if($('#soluong').val()<1)
			{
				$('#soluong').val(1);
			}
		});
		//thêm vào giỏ hàng
		$('.addToCart').click(function(){
			var id=$('#hidden_id').val();
			var sl=$('#soluong').val();
			$.ajax({
				url:"add-to-cart/"+id,
				dataType:"json",
				success:function()
				{
					//$('#count_cart').text(html.cart.totalQty);
					//$('#price_cart').text(html.cart.totalPrice);
				}
			})
			load_mini_cart();
			$('#result_addTocart').removeAttr('hidden');
			setTimeout(function(){
				$('#result_addTocart').attr('hidden',true);
			}, 1000);
		});
		//xóa item trong giỏ hàng
		$(document).on('click','.del',function(){
			var id = $(this).attr('id');
			$.ajax({
				url:"delete-cart/"+id,
				dataType:"json",
				success:function()
				{
					//$('#count_cart').text(html.cart.totalQty);
					//$('#price_cart').text(html.cart.totalPrice);
				}
			})
			load_mini_cart();
			//alert(id);
		});
	});
</script>
@endsection
