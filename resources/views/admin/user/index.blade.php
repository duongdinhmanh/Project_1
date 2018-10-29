<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 10/26/18
 * Time: 10:50 AM
 */
?>
@extends('admin.index')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <i class="fa fa-sort-amount-desc padding_title"></i>USERS LIST
                </h3>
            </div>
            {{--breadcrumb--}}
            <div class="title_right">
                <ol class="breadcrumb">
                    <li><a href="{{ action('Admin\DashboardController@index') }}">{{ trans('slide.home') }}</a></li>
                    <li class="active">{{ trans('slide.list_slides') }}</li>
                    <li><a href="{{ action('Admin\DashboardController@index') }}">Home</a></li>
                    <li class="active">List</li>
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
                <div class="">
                    <div class="col-md-6 col-sm-6 col-xs-6 title_create_left">

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 title_create_right">
                        @role('admin')
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i> Create User
                        </a>
                        @endrole
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <ul class="pagination pagination-split">
                                <li><a href="#">A</a></li>
                                <li><a href="#">B</a></li>
                                <li><a href="#">C</a></li>
                                <li><a href="#">D</a></li>
                                <li><a href="#">E</a></li>
                                <li>...</li>
                                <li><a href="#">W</a></li>
                                <li><a href="#">X</a></li>
                                <li><a href="#">Y</a></li>
                                <li><a href="#">Z</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>

                        @foreach($users as $user)

                            <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                <div class="well profile_view width_profile">
                                    <div class="col-sm-12">
                                        <h4 class="brief">
                                            <i>
                                                <b>
                                                    @foreach($user->roles as $role)
                                                        {{ $role->name }}
                                                    @endforeach
                                                </b>
                                            </i>
                                        </h4>
                                        <div class="left col-xs-7">
                                            <h2>{{ $user->name }}</h2>
                                            <p>
                                                <strong>Email: </strong> {{ $user->email }}
                                            </p>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-building"></i> Address: {{ $user->address }}</li>
                                                <li><i class="fa fa-phone"></i> Phone #: {{ $user->phone }}</li>
                                            </ul>
                                        </div>
                                        @php
                                            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
                                        @endphp
                                        <div class="right col-xs-5 text-center">
                                            @if($user->images == null)
                                                <img src="{{ config('common.img') }}no-image.png" alt=""
                                                     class="img-circle img-responsive">
                                            @else
                                                <img src="{{ $actual_link . $user->images }}" alt=""
                                                     class="img-circle img-responsive">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 bottom text-center">
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                            <p class="ratings">
                                                @if ($user->status == 1)
                                                    <button
                                                            class="btn btn-xs btn-success ">{{ trans('post.label_status_enable') }}</button>
                                                @else
                                                    <button
                                                            class="btn btn-xs btn-warning">{{ trans('post.label_status_disable') }}</button>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                            {{--set permission neu admin co the sua het, user nao sua duoc profile user do--}}
                                            @if(Entrust::hasRole('admin'))
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                   class="btn btn-primary btn-xs"
                                                   title="Edit Profile">
                                                    <i class="fa fa-user"></i> Edit Profile
                                                </a>
                                            @elseif(Entrust::hasRole('manager'))
                                                @if(Auth::user()->id == $user->id)
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                       class="btn btn-primary btn-xs"
                                                       title="Edit Profile">
                                                        <i class="fa fa-user"></i> Edit Profile
                                                    </a>
                                                @endif
                                            @endif

                                            @role('admin')
                                            {!! Form::open(['method' => 'DELETE', 'class' => 'display_form', 'route' => ['users.destroy', 'id' => $user->id]]) !!}
                                            {!! Form::button('<i class="fa fa-trash"></i> Delete', ['onclick' => "return del_pro('You really want to delete this account')",'title' => 'Delete account', 'class' => 'btn btn-xs btn-danger', 'type' => 'submit']) !!}
                                            {!! Form::close() !!}
                                            @endrole
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
