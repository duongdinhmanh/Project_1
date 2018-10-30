<div class="search-area" id="search-area-1">
    <div class="container">
        <div class="search-area-inner">
            <div class="search-contents ">
                {!!  Form::open([ 'method' => 'POST','route' => 'search-apartment'])  !!}
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                {!! Form::select('province', $province, null, [ 'class' => 'selectpicker search-fields', 'id' => 'province', 'required'=>'']) !!}
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group" >
                                {!! htmlspecialchars_decode(Form::select('districts',$districts , null, [ 'class' => 'selectpicker search-fields', 'id' => 'district', 'required'=>'' ])) !!}
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                {!! htmlspecialchars_decode(Form::select('ward',$ward , null, [ 'class' => 'selectpicker search-fields', 'id' => 'ward', 'required'=>'' ])) !!}
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                {!! htmlspecialchars_decode(Form::select('bedrooms',config('size.array_option_bedrooms') , null , [ 'class' => 'selectpicker search-fields' ])) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                {!! htmlspecialchars_decode(Form::select('Toilet',config('size.array_option_bathrooms') , null , [ 'class' => 'selectpicker search-fields'])) !!}
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                {!! htmlspecialchars_decode(Form::select('apartment_acreage',config('size.aray_option_sq'), null, [ 'class' => 'selectpicker search-fields', 'id' => 'ward', 'placeholder'=> 'Chọn Diện Tích' ])) !!}
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <div class="range-slider">
                                    <div data-min="0" data-max="15000000" data-unit="VND" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
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

