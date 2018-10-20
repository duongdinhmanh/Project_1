<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 19/10/2018
 * Time: 09:19
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-database"></i>{{ trans('post.title') }}</h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('post.home') }}</a></li>
                    <li><a href="{{ route('posts.index') }}">{{ trans('post.list_posts') }}</a></li>
                    <li class="active">{{ trans('post.create_post') }}</li>
                </ol>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        {{--Open Form--}}
                        {!! Form::open(['method' => 'POST', 'route' => ['posts.store'], 'class' => 'form-horizontal form-label-left']) !!}
                        <span class="section">{{ trans('post.title_create') }}</span>
                        {{--If success, alert success--}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{--Title--}}
                        <div class="item form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            {{--lable Title:--}}
                            {!! htmlspecialchars_decode(Form::label('title_post', trans('post.lable_title') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input Title--}}
                                {!! Form::text('title', old('title'), ['id' => 'title', 'class' => 'form-control col-md-7 col-xs-12 input_slug', 'placeholder' => trans('post.place_title')]) !!}
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                <p>
                                    <small>{{ trans('post.hint_title') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--Slug--}}
                        <div class="item form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                            {{--lable slug--}}
                            {!! htmlspecialchars_decode(Form::label('slug_post', trans('post.label_slug') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--input slug--}}
                                {!! Form::text('slug', old('slug'), ['class' => 'form-control col-md-7 col-xs-12 output_slug', 'placeholder' => trans('post.place_slug')]) !!}
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                                <p>
                                    <small>{{ trans('post.hint_slug') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--description--}}
                        <div class="item form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
                            {{--lable desc:--}}
                            {!! htmlspecialchars_decode(Form::label('desc_post', trans('post.label_desc') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input desc--}}
                                {!! Form::textarea('desc', old('desc'), ['id' => 'desc', 'rows' => 4, 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => trans('post.place_desc')]) !!}
                                <span class="text-danger">{{ $errors->first('desc') }}</span>
                                <p>
                                    <small>{{ trans('post.hint_desc') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--content--}}
                        <div class="item form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                            {{--lable content:--}}
                            {!! htmlspecialchars_decode(Form::label('content_post', trans('post.label_content') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input content--}}
                                {!! Form::textarea('content', old('content'), ['id' => 'content', 'class' => 'form-control col-md-7 col-xs-12 input_slug article-ckeditor', 'placeholder' => trans('post.place_content')]) !!}
                                <span class="text-danger">{!! $errors->first('content') !!}</span>
                                <p>
                                    <small>{{ trans('post.hint_content') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--image--}}
                        <div class="item form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            {{--lable image:--}}
                            {!! htmlspecialchars_decode(Form::label('image_post',trans('post.label_img') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <a href="javascript:open_popup('{{ config('common.filemanager') }}dialog.php?type=1&popup=1&field_id=fieldID')"
                                   class="thumbnail size_img">
                                    <img class="imagePreview" src="{{ config('common.img') }}no-image.png"
                                         alt="">
                                </a>

                                <input id="fieldID" type="hidden" value="" name="image" enctype="multipart/form-data"/>
                                <a href="javascript:open_popup('{{ config('common.filemanager') }}dialog.php?type=1&popup=1&field_id=fieldID')">
                                    <button type="button"
                                            class="btn btn-success mar_bot">{{ trans('post.btn_img') }}</button>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="item form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                            {{--label category--}}
                            {!! htmlspecialchars_decode(Form::label('categories',trans('post.label_cat') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--select--}}
                                {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control', 'placeholder' => trans('post.select_cat')]) !!}
                                <span class="text-danger">{{ $errors->first('categories') }}</span>
                            </div>
                        </div>

                        <div class="item form-group">
                            {{--label status--}}
                            {!! htmlspecialchars_decode(Form::label('status_post',trans('post.label_status') . ' <span class="required">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="radio">
                                    <div class="iradio_flat-green checked radi">
                                        {{--radio check--}}
                                        {{ Form::radio('status', '1' , true, ['id' => 'radClickChecked', 'class' => 'flat inp_radio']) }}
                                    </div>
                                    {!! Form::label('radClickChecked', trans('post.label_status_enable')) !!}
                                </div>
                                <div class="radio">
                                    <div class="iradio_flat-green checked radi">
                                        {{--radio uncheckeck--}}
                                        {{ Form::radio('status', '0' , false, ['id' => 'radClickUnChecked', 'class' => 'flat inp_radio']) }}
                                    </div>
                                    {!! Form::label('radClickUnChecked', trans('post.label_status_disable')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="{{ route('posts.index') }}" class="btn btn-primary">{{ trans('post.cancel') }}</a>
                                {!! Form::submit(trans('post.submit'), ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
