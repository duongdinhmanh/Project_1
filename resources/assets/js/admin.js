 function del(smg) {
    if (window.confirm(smg)) {

        return true;
    } else {

        return false;
    }
}

jQuery( '.article-ckeditor' ).each(function() {
    CKEDITOR.replace(this,{
        language:'en-gb',
        filebrowserImageUploadUrl : ''+window.location+'/public/assets/upload?type=Images&_token=',
        filebrowserBrowseUrl : ''+window.location+'/public/assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : ''+window.location+'/public/assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl :'assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });
});
function myFunction() {
    document.getElementById('myForm').reset();
}
function open_popup(url){
  var w = 1180;
  var h = 770;
  var l = Math.floor((screen.width-w)/2);
  var t = Math.floor((screen.height-h)/2);
  var win = window.open( url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l );
}
$(document).ready(function() {
    $('div.alert').delay(2000).slideUp();

    window.lastURL = $('#fieldID').val();
    setInterval(function () {
        if($('#fieldID').val() != window.lastURL) {
            var url = $('#fieldID').val();
            if(url == '')url = "assets/upload/config/no-image.png";
            $('.imagePreview').attr('src', url);
            window.lastURL = url;
        };
    });

// Phan Products
window.lastURL = $('#fieldID_img').val();
setInterval(function () {
    if($('#fieldID_img').val() != window.lastURL) {
        var url =  $('#fieldID_img').val();
        if(url == '')url = "assets/upload/config/no-image.png";
        $('.imagePreview_img').attr('src', url);
        window.lastURL = url;
    };
});
// Section Img-color
window.lastURL = $('#fieldID_img_color').val();
setInterval(function () {
    if($('#fieldID_img_color').val() != window.lastURL) {
        var url =  $('#fieldID_img_color').val();
        if(url == '')url = "assets/upload/config/no-image.png";
        $('.Preview_img_color').attr('src', url);
        window.lastURL = url;
    };
});

$(function () {
    $( '.input_slug' ).keyup(function () {
        var text = $(this).val();
        text = text.toLowerCase();
        var text_create;
        text_create = text.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a").replace(/\ /g, '-').replace(/đ/g, "d").replace(/đ/g, "d").replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y").replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u").replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ.+/g,"o").replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ.+/g, "e").replace(/ì|í|ị|ỉ|ĩ/g,"i");
        var content = text_create.replace(' ', '-');
        $('.output_slug').val(content);
    }).keyup();
});

$(function () {
    $( '.input_slug_vi' ).keyup(function () {
        var text = $(this).val();
        text = text.toLowerCase();
        var text_create;
        text_create = text.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a").replace(/\ /g, '-').replace(/đ/g, "d").replace(/đ/g, "d").replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y").replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u").replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ.+/g,"o").replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ.+/g, "e").replace(/ì|í|ị|ỉ|ĩ/g,"i");
        var content = text_create.replace(' ', '-');
        $('.output_slug_vi').val(content.toLowerCase());
    }).keyup();
});
// Phan add Products - options
$('.add_products').click(function() {
    var html = $('#list_add_pro li').html();
    $('#list_add_pro').append('<li>'+html+'</li>');
});

$('#list_add_pro').on('click', '.del_pro_options', function() {
    if (!confirm('Bạn chắc chắn muốn xóa')) {

        return false;
    }else{
        $(this).closest('li').remove();
    }
});

$( '#list_cat' ).change(function () {
    $( '#list_cat option:selected').each(function() {
        if ($( '#list_cat option:selected').val() != 0) {
            var html = $( '#list_cat option:selected' ).text();
            var Cat_id = $( '#list_cat option:selected' ).val();
            $("#add_list").append('<button type="button" name="list_cat" id="'+Cat_id+'" class="btn btn-default btn-sm">'+html+'<span class = "glyphicon glyphicon-remove" ></span> </button>');
        }
    });
}).change();

$(' #add_list ').on('click', '.glyphicon-remove', function() {
    if (!confirm('Bạn chắc chắn muốn xóa')) {

        return false;
    }else{
        $(this).closest('button').remove();
    }
});

$('#myForm').submit(function(){
 var list_add = $('button[name="list_cat"]');
 var value_key = '';
 for (var i = 0; i < list_add.length ; i++) {
    value_key += $(list_add[i]).attr('id')+',';
}
$('input[name="category_id"]').val(value_key);

return true;
});
});

// Phan add Products - img - color - options
var count = $( '#list_img_pro_color li' ).size();
$('.add_products_color').click(function() {
    count += 1;
    var url = "javascript:open_popup('http://localhost/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID_img_color"+count+"')";
    var html ='<li>';
    html  +='<div class="col-md-2 col-sm-2 col-xs-3" >';
    html  +='<a href="'+url+'" class="thumbnail open-file-img"><img class="Preview_img_color'+count+'" src="assets/upload/config/no-image.png" alt=""> </a><small>* images detail product </small> <input id="fieldID_img_color'+count+'" type="hidden" value="" name="img_detail[]" /><a href="'+url+'">';
    html  +='<button type="button" class="btn btn-sm btn-success choose-img">Choose IMG</button> </a><button type="button" class="btn btn-xs btn-danger del_pro_img"><i class="fa fs-xs fa-trash" style=""></i></button>';
    html  +='</div>';
    html  +='</li>';
    $('#list_img_pro_color').append(html);

    window.lastURL = $('#fieldID_img_color'+count+'').val();
    setInterval(function () {
        if($('#fieldID_img_color'+count+'').val() != window.lastURL) {
            var url =  $('#fieldID_img_color'+count+'').val();
            if(url == '') {
                url = "assets/upload/config/no-image.png";
            }else {
                $('.Preview_img_color'+count+'').attr('src', url);
            }
            window.lastURL = url;
        };
    });
});
$('#list_img_pro_color').on('click', '.del_pro_img', function() {
   if (!confirm('Bạn chắc chắn muốn xóa')) {

       return false;
   }else{
    $(this).closest('li').remove();
}

<<<<<<< HEAD
=======
// search dia/chi
 $('#province').change(function(){
        alert('ok');
 })

>>>>>>> create, edit, delete apartment
});
// Phần config



