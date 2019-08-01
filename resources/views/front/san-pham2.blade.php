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
{{$mon->links()}}
</div>
{{-- <div class="pagination-total-pages">
	<div class="pagination-style">
		{{$mon->links()}}
	</div>
</div> --}}