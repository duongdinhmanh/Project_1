@extends('admin.index')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Products <small>List</small></h3>
        </div>
    </div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      @include('admin.message')
      <table class="table table-hover display" id="apartment-table" url-load = "{{ route('getdata-pro') }}">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ trans('config.images') }}</th>
                <th>{{ trans('config.name_pro') }}</th>
                <th>{{ trans('config.category_name') }}</th>
                <th>{{ trans('config.price') }}</th>
                <th>{{ trans('config.name_address') }} </th>
                <th>{{ trans('config.created_at') }}</th>
                <th>{{ trans('config.status') }}</th>
                <th>{{ trans('config.action') }}</th>
            </tr>
        </thead>
        <tfoot class="data-table">
            <tr>
                <th></th>
                <th class="row_none"></th>
                <th></th>
                <th class="row_none"></th>
                <th></th>
                <th></th>
                <th></th>
                <th class="row_none"></th>
                <th class="row_none"></th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
@endsection

@push('scripts_apartment')
<script>
   $('#apartment-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('getdata-pro') }}",
    "columns": [
    { "data": 'id', "name": 'id' },
    { "data": 'image', "name": 'image',
    "render": function (data, type, full, meta) {

        return "<img src=\""+data+" \" height=\"auto\" \" width=\"100\"/>";
    },
},
{ "data": 'name', "name": 'name' },
{ "data": 'category', "name": 'category',
"render": function (data) {
    var x = '';
    data = JSON.parse(data);
    data.forEach(function(v,k) {
        x +='<button type=\"button\" class=\"btn btn-xs btn-info\">'+v.name+'</button>';
    })

    return x ;
},
},
{ "data": 'price', "name": 'price'},
{ "data": 'address', "name": 'address ' },
{ "data": 'created_at', "name": 'created_at' },
{ "data": 'status', "name": 'status',orderable: false, searchable: false,
"render": function (data) {
    if (data == 0) {

        return "<button class=\"btn btn-xs btn-warning\">no checked</button>";
    }else{

        return "<button class=\"btn btn-xs btn-success\">checked</button>";
    }
},
},
{ "data": 'action', "name": 'action', orderable: false, searchable: false},
],
initComplete: function () {
    this.api().columns().every( function () {
        var column = this;
        var select = $('<select><option value=""></option></select>')
        .appendTo( $(column.footer()).empty() )
        .on( 'change', function () {
            var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
                );
            column
            .search( val ? '^'+val+'$' : '', true, false )
            .draw();
        });
        column.data().unique().sort().each( function ( d, j ) {
            if(column.search() === '^'+d+'$'){
                select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
            } else {
                select.append( '<option value="'+d+'">'+d+'</option>' )
            }
        } );
    } );
}
});
</script>
@endpush
