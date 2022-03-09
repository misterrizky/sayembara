$("body").on("contextmenu", "img", function(e) {
    return false;
});
$('img').attr('draggable', false);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function auth_content(obj){
    $("#page_login").hide();
    $("#page_register").hide();
    $("#" + obj).show();    
    if(obj == "page_login"){
        $("#id_pengguna").focus();
    }else{
        $("#nama_lengkap").focus();
    }
}
$("#form_login").on('keydown', 'input', function(event) {
    if (event.which == 13) {
        event.preventDefault();
        var $this = $(event.target);
        var index = parseFloat($this.attr('data-login'));
        if (index < 3) {
            $('[data-login="' + (index + 1).toString() + '"]').focus();
        } else {
            $('#tombol_login').trigger("click");
        }
    }
});
$("#form_register").on('keydown', 'input', function(event) {
    if (event.which == 13) {
        event.preventDefault();
        var $this = $(event.target);
        var index = parseFloat($this.attr('data-register'));
        if (index < 4) {
            $('[data-register="' + (index + 1).toString() + '"]').focus();
        } else {
            $('#tombol_register').trigger("click");
        }
    }
});
$("#id_pengguna").focus();
function handle_post(tombol,form,url){
    $(tombol).prop("disabled", true);
    $(tombol).attr("data-kt-indicator", "on");
    $.post(url, $(form).serialize(), function(result) {
        if (result.alert == "success") {
            $(form)[0].reset();
            Swal.fire({ text: result.message, icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } }).then(function() {
                if(result.callback == "reload"){
                    location.reload();
                }else{
                    auth_content(result.callback);
                }
            });
        }else{
            Swal.fire({ text: result.message, icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } });
        }
        $(tombol).prop("disabled", false);
        $(tombol).removeAttr("data-kt-indicator");
    }, "json");
}