@extends('website')
@section('home')
<div class="sub-banner overview-bgi">
    <div class="breadcrumb-area">
        <div class="search-area">
            <div class="container">
                <div class="search-area-inner">
                    <div class="search-contents ">
                        {!!  Form::open([ 'method' => 'POST','action' => 'Web\HomeController@searchApartment'])  !!}
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        {!! Form::select('province', $province_search, $province, [ 'class' => 'selectpicker search-fields', 'id' => 'province' ]) !!}
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-3">
                                    <div class="form-group" >
                                        {!! htmlspecialchars_decode(Form::select('districts',$districts_search , $districts, [ 'class' => 'selectpicker search-fields', 'id' => 'district' ])) !!}
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        {!! htmlspecialchars_decode(Form::select('ward',$ward_search , $ward, [ 'class' => 'selectpicker search-fields', 'id' => 'ward' ])) !!}
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        {!! htmlspecialchars_decode(Form::select('bedrooms',config('size.array_option_bedrooms') , $bedrooms, [ 'class' => 'selectpicker search-fields', 'id' => 'ward' ])) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        {!! htmlspecialchars_decode(Form::select('bathrooms',config('size.array_option_bathrooms') , $bathrooms , [ 'class' => 'selectpicker search-fields', 'id' => 'ward' ])) !!}
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        {!! htmlspecialchars_decode(Form::select('apartment_acreage',$apartment_acreage_search, $apartment_acreage , [ 'class' => 'selectpicker search-fields', 'id' => 'ward' ])) !!}
                                    </div>
                                </div>
                                 <div class="col-6 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <div class="range-slider">
                                            <div data-min="{{ $min_price }}" data-max="{{ $max_price }}" data-unit="USD" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <button class="search-button btn-md btn-color" type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                        {!!  Form::close()  !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="featured-properties content-area-2">
    <div class="container">
        <div class="main-title">
            <h1>List Products</h1>
        </div>
        <ul class="list-inline-listing filters filteriz-navigation">
            <li class="active btn filtr-button filtr" data-filter="all">All</li>
            <li data-filter="1" class="btn btn-inline filtr-button filtr">Apartment</li>
            <li data-filter="2" class="btn btn-inline filtr-button filtr">House</li>
            <li data-filter="3" class="btn btn-inline filtr-button filtr">Office</li>
        </ul>
        <div class="row filter-portfolio">
            <div class="cars">
                @foreach ($search as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="3">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <div class="tag button alt featured">Featured</div>
                                    <div class="price-ratings-box">
                                        <p class="price">
                                           {{ number_format($item->price) }} /m2
                                        </p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <img src="{{ $item->image }}" alt="property-7" class="img-fluid">
                                </a>
                                <div class="property-overlay">
                                    <a href="{{ route('apartment-detail') }}" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <a class="overlay-link property-video" title="Test Title">
                                        <i class="fa fa-video-camera"></i>
                                    </a>
                                    <div class="property-magnify-gallery">
                                        <a href="assets/upload/img/property-7.jpg" class="overlay-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="assets/upload/img/property-6.jpg" class="hidden"></a>
                                        <a href="assets/upload/img/property-3.jpg" class="hidden"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="properties-details.html">{{ $item->name }}</a>
                                </h1>
                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i> {{ $item->address }}
                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-bed"></i> {{ $item->bedrooms }} Bedrooms
                                    </li>
                                    <li>
                                        <i class="flaticon-bath"></i> {{ $item->bathrooms }} Bathrooms
                                    </li>
                                    <li>
                                        <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> Sq Ft: {{ $item->acreage }}
                                    </li>
                                    <li>
                                        <i class="flaticon-car-repair"></i> {{ $item->garage }} Garage
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                                <a href="#">
                                    <i class="fa fa-user"></i> Jhon Doe
                                </a>
                                <span>
                                    <i class="fa fa-calendar-o"></i> 2 years ago
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
