$(document).ready(function () {
    $(".read-btn").click(function () {
        $(this).children().toggleClass("chevron-style");
    });
    $('.selectpicker').selectpicker({ title: 'Навыки' });

    $(".show-password").click(function () {
        var input = $(this).siblings();
        if (input.attr("type") == 'password') {
            input.attr("type", "text");
            $(this).children().attr("src", "data/img/eye-slash.svg");
        }
        else {
            input.attr("type", "password");
            $(this).children().attr("src", "data/img/eye.svg");
        }
    });

    $(".input-style").keyup(function () {
        $(this).siblings().find("button:not(.btn)").removeClass("back-btn");
        $(this).siblings().find("button:not(.btn)").addClass("active-btn");
        console.log("typing");
        if ($(this).val().length === 0) {
            $(this).siblings().find("button:not(.btn)").addClass("back-btn");
            $(this).siblings().find("button:not(.btn)").removeClass("active-btn");
        }
    });

    $('.modal-delete-btn').prop('disabled', true);
    $('#delete-input').keyup(function () {
        if ($(this).val() != '') {
            $('.modal-delete-btn').prop('disabled', false);
        }
        else{
            $('.modal-delete-btn').prop('disabled', true);
        }
    });
});

