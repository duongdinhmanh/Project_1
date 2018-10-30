<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 15/10/2018
 * Time: 15:31
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-database"></i>{{ trans('about_us.title_show') }}</h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('about_us.home') }}</a></li>
                    <li><a href="{{ route('about_us.index') }}">{{ trans('about_us.list_aboutus') }}</a></li>
                    <li class="active">{{ trans('about_us.show_aboutus') }}</li>
                </ol>
                {{--Edit--}}
                <a href="{{ route('about_us.edit', $aboutUs->id) }}" class="btn btn-round btn-primary">
                    <i class="glyphicon glyphicon-edit"></i>{{ trans('about_us.edit') }}
                </a>
                @role('admin')
                {{--Delete--}}
                {!! Form::open(['method' => 'DELETE', 'class' => 'display_form', 'route' => ['about_us.destroy', 'id' => $aboutUs->id]]) !!}
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>' . trans('about_us.delete'), ['onclick' => "return del_pro('You really want to delete this about us')",'title' => 'Delete About us', 'class' => 'btn btn-round btn-danger', 'type' => 'submit']) !!}
                {!! Form::close() !!}
                @endrole
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ trans('about_us.label_detail_about_us') }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th scope="row">{{ trans('about_us.col_title') }}</th>
                                <td>{{ $aboutUs->title }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('about_us.col_slug') }}</th>
                                <td>{{ $aboutUs->slug }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('about_us.col_content') }}</th>
                                <td class="show_content">{!! $aboutUs->content !!}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('about_us.col_awards') }}</th>
                                <td>{{ $aboutUs->awards }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('about_us.col_winning_awards') }}</th>
                                <td>{{ $aboutUs->winning_awards }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('about_us.col_line_of_code') }}</th>
                                <td>{{ $aboutUs->line_of_code }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('about_us.col_happy_clients') }}</th>
                                <td>{{ $aboutUs->happy_clients }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ trans('about_us.label_global_about_us') }}</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="x_content">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th scope="row">{{ trans('about_us.col_id') }}</th>
                                    <td>{{ $aboutUs->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('about_us.col_created_at') }}</th>
                                    <td>{{ $aboutUs->created_at }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('about_us.col_updated_at') }}</th>
                                    <td>{{ $aboutUs->updated_at }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('about_us.col_status') }}</th>
                                    <td>
                                        @if ($aboutUs->status == 1)
                                            <span
                                                    class="label label-success">{{ trans('about_us.label_status_enable') }}</span>
                                        @else
                                            <span
                                                    class="label label-warning">{{ trans('about_us.label_status_disable') }}</span>
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
