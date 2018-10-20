<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 18/10/2018
 * Time: 12:55
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <i class="fa fa-sort-amount-desc padding_title"></i>{{ trans('category.title_list') }}
                </h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">Home</a></li>
                    <li class="active">List Categories</li>
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
                            <i class="fa fa-sort-alpha-asc"></i> {{ trans('category.all_categories') }}
                        </h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 title_create_right">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i>{{ trans('category.btn_create') }}
                        </a>
                    </div>
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th>
                                {!! Form::checkbox('table_records_all',null,false,['id'=>'check-all','class'=>'flat']) !!}
                            </th>
                            <th></th>
                            <th class="column-title display">{{ trans('category.name') }}</th>
                            <th class="column-title display">{{ trans('category.slug') }}</th>
                            <th class="column-title display">{{ trans('category.created_at') }}</th>
                            <th class="column-title display">{{ trans('category.status') }}</th>
                            <th class="column-title display">{{ trans('category.action') }}</th>
                        </tr>
                        </thead>
                        <tbody id="cat_list">
                        @foreach ($categories as $cat)
                            <tr class="even pointer bg_color">
                                <td class="a-center ">
                                    <div class="icheckbox_flat-green hover active position">
                                        {!! Form::checkbox('table_records',null,false,['class'=>'flat position']) !!}
                                    </div>
                                </td>
                                <td class="a-center ">{{ ++$serial }}</td>
                                <td class=" "><b>==|| {{ $cat->name }}</b></td>
                                <td class=" ">{{ $cat->slug }}</td>
                                <td class=" ">{{ $cat->created_at }}</td>
                                <td class="status">
                                    @if ($cat->status == 1)
                                        <button
                                            class="btn btn-xs btn-success">{{ trans('category.label_status_enable') }}</button>
                                    @else
                                        <button
                                            class="btn btn-xs btn-warning">{{ trans('category.label_status_disable') }}</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit',$cat->id) }}" class="btn btn-xs btn-primary"
                                       title="Edit item category">
                                        <i class="glyphicon glyphicon-edit"></i>{{ trans('category.edit') }}
                                    </a>
                                    @if ($cat->status == 1)
                                        <a href_page="{!! route('hidden_status_categories',$cat->id) !!}"
                                           id="{{ $cat->id }}" class="btn btn-xs btn-warning hidden_item"
                                           title="Disable item category">
                                            <i class="fa fa-eye-slash padding"></i>
                                        </a>
                                    @else
                                        <a href_page="{!! route('show_status_categories',$cat->id) !!}"
                                           id="{{ $cat->id }}"
                                           class="btn btn-xs btn-success show_item" title="Enable item category">
                                            <i class="fa fa-eye padding"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            {{--index category childs--}}
                            @if(count($cat -> childs))
                                @include('admin.category.index_category_child',['childs' => $cat->childs])
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
