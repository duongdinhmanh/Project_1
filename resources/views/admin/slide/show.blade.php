<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 16/10/2018
 * Time: 08:36
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-database"></i>{{ trans('slide.title_show') }}</h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('slide.home') }}</a></li>
                    <li><a href="{{ route('slides.index') }}">{{ trans('slide.list_slides') }}</a></li>
                    <li class="active">{{ trans('slide.show_slide') }}</li>
                </ol>
                {{--Edit--}}
                <a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-round btn-primary">
                    <i class="glyphicon glyphicon-edit"></i>{{ trans('slide.edit') }}
                </a>
                {{--Delete--}}
                {!! Form::open(['method' => 'DELETE', 'class'=>'display_form', 'route' => ['slides.destroy', 'id' => $slide->id]]) !!}
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>' . trans('slide.delete'), ['onclick'=>"return del_pro('You really want to delete this about us')",'title' => 'Delete Page', 'class' => 'btn btn-round btn-danger', 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ trans('slide.label_detail_slide') }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th scope="row">{{ trans('slide.col_title') }}</th>
                                <td>{{ $slide->title }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('slide.col_content') }}</th>
                                <td class="show_content">{!! $slide->content !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ trans('slide.label_global_slide') }}</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="x_content">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th scope="row">{{ trans('slide.col_id') }}</th>
                                    <td>{{ $slide->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('slide.col_created_at') }}</th>
                                    <td>{{ $slide->created_at }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('slide.col_updated_at') }}</th>
                                    <td>{{ $slide->updated_at }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('slide.col_status') }}</th>
                                    <td>
                                        @if ($slide->status == 1)
                                            <span
                                                class="label label-success">{{ trans('slide.label_status_enable') }}</span>
                                        @else
                                            <span
                                                class="label label-warning">{{ trans('slide.label_status_disable') }}</span>
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
