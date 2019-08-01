@extends('master')
@section('content')
<div class="breadcrumb-area gray-bg">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="index">Trang Chủ</a></li>
				<li class="active"> Liên Hệ </li>
			</ul>
		</div>
	</div>
</div>
<div class="contact-area pt-100 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-12">
				<div class="contact-info-wrapper text-center mb-30">
					<div class="contact-info-icon">
						<i class="ion-ios-location-outline"></i>
					</div>
					<div class="contact-info-content">
						<h4>Địa Chỉ</h4>
						<p>180 Cao Lỗ, Phường $, Quận 8</p>
						<p><a >nguyen199735@gmail.com</a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="contact-info-wrapper text-center mb-30">
					<div class="contact-info-icon">
						<i class="ion-ios-telephone-outline"></i>
					</div>
					<div class="contact-info-content">
						<h4>Liên hệ</h4>
						<p>Mobile: 0387 370 052</p>
						<p>Fax: 0387 370 052</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="contact-info-wrapper text-center mb-30">
					<div class="contact-info-icon">
						<i class="ion-ios-email-outline"></i>
					</div>
					<div class="contact-info-content">
						<h4>Hộp Thư</h4>
						<p><a >Support24/7 nguyen199735@gmail.com </a></p>
						<p><a >smartcoffee97@gmail.com</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="contact-message-wrapper">
					<h4 class="contact-title">HỘP THƯ GÓP Ý</h4>
					<div class="contact-message">
						<form id="contact-form" action="assets/mail.php" method="post">
							{{-- <div class="row">
								<div class="form-group">
									<input name="ten" class="form-control" placeholder="Họ Tên" type="text" required="">
								</div>
							</div> --}}
							<div class="row">
								<div class="form-group col-md-6">
									<div class="form-label-group">
										<input name="ten" id="ten" class="form-control" placeholder="Họ Tên" type="text" required="">
										<label for="ten">Tên</label>
									</div>
								</div>
								<div class=" form-group col-md-6">
									<div class="form-label-group">
										<input name="email" id="email" class="form-control" placeholder="Địa Chỉ Email" type="email" required="">
										<label for="email">Email</label>
									</div>
								</div>
								<div class="form-group col-md-12">
									<div class="form-label-group">
										<input name="subject" id="subject" class="form-control" placeholder="Subject" type="text">
										<label for="subject">Subject</label>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="contact-form-style">
										<textarea name="message" placeholder="Nội dung"></textarea>
										<button class="submit btn-style" type="submit">GỬI</button>
									</div>
								</div>
							</div>
						</form>
						<p class="form-messege"></p>
					</div>
				</div>
			</div>
		</div>
		<div class="contact-map">
			<div id="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.955107491779!2d106.67572221371218!3d10.737943462841724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad0158a09f%3A0xfd0a6159277a3508!2zMTgwIMSQxrDhu51uZyBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1563143915958!5m2!1svi!2s" width="1170" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
@endsection