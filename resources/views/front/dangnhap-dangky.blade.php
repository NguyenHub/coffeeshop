@extends('master')
@section('content')
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Trang Chủ</a></li>
                <li class="active"> Đăng Nhập / Đăng Ký </li>
            </ul>
        </div>
    </div>
</div>
<div class="login-register-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a  data-toggle="tab" href="#lg1">
                            <h4> Đăng Nhập </h4>
                        </a>
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> Đăng Ký </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane ">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="" method="post">
                                        <input type="text" name="Email" class="form-control" placeholder="Email">
                                        <input type="password" name="user-password" class="form-control" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Nhớ mật khẩu?</label>
                                                <a href="#">Quên mật khẩu?</a>
                                            </div>
                                            <button type="submit"><span>Đăng Nhập</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        <div class="form-group row col-md-12">
                                            <input type="text" name="hoten" class="form-control" placeholder="Nhập họ tên" required="">
                                        </div>
                                        <div class="form-group row col-md-12">
                                            <div class="col-md-8">
                                                <input type="date" name="ngaysinh" class="form-control"  required="">
                                            </div>
                                            <div class="col-md-4">
                                                <select name="gioitinh" id="" class="form-control">
                                                <option value="0">Nam</option>
                                                <option value="1">Nữ</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <select name="gioitinh" id="" class="form-control">
                                                <option value="0">Nam</option>
                                                <option value="1">Nữ</option>
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <input type="email" name="email" placeholder="Email" class="form-control" required="" >
                                        </div>
                                        <div class="form-group row">
                                            <input type="text" name="diachi" class="form-control" placeholder="Nhập địa chỉ" required="">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                            <input type="text" name="sdt" class="form-control" placeholder="Nhập sdt" required="">
                                            </div>
                                            <div class="col-md-4">
                                                <select name="gioitinh" id="" class="form-control">
                                                <option value="0">Nam</option>
                                                <option value="1">Nữ</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                                        </div>
                                        <div class="form-group row">
                                            <input type="password" name="confirmpassword" class="form-control" placeholder="Nhập lại mật khẩu">
                                        </div>
                                        <div class="button-box">
                                            <button type="submit"><span>Đăng ký</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
