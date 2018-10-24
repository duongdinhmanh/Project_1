@extends('website')
@section('home')
<div class="clearfix"></div>
<div class="login-page cnt-bg-photo overview-bgi" style="background-image: url(assets/upload/img/banner-1.jpg)">
    <div class="container" id="register">
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-lg-offset-2 align-center">
               <div class="content-form-box">
                    <div class="login-header"><h4 style="color: #fff;text-align: center">TẠO TÀI KHOẢN</h4></div>
                    <form action="{{ route('post-dang-ky') }}" method="POST" id="register-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <label>Họ và Tên</label>
                                    <input type="text" class="form-control" name="name" placeholder="Họ và Tên">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <label>Địa Chỉ Email </label>
                                    <input type="text" class="form-control" name="email" placeholder="Địa Chỉ Email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <label>Địa Chỉ </label>
                                    <input type="text" class="form-control" name="address" placeholder="Địa Chỉ">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <label>Số Điện Thoại</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Số Điện Thoại">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <label>Mật Khẩu</label>
                                    <input type="Password" class="form-control" name="password" placeholder="Mật Khẩu">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <label>NHập Lại Mật Khẩu</label>
                                    <input type="Password" class="form-control" name="password" placeholder="NHập Lại Mật Khẩu">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-color btn-md btn-block">Tạo Tài Khoản</button>
                                </div>
                            </div>
                        </div>
                        <div class="login-footer text-center">
                            <p>Already have an account?<a href="login.html"> Sign In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
