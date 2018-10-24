@extends('website')
@section('home')
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Property Detail 1</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Property Detail 1</li>
            </ul>
        </div>
    </div>
</div>
<div class="properties-details-page content-area-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12 slider">
                <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-60">
                    <div class="heading-properties">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h3>{{ $apartmentDetail->name }}</h3>
                                    <p><i class="fa fa-map-marker"></i> {{ $apartmentDetail->address }}</p>
                                </div>
                                <div class="p-r">
                                    <h3>{{ number_format($apartmentDetail->price) }}</h3>
                                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active item carousel-item" data-slide-number="0">
                            <img src="{{ $apartmentDetail->image }}" class="img-fluid" alt="property-4">
                        </div>
                        @php
                            $x = 0;
                        @endphp
                        @foreach (unserialize($apartmentDetail->img_detail) as $img_detail)
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
                                 <img src="{{ $apartmentDetail->image }}" class="img-fluid" alt="property-4">
                            </a>
                        </li>
                        @php
                            $x = 0;
                        @endphp
                        @foreach (unserialize($apartmentDetail->img_detail) as $img_detail)
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#propertiesDetailsSlider">
                                     <img src="{{ $img_detail }}" class="img-fluid" alt="property-6">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tabbing tabbing-box mb-60">
                    <ul class="nav nav-tabs" id="carTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">Floor Plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab" aria-controls="4" aria-selected="true">Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab" aria-controls="5" aria-selected="true">Location</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="6-tab" data-toggle="tab" href="#6" role="tab" aria-controls="6" aria-selected="true">Related Properties</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="carTabContent">
                        <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                            {!! $apartmentDetail->desc !!}
                        </div>
                        <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                            <div class="floor-plans mb-60">
                                {!! $apartmentDetail->floor_plans !!}
                            </div>
                        </div>
                        <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                            <div class="property-details">
                              {!! $apartmentDetail->detail !!}
                            </div>
                        </div>
                        <div class="tab-pane fade " id="4" role="tabpanel" aria-labelledby="4-tab">
                            <div class="property-video">
                                <h3 class="heading">Property Vedio</h3>
                                <iframe src="{{ $apartmentDetail->video  }}"></iframe>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="5" role="tabpanel" aria-labelledby="5-tab">
                            <div class="section location">
                                <h3 class="heading">Property Location</h3>
                                <div class="map">
                                    <iframe src="{{ $apartmentDetail->map }}" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Amenities box start -->
                <div class="amenities-box mb-60">
                    <h3 class="heading">Condition</h3>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <ul>
                                <li><span><i class="flaticon-bed"></i> Beds</span></li>
                                <li><span><i class="flaticon-bath"></i> Bathroom</span></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <ul>
                                <li><span><i class="flaticon-car-repair"></i> Garage</span></li>
                                <li><span><i class="flaticon-balcony-and-door"></i> Balcony</span></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <ul>
                                <li><span><i class="flaticon-square-layouting-with-black-square-in-east-area"></i>sq ft</span></li>
                                <li><span><i class="flaticon-monitor"></i> TV</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Features opions start -->
                <div class="features-opions mb-60">
                    <h3 class="heading">Features</h3>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <ul>
                                <li>
                                    <i class="flaticon-air-conditioner"></i>
                                    Air conditioning
                                </li>
                                <li>
                                    <i class="flaticon-wifi-connection-signal-symbol"></i>
                                    Wifi
                                </li>
                                <li>
                                    <i class="flaticon-swimmer"></i>
                                    Swimming Pool
                                </li>
                                <li>
                                    <i class="flaticon-bed"></i>
                                    Double Bed
                                </li>
                                <li>
                                    <i class="flaticon-balcony-and-door"></i>
                                    Balcony
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <ul>
                                <li>
                                    <i class="flaticon-old-typical-phone"></i>
                                    Telephone
                                </li>
                                <li>
                                    <i class="flaticon-car-repair"></i>
                                    Garage
                                </li>
                                <li>
                                    <i class="flaticon-parking"></i>
                                    Parking
                                </li>
                                <li>
                                    <i class="flaticon-monitor"></i>
                                    TV
                                </li>
                                <li>
                                    <i class="flaticon-theatre-masks"></i>
                                    Home Theater
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <ul>
                                <li>
                                    <i class="fa fa-clock-o"></i>
                                    Alarm
                                </li>
                                <li>
                                    <i class="flaticon-padlock"></i>
                                    Security
                                </li>
                                <li>
                                    <i class="flaticon-weightlifting"></i>
                                    Gym
                                </li>
                                <li>
                                    <i class="flaticon-idea"></i>
                                    Electric Range
                                </li>
                                <li>
                                    <i class="flaticon-green-park-city-space"></i>
                                    Private space
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Comments section start -->
                <div class="comments-section">
                    <h3 class="heading">Comments Section</h3>
                    <div class="fb-comments" data-href="http://duongdinhmanh.com/" data-numposts="10" data-width="100%" data-colorscheme="light" style="border-bottom: 1px solid #fff; height: auto;"></div>
                </div>
                <!-- Contact 1 start -->
                <div class="contact-3 mb-60">
                    <h3 class="heading">Leave a Comment</h3>
                    <div class="container">
                        <div class="row">
                            <form action="#" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group name">
                                            <input type="text" name="name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group email">
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group subject">
                                            <input type="text" name="subject" class="form-control" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group number">
                                            <input type="text" name="phone" class="form-control" placeholder="Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group message">
                                            <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="send-btn">
                                            <button type="submit" class="btn btn-color btn-md btn-message">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar mbl">
                    <!-- Search area start -->
                   <div class="widget search-area d-none d-xl-block d-lg-block">
                        <h5 class="sidebar-title">Advanced Search</h5>
                        <div class="search-area-inner">
                            <div class="search-contents ">
                                {!!  Form::open([ 'method' => 'POST','action' => 'Web\HomeController@searchApartment'])  !!}
                                    <div class="form-group">
                                        {!! Form::select('province', $province, null, [ 'class' => 'selectpicker search-fields', 'id' => 'province' ]) !!}
                                    </div>
                                    <div class="form-group" >
                                        {!! htmlspecialchars_decode(Form::select('districts',$districts , null, [ 'class' => 'selectpicker search-fields', 'id' => 'district' ])) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! htmlspecialchars_decode(Form::select('ward',$ward , null, [ 'class' => 'selectpicker search-fields', 'id' => 'ward' ])) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! htmlspecialchars_decode(Form::select('bedrooms',config('size.array_option_bedrooms') , null , [ 'class' => 'selectpicker search-fields', 'id' => 'ward' ])) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! htmlspecialchars_decode(Form::select('bathrooms',config('size.array_option_bathrooms') , null , [ 'class' => 'selectpicker search-fields', 'id' => 'ward' ])) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! htmlspecialchars_decode(Form::select('apartment_acreage',$apartment_acreage, null , [ 'class' => 'selectpicker search-fields', 'id' => 'ward' ])) !!}
                                    </div>
                                    <div class="form-group">
                                        <div class="range-slider">
                                            <div data-min="0" data-max="150000" data-unit="USD" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="search-button btn-md btn-color" type="submit">Search</button>
                                    </div>
                                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                {!!  Form::close()  !!}
                            </div>
                        </div>
                    </div>

                    <!-- Categories start -->
                    <div class="widget categories">
                        <h5 class="sidebar-title">Đăng Ký Đặt Lịch</h5>
                        @if (Auth::check())
                            <a href='{{ route('dat-lich',$apartmentDetail->id ) }}'>
                                <button class="order-button btn-md btn-color" type="submit">Đặt Lịch</button>
                            </a>
                        @else
                            <a data-toggle="modal" href='#modal-login' data-toggle="modal">
                                <button class="order-button btn-md btn-color" type="submit">Đặt Lịch</button>
                            </a>
                        @endif

                    </div>

                    <!-- Recent posts start -->
                    <div class="widget recent-posts">
                        <h5 class="sidebar-title">Recent Properties</h5>
                        <div class="media mb-4">
                            <a class="pr-4" href="properties-details.html">
                                <img src="assets/img/sub-property/sub-property.jpg" alt="sub-property">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    <a href="properties-details.html">Beautiful Single Home</a>
                                </h5>
                                <p>February 27, 2018</p>
                                <p> <strong>$245,000</strong></p>
                            </div>
                        </div>
                        <div class="media mb-4">
                            <a class="pr-4" href="properties-details.html">
                                <img src="assets/img/sub-property/sub-property-2.jpg" alt="sub-property-2">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    <a href="properties-details.html">Sweet Family Home</a>
                                </h5>
                                <p>February 27, 2018</p>
                                <p> <strong>$245,000</strong></p>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pr-4" href="properties-details.html">
                                <img src="assets/img/sub-property/sub-property-3.jpg" alt="sub-property-3">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    <a href="properties-details.html">Real Luxury Villa</a>
                                </h5>
                                <p>February 27, 2018</p>
                                <p> <strong>$245,000</strong></p>
                            </div>
                        </div>
                    </div>

                    <!-- Social list start -->
                    <div class="social-list widget clearfix">
                        <h5 class="sidebar-title">Follow Us</h5>
                        <ul>
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="rss-bg"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>

                    <!-- Helping center start -->
                    <div class="helping-center widget clearfix">
                        <div class="media">
                            <i class="fa fa-mobile"></i>
                            <div class="media-body  align-self-center">
                                <h5 class="mt-0">Helping Center</h5>
                                <h4><a href="tel:+0477-85x6-552">+XXXX XXXX XXX</a></h4>
                            </div>
                        </div>
                    </div>

                    <!-- Financing calculator  start -->
                    <div class="contact-1 financing-calculator widget">
                        <h5 class="sidebar-title">Mortgage Calculator</h5>
                        <form action="#" method="GET" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-label">Property Price</label>
                                <input type="text" class="form-control" placeholder="$36.400">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Interest Rate (%)</label>
                                <input type="text" class="form-control" placeholder="10%">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Period In Months</label>
                                <input type="text" class="form-control" placeholder="10 Months">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Down PaymenT</label>
                                <input type="text" class="form-control" placeholder="$21,300">
                            </div>
                            <br>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-color btn-md btn-message btn-block">Cauculate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Post  start -->
@include('layout.post')
<!-- Post  start -->

<!-- partner start -->
@include('layout.partner')
<!-- partner end -->

@endsection
