<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 19/10/2018
 * Time: 10:15
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-database"></i>{{ trans('post.title_show') }}</h3>
            </div>

            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('post.home') }}</a></li>
                    <li><a href="{{ route('posts.index') }}">{{ trans('post.list_posts') }}</a></li>
                    <li class="active">{{ trans('post.show_post') }}</li>
                </ol>
                {{--Edit--}}
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-round btn-primary">
                    <i class="glyphicon glyphicon-edit"></i>{{ trans('post.edit') }}
                </a>
                {{--Delete--}}
                {!! Form::open(['method' => 'DELETE', 'class' => 'display_form', 'route' => ['posts.destroy', 'id' => $post->id]]) !!}
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>' . trans('post.delete'), ['onclick' => "return del_pro('You really want to delete this post')",'title' => 'Delete post', 'class' => 'btn btn-round btn-danger', 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ trans('post.label_detail_post') }}</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-bordered">
                            <tr>
                                <th scope="row">{{ trans('post.col_title') }}</th>
                                <td>{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('post.col_slug') }}</th>
                                <td>{{ $post->slug }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('post.col_desc') }}</th>
                                <td>{{ $post->desc }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('post.col_imgage') }}</th>
                                <td>
                                    @php
                                        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
                                    @endphp
                                    {{--<img src="{{ $url . config('common.image_upload') . $post->image }}">--}}
                                    <img src="{{ $url . $post->image }}">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('post.col_content') }}</th>
                                <td class="show_content">{!! $post->content !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ trans('post.label_global_post') }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="x_content">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th scope="row">{{ trans('post.col_id') }}</th>
                                    <td>{{ $post->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('post.col_cat') }}</th>
                                    <td>{{ $post->category->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('post.col_created_at') }}</th>
                                    <td>{{ $post->created_at }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('post.col_updated_at') }}</th>
                                    <td>{{ $post->updated_at }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ trans('post.col_status') }}</th>
                                    <td>
                                        @if ($post->status == 1)
                                            <span
                                                class="label label-success">{{ trans('post.label_status_enable') }}</span>
                                        @else
                                            <span
                                                class="label label-warning">{{ trans('post.label_status_disable') }}</span>
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
