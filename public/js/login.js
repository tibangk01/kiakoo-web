$(function () {
    $("#login_form").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            data: new FormData(this),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend: function () {
                $(document).find("span.error-text").text("");
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $("#login_form span." + prefix + "_error").text(val[0]);
                    });
                } else if (data.status == 1 || data.status == 2) {
                    $("#login_form span.email_error").text(data.error);
                } else if (data.status == 3) {
                    $("#login_form span.password_error").text(data.error);
                }else if (data.status == 4) {
                    $("#login_form")[0].reset();
                    $('#loginModal').modal('hide');
                    $(location).prop('href', data.success)
                }
            },
        });
    });
});
