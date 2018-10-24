@extends('website')
@section('home')
<div class="clearfix"></div>
<div class="login-page cnt-bg-photo overview-bgi" style="background-image: url(assets/upload/img/banner-1.jpg)">
    <div class="container-fluid" id="register">
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 align-center">
               <div class="content-form-box">
                    <div class="login-header"><h4 style="color: #fff;text-align: center">ĐẶT LỊCH THÀNH CÔNG</h4></div>
                    <div style="color: #fff">
                        <h5 style="color: #fff">Cảm ơn Quý Khách đã sử dụng dịch vụ của Homestare..!</h5>
                        <p style="color: #fff">Các Tư vấn viên sẽ liên hệ với quý khách trong thời gian sớm nhất.</p>
                        <p style="color: #fff">Xin cảm ơn..!</p>
                    </div>
                    <div class="text-center">
                        <a data-animation="animated fadeInUp delay-12s" href="{{ route('home') }}" class="btn btn-lg btn-round btn-white-lg-outline">Trang Chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
