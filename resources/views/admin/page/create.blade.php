<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 15/10/2018
 * Time: 16:21
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-database"></i>{{ trans('page.title') }}</h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('page.home') }}</a></li>
                    <li><a href="{{ route('pages.index') }}">{{ trans('page.list_pages') }}</a></li>
                    <li class="active">{{ trans('page.create_page') }}</li>
                </ol>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        {{--Open Form--}}
                        {!! Form::open(['method' => 'POST', 'route' => ['pages.store'],'class' => 'form-horizontal form-label-left']) !!}
                        <span class="section">{{ trans('page.title_page') }}</span>
                        {{--If success, alert success--}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{--Title--}}
                        <div class="item form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            {{--lable Title:--}}
                            {!! htmlspecialchars_decode(Form::label('title', trans('page.lable_title') . ' <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input Title--}}
                                {!! Form::text('title', old('title'), ['id' => 'title','class' => 'form-control col-md-7 col-xs-12 input_slug', 'placeholder' => trans('page.place_title')]) !!}
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                <p>
                                    <small>{{ trans('page.hint_title') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--Slug--}}
                        <div class="item form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                            {{--lable slug--}}
                            {!! htmlspecialchars_decode(Form::label('slug', trans('page.label_slug') . ' <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--input slug--}}
                                {!! Form::text('slug', old('slug'), ['class' => 'form-control col-md-7 col-xs-12 output_slug', 'placeholder' => trans('page.place_slug')]) !!}
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                                <p>
                                    <small>{{ trans('page.hint_slug') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--content--}}
                        <div class="item form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                            {{--lable content:--}}
                            {!! htmlspecialchars_decode(Form::label('content', trans('page.label_content') . ' <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input content--}}
                                {!! Form::textarea('content', old('content'), ['id' => 'content', 'class' => 'form-control col-md-7 col-xs-12 input_slug article-ckeditor', 'placeholder' => trans('page.place_content')]) !!}
                                <span class="text-danger">{!! $errors->first('content') !!}</span>
                                <p>
                                    <small>{{ trans('page.hint_content') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--status--}}
                        <div class="item form-group">
                            {{--label status--}}
                            {!! htmlspecialchars_decode(Form::label('status_about_us',trans('page.label_status') . ' <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}

                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="radio">
                                    <div class="iradio_flat-green checked radi">
                                        {{--radio check--}}
                                        {{ Form::radio('status', '1' , true, ['id' => 'radClickChecked', 'class'=>'flat inp_radio']) }}
                                    </div>
                                    {!! htmlspecialchars_decode(Form::label('radClickChecked', trans('page.label_status_enable'))) !!}
                                </div>
                                <div class="radio">
                                    <div class="iradio_flat-green checked radi">
                                        {{--radio uncheckeck--}}
                                        {{ Form::radio('status', '0' , false, ['id' => 'radClickUnChecked', 'class' => 'flat inp_radio']) }}
                                    </div>
                                    {!! htmlspecialchars_decode(Form::label('radClickUnChecked', trans('page.label_status_disable'))) !!}
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="{{ route('pages.index') }}"
                                   class="btn btn-primary">{{ trans('page.cancel') }}</a>
                                {!! Form::submit(trans('page.submit'), ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
