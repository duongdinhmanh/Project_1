<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 10/24/18
 * Time: 1:30 PM
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    {{--<i class="fa fa-sort-amount-desc padding_title"></i>{{ trans('rule.title_list') }}--}}
                    <i class="fa fa-sort-amount-desc padding_title"></i>RULES LIST
                </h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    {{--<li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('slide.home') }}</a></li>--}}
                    {{--<li class="active">{{ trans('slide.list_slides') }}</li>--}}
                    <li><a href="{{ action('Admin\DashboardController@index') }}">Home</a></li>
                    <li class="active">List</li>
                </ol>
            </div>
        </div>
        <div class="clearfix clearfix_top"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                {{--alert success--}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <div class="col-md-6 col-sm-6 col-xs-6 title_create_left">
                        <h5 class="box-title">
                            {{--<i class="fa fa-sort-alpha-asc"></i>{{ trans('slide.all_slide') }}--}}
                            <i class="fa fa-sort-alpha-asc"></i>All List
                        </h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 title_create_right">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i> Create Role
                        </a>
                    </div>
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th>
                                {!! Form::checkbox('table_records_all',null,false,['id' => 'check-all','class' => 'flat']) !!}
                            </th>
                            <th></th>
                            <th class="column-title display">Name</th>
                            <th class="column-title display">Display Name</th>
                            <th class="column-title display">Description</th>
                            <th class="column-title display">Create At</th>
                            <th class="column-title display">Action</th>
                        </tr>
                        </thead>
                        <tbody id="slide_list">
                        @foreach ($roles as $role)
                            <tr class="even pointer bg_color">
                                <td class="a-center ">
                                    <div class="icheckbox_flat-green hover active position">
                                        {!! Form::checkbox('table_records', null, false, ['class'=>'flat position']) !!}
                                    </div>
                                </td>
                                <td class="a-center ">{{ $serial++ }}</td>
                                <td class=" ">{{ $role->name }}</td>
                                <td class=" ">{{ $role->display_name }}</td>
                                <td class=" ">{{ $role->description }}</td>
                                <td class=" ">{{ $role->created_at }}</td>
                                <td class="">
                                    {{--Edit--}}
                                    <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-xs btn-primary"
                                       title="Edit item Slide">
                                        <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    {{--delete about--}}
                                    {!! Form::open(['method' => 'DELETE', 'class' => 'display_form', 'route' => ['roles.destroy', 'id' => $role->id]]) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['onclick'=>"return del_pro('You really want to delete this role')",'title' => 'Delete Role', 'class' => 'btn btn-xs btn-danger', 'type' => 'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


