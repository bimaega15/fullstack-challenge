var formSubmit = document.getElementById("form-submit");
var baseurl = $('.baseurl').data('value');
var isedit = $('.isedit').data('value');
var rowData = $('.rowData').data('value');

if (isedit) {
    $('.select2Server').append(
        new Option(rowData.barang.nama_barang, rowData.barang.id, true, true)
    );
}
formSubmit.addEventListener("submit", function (event) {
    event.preventDefault();
    submitData();
});

select2Server({
    selector: ".select2Server",
    parent: "#mediumModal",
    routing: `${baseurl}/select2/barang`,
});

select2Standard({
    selector: ".select2Side",
    parent: "#mediumModal",
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
