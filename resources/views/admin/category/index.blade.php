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
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('category.home') }}</a></li>
                    <li class="active">{{ trans('category.list_categories') }}</li>
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
                        @foreach ($categories as $cat_parent)
                            <tr class="even pointer bg_color">
                                <td class="a-center ">
                                    <div class="icheckbox_flat-green hover active position">
                                        {!! Form::checkbox('table_records',null,false,['class'=>'flat position']) !!}
                                    </div>
                                </td>
                                <td class="a-center ">{{ ++$serial }}</td>
                                <td class=" "><b>==|| {{ $cat_parent->name }}</b></td>
                                <td class=" ">{{ $cat_parent->slug }}</td>
                                <td class=" ">{{ $cat_parent->created_at }}</td>
                                <td class="status">
                                    @if ($cat_parent->status == 1)
                                        <i class="fa fa-check-circle active"></i>
                                    @else
                                        <i class="fa fa-check-circle"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit',$cat_parent->id) }}" class="btn btn-xs btn-primary"
                                       title="Edit item category">
                                        <i class="glyphicon glyphicon-edit"></i>{{ trans('category.edit') }}
                                    </a>
                                    @if ($cat_parent->status == 1)
                                        <a href_page="{!! route('hidden_status_categories',$cat_parent->id) !!}" id="{{ $cat_parent->id }}" class="btn btn-xs btn-warning hidden_item" title="Disable item category">
                                            <i class="fa fa-eye-slash padding"></i>
                                        </a>
                                    @else
                                        <a href_page="{!! route('show_status_categories',$cat_parent->id) !!}"
                                           id="{{ $cat_parent->id }}"
                                           class="btn btn-xs btn-success show_item" title="Enable item category">
                                            <i class="fa fa-eye padding"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @foreach ($cat_parent->childs as $child)
                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <div class="icheckbox_flat-green hover active position">
                                            {!! Form::checkbox('table_records',null,false,['class'=>'flat position']) !!}
                                        </div>
                                    </td>
                                    <td class="a-center ">{{ $serial.'.'.++$serial_child }}</td>
                                    <td class=" ">==|| ==|| {{ $child->name}}</td>
                                    <td class=" ">{{ $child->slug }}</td>
                                    <td class=" ">{{ $child->created_at }}</td>
                                    <td class="status">
                                        @if ($child->status == 1)
                                            <i class="fa fa-check-circle active"></i>
                                        @else
                                          <i class="fa fa-check-circle"></i>
                                        @endif
                                    </td>
                                    <td class="">
                                        <a href="{{ route('categories.edit',$child->id) }}" class="btn btn-xs btn-primary"
                                           title="Edit item category">
                                            <i class="glyphicon glyphicon-edit"></i>{{ trans('category.edit') }}
                                        </a>
                                        @if ($child->status == 1)
                                            <a href_page="{!! route('hidden_status_categories',$child->id) !!}" id="{{ $child->id }}"
                                               class="btn btn-xs btn-warning hidden_item" title="Disable item category">
                                                <i class="fa fa-eye-slash padding"></i>
                                            </a>
                                        @else
                                            <a href_page="{!! route('show_status_categories',$child->id) !!}" id="{{ $child->id }}"
                                               class="btn btn-xs btn-success show_item" title="Enable item category">
                                                <i class="fa fa-eye padding"></i>
                                            </a>
                                        @endif
                                        {{--delete category_child--}}
                                        {!! Form::open(['method' => 'DELETE', 'class'=>'display_form', 'action' => ['Admin\CategoryController@destroy', 'id' => $child->id]]) !!}
                                        {!! Form::button('<i class="fa fa-trash""></i>', ['onclick'=>"return del_pro('You really want to delete this category')",'title'=> 'Delete category', 'class' => 'btn btn-xs btn-danger', 'type' => 'submit']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @foreach ($child->childs as $child2)
                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <div class="icheckbox_flat-green hover active position">
                                            {!! Form::checkbox('table_records',null,false,['class'=>'flat position']) !!}
                                        </div>
                                    </td>
                                    <td class="a-center ">{{ $serial.'.'.++$serial_child }}</td>
                                    <td class=" ">==|| ==||==|| {{ $child2->name}}</td>
                                    <td class=" ">{{ $child2->slug }}</td>
                                    <td class=" ">{{ $child2->created_at }}</td>
                                    <td class="status">
                                        @if ($child2->status == 1)
                                            <i class="fa fa-check-circle active"></i>
                                        @else
                                           <i class="fa fa-check-circle"></i>
                                        @endif
                                    </td>
                                    <td class="">
                                        <a href="{{ route('categories.edit',$child2->id) }}" class="btn btn-xs btn-primary"
                                           title="Edit item category">
                                            <i class="glyphicon glyphicon-edit"></i>{{ trans('category.edit') }}
                                        </a>
                                        @if ($child2->status == 1)
                                            <a href_page="{!! route('hidden_status_categories',$child2->id) !!}" id="{{ $child2->id }}"
                                               class="btn btn-xs btn-warning hidden_item" title="Disable item category">
                                                <i class="fa fa-eye-slash padding"></i>
                                            </a>
                                        @else
                                            <a href_page="{!! route('show_status_categories',$child2->id) !!}" id="{{ $child2->id }}"
                                               class="btn btn-xs btn-success show_item" title="Enable item category">
                                                <i class="fa fa-eye padding"></i>
                                            </a>
                                        @endif
                                        {{--delete category_child--}}
                                        {!! Form::open(['method' => 'DELETE', 'class'=>'display_form', 'action' => ['Admin\CategoryController@destroy', 'id' => $child2->id]]) !!}
                                        {!! Form::button('<i class="fa fa-trash""></i>', ['onclick'=>"return del_pro('You really want to delete this category')",'title'=> 'Delete category', 'class' => 'btn btn-xs btn-danger', 'type' => 'submit']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            @endforeach
                        @endforeach
                        <tr>
                            <td colspan="7" rowspan="" headers="" style="text-align: right">
                                {!! $categories->links() !!}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
