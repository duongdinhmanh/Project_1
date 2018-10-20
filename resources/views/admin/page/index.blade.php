<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 15/10/2018
 * Time: 16:48
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <i class="fa fa-sort-amount-desc padding_title"></i>{{ trans('page.title_list') }}
                </h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('page.home') }}</a></li>
                    <li class="active">{{ trans('page.list_pages') }}</li>
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
                            <i class="fa fa-sort-alpha-asc"></i>{{ trans('page.all_about_us') }}
                        </h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 title_create_right">
                        <a href="{{ route('pages.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i>{{ trans('page.btn_create') }}
                        </a>
                    </div>
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th>
                                {!! Form::checkbox('table_records_all',null,false,['id'=>'check-all','class'=>'flat']) !!}
                            </th>
                            <th></th>
                            <th class="column-title display">{{ trans('page.col_title') }}</th>
                            <th class="column-title display">{{ trans('page.col_created_at') }}</th>
                            <th class="column-title display">{{ trans('page.col_status') }}</th>
                            <th class="column-title display">{{ trans('page.col_action') }}</th>
                        </tr>
                        </thead>
                        <tbody id="aboutus_list">
                        @foreach ($pages as $page)
                            <tr class="even pointer bg_color">
                                <td class="a-center ">
                                    <div class="icheckbox_flat-green hover active position">
                                        {!! Form::checkbox('table_records',null,false,['class'=>'flat position']) !!}
                                    </div>
                                </td>
                                <td class="a-center ">{{ $serial++ }}</td>
                                <td class=" ">{{ $page->title }}</td>
                                <td class=" ">{{ $page->created_at }}</td>
                                <td class="status">
                                    @if ($page->status == 1)
                                        <button
                                            class="btn btn-xs btn-success ">{{ trans('page.label_status_enable') }}</button>
                                    @else
                                        <button
                                            class="btn btn-xs btn-warning">{{ trans('page.label_status_disable') }}</button>
                                    @endif
                                </td>
                                <td class="">
                                    {{--Edit--}}
                                    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-xs btn-primary"
                                       title="Edit item page">
                                        <i class="glyphicon glyphicon-edit"></i>{{trans('page.edit')}}
                                    </a>
                                    <a href="{{ route('pages.show', $page->id) }}" class="btn btn-xs btn-info"
                                       title="Show item page">
                                        <i class="fa fa-info padding"></i>
                                    </a>
                                    @if ($page->status == 1)
                                        <a href_page="{!! route('hidden_status_pages', $page->id) !!}"
                                           id="{{ $page->id }}"
                                           class="btn btn-xs btn-warning hidden_item" title="Disable item page">
                                            <i class="fa fa-eye-slash padding"></i>
                                        </a>
                                    @else
                                        <a href_page="{!! route('show_status_pages', $page->id) !!}"
                                           id="{{ $page->id }}"
                                           class="btn btn-xs btn-success show_item" title="Enable item page">
                                            <i class="fa fa-eye padding"></i>
                                        </a>
                                    @endif
                                    {{--delete about--}}
                                    {!! Form::open(['method' => 'DELETE', 'class' => 'display_form', 'route' => ['pages.destroy', 'id' => $page->id]]) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['onclick' => "return del_pro('You really want to delete this page')",'title' => 'Delete Page', 'class' => 'btn btn-xs btn-danger', 'type' => 'submit']) !!}
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

