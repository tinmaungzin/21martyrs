$(document).ready(function (){
    $('#isshow').click(function (){
        var pass = $('#password').attr('type')
        if (pass === "password") {
            $('#password').attr('type','text')
            $('#isshow i').removeClass('fa-eye-slash')
            $('#isshow i').addClass('fa-eye')

        } else {
            $('#password').attr('type','password')
            $('#isshow i').removeClass('fa-eye')
            $('#isshow i').addClass('fa-eye-slash')
        }

    })
    // $('#reisshow').click(function (){
    //     var repass = $('#repassword').attr('type')
    //     if (repass === "password") {
    //         $('#repassword').attr('type','text')
    //         $('#reisshow i').removeClass('fa-eye-slash')
    //         $('#reisshow i').addClass('fa-eye')
    //
    //     } else {
    //         $('#repassword').attr('type','password')
    //         $('#reisshow i').removeClass('fa-eye')
    //         $('#reisshow i').addClass('fa-eye-slash')
    //     }
    // })

    $('#isshow_edit').click(function (){
        var pass = $('#password_edit').attr('type')
        if (pass === "password") {
            $('#password_edit').attr('type','text')
            $('#isshow_edit i').removeClass('fa-eye-slash')
            $('#isshow_edit i').addClass('fa-eye')

        } else {
            $('#password_edit').attr('type','password')
            $('#isshow_edit i').removeClass('fa-eye')
            $('#isshow_edit i').addClass('fa-eye-slash')
        }

    })
    // $('#reisshow_edit').click(function (){
    //     var repass = $('#repassword_edit').attr('type')
    //     if (repass === "password") {
    //         $('#repassword_edit').attr('type','text')
    //         $('#reisshow_edit i').removeClass('fa-eye-slash')
    //         $('#reisshow_edit i').addClass('fa-eye')
    //
    //     } else {
    //         $('#repassword_edit').attr('type','password')
    //         $('#reisshow_edit i').removeClass('fa-eye')
    //         $('#reisshow_edit i').addClass('fa-eye-slash')
    //     }
    // })
})
