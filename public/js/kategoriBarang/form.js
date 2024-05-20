var formSubmit = document.getElementById("form-submit");
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
            $("body #btn-submit").attr("disabled", true);
            $("body #btn-submit").html(disableButton);
        },
        success: function (data) {
            myModal.hide();
            Swal.fire({
                title: 'Successfully',
                text: data,
                icon: "success",
                confirmButtonText: "OK",
            });
            datatable.ajax.reload();

        },
        error: function (jqXHR, exception) {
            $("body #btn-submit").attr("disabled", false);
            $("body #btn-submit").html('Simpan');
            if (jqXHR.status === 422) {
                showErrors422(jqXHR);
            } else {
                ajaxErrorMessage(jqXHR, exception);
            }
        },
        complete: function () {
            $("body #btn-submit").attr("disabled", false);
            $("body #btn-submit").html('Simpan');
        },
    });
}
