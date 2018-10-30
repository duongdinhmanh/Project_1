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

            </div>
        </div>
    </div>
@endsection

