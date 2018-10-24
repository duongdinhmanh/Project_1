@extends('website')
@section('home')
<div class="clearfix"></div>
<div class="login-page cnt-bg-photo overview-bgi" style="background-image: url(assets/upload/img/banner-1.jpg)">
    <div class="container-fluid" id="register">
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 align-center">
               <div class="content-form-box">
                    <div class="login-header"><h4 style="color: #fff;text-align: center">ĐẶT LỊCH XEM NHÀ</h4></div>
                    <form action="{{ route('dat-lich-post') }}" method="POST" id="register-form">
                        @csrf
                        @if (Auth::check())
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <label>Họ và Tên</label>
                                    <input type="text" value="{{ Auth::user()->name }}" class="form-control" name="name" placeholder="Họ và Tên">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <label>Địa Chỉ Email </label>
                                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email}}" placeholder="Địa Chỉ Email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <label>Địa Chỉ </label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address}}" name="address" placeholder="Địa Chỉ">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <label>Số Điện Thoại</label>
                                    <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone}}" placeholder="Số Điện Thoại">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <label>ĐẶT NGÀY</label>
                                     <input type="text" class="form-control" id="datepicker-1" name="time" placeholder="mm/dd/yyyy">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                     <textarea name="note" placeholder="ghi chú..." rows="4" cols="30"></textarea>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="apartment_id" value="{{ $apartmentOrder->id }}">
                            <input type="hidden" class="form-control" name="customer_id" value="{{ Auth::user()->id}}">
                            <div class="col-lg-6 col-md-6 col-sm-">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-color btn-md btn-block">ĐẶT LỊCH</button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4" style="margin-top: 100px">
                <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-60">
                    <div class="heading-properties">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left" >
                                    <h3 style="color: #fff">{{ $apartmentOrder->name }}</h3>
                                    <p  style="color: #fff"><i class="fa fa-map-marker"></i> {{ $apartmentOrder->address }}</p>
                                </div>
                                <div class="p-r">
                                    <h3  style="color: #fff">{{ number_format($apartmentOrder->price) }}</h3>
                                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active item carousel-item" data-slide-number="0">
                            <img src="{{ $apartmentOrder->image }}" class="img-fluid" alt="property-4">
                        </div>
                        @php
                            $x = 0;
                        @endphp
                        @foreach (unserialize($apartmentOrder->img_detail) as $img_detail)
                            <div class="item carousel-item" data-slide-number=" {{ $x +=1 }}">
                                <img src="{{ $img_detail }}" class="img-fluid" alt="property-6">
                            </div>
                        @endforeach
                        <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <!-- main slider carousel nav controls -->
                    <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#propertiesDetailsSlider">
                                 <img src="{{ $apartmentOrder->image }}" class="img-fluid" alt="property-4">
                            </a>
                        </li>
                        @php
                            $x = 0;
                        @endphp
                        @foreach (unserialize($apartmentOrder->img_detail) as $img_detail)
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#propertiesDetailsSlider">
                                     <img src="{{ $img_detail }}" class="img-fluid" alt="property-6">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
