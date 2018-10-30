$(document).ready(function () {
//     $(document).on('click', '.hidden_item', function () {
//         var $this = $(this);
//         //xử lý file name để có thể bắt status ở nhiều link khác nhau. VD: posts, categories,...
//         var url = window.location.pathname;
//         var filename = url.substring(url.lastIndexOf('/') + 1);
//         console.log(filename);
//         if (del('you really want to hidden..?') == true) {
//         var url_del = $(this).attr('href_page');
//         var id = $(this).attr('id');
//         id = parseInt(id);
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//         $.ajax({
//             type: 'POST',
//             url: url_del,
//             dataType: "JSON",
//             data: {id: id},
//             success: function (result) {
//                 if (result == 'success') {
//                     alert('message');
//                 }
//             }
//         }).done(function () {
//             $this.closest("tr").find(".status>button").removeClass('btn-success');
//             $this.closest("tr").find(".status>button").addClass('btn-warning').text('Disable');

//             $this.removeClass('btn-warning hidden_item');
//             var id = $this.attr('id');
//             $this.addClass('btn-success show_item').html('<i class="fa fa-eye"></i>').attr({
//                 title: 'show item',
//                 href_page: window.location.origin + '/admin/show_status_' + filename + '/' + id,
//             });

//         });
//         }
//     });

// });

// $(document).ready(function () {
//     $(document).on('click', '.show_item', function () {
//         var $this = $(this);
//         var url = window.location.pathname;
//         var filename = url.substring(url.lastIndexOf('/') + 1);
//         if (del('you really want to show item..?') == true) {
//         var url_show = $(this).attr('href_page');
//         var id = $(this).attr('id')
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//         $.ajax({
//             type: 'POST',
//             url: url_show,
//             dataType: "JSON",
//             data: {'id': id},
//             success: function (result) {
//                 if (result == 'success') {
//                     alert('message');
//                 }
//             }
//         }).done(function () {
//             $this.closest("tr").find(".status>button").removeClass('btn-warning');
//             $this.closest("tr").find(".status>button").addClass('btn-success ').text('Enable');

//             $this.removeClass('btn-success show_item');
//             var id = $this.attr('id');
//             $this.addClass('btn-warning hidden_item').html(' <i class="fa fa-eye-slash"></i>').attr({
//                 title: 'hidden item',
//                 href_page: window.location.origin + '/admin/hidden_status_' + filename + '/' + id,
//             });
//         })
//         }
//     });
//
$(document).on('click', '.hidden_item', function () {
        var $this = $(this);
        //xử lý file name để có thể bắt status ở nhiều link khác nhau. VD: posts, categories,...
        var url = window.location.pathname;
        var filename = url.substring(url.lastIndexOf('/') + 1);
        console.log(filename);
        if (del('you really want to hidden..?') == true) {
            var url_del = $(this).attr('href_page');
            var id = $(this).attr('id');
            id = parseInt(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: url_del,
                dataType: "JSON",
                data: {id: id},
                success: function (result) {
                    if (result == 'success') {
                        alert('message');
                    }
                }
            }).done(function () {
                $this.closest("tr").find(".status>i").removeClass('active');
                $this.removeClass('btn-warning hidden_item');
                var id = $this.attr('id');
                $this.addClass('btn-success show_item').html('<i class="fa fa-eye"></i>').attr({
                    title: 'show item',
                    href_page: window.location.origin + '/admin/show_status_' + filename + '/' + id,
                });
            });
        }
    });

    $(document).on('click', '.show_item', function () {
        var $this = $(this);
        var url = window.location.pathname;
        var filename = url.substring(url.lastIndexOf('/') + 1);
        if (del('you really want to show item..?') == true) {
            var url_show = $(this).attr('href_page');
            var id = $(this).attr('id')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: url_show,
                dataType: "JSON",
                data: {'id': id},
                success: function (result) {
                    if (result == 'success') {
                        alert('message');
                    }
                }
            }).done(function () {
                $this.closest("tr").find(".status>i").addClass('active');
                $this.removeClass('btn-success show_item');
                var id = $this.attr('id');
                $this.addClass('btn-warning hidden_item').html(' <i class="fa fa-eye-slash"></i>').attr({
                    title: 'hidden item',
                    href_page: window.location.origin + '/admin/hidden_status_' + filename + '/' + id,
                });
            })
        }
    });

});

// var element = $("#C1").text().split(" ");
   // var check = element.length;
   // element.text(element[check-1]);

// $('#myForm').on('submit', function(event) {
//     event.preventDefault();
//     var url = route('save_info_location');
//     $.ajaxSetup({
//     headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//         type: 'POST',
//         url: url,
//         data: $(this).serialize(),
//         success: function (data) {
//             console.log(data);
//         }
//     });
// });
