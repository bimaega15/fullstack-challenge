var formSubmit = document.getElementById("form-submit");
var baseurl = $('.baseurl').data('value');
var body = $('body');
formSubmit.addEventListener("submit", function (event) {
    event.preventDefault();
    submitData();
});

select2Standard({
    selector: ".select2",
    parent: "#content",
})
datepickerDdMmYyyy('.datepicker')

function submitData() {
    const form = $('#form-submit')[0];
    const formData = new FormData(form);
    let tanggallahir_profile = $('input[name="tanggallahir_profile"]').val();
    tanggallahir_profile = tanggallahir_profile != '' ? formatDateToDb(tanggallahir_profile) : '';
    formData.set('tanggallahir_profile', tanggallahir_profile);

    let pekerjaan_profile = $('select[name="pekerjaan_profile"]').val();
    if (pekerjaan_profile === 'Lain-lain') {
        pekerjaan_profile = $('input[name="pekerjaan_profile_value"]').val();
    }
    formData.set('pekerjaan_profile', pekerjaan_profile);

    $.ajax({
        type: "post",
        url: $("#form-submit").attr("action"),
        data: formData,
        dataType: "json",
        contentType: false,
        processData: false,
        beforeSend: function () {
            clearError422();
            $("#btn-submit").attr("disabled", true);
            $("#btn-submit").html(disableButton);
        },
        success: function (data) {
            Swal.fire({
                title: 'Successfully',
                html: data,
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = `${baseurl}/login`;
            });
        },
        error: function (jqXHR, exception) {
            $("#btn-submit").attr("disabled", false);
            $("#btn-submit").html('Submit');
            if (jqXHR.status === 422) {
                showErrors422(jqXHR);
            } else {
                ajaxErrorMessage(jqXHR, exception);
            }
        },
        complete: function () {
            $("#btn-submit").attr("disabled", false);
            $("#btn-submit").html('Submit');
        },
    });
}



body.on('change', 'select[name="pekerjaan_profile"]', function () {
    const value = $(this).val();
    if (value === 'Lain-lain') {
        $('input[name="pekerjaan_profile_value"]').removeClass('d-none');
    } else {
        $('input[name="pekerjaan_profile_value"]').addClass('d-none');
    }
})
