<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 19/10/2018
 * Time: 09:53
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <i class="fa fa-sort-amount-desc padding_title"></i>{{ trans('post.title_list') }}
                </h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('post.home') }}</a></li>
                    <li class="active">{{ trans('post.list_posts') }}</li>
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
                            <i class="fa fa-sort-alpha-asc"></i>{{ trans('post.all_posts') }}
                        </h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 title_create_right">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i>{{ trans('post.btn_create') }}
                        </a>
                    </div>
                    <table class="table table-striped jambo_table bulk_action" id="table-post">
                        <thead>
                        <tr class="headings">
                            <th>
                                {!! Form::checkbox('table_records_all',null,false,['id' => 'check-all', 'class'=>'flat']) !!}
                            </th>
                            <th class="column-title display">{{ trans('post.label_img') }}</th>
                            <th class="column-title display">{{ trans('post.col_title') }}</th>
                            <th class="column-title display">{{ trans('post.col_slug') }}</th>
                            <th class="column-title display">{{ trans('post.col_cat') }}</th>
                            <th class="column-title display">{{ trans('post.col_created_at') }}</th>
                            <th class="column-title display">{{ trans('post.col_status') }}</th>
                            <th class="column-title display">{{ trans('post.col_action') }}</th>
                        </tr>
                        </thead>
                        <tbody id="post_list">
                        @foreach ($posts as $post)
                            <tr class="even pointer bg_color">
                                <td class="a-center ">
                                    <div class="icheckbox_flat-green hover active position">
                                        {!! Form::checkbox('table_records',null,false,['class' => 'flat position']) !!}
                                    </div>
                                </td>
                                <td class=" ">
                                    <img src="{{ $post->image }}" alt="" class="img-post">
                                </td>
                                <td class=" ">{{ $post->title }}</td>
                                <td class=" ">{{ $post->slug }}</td>
                                <td class=" ">{{ $post->category->name }}</td>
                                <td class=" ">{{ $post->created_at }}</td>
                                <td class="status">
                                    @if ($post->status == 1)
                                        <button
                                            class="btn btn-xs btn-success ">{{ trans('post.label_status_enable') }}</button>
                                    @else
                                        <button
                                            class="btn btn-xs btn-warning">{{ trans('post.label_status_disable') }}</button>
                                    @endif
                                </td>
                                <td class="">
                                    {{--Edit--}}
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs btn-primary"
                                       title="Edit item post">
                                        <i class="glyphicon glyphicon-edit"></i>{{ trans('post.edit') }}
                                    </a>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-xs btn-info"
                                       title="Show item post">
                                        <i class="fa fa-info padding"></i>
                                    </a>
                                    @if ($post->status == 1)
                                        <a href_page="{!! route('hidden_status_posts', $post->id) !!}"
                                           id="{{ $post->id }}"
                                           class="btn btn-xs btn-warning hidden_item" title="Disable item post">
                                            <i class="fa fa-eye-slash padding"></i>
                                        </a>
                                    @else
                                        <a href_page="{!! route('show_status_posts', $post->id) !!}"
                                           id="{{ $post->id }}"
                                           class="btn btn-xs btn-success show_item" title="Enable item post">
                                            <i class="fa fa-eye padding"></i>
                                        </a>
                                    @endif

                                    @role('admin')
                                    {{--delete post--}}
                                    {!! Form::open(['method' => 'DELETE', 'class' => 'display_form', 'route' => ['posts.destroy', 'id' => $post->id]]) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['onclick' => "return del_pro('You really want to delete this post')",'title' => 'Delete post', 'class' => 'btn btn-xs btn-danger', 'type' => 'submit']) !!}
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
