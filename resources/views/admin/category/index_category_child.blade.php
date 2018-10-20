<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 18/10/2018
 * Time: 12:56
 */
?>
@foreach ($childs as $sub_cat)
    <tr class="even pointer">
        <td class="a-center ">
            <div class="icheckbox_flat-green hover active position">
                {!! Form::checkbox('table_records',null,false,['class'=>'flat position']) !!}
            </div>
        </td>
        <td class="a-center ">{{ $serial.'.'.++$serial_child }}</td>
        <td class=" ">==|| ==|| {{ $sub_cat->name}}</td>
        <td class=" ">{{ $sub_cat->slug }}</td>
        <td class=" ">{{ $sub_cat->created_at }}</td>
        <td class="status">
            @if ($sub_cat->status == 1)
                <button class="btn btn-xs btn-success ">{{ trans('category.label_status_enable') }}</button>
            @else
                <button class="btn btn-xs btn-warning">{{ trans('category.label_status_disable') }}</button>
            @endif
        </td>
        <td class="">
            <a href="{{ route('categories.edit',$sub_cat->id) }}" class="btn btn-xs btn-primary"
               title="Edit item category">
                <i class="glyphicon glyphicon-edit"></i>{{ trans('category.edit') }}
            </a>
            @if ($sub_cat->status == 1)
                <a href_page="{!! route('hidden_status_categories',$sub_cat->id) !!}" id="{{ $sub_cat->id }}"
                   class="btn btn-xs btn-warning hidden_item" title="Disable item category">
                    <i class="fa fa-eye-slash padding"></i>
                </a>
            @else
                <a href_page="{!! route('show_status_categories',$sub_cat->id) !!}" id="{{ $sub_cat->id }}"
                   class="btn btn-xs btn-success show_item" title="Enable item category">
                    <i class="fa fa-eye padding"></i>
                </a>
            @endif
            {{--delete category_child--}}
            {!! Form::open(['method' => 'DELETE', 'class'=>'display_form', 'action' => ['Admin\CategoryController@destroy', 'id' => $sub_cat->id]]) !!}
            {!! Form::button('<i class="fa fa-trash""></i>', ['onclick'=>"return del_pro('You really want to delete this category')",'title'=> 'Delete category', 'class' => 'btn btn-xs btn-danger', 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
@endforeach

