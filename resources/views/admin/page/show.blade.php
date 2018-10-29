<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 15/10/2018
 * Time: 21:00
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-database"></i>{{ trans('page.title_show') }}</h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('page.home') }}</a></li>
                    <li><a href="{{ route('pages.index') }}">{{ trans('page.list_pages') }}</a></li>
                    <li class="active">{{ trans('page.show_page') }}</li>
                </ol>
                {{--Edit--}}
                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-round btn-primary">
                    <i class="glyphicon glyphicon-edit"></i>{{ trans('page.edit') }}
                </a>
                @role('admin')
                {{--Delete--}}
                {!! Form::open(['method' => 'DELETE', 'class' =>' display_form', 'route' => ['pages.destroy', 'id' => $page->id]]) !!}
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>' . trans('page.delete'), ['onclick' => "return del_pro('You really want to delete this about us')",'title' => 'Delete Page', 'class' => 'btn btn-round btn-danger', 'type' => 'submit']) !!}
                {!! Form::close() !!}
                @role('admin')
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ trans('page.label_detail_page') }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th scope="row">{{ trans('page.col_title') }}</th>
                                <td>{{ $page->title }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('page.col_slug') }}</th>
                                <td>{{ $page->slug }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('page.col_content') }}</th>
                                <td class="show_content">{!! $page->content !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ trans('page.label_global_page') }}</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="x_content">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th scope="row">{{ trans('page.col_id') }}</th>
                                    <td>{{ $page->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('page.col_created_at') }}</th>
                                    <td>{{ $page->created_at }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('page.col_updated_at') }}</th>
                                    <td>{{ $page->updated_at }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('page.col_status') }}</th>
                                    <td>
                                        @if ($page->status == 1)
                                            <span
                                                class="label label-success">{{ trans('page.label_status_enable') }}</span>
                                        @else
                                            <span
                                                class="label label-warning">{{ trans('page.label_status_disable') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
