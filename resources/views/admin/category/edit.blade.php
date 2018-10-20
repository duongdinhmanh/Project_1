<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 18/10/2018
 * Time: 12:56
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-database padding_title"></i>{{ trans('category.title') }}</h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('category.home') }}</a></li>
                    <li><a href="{{ route('categories.index') }}">{{ trans('category.list_categories') }}</a></li>
                    <li class="active">{{ trans('category.edit_category') }}</li>
                </ol>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        {{--Open Form--}}
                        {!! Form::model($category, ['method'=>'PUT', 'route'=>['categories.update', $category->id], 'class'=>'form-horizontal form-label-left']) !!}
                        <span class="section">{{ trans('category.title_edit') }}</span>
                        {{--If success, alert success--}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {{--lable Name:--}}
                            {!! htmlspecialchars_decode(Form::label('name_category', trans('category.label_name') . ' <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input name--}}
                                {!! Form::text('name', old('name'), ['id'=>'name', 'class'=>'form-control col-md-7 col-xs-12 input_slug', 'placeholder'=>trans('category.place_name')]) !!}
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                <p>
                                    <small>{{ trans('category.hint_name') }}</small>
                                </p>
                            </div>
                        </div>

                        <div class="item form-group">
                            {{--lable slug--}}
                            {!! htmlspecialchars_decode(Form::label('slug_category', trans('category.label_slug') . ' <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--input slug--}}
                                {!! Form::text('slug', old('slug'), ['class'=>'form-control col-md-7 col-xs-12 output_slug', 'placeholder' => trans('category.place_slug')]) !!}
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                                <p>
                                    <small>{{ trans('category.hint_slug') }}</small>
                                </p>
                            </div>
                        </div>

                        <div class="item form-group">
                            {{--label parent category--}}
                            {!! htmlspecialchars_decode(Form::label('parent_category', trans('category.label_category') . ' <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--select; categories: mảng category cha;--}}
                                {{--if parent_id == 0 thì disabled không cho chọn sửa lại danh mục cha. ngược lại.--}}
                                @if ($category->parent_id == 0)
                                    {!! Form::select('parent_id',$categories, null, ['disabled'=>'disabled','class'=>'form-control', 'placeholder'=>trans('category.select_category')]) !!}
                                @else
                                    {!! Form::select('parent_id',$categories, null, ['class'=>'form-control', 'placeholder'=>trans('category.select_category')]) !!}
                                @endif
                                <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                            </div>
                        </div>

                        <div class="item form-group">
                            {{--label status--}}
                            {!! htmlspecialchars_decode(Form::label('status_category', trans('category.label_status') . ' <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="radio">
                                    <div class="iradio_flat-green checked radi">
                                        {{--radio check--}}
                                        {{ Form::radio('status', '1' , true, ['id'=> 'radClickChecked', 'class'=>'flat inp_radio']) }}
                                    </div>
                                    {!! htmlspecialchars_decode(Form::label('radClickChecked', trans('category.label_status_enable'))) !!}
                                </div>
                                <div class="radio">
                                    <div class="iradio_flat-green checked radi">
                                        {{--radio uncheckeck--}}
                                        {{ Form::radio('status', '0' , false, ['id'=> 'radClickUnChecked', 'class'=>'flat inp_radio']) }}
                                    </div>
                                    {!! htmlspecialchars_decode(Form::label('radClickUnChecked', trans('category.label_status_disable'))) !!}
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="{{url()->previous()}}"
                                   class="btn btn-primary">{{ trans('category.cancel') }}</a>
                                {!! Form::submit(trans('category.submit'), ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
