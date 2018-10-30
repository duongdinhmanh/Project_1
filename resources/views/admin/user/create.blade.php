<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 10/26/18
 * Time: 11:07 AM
 */
?>

@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-database"></i>ADD - NEW - USER</h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">Home</a></li>
                    <li><a href="{{ route('users.index') }}">List Users</a></li>
                    <li class="active">Create User</li>
                </ol>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        {{--Open Form--}}
                        {!! Form::open(['method' => 'POST', 'route' => ['users.store'],'class' => 'form-horizontal form-label-left']) !!}
                        <span class="section">User Create</span>
                        {{--If success, alert success--}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{--Name--}}
                        <div class="item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {{--lable Name:--}}
                            {!! htmlspecialchars_decode(Form::label('lable_name', 'Name <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input Name--}}
                                {!! Form::text('name', old('name'), ['id' => 'name','class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Name Full']) !!}
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                <p>
                                    <small>Fill in the full name</small>
                                </p>
                            </div>
                        </div>

                        {{--Email--}}
                        <div class="item form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {{--lable email--}}
                            {!! htmlspecialchars_decode(Form::label('label_email','Email <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--input email--}}
                                {!! Form::text('email', old('email'), ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Email of You']) !!}
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                <p>
                                    <small>Complete the email correctly</small>
                                </p>
                            </div>
                        </div>

                        {{--phone--}}
                        <div class="item form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            {{--lable phone:--}}
                            {!! htmlspecialchars_decode(Form::label('label_phone', 'Phone <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input phone--}}
                                {!! Form::text('phone', old('phone'), ['id' => 'phone', 'class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Phone of You']) !!}
                                <span class="text-danger">{!! $errors->first('phone') !!}</span>
                                <p>
                                    <small>Complete the phone correctly</small>
                                </p>
                            </div>
                        </div>

                        {{--address--}}
                        <div class="item form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            {{--lable phone:--}}
                            {!! htmlspecialchars_decode(Form::label('label_address','Address <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input phone--}}
                                {!! Form::text('address', old('address'), ['id' => 'address', 'class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Address of You']) !!}
                                <span class="text-danger">{!! $errors->first('address') !!}</span>
                                <p>
                                    <small>Complete the address correctly</small>
                                </p>
                            </div>
                        </div>

                        {{--status--}}
                        <div class="item form-group">
                            {{--label status--}}
                            {!! htmlspecialchars_decode(Form::label('status_user','Status <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}

                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="radio">
                                    <div class="iradio_flat-green checked radi">
                                        {{--radio check--}}
                                        {{ Form::radio('status', '1' , true, ['id' => 'radClickChecked', 'class'=>'flat inp_radio']) }}
                                    </div>
                                    {!! htmlspecialchars_decode(Form::label('radClickChecked', 'Enable')) !!}
                                </div>
                                <div class="radio">
                                    <div class="iradio_flat-green checked radi">
                                        {{--radio uncheckeck--}}
                                        {{ Form::radio('status', '0' , false, ['id' => 'radClickUnChecked', 'class' => 'flat inp_radio']) }}
                                    </div>
                                    {!! htmlspecialchars_decode(Form::label('radClickUnChecked', 'Disable')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="{{ route('users.index') }}"
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