{{ Form::open(['url' => route('postSendEmail'), 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) }}
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <div class="jp_cp_right_side_wrapper">
        <div class="jp_cp_right_side_inner_wrapper">
            <h2>{{ __('Dòi Nợ Phong Cách Developer 2018') }}</h2>
            <table>
                <tbody>
                <tr>
                    <td class="td-w25">{{ __('Tên Con Nợ') }}</td>
                    <td class="td-w10">:</td>
                    <td class="td-w65">
                        {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 100]) }}
                    </td>
                </tr>
                <tr>
                    <td class="td-w25">{{ __('Email Của Con Nợ') }}</td>
                    <td class="td-w10">:</td>
                    <td class="td-w65">
                        {{ Form::text('email', null, ['class' => 'form-control', 'maxlength' => 100]) }}
                    </td>
                </tr>
                <tr>
                    <td class="td-w25">{{ __('Gửi Đi Sau Bao Nhiêu Giờ') }}</td>
                    <td class="td-w10">:</td>
                    <td class="td-w65">
                        {{ Form::text('time', null, ['class' => 'form-control', 'maxlength' => 100]) }}
                    </td>
                </tr>
                <tr>
                    <td class="td-w25">{{ __('Số Lượng Tin Gửi Đi') }}</td>
                    <td class="td-w10">:</td>
                    <td class="td-w65">
                        {{ Form::text('amount', null, ['class' => 'form-control', 'maxlength' => 100]) }}
                    </td>
                </tr>
                <tr>
                    <td class="td-w25">{{ __('Nội Dung Dằn Mặt') }}</td>
                    <td class="td-w10">:</td>
                    <td class="td-w65">
                        {{ Form::text('content', null, ['class' => 'form-control', 'maxlength' => 100]) }}
                    </td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <div class="col-md-12 col-sm-6 col-xs-12 col-md-offset-3">
                {{ Form::button(__('Đòi Nợ Start'), ['type' => 'submit', 'name' => 'submit_save', 'class' => 'btn btn-success'] ) }}
            </div>
        </div>
</div>
{{ Form::close() }}
