var formSubmit = document.getElementById("form-submit");
var baseurl = $('.baseurl').data('value');
formSubmit.addEventListener("submit", function (event) {
    event.preventDefault();
    submitData();
});

function submitData() {
    const formData = $("#form-submit").serialize();
    $.ajax({
        type: "post",
        url: $("#form-submit").attr("action"),
        data: formData,
        dataType: "json",
        beforeSend: function () {
            clearError422();
            $("#btn-submit").attr("disabled", true);
            $("#btn-submit").html(disableButton);
        },
        success: function (data) {
            if (data.status == 400) {
                Swal.fire({
                    title: 'Fail!',
                    text: data.message,
                    icon: "info",
                    confirmButtonText: "OK",
                })
            }

            if (data.status == 200) {
                Swal.fire({
                    title: 'Successfully',
                    text: data.message,
                    icon: "success",
                    confirmButtonText: "OK",
                }).then(() => {
                    window.location.href = `${baseurl}/account`;
                });
            }
        },
        error: function (jqXHR, exception) {
            $("#btn-submit").attr("disabled", false);
            $("#btn-submit").html('Login');
            if (jqXHR.status === 422) {
                showErrors422(jqXHR);
            } else {
                ajaxErrorMessage(jqXHR, exception);
            }
        },
        complete: function () {
            $("#btn-submit").attr("disabled", false);
            $("#btn-submit").html('Login');
        },
    });
}
