$('input[name="activeCheck"]').on('change', function(){
    if ($(this).prop('checked')) {   
        $('input[name="active"]').val(1);
    } else {
        $('input[name="active"]').val(0);
    }
});