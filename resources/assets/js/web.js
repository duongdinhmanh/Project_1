$(document).ready(function() {
      // search dia/chi
    $('#province').change(function(){
            var id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'Post',
                url: "ajax/district/"+id,
                data:{'id': id},
                success: function(data){
                    $('#district').html(data);
                    $('#district').css({ "display":"block", "padding-left":"20px" });
                    $('#district').next('.selectBox').css("display", "none");

                }
            })
     })

    $('#district').change(function(){
            var districtid = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'Post',
                url: "ajax/ward/"+districtid,
                data:{'districtid':districtid},
                success: function(data){
                    $('#ward').html(data);
                    $('#ward').css({ "display":"block", "padding-left":"20px" });
                    $('#ward').next('.selectBox').css("display", "none");
                }
            })
     })

});
