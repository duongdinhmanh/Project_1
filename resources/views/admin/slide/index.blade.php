<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 16/10/2018
 * Time: 08:32
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <i class="fa fa-sort-amount-desc padding_title"></i>{{ trans('slide.title_list') }}
                </h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('slide.home') }}</a></li>
                    <li class="active">{{ trans('slide.list_slides') }}</li>
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
                            <i class="fa fa-sort-alpha-asc"></i>{{ trans('slide.all_slide') }}
                        </h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 title_create_right">
                        <a href="{{ route('slides.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i>{{ trans('slide.btn_create') }}
                        </a>
                    </div>
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th>
                                {!! Form::checkbox('table_records_all',null,false,['id' => 'check-all','class' => 'flat']) !!}
                            </th>
                            <th></th>
                            <th class="column-title display">{{ trans('slide.col_title') }}</th>
                            <th class="column-title display">{{ trans('slide.col_created_at') }}</th>
                            <th class="column-title display">{{ trans('slide.col_status') }}</th>
                            <th class="column-title display">{{ trans('slide.col_action') }}</th>
                        </tr>
                        </thead>
                        <tbody id="slide_list">
                        @foreach ($slides as $slide)
                            <tr class="even pointer bg_color">
                                <td class="a-center ">
                                    <div class="icheckbox_flat-green hover active position">
                                        {!! Form::checkbox('table_records', null, false, ['class'=>'flat position']) !!}
                                    </div>
                                </td>
                                <td class="a-center ">{{ $serial++ }}</td>
                                <td class=" ">{{ $slide->title }}</td>
                                <td class=" ">{{ $slide->created_at }}</td>
                                <td class="status">
                                    @if ($slide->status == 1)
                                        <button
                                            class="btn btn-xs btn-success ">{{ trans('slide.label_status_enable') }}</button>
                                    @else
                                        <button
                                            class="btn btn-xs btn-warning">{{ trans('slide.label_status_disable') }}</button>
                                    @endif
                                </td>
                                <td class="">
                                    {{--Edit--}}
                                    <a href="{{ route('slides.edit',$slide->id) }}" class="btn btn-xs btn-primary"
                                       title="Edit item Slide">
                                        <i class="glyphicon glyphicon-edit"></i>{{trans('slide.edit')}}
                                    </a>
                                    <a href="{{ route('slides.show',$slide->id) }}" class="btn btn-xs btn-info"
                                       title="Show item Slide">
                                        <i class="fa fa-info padding"></i>
                                    </a>
                                    @if ($slide->status == 1)
                                        <a href_page="{!! route('hidden_status_slides', $slide->id) !!}"
                                           id="{{ $slide->id }}"
                                           class="btn btn-xs btn-warning hidden_item" title="Disable item Slide">
                                            <i class="fa fa-eye-slash padding"></i>
                                        </a>
                                    @else
                                        <a href_page="{!! route('show_status_slides', $slide->id) !!}"
                                           id="{{ $slide->id }}"
                                           class="btn btn-xs btn-success show_item" title="Enable item Slide">
                                            <i class="fa fa-eye padding"></i>
                                        </a>
                                    @endif
                                    @role('admin')
                                    {{--delete about--}}
                                    {!! Form::open(['method' => 'DELETE', 'class' => 'display_form', 'route' => ['slides.destroy', 'id' => $slide->id]]) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['onclick'=>"return del_pro('You really want to delete this slide')",'title' => 'Delete Slide', 'class' => 'btn btn-xs btn-danger', 'type' => 'submit']) !!}
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
