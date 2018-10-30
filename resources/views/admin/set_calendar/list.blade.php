@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <i class="fa fa-sort-amount-desc padding_title"></i>{{ trans('set_calendar.all_set_calendar') }}
                </h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('category.home') }}</a></li>
                    <li class="active">{{ trans('set_calendar.all_set_calendar') }}</li>
                </ol>
            </div>
        </div>
        <div class="clearfix clearfix_top"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @include('admin.message')
                <div class="table-responsive">
                    <div class="col-md-6 col-sm-6 col-xs-6 title_create_left">
                        <h5 class="box-title">
                            <i class="fa fa-sort-alpha-asc"></i> {{ trans('set_calendar.all_set_calendar') }}
                        </h5>
                    </div>
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th>
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </th>
                            <th class="column-title display">{{ trans('customer.name') }}</th>
                            <th class="column-title display">{{ trans('customer.address') }}</th>
                            <th class="column-title display">{{ trans('customer.phone') }}</th>
                            <th class="column-title display">{{ trans('customer.email') }}</th>
                            <th class="column-title display">{{ trans('config.status') }}</th>
                            <th class="column-title display">{{ trans('config.action') }}</th>
                        </tr>
                        </thead>
                        <tbody id="cat_list">
                        @foreach ($listSetCalendar as $order)
                            <tr class="even pointer bg_color">
                                <td class="a-center ">
                                    <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </td>
                                <td class=" "><b>{{ $order->name }}</b></td>
                                <td class=" ">{{ $order->address }}</td>
                                <td class=" ">{{ $order->phone }}</td>
                                <td class=" ">{{ $order->email }}</td>
                                <td class="status">
                                    @if ($order->status == 1)
                                        <i class="fa fa-check-circle active"></i>
                                    @else
                                        <i class="fa fa-check-circle "></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('set_calendars.show', $order->id) }}" class="btn btn-xs btn-primary"
                                       title="Edit item category">
                                        <i class="glyphicon glyphicon-edit"></i> {{ trans('set_calendar.detail') }}
                                    </a>
                                    @if ($order->status == 1)
                                        <a href_page="{!! route('hidden_status_set_calendars',$order->id) !!}"
                                           id="{{ $order->id }}" class="btn btn-xs btn-warning hidden_item"
                                           title="Disable item">
                                            <i class="fa fa-eye-slash padding"></i>
                                        </a>
                                    @else
                                        <a href_page="{!! route('show_status_set_calendars',$order->id) !!}"
                                           id="{{ $order->id }}"
                                           class="btn btn-xs btn-success show_item" title="Enable item ">
                                            <i class="fa fa-eye padding"></i>
                                        </a>
                                    @endif
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
