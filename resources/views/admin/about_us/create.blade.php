<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 15/10/2018
 * Time: 08:40
 */
?>

@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-database"></i>{{ trans('about_us.title') }}</h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('about_us.home') }}</a></li>
                    <li><a href="{{ route('about_us.index') }}">{{ trans('about_us.list_aboutus') }}</a></li>
                    <li class="active">{{ trans('about_us.create_aboutus') }}</li>
                </ol>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        {{--Open Form--}}
                        {!! Form::open(['method' => 'POST', 'route' => ['about_us.store'],'class' => 'form-horizontal form-label-left']) !!}
                        <span class="section">{{ trans('about_us.title_about_us') }}</span>
                        {{--If success, alert success--}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{--Title--}}
                        <div class="item form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            {{--lable Title:--}}
                            {!! htmlspecialchars_decode(Form::label('title', trans('about_us.lable_title') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input Title--}}
                                {!! Form::text('title', old('title'), ['id' => 'title','class' => 'form-control col-md-7 col-xs-12 input_slug', 'placeholder' => trans('about_us.place_title')]) !!}
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                <p>
                                    <small>{{ trans('about_us.hint_title') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--Slug--}}
                        <div class="item form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                            {{--lable slug--}}
                            {!! htmlspecialchars_decode(Form::label('slug', trans('about_us.label_slug') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--input slug--}}
                                {!! Form::text('slug', old('slug'), ['class' => 'form-control col-md-7 col-xs-12 output_slug', 'placeholder' => trans('about_us.place_slug')]) !!}
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                                <p>
                                    <small>{{ trans('about_us.hint_slug') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--content--}}
                        <div class="item form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                            {{--lable content:--}}
                            {!! htmlspecialchars_decode(Form::label('content', trans('about_us.label_content') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input content--}}
                                {!! Form::textarea('content', old('content'), ['id' => 'content','class' => 'form-control col-md-7 col-xs-12 input_slug article-ckeditor', 'placeholder' => trans('about_us.place_content')]) !!}
                                <span class="text-danger">{!! $errors->first('content') !!}</span>
                                <p>
                                    <small>{{ trans('about_us.hint_content') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--awards--}}
                        <div class="item form-group {{ $errors->has('awards') ? 'has-error' : '' }}">
                            {{--lable awards--}}
                            {!! htmlspecialchars_decode(Form::label('awards', trans('about_us.label_awards') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input content--}}
                                {!! Form::number('awards', old('awards'), ['min' => '1', 'id' => 'awards','class' => 'form-control col-md-7 col-xs-12']) !!}
                                <span class="text-danger">{!! $errors->first('awards') !!}</span>
                                <p>
                                    <small>{{ trans('about_us.hint_awards') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--winning_awards--}}
                        <div class="item form-group {{ $errors->has('winning_awards') ? 'has-error' : '' }}">
                            {{--lable awards--}}
                            {!! htmlspecialchars_decode(Form::label('winning_awards', trans('about_us.label_winning_awards') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input content--}}
                                {!! Form::number('winning_awards', old('winning_awards'), ['min' => '1', 'id' => 'winning_awards','class' => 'form-control col-md-7 col-xs-12']) !!}
                                <span class="text-danger">{!! $errors->first('winning_awards') !!}</span>
                                <p>
                                    <small>{{ trans('about_us.hint_winning_awards') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--line_of_code--}}
                        <div class="item form-group {{ $errors->has('line_of_code') ? 'has-error' : '' }}">
                            {{--lable awards--}}
                            {!! htmlspecialchars_decode(Form::label('line_of_code', trans('about_us.label_line_of_code') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input content--}}
                                {!! Form::number('line_of_code', old('line_of_code'), ['min' => '1', 'id' => 'line_of_code', 'class' => 'form-control col-md-7 col-xs-12']) !!}
                                <span class="text-danger">{!! $errors->first('line_of_code') !!}</span>
                                <p>
                                    <small>{{ trans('about_us.hint_line_of_code') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--happy_clients--}}
                        <div class="item form-group {{ $errors->has('happy_clients') ? 'has-error' : '' }}">
                            {{--lable awards--}}
                            {!! htmlspecialchars_decode(Form::label('happy_clients', trans('about_us.label_happy_clients') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input content--}}
                                {!! Form::number('happy_clients', old('happy_clients'), ['min' => '1', 'id' => 'happy_clients','class' => 'form-control col-md-7 col-xs-12']) !!}
                                <span class="text-danger">{!! $errors->first('happy_clients') !!}</span>
                                <p>
                                    <small>{{ trans('about_us.hint_happy_clients') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--status--}}
                        <div class="item form-group">
                            {{--label status--}}
                            {!! htmlspecialchars_decode(Form::label('status_about_us', trans('about_us.label_status') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}

                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="radio">
                                    <div class="iradio_flat-green checked radi">
                                        {{--radio check--}}
                                        {{ Form::radio('status', '1' , true, ['id' => 'radClickChecked', 'class' => 'flat inp_radio']) }}
                                    </div>
                                    {!! htmlspecialchars_decode(Form::label('radClickChecked', trans('about_us.label_status_enable'))) !!}
                                </div>
                                <div class="radio">
                                    <div class="iradio_flat-green checked radi">
                                        {{--radio uncheckeck--}}
                                        {{ Form::radio('status', '0' , false, ['id' => 'radClickUnChecked', 'class' => 'flat inp_radio']) }}
                                    </div>
                                    {!! htmlspecialchars_decode(Form::label('radClickUnChecked', trans('about_us.label_status_disable'))) !!}
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="{{ route('about_us.index') }}"
                                   class="btn btn-primary">{{ trans('about_us.cancel') }}</a>
                                {!! Form::submit(trans('about_us.submit'), ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
