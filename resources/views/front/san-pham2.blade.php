@extends('master')
@section('content')
<div class="breadcrumb-area gray-bg">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li class="active">Shop Grid Style </li>
			</ul>
		</div>
	</div>
</div>
<div class="shop-page-area pt-100 pb-100">
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-lg-9">
				<div class="banner-area pb-30">
					<a href="product-details.html"><img alt="" src="assets/img/banner/banner-49.jpg"></a>
				</div>
				<div class="shop-topbar-wrapper">
					<div class="shop-topbar-left">
						<ul class="view-mode">
							<li class="active"><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
							<li><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
						</ul>
						<p>Showing 1 - 20 of 30 results  </p>
					</div>
					<div class="product-sorting-wrapper">
						<div class="product-shorting shorting-style">
							<label>View:</label>
							<select>
								<option value=""> 20</option>
								<option value=""> 23</option>
								<option value=""> 30</option>
							</select>
						</div>
						<div class="product-show shorting-style">
							<label>Sort by:</label>
							<select>
								<option value="">Default</option>
								<option value=""> Name</option>
								<option value=""> price</option>
							</select>
						</div>
					</div>
				</div>
				<div class="grid-list-product-wrapper">
					<div class="product-grid product-view pb-20">
						<div class="row">
							<div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
									<div class="product-list-details">
										<h4>
											<a href="product-details.html">PRODUCTS NAME HERE </a>
										</h4>
										<div class="product-price-wrapper">
											<span>$100.00</span>
											<span class="product-price-old">$120.00 </span>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<div class="shop-list-cart-wishlist">
											<a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
											<a href="#" title="Add To Cart"><i class="ion-android-cart"></i></a>
											<a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
												<i class="ion-android-open"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
									<div class="product-list-details">
										<h4>
											<a href="product-details.html">PRODUCTS NAME HERE </a>
										</h4>
										<div class="product-price-wrapper">
											<span>$100.00</span>
											<span class="product-price-old">$120.00 </span>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<div class="shop-list-cart-wishlist">
											<a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
											<a href="#" title="Add To Cart"><i class="ion-android-cart"></i></a>
											<a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
												<i class="ion-android-open"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
									<div class="product-list-details">
										<h4>
											<a href="product-details.html">PRODUCTS NAME HERE </a>
										</h4>
										<div class="product-price-wrapper">
											<span>$100.00</span>
											<span class="product-price-old">$120.00 </span>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<div class="shop-list-cart-wishlist">
											<a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
											<a href="#" title="Add To Cart"><i class="ion-android-cart"></i></a>
											<a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
												<i class="ion-android-open"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
									<div class="product-list-details">
										<h4>
											<a href="product-details.html">PRODUCTS NAME HERE </a>
										</h4>
										<div class="product-price-wrapper">
											<span>$100.00</span>
											<span class="product-price-old">$120.00 </span>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<div class="shop-list-cart-wishlist">
											<a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
											<a href="#" title="Add To Cart"><i class="ion-android-cart"></i></a>
											<a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
												<i class="ion-android-open"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
											<span>$60.00</span>
											<span class="product-price-old">$70.00 </span>
										</div>
									</div>
									<div class="product-list-details">
										<h4>
											<a href="product-details.html">PRODUCTS NAME HERE </a>
										</h4>
										<div class="product-price-wrapper">
											<span>$100.00</span>
											<span class="product-price-old">$120.00 </span>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<div class="shop-list-cart-wishlist">
											<a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
											<a href="#" title="Add To Cart"><i class="ion-android-cart"></i></a>
											<a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
												<i class="ion-android-open"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
											<span>$190.00</span>
										</div>
									</div>
									<div class="product-list-details">
										<h4>
											<a href="product-details.html">PRODUCTS NAME HERE </a>
										</h4>
										<div class="product-price-wrapper">
											<span>$100.00</span>
											<span class="product-price-old">$120.00 </span>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<div class="shop-list-cart-wishlist">
											<a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
											<a href="#" title="Add To Cart"><i class="ion-android-cart"></i></a>
											<a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
												<i class="ion-android-open"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
											<span>$150.00</span>
											<span class="product-price-old">$170.00 </span>
										</div>
									</div>
									<div class="product-list-details">
										<h4>
											<a href="product-details.html">PRODUCTS NAME HERE </a>
										</h4>
										<div class="product-price-wrapper">
											<span>$100.00</span>
											<span class="product-price-old">$120.00 </span>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<div class="shop-list-cart-wishlist">
											<a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
											<a href="#" title="Add To Cart"><i class="ion-android-cart"></i></a>
											<a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
												<i class="ion-android-open"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
											<span>$80.00</span>
										</div>
									</div>
									<div class="product-list-details">
										<h4>
											<a href="product-details.html">PRODUCTS NAME HERE </a>
										</h4>
										<div class="product-price-wrapper">
											<span>$100.00</span>
											<span class="product-price-old">$120.00 </span>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<div class="shop-list-cart-wishlist">
											<a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
											<a href="#" title="Add To Cart"><i class="ion-android-cart"></i></a>
											<a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
												<i class="ion-android-open"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
											<span>$180.00</span>
											<span class="product-price-old">$190.00 </span>
										</div>
									</div>
									<div class="product-list-details">
										<h4>
											<a href="product-details.html">PRODUCTS NAME HERE </a>
										</h4>
										<div class="product-price-wrapper">
											<span>$100.00</span>
											<span class="product-price-old">$120.00 </span>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<div class="shop-list-cart-wishlist">
											<a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
											<a href="#" title="Add To Cart"><i class="ion-android-cart"></i></a>
											<a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
												<i class="ion-android-open"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
											<span>$70.00</span>
										</div>
									</div>
									<div class="product-list-details">
										<h4>
											<a href="product-details.html">PRODUCTS NAME HERE </a>
										</h4>
										<div class="product-price-wrapper">
											<span>$100.00</span>
											<span class="product-price-old">$120.00 </span>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<div class="shop-list-cart-wishlist">
											<a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
											<a href="#" title="Add To Cart"><i class="ion-android-cart"></i></a>
											<a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
												<i class="ion-android-open"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
									<div class="product-list-details">
										<h4>
											<a href="product-details.html">PRODUCTS NAME HERE </a>
										</h4>
										<div class="product-price-wrapper">
											<span>$100.00</span>
											<span class="product-price-old">$120.00 </span>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<div class="shop-list-cart-wishlist">
											<a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
											<a href="#" title="Add To Cart"><i class="ion-android-cart"></i></a>
											<a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
												<i class="ion-android-open"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
									<div class="product-list-details">
										<h4>
											<a href="product-details.html">PRODUCTS NAME HERE </a>
										</h4>
										<div class="product-price-wrapper">
											<span>$100.00</span>
											<span class="product-price-old">$120.00 </span>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
										<div class="shop-list-cart-wishlist">
											<a href="#" title="Wishlist"><i class="ion-ios-heart-outline"></i></a>
											<a href="#" title="Add To Cart"><i class="ion-android-cart"></i></a>
											<a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
												<i class="ion-android-open"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="pagination-total-pages">
						<div class="pagination-style">
							<ul>
								<li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Prev</a></li>
								<li><a class="active" href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">10</a></li>
								<li><a class="prev-next next" href="#">Next<i class="ion-ios-arrow-right"></i> </a></li>
							</ul>
						</div>
						<div class="total-pages">
							<p>Showing 1 - 20 of 30 results  </p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
					<div class="shop-widget">
						<h4 class="shop-sidebar-title">Shop By Categories</h4>
						<div class="shop-catigory">
							<ul id="faq">
								<li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-1">Fast Foods <i class="ion-ios-arrow-down"></i></a>
									<ul id="shop-catigory-1" class="panel-collapse collapse show">
										<li><a href="#">Pizza </a></li>
										<li><a href="#">Hamburgers</a></li>
										<li><a href="#">Sandwiches</a></li>
										<li><a href="#">French fries</a></li>
										<li><a href="#">Fried chicken</a></li>
									</ul>
								</li>
								<li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-2">Rich Foods <i class="ion-ios-arrow-down"></i></a>
									<ul id="shop-catigory-2" class="panel-collapse collapse">
										<li><a href="#">Eggs</a></li>
										<li><a href="#">Milk</a></li>
										<li><a href="#">Almonds</a></li>
										<li><a href="#">Cottage Cheese</a></li>
										<li><a href="#">Lean Beef</a></li>
									</ul>
								</li>
								<li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-3">Soft Drinks <i class="ion-ios-arrow-down"></i></a>
									<ul id="shop-catigory-3" class="panel-collapse collapse">
										<li><a href="#"> Pepsi Cola</a></li>
										<li><a href="#"> Fruit juices</a></li>
										<li><a href="#">Diet Pepsi</a></li>
										<li><a href="#">Bitter lemon</a></li>
										<li><a href="#">Barley water</a></li>
									</ul>
								</li>
								<li> <a href="#">Vegetables</a> </li>
								<li> <a href="#">Fruits</a></li>
								<li> <a href="#">Red Meat</a></li>
							</ul>
						</div>
					</div>
					<div class="shop-price-filter mt-40 shop-sidebar-border pt-35">
						<h4 class="shop-sidebar-title">Price Filter</h4>
						<div class="price_filter mt-25">
							<span>Range:  $100.00 - 1.300.00 </span>
							<div id="slider-range"></div>
							<div class="price_slider_amount">
								<div class="label-input">
									<input type="text" id="amount" name="price"  placeholder="Add Your Price" />
								</div>
								<button type="button">Filter</button> 
							</div>
						</div>
					</div>
					<div class="shop-widget mt-40 shop-sidebar-border pt-35">
						<h4 class="shop-sidebar-title">By Brand</h4>
						<div class="sidebar-list-style mt-20">
							<ul>
								<li><input type="checkbox"><a href="#">Poure </a></li>
								<li><input type="checkbox"><a href="#">Eveman </a></li>
								<li><input type="checkbox"><a href="#">Iccaso </a></li>
								<li><input type="checkbox"><a href="#">Annopil </a></li>
								<li><input type="checkbox"><a href="#">Origina </a></li>
								<li><input type="checkbox"><a href="#">Perini  </a></li>
								<li><input type="checkbox"><a href="#">Dolloz </a></li>
								<li><input type="checkbox"><a href="#">Spectry </a></li>
							</ul>
						</div>
					</div>
					<div class="shop-widget mt-40 shop-sidebar-border pt-35">
						<h4 class="shop-sidebar-title">By Color</h4>
						<div class="sidebar-list-style mt-20">
							<ul>
								<li><input type="checkbox"><a href="#">Black </a></li>
								<li><input type="checkbox"><a href="#">Blue </a></li>
								<li><input type="checkbox"><a href="#">Green </a></li>
								<li><input type="checkbox"><a href="#">Grey </a></li>
								<li><input type="checkbox"><a href="#">Red</a></li>
								<li><input type="checkbox"><a href="#">White  </a></li>
								<li><input type="checkbox"><a href="#">Yellow   </a></li>
							</ul>
						</div>
					</div>
					<div class="shop-widget mt-40 shop-sidebar-border pt-35">
						<h4 class="shop-sidebar-title">Compare Products</h4>
						<div class="compare-product">
							<p>You have no item to compare. </p>
							<div class="compare-product-btn">
								<span>Clear all </span>
								<a href="#">Compare <i class="fa fa-check"></i></a>
							</div>
						</div>
					</div>
					<div class="shop-widget mt-40 shop-sidebar-border pt-35">
						<h4 class="shop-sidebar-title">Popular Tags</h4>
						<div class="shop-tags mt-25">
							<ul>
								<li><a href="#">All</a></li>
								<li><a href="#">Cheesy</a></li>
								<li><a href="#">Fast Food</a></li>
								<li><a href="#">French Fries</a></li>
								<li><a href="#">Hamburger </a></li>
								<li><a href="#">Pizza</a></li>
								<li><a href="#">Red Meat</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection