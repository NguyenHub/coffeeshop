@extends('master')
@section('content')
<div class="breadcrumb-area gray-bg">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="index">Trang Chủ</a></li>
				<li class="active">Sản Phẩm </li>
			</ul>
		</div>
	</div>
</div>
<div class="shop-page-area pt-100 pb-100">
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-lg-9">
				{{-- <div class="banner-area pb-30">
					<a href="product-details.html"><img alt="" src="assets/img/banner/banner-49.jpg"></a>
				</div> --}}
				<div class="shop-topbar-wrapper">
					<div class="shop-topbar-left">
						<ul class="view-mode">
							<li class="active"><a  data-view="product-grid"><i class="fa fa-th"></i></a></li>
							{{-- <li><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li> --}}
						</ul>
						<p></p>
					</div>
					<div class="product-sorting-wrapper">
						<div class="product-shorting shorting-style">
							{{-- <label>View:</label>
							<select>
								<option value=""> 20</option>
								<option value=""> 23</option>
								<option value=""> 30</option>
							</select> --}}
						</div>
						<div class="product-show shorting-style">
							<label>Lọc theo:</label>
							<select>
								<option value="">Mặc định</option>
								<option value=""> Tên</option>
								<option value=""> Giá</option>
							</select>
						</div>
					</div>
				</div>
				<div class="grid-list-product-wrapper">
					<div class="product-grid product-view pb-20">
						<div class="row">
							@foreach($mon as $sp)
							<div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
								<div class="product-wrapper">
									<div class="product-img">
										<a href="" class="detail" id="{{$sp->id}}">
											<img src="hinhanh/upload/{{$sp->hinhanh}}" style="height: 270px;" alt="">
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
											<span>{{number_format( $sp->dongia)}} đ</span>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="pagination-total-pages">
						<div class="pagination-style">
							{{-- <ul>
								<li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Prev</a></li>
								<li><a class="active" href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">10</a></li>
								<li><a class="prev-next next" href="#">Next<i class="ion-ios-arrow-right"></i> </a></li>
							</ul> --}}
							{{$mon->links()}}
						</div>
						{{-- <div class="total-pages">
							<p>Showing 1 - 20 of 30 results  </p>
						</div> --}}
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
					<div class="shop-widget">
						<h4 class="shop-sidebar-title">Danh Mục</h4>
						<div class="shop-catigory">
							<ul id="faq">
								{{-- <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-1">Fast Foods <i class="ion-ios-arrow-down"></i></a>
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
								</li> --}}
								@foreach($loai as $loai)
								<li><a href="" class="loai_sp" id="{{$loai->id}}">{{$loai->tenloai}}</a> </li>
								@endforeach
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
				</div>
			</div>
		</div>
	</div>
</div>
@endsection