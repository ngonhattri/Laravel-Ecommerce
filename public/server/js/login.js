toastr.options = {
    "debug": false,
    "positionClass": "toast-top-right",
    "onclick": null,
    "fadeIn": 300,
    "fadeOut": 1000,
    "timeOut": 3000,
    "extendedTimeOut": 1000
};
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function ajaxUrl(username,password)
{
    $.ajax({
        url: "/qanivia/login",
        data:{
            username: username, 
            password: password 
        },
        type: "POST", 
        success: function(response){
            toastr.success(response.message);
            location.reload();
        },
        error:function(error){
            toastr.error(error.responseJSON.message);
        }
    });
}
$(document).ready(function(){
    $('#login').click(function() {
        var username = $("#username").val();
        var password = $("#password").val();
        ajaxUrl(username,password);
    })
});