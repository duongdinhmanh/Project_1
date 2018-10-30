<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 10/24/18
 * Time: 3:08 PM
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-database padding"></i>ADD - NEW - ROLE</h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">Home</a></li>
                    <li><a href="{{ route('roles.index') }}">List Roles</a></li>
                    <li class="active">Edit Role</li>
                </ol>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        {{--Open Form--}}
                        {!! Form::open(['method' => 'PUT', 'route' => ['roles.update', $role->id],'class' => 'form-horizontal form-label-left']) !!}
                        <span class="section">Role Edit</span>
                        {{--If success, alert success--}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{--Name Role--}}
                        <div class="item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {{--lable Name:--}}
                            {!! htmlspecialchars_decode(Form::label('name', 'Name <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}

                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input name--}}
                                {!! Form::text('name', $role->name, ['id' => 'name', 'class' => 'form-control col-md-7 col-xs-12',
                                'placeholder' => 'Name Role']) !!}
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                <p>
                                    <small>{{ trans('category.hint_name') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--Display Name--}}
                        <div class="item form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
                            {{--lable display_name:--}}
                            {!! Form::label('display_name', 'Display Name ', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input name--}}
                                {!! Form::text('display_name', $role->display_name, ['id' => 'display_name', 'class' => 'form-control col-md-7 col-xs-12',
                                'placeholder' => 'Display Name Role']) !!}
                                <span class="text-danger">{{ $errors->first('display_name') }}</span>
                                <p>
                                    <small>{{ trans('category.hint_name') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--Description--}}
                        <div class="item form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            {{--lable description:--}}
                            {!! Form::label('description', 'Description ', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input name--}}
                                {!! Form::text('description', $role->description, ['id' => 'description', 'class' => 'form-control col-md-7 col-xs-12',
                                'placeholder' => 'Description Role']) !!}
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                <p>
                                    <small>{{ trans('category.hint_name') }}</small>
                                </p>
                            </div>
                        </div>

                        {{--Permission--}}
                        <div class="item form-group {{ $errors->has('permission') ? 'has-error' : '' }}">
                            {{--lable Permission:--}}
                            {!! htmlspecialchars_decode(Form::label('permission', 'Permission <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'))) !!}

                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {{--Input Permission--}}
                                @foreach($permissions as $permission)
                                    <input type="checkbox" {{ in_array($permission->id, $rolePermissions) ? "checked" : "" }} name="permission[]"
                                           value="{{ $permission->id }}"/> {{ $permission->display_name }} <br>
                                @endforeach



                                <span class="text-danger">{{ $errors->first('permission') }}</span>
                                <p>
                                    <small>{{ trans('category.hint_name') }}</small>
                                </p>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="{{ route('roles.index') }}"
                                   class="btn btn-primary">Cancel</a>
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
