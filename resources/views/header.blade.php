    <header class="header-area">
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                        <div class="logo">
                            <a href="index">
                                <img alt="" src="assets/img/logo/logo2.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12 col-sm-8">
                        <div class="header-middle-right f-right">
                            <div class="header-login">

                                <div class="header-icon-style">
                                    <i class="icon-user icons"></i>
                                </div>
                                <div class="login-text-content">
                                    {{-- @if(Auth::guard('khach_hang')->check())
                                    <div class="dropdown">
                                        <p class=" dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"  aria-expanded="false">
                                            {{Auth::guard('khach_hang')->user()->tenkhachhang}}
                                        </p>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="khach-hang/tai-khoan">Tài khoản</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="khachhang/dangxuat">Đăng xuất</a>
                                        </div>
                                    </div>
                                    @else
                                    <a href="dangnhap-dangky">
                                        <p>Đăng ký <br> hoặc <span style="color: red">Đăng nhập</span></p>
                                    </a>
                                    @endif --}}
                                </div>
                            </div>
                            <div class="header-wishlist">
                                {{-- <a href="wishlist.html">
                                    <div class="header-icon-style">
                                        <i class="icon-heart icons"></i>
                                    </div>
                                    <div class="wishlist-text">
                                        <p>Your <br> <span>Wishlist</span></p>
                                    </div>
                                </a> --}}
                            </div>
                            <div class="header-cart">
                                <a >
                                    <div class="header-icon-style">
                                        <i class="icon-handbag icons"></i>
                                        <span class="count_cart" class="count-style">
                                        </span>
                                    </div>
                                    <div class="cart-text">
                                        <span class="digit">Giỏ Hàng</span>
                                        <span class="price_cart" class="cart-digit-bold">
                                        </span>
                                    </div>
                                </a>
                                <div id="mini_cart" class="shopping-cart-content">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if(session('errors'))
                    <div class="alert alert-danger">
                        {{session('errors')}}
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="header-bottom transparent-bar black-bg">
                <div class="container">
                    <div class="row" style="max-height: 57px;">
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <input id="search" class="form-control " type="text " style="background: #fff0; margin-top: 10px;color: #007bff;" placeholder="Tìm kiếm...">
                                    <div id="search_result"  class="search-content">
                                    </div>
                                </div>
                                <div class="col-md-4 col-4">
                                    <select name="" id="select_loai" class="form-control" style="background: #fff0; margin-top: 10px;color: #007bff;">
                                        <option value="0">All</option>
                                        @foreach($loai_mon as $loai)
                                        <option value="{{$loai->id}}">{{$loai->tenloai}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li><a href="index">Trang Chủ</a></li>
                                        <li><a href="san-pham">Sản Phẩm</a></li>
                                        <li><a href="tin-tuc">Tin Tức</a></li>
                                        <li><a href="lien-he">Liên Hệ</a></li>

                                {{-- <li><a href="shop.html">burger</a></li>
                                <li><a href="shop.html">pizza</a></li>
                                <li><a href="shop.html">cold drink</a></li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area-start -->
    <div class="mobile-menu-area" >
        <div class="container">
           <div class="row">
              <div class="col-lg-12">
                 <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                       <ul class="menu-overflow" id="nav">
                          <li><a href="index.html">Home</a>
                             <ul>
                                <li><a href="index.html">home version 1</a></li>
                                <li><a href="index-2.html">home version 2</a></li>
                            </ul>
                        </li>
                        <li><a href="#">pages</a>
                         <ul>
                            <li><a href="about-us.html">about us </a></li>
                            <li><a href="shop.html">shop Grid</a></li>
                            <li><a href="shop-list.html">shop list</a></li>
                            <li><a href="product-details.html">product details</a></li>
                            <li><a href="cart-page.html">cart page</a></li>
                            <li><a href="checkout.html">checkout</a></li>
                            <li><a href="wishlist.html">wishlist</a></li>
                            <li><a href="my-account.html">my account</a></li>
                            <li><a href="login-register.html">login / register</a></li>
                            <li><a href="contact.html">contact</a></li>
                            <li><a href="testimonial.html">Testimonials</a></li>
                        </ul>
                    </li>
                    <li><a href="shop.html"> Shop </a>
                        <ul>
                            <li><a href="#">Categories 01</a>
                                <ul>
                                    <li><a href="shop.html">salad</a></li>
                                    <li><a href="shop.html">sandwich</a></li>
                                    <li><a href="shop.html">bread</a></li>
                                    <li><a href="shop.html">steak</a></li>
                                    <li><a href="shop.html">tuna steak</a></li>
                                    <li><a href="shop.html">spaghetti </a></li>
                                </ul>
                            </li>
                            <li><a href="#">Categories 02</a>
                                <ul>
                                    <li><a href="shop.html">rice</a></li>
                                    <li><a href="shop.html">pizza</a></li>
                                    <li><a href="shop.html">hamburger</a></li>
                                    <li><a href="shop.html">eggs</a></li>
                                    <li><a href="shop.html">sausages</a></li>
                                    <li><a href="shop.html">apple juice</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Categories 03</a>
                                <ul>
                                    <li><a href="shop.html">milk</a></li>
                                    <li><a href="shop.html">grape juice</a></li>
                                    <li><a href="shop.html">cookie</a></li>
                                    <li><a href="shop.html">candy</a></li>
                                    <li><a href="shop.html">cake</a></li>
                                    <li><a href="shop.html">cupcake</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Categories 04</a>
                                <ul>
                                    <li><a href="shop.html">pie</a></li>
                                    <li><a href="shop.html">stoberry</a></li>
                                    <li><a href="shop.html">sandwich</a></li>
                                    <li><a href="shop.html">bread</a></li>
                                    <li><a href="shop.html">steak</a></li>
                                    <li><a href="shop.html">hamburger</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="blog-rightsidebar.html">blog</a>
                     <ul>
                        <li><a href="blog.html">Blog No sidebar</a></li>
                        <li><a href="blog-rightsidebar.html">Blog sidebar</a></li>
                        <li><a href="blog-details.html">Blog details</a></li>
                        <li><a href="blog-details-gallery.html">Blog details gallery</a></li>
                        <li><a href="blog-details-video.html">Blog details video</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">contact us</a></li>
                <li><a href="shop.html">burger</a></li>
            </ul>
        </nav>
    </div>
</div>
</div>
</div>
</div>
<!-- mobile-menu-area-end -->
</header>