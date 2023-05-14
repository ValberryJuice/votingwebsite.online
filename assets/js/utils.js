function _set_alert(status, text) {
    if (!text) {
        return "";
    }
    if (status == "SUCCESS") {
        status_type = "success";
        icon = "check-circle";
    } else if (status == "FAILURE") {
        status_type = "warning";
        icon = "ban";
    } else {
        status_type = "danger";
        icon = "exclamation-circle";
    }
    return (
        '<div class="alert alert-' +
        status_type +
        ' alert-dismissible"><i class="icon fas fa-' +
        icon +
        '" class="mg-r-10"></i>' +
        text +
        "</div>"
    );
}

function _clear_alert(target) {
    setTimeout(() => {
        $(target).html("");
    }, 2000);
}

$(document).ready(function () {
    // $('.datepicker').datepicker({
    //     format: 'dd-mm-yyyy'
    // });
});

function _float_value(x) {
    return Number.parseFloat(x).toFixed(2);
}

function _redirect_to(url) {
    $("span.has-error").remove();
    setTimeout(() => {
        window.location = url;
    }, 2000);
}

function _form_data(target, btn_target) {
    $("span.has-error").remove();
    var btn_text = $("#" + btn_target).text();
    $("#" + btn_target).prop("disabled", true);
    $("#" + btn_target).html(
        '<i class="fas fa-spinner fa-spin"></i>'
    );
    var form = $("#" + target);
    // return {
    //     target: form,
    //     btn_text,
    //     btn_target,
    //     url: form.attr("action"),
    //     type: form.attr("method"),
    //     data: form.serialize(),
    // };
}

function _reset_btn(target, text) {
    $("#" + target).prop("disabled", false);
    $("#" + target).html(text);
}

function _show_field_errors(target, response) {
    if (response.errors instanceof Object) {
        $.each(response.errors, function (index, value) {
            var key = $("#" + target + " #" + index);
            key.closest(".form-group")
                .removeClass("has-error")
                .removeClass("has-success")
                .find(".text-danger")
                .remove();
            key.after(
                '<span class="has-error text-danger">' + value + "</span>"
            );
        });
    } else {
        $("#_message").html(_alert(response.status, response.message));
        _clear_alert("#_message");
    }
}
