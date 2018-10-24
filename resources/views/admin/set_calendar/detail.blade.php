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
                    <li><a href="{{ action('Admin\SetCalendarController@index') }}">{{ trans('set_calendar.home') }}</a></li>
                    <li class="active">{{ trans('set_calendar.all_set_calendar') }}</li>
                </ol>
            </div>
        </div>
        <div class="clearfix clearfix_top"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <div class="col-md-6 col-sm-6 col-xs-6 title_create_left">
                        <h3 class="box-title">
                               {{ trans('set_calendar.customer_info') }}
                        </h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table border="1px" class="table table-hover">
                            <tbody>
                                <tr>
                                    <td><strong>{{ trans('customer.name') }} : </strong></td>
                                    <td>{{ $checked->name }}</td>
                                </tr>
                                 <tr>
                                    <td><strong>{{ trans('customer.address') }} : </strong></td>
                                    <td>{{ $checked->address }}</td>
                                </tr>
                                 <tr>
                                    <td><strong>{{ trans('customer.phone') }} : </strong></td>
                                    <td>{{ $checked->phone }}</td>
                                </tr>
                                 <tr>
                                    <td><strong>{{ trans('customer.email') }} : </strong></td>
                                    <td>{{ $checked->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 title_create_left">
                        <h3 class="box-title">
                            {{ trans('set_calendar.apartment_info') }}
                        </h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th>
                                  <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </th>
                                <th class="column-title display">{{ trans('config.name_pro') }}</th>
                                <th class="column-title display">{{ trans('config.images') }}</th>
                                <th class="column-title display">{{ trans('config.name_address') }}</th>
                                <th class="column-title display">{{ trans('set_calendar.time') }}</th>
                                <th class="column-title display">{{ trans('set_calendar.note') }}</th>
                                <th class="column-title display">{{ trans('config.status') }}</th>
                            </tr>
                            </thead>
                            <tbody id="apartment_list_set_calendar_detail">
                                <tr class="even pointer bg_color">
                                    <td class="a-center ">
                                        <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                    </td>
                                    <td class=" "><b>{{ $apartment_checked->name }}</b></td>
                                    <td class=" ">
                                        <img src="{{ $apartment_checked->image }}" alt="">
                                    </td>
                                    <td class=" ">{{ $apartment_checked->address }}</td>
                                    <td class=" ">{{ $checked->time }}</td>
                                    <td class=" ">{{ $checked->note }}</td>
                                    <td class="status">
                                        @if ($checked->status == 1)
                                            <button
                                                class="btn btn-xs btn-success">{{ trans('set_calendar.status_enable') }}</button>
                                        @else
                                            <button
                                                class="btn btn-xs btn-warning">{{ trans('set_calendar.status_disable') }}</button>
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
@endsection
