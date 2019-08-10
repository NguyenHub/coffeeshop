@extends('master')
@section('content')
<!-- blog-area start -->
        <div class="blog-area ptb-100">
            <div class="container">
                <div class="row">
                	@foreach($tintuc as $tin)
                    <div class="col-lg-6 col-md-6">
                       <div class="single-blog-wrapper mb-50">
                            <div class="blog-img mb-10">
                                <a href="blog-details-standerd.html">
                                    <img src="hinhanh/upload/{{$tin->hinhanh}}" alt="" height="300px">
                                </a>
                                {{-- <div class="blog-date">
                                    <span>26 <br> JUNE</span>
                                </div> --}}
                            </div>
                            <div class="blog-content">
                                <h2><a href="tin-tuc/chi-tiet/{{$tin->id}}"><?php echo $tin->tieude; ?></a></h2>
                                {{-- <div class="blog-date-categori">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                        <li><a href="#"><i class="ion-heart"></i> likes </a></li>
                                        <li><a href="#"><i class="fa fa-comment"></i> Comments </a></li>
                                    </ul>
                                </div> --}}
                                {{-- <p></p> --}} {{-- nội dung tin tức --}}
                            </div>
                            <div class="blog-btn mt-30">
                                <a href="tin-tuc/chi-tiet/{{$tin->id}}">Đọc Thêm</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- <div class="pagination-total-pages">
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
                </div> --}}
            </div>
        </div>
        <!-- blog-area end -->
@endsection