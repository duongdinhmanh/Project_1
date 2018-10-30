<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 10/26/18
 * Time: 4:21 PM
 */
?>
@extends('admin.index')
@section('content')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        Information Account
                    </h2>
                    <div class="clearfix"></div>
                </div>

                @php
                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
                @endphp

                <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                            {!! Form::model($user, ['method' => 'PUT', 'route' => ['update_img', $user->id]]) !!}
                            <div id="crop-avatar">

                            @if($user->images == null)
                                <!-- Current avatar -->
                                    <a href="javascript:open_popup('{{ config('common.filemanager') }}dialog.php?type=1&popup=1&field_id=fieldID')"
                                       class="thumbnail size_img">
                                        <img class="imagePreview img-responsive avatar-view"
                                             src="{{ config('common.img') }}no-image.png" alt="Avatar"
                                             title="Change the avatar">
                                    </a>
                                    <input id="fieldID" type="hidden" value="" name="image"
                                           enctype="multipart/form-data"/>
                                @else

                                    {{ $actual_link . $user->images }}
                                    <a href="javascript:open_popup('{{ config('common.filemanager') }}dialog.php?type=1&popup=1&field_id=fieldID')"
                                       class="thumbnail size_img">
                                        {{--<img class="imagePreview" src="{!! $actual_link . config('common.image_upload') . $user->images !!}" alt="">--}}
                                        <img class="imagePreview img-responsive avatar-view"
                                             src="{!! $actual_link . $user->images !!}" alt="">
                                    </a>
                                    <input id="fieldID" type="hidden" value="{!! $actual_link . $user->images !!}"
                                           name="image" enctype="multipart/form-data"/>
                                @endif

                            </div>
                            {{--<a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Update Avatar</a>--}}
                            {!! Form::submit('Update Avatar', ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}
                        </div>
                        <h3>{{ $user->name }}</h3>

                        <ul class="list-unstyled user_data">
                            <li>
                                <i class="fa fa-envelope-o user-profile-icon"></i> {{ $user->email }}
                            </li>

                            <li>
                                <i class="fa fa-map-marker user-profile-icon"></i> {{ $user->address }}
                            </li>

                            <li>
                                <i class="fa fa-phone user-profile-icon"></i> {{ $user->phone }}
                            </li>
                            <li>
                                <i class="fa fa-calendar-o user-profile-icon"></i> {{ $user->created_at }}
                            </li>

                        </ul>
                        <br>

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"
                                       aria-expanded="true">
                                        Account Information
                                    </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab"
                                       aria-expanded="false">
                                        Change the Password
                                    </a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content2"
                                     aria-labelledby="profile-tab">
                                    {{--Open Form--}}
                                    {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id],'class' => 'form-horizontal form-label-left']) !!}
                                    {{--If success, alert success--}}
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    {{--Name--}}
                                    <div class="item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        {{--lable Name:--}}
                                        {!! htmlspecialchars_decode(Form::label('lable_name', 'Name ', array('class' => 'control-label col-md-1 col-sm-1 col-xs-12'))) !!}
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            {{--Input Name--}}
                                            {!! Form::text('name', $user->name, ['id' => 'name','class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Name Full']) !!}
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                            <p>
                                                <small>Fill in the full name</small>
                                            </p>
                                        </div>
                                    </div>

                                    {{--Email--}}
                                    <div class="item form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        {{--lable email--}}
                                        {!! htmlspecialchars_decode(Form::label('label_email','Email ', array('class' => 'control-label col-md-1 col-sm-1 col-xs-12'))) !!}
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            {{--input email--}}
                                            {!! Form::text('email', $user->email, ['class' => 'form-control col-md-7 col-xs-12', 'disabled' => 'disabled']) !!}
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            <p>
                                                <small>Complete the email correctly</small>
                                            </p>
                                        </div>
                                    </div>

                                    {{--phone--}}
                                    <div class="item form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                        {{--lable phone:--}}
                                        {!! htmlspecialchars_decode(Form::label('label_phone', 'Phone ', array('class' => 'control-label col-md-1 col-sm-1 col-xs-12'))) !!}
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            {{--Input phone--}}
                                            {!! Form::text('phone', $user->phone, ['id' => 'phone', 'class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Phone of You']) !!}
                                            <span class="text-danger">{!! $errors->first('phone') !!}</span>
                                            <p>
                                                <small>Complete the phone correctly</small>
                                            </p>
                                        </div>
                                    </div>

                                    {{--address--}}
                                    <div class="item form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                        {{--lable phone:--}}
                                        {!! htmlspecialchars_decode(Form::label('label_address','Address ', array('class' => 'control-label col-md-1 col-sm-1 col-xs-12'))) !!}
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            {{--Input phone--}}
                                            {!! Form::text('address', $user->address, ['id' => 'address', 'class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Address of You']) !!}
                                            <span class="text-danger">{!! $errors->first('address') !!}</span>
                                            <p>
                                                <small>Complete the address correctly</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-5">
                                            {!! Form::submit('Update ProFile', ['class' => 'btn btn-success']) !!}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content3"
                                     aria-labelledby="profile-tab">
                                    {{--Open Form--}}
                                    {!! Form::open(['method' => 'POST', 'route' => ['users.store'],'class' => 'form-horizontal form-label-left']) !!}
                                    {{--If success, alert success--}}
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    {{--password_current--}}
                                    <div class="item form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        {{--lable password_current:--}}
                                        {!! htmlspecialchars_decode(Form::label('lable_password_current', 'Current Password ', array('class' => 'control-label col-md-2 col-sm-2 col-xs-12'))) !!}
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            {{--Input Name--}}
                                            {!! Form::text('password_current', null, ['id' => 'password_current','class' => 'form-control col-md-7 col-xs-12']) !!}
                                            <span class="text-danger">{{ $errors->first('password_current') }}</span>
                                            <p>
                                                <small>Password current of you</small>
                                            </p>
                                        </div>
                                    </div>

                                    {{--A new password--}}
                                    <div class="item form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        {{--lable password_current:--}}
                                        {!! htmlspecialchars_decode(Form::label('lable_password_new', 'New Password ', array('class' => 'control-label col-md-2 col-sm-2 col-xs-12'))) !!}
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            {{--Input Name--}}
                                            {!! Form::text('password_new', null, ['id' => 'password_new','class' => 'form-control col-md-7 col-xs-12']) !!}
                                            <span class="text-danger">{{ $errors->first('password_new') }}</span>
                                            <p>
                                                <small>A new Password of you</small>
                                            </p>
                                        </div>
                                    </div>

                                    {{--confirm new password--}}
                                    <div class="item form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        {{--lable password_current:--}}
                                        {!! htmlspecialchars_decode(Form::label('lable_password_new_confirm', 'Confirm New Password ', array('class' => 'control-label col-md-2 col-sm-2 col-xs-12'))) !!}
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            {{--Input Name--}}
                                            {!! Form::text('password_new_confirm', null, ['id' => 'password_new_confirm','class' => 'form-control col-md-7 col-xs-12']) !!}
                                            <span class="text-danger">{{ $errors->first('password_new_confirm') }}</span>
                                            <p>
                                                <small>Confirm new Password of you</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-5">
                                            {!! Form::submit('Update ProFile', ['class' => 'btn btn-success']) !!}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

