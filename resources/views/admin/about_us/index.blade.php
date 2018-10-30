<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 15/10/2018
 * Time: 14:10
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <i class="fa fa-sort-amount-desc padding_title"></i>{{ trans('about_us.title_list') }}
                </h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('about_us.home') }}</a></li>
                    <li class="active">{{ trans('about_us.list_aboutus') }}</li>
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
                            <i class="fa fa-sort-alpha-asc"></i>{{ trans('about_us.all_about_us') }}
                        </h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 title_create_right">
                        <a href="{{ route('about_us.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i>{{ trans('about_us.btn_create') }}
                        </a>
                    </div>
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th>
                                {!! Form::checkbox('table_records_all',null,false,['id'=>'check-all','class'=>'flat']) !!}
                            </th>
                            <th></th>
                            <th class="column-title display">{{ trans('about_us.col_title') }}</th>
                            <th class="column-title display fix_width">{{ trans('about_us.col_content') }}</th>
                            <th class="column-title display">{{ trans('about_us.col_created_at') }}</th>
                            <th class="column-title display">{{ trans('about_us.col_status') }}</th>
                            <th class="column-title display">{{ trans('about_us.col_action') }}</th>
                        </tr>
                        </thead>
                        <tbody id="aboutus_list">
                        @foreach ($aboutUs as $key)
                            <tr class="even pointer bg_color">
                                <td class="a-center ">
                                    <div class="icheckbox_flat-green hover active position">
                                        {!! Form::checkbox('table_records',null,false,['class'=>'flat position']) !!}
                                    </div>
                                </td>
                                <td class="a-center ">{{ $serial++ }}</td>
                                <td class=" ">{{ $key->title }}</td>
                                <td class=" ">{!! mb_substr($key->content,0,200) !!}</td>
                                <td class=" ">{{ $key->created_at }}</td>
                                <td class="status">
                                    @if ($key->status == 1)
                                        <button
                                            class="btn btn-xs btn-success ">{{ trans('about_us.label_status_enable') }}</button>
                                    @else
                                        <button
                                            class="btn btn-xs btn-warning">{{ trans('about_us.label_status_disable') }}</button>
                                    @endif
                                </td>
                                <td class="">
                                    {{--Edit--}}
                                    <a href="{{ route('about_us.edit', $key->id) }}" class="btn btn-xs btn-primary"
                                       title="Edit item aboutus">
                                        <i class="glyphicon glyphicon-edit"></i>{{trans('about_us.edit')}}
                                    </a>
                                    <a href="{{ route('about_us.show', $key->id) }}" class="btn btn-xs btn-info"
                                       title="Show item aboutus">
                                        <i class="fa fa-info padding"></i>
                                    </a>
                                    @if ($key->status == 1)
                                        <a href_page="{!! route('hidden_status_about_us', $key->id) !!}"
                                           id="{{ $key->id }}"
                                           class="btn btn-xs btn-warning hidden_item" title="Disable item aboutus">
                                            <i class="fa fa-eye-slash padding"></i>
                                        </a>
                                    @else
                                        <a href_page="{!! route('show_status_about_us', $key->id) !!}"
                                           id="{{ $key->id }}"
                                           class="btn btn-xs btn-success show_item" title="Enable item aboutus">
                                            <i class="fa fa-eye padding"></i>
                                        </a>
                                    @endif
                                    @role('admin')
                                    {{--delete about--}}
                                    {!! Form::open(['method' => 'DELETE', 'class'=>'display_form', 'route' => ['about_us.destroy', 'id' => $key->id]]) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['onclick'=>"return del_pro('You really want to delete this aboutus')",'title' => 'Delete Aboutus', 'class' => 'btn btn-xs btn-danger', 'type' => 'submit']) !!}
                                    {!! Form::close() !!}
                                    @endrole
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
