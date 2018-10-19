$(document).ready(function() {
      // search dia/chi
    jQuery('#province').change(function(){
            var provinceId = $(this).val();
           $.get("ajax/district"+provinceId, function (data) {
                $( '#district' ).html(data);
           } );
     })
});
