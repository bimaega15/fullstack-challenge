var body = $('body');
var baseurl = $('.baseurl').data('value');
var formSubmit = document.getElementById("form-submit");
var formSubmitForgot = document.getElementById("form-submit-forgot");

$(document).ready(function () {
    const renderData = () => {
        body = $('body');
        baseurl = $('.baseurl').data('value');
        formSubmit = document.getElementById("form-submit");

        select2Standard({
            selector: ".select2",
            parent: "#section_account",
        })
        datepickerDdMmYyyy('.datepicker')

        formSubmit.addEventListener("submit", function (event) {
            event.preventDefault();
            submitData();
        });

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
                        loadHtml();
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

        body.off('change', 'select[name="pekerjaan_profile"]');
        body.on('change', 'select[name="pekerjaan_profile"]', function () {
            const value = $(this).val();
            if (value === 'Lain-lain') {
                $('input[name="pekerjaan_profile_value"]').removeClass('d-none');
            } else {
                $('input[name="pekerjaan_profile_value"]').addClass('d-none');
            }
        })

    }

    const renderDataPassword = () => {
        body = $('body');
        baseurl = $('.baseurl').data('value');
        formSubmitForgot = document.getElementById("form-submit-forgot");

        formSubmitForgot.addEventListener("submit", function (event) {
            event.preventDefault();
            submitData();
        });

        function submitData() {
            const formData = $('#form-submit-forgot').serialize();
            $.ajax({
                type: "post",
                url: $("#form-submit-forgot").attr("action"),
                data: formData,
                dataType: "json",
                beforeSend: function () {
                    clearError422();
                    $("#btn-submit-forgot").attr("disabled", true);
                    $("#btn-submit-forgot").html(disableButton);
                },
                success: function (data) {
                    Swal.fire({
                        title: 'Successfully',
                        html: data,
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then(() => {
                        loadHtml();
                    });
                },
                error: function (jqXHR, exception) {
                    $("#btn-submit-forgot").attr("disabled", false);
                    $("#btn-submit-forgot").html('Submit');
                    if (jqXHR.status === 422) {
                        showErrors422(jqXHR);
                    } else {
                        ajaxErrorMessage(jqXHR, exception);
                    }
                },
                complete: function () {
                    $("#btn-submit-forgot").attr("disabled", false);
                    $("#btn-submit-forgot").html('Submit');
                },
            });
        }
    }

    const loadHtml = () => {
        $.ajax({
            url: `${baseurl}/account`,
            type: 'get',
            dataType: 'json',
            success: function (data) {
                $('#accountProfile').html(data.account_profile);
                $('#profile-edit').html(data.edit_profile);
                $('#profile-change-password').html(data.change_password);

                renderData();
                renderDataPassword();
            }
        })
    }

    renderData();
    renderDataPassword();
})