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
				{{-- <div class="shop-topbar-wrapper">
					<div class="shop-topbar-left">
						<ul class="view-mode">
							<li class="active"><a  data-view="product-grid"><i class="fa fa-th"></i></a></li> --}}
							{{-- <li><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li> --}}
						{{-- </ul>
						<p></p>
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
							<label>Lọc theo:</label>
							<select>
								<option value="">Mặc định</option>
								<option value=""> Tên</option>
								<option value=""> Giá</option>
							</select>
						</div>
					</div>
				</div> --}}
				<div class="grid-list-product-wrapper">
					<div class="product-grid product-view pb-20">
						@include('front.san-pham2')
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
					{{-- <div class="shop-price-filter mt-40 shop-sidebar-border pt-35">
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
					</div> --}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){
		$('.pagination').attr('id','all');
		// $(window).on('hashchange',function(){
		// 	page = window.location.hash.replace('#','');
		// 	getProducts(page);
		// });
		location.hash='page='+1;
		$('.loai_sp').click(function(even){
			even.preventDefault();
			var id = $(this).attr('id');
			var text =$(this).text();
			location.hash='type='+text+'?page='+1;
			$('.loai_sp').removeClass('underline');
			$(this).addClass('underline');
			$('.shop-sidebar-title').attr('id',id);
			$('.shop-sidebar-title').attr('title',text);
			$.ajax({
				url:'san-pham/'+id,
				success:function(mon)
				{
					$('.product-view').html(mon);
				}
			})
		})
		$(document).on('click','.pagination a',function(event){
			event.preventDefault();
			var id=$('.pagination').attr('id');
			var page=$(this).attr('href').split('page=')[1];
			if(!id)
			{
				var type=$('.shop-sidebar-title').attr('id');
				var name_type=$('.shop-sidebar-title').attr('title');
				location.hash='type='+name_type+'?page='+page;
				getProductsType(type,page);
			}
			else
			{
				location.hash='page='+page;
				getProducts(page);
			}		
	});
		function getProducts(page){
			$.ajax({
				url:'product?page=' + page,
				success:function(mon)
				{
					$('.product-view').html(mon);
					$('.pagination').attr('id','all');
				}
			})
		}
		function getProductsType(type,page){
			$.ajax({
				url:'product/'+type+'?page=' + page,
				success:function(mon)
				{
					$('.product-view').html(mon);
				}
			})
		}
	});
</script>
@endsection