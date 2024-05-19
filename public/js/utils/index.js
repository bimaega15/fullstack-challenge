var disableButton = `
<div class="spinner-border text-dark" role="status">
<span class="visually-hidden">Loading...</span>
</div>`;

var enableButton = `<i class="fa-regular fa-paper-plane"></i> &nbsp; Submit`;

function ajaxErrorMessage(jqXHR, exception) {
    var msgerror = "";
    if (jqXHR.status === 0) {
        msgerror = "Koneksi tidak stabil/ terputus.";
    } else if (jqXHR.status == 404) {
        msgerror = "Halaman tidak ditemukan.";
    } else if (jqXHR.status == 500) {
        msgerror = "Kesalahan pada server.";
    } else if (exception === "parsererror") {
        msgerror = "Gagal parsing JSON.";
    } else if (exception === "timeout") {
        msgerror = "Waktu request habis (Request Time Out)";
    } else if (exception === "abort") {
        msgerror = "Gagal ajax request.";
    } else {
        msgerror = "Error.\n" + jqXHR.responseJSON.message;
    }

    Swal.fire({
        title: jqXHR.statusText,
        text: msgerror,
        icon: "error",
        confirmButtonText: "OK",
    });
}

function notifAlert({ title = "", text = "", icon = "" }) {
    Swal.fire({
        title,
        text,
        icon,
        confirmButtonText: "OK",
    });
}

function basicDatatable({
    tableId = "",
    ajaxUrl = "",
    columns = "",
    dataAjaxUrl = {},
    order = [],
    tableInfo = "",
}) {
    return tableId.DataTable({
        serverSide: true,
        processing: true,
        searching: true,
        order: order,
        ajax: {
            url: ajaxUrl,
            type: "get",
            dataType: "json",
            data: dataAjaxUrl,
        },
        columns: columns,
        drawCallback: function () {
            if (tableInfo !== "") {
                var info = $(`${tableInfo}`).DataTable().page.info();
                $(`${tableInfo}`)
                    .DataTable()
                    .column(0, { search: "applied", order: "applied" })
                    .nodes()
                    .each(function (cell, i) {
                        cell.innerHTML = info.start + i + 1;
                    });
            } else {
                var info = datatable.page.info();
                datatable
                    .column(0, { search: "applied", order: "applied" })
                    .nodes()
                    .each(function (cell, i) {
                        cell.innerHTML = info.start + i + 1;
                    });
            }
        },
    });
}

/**
 * Basic Confirm Message on Delete Action Form
 * @param {*} urlDelete
 * @param {*} data
 */
function basicDeleteConfirmDatatable({
    urlDelete = "",
    data = {},
    text = "",
    dataFunction = () => { },
    isRenderView = false,
}) {
    var text = text ? text : "Benar ingin menghapus data ini?";

    Swal.fire({
        title: "Konfirmasi",
        text: text,
        icon: "warning",
        dangerMode: true,
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Tidak",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: urlDelete,
                type: "post",
                dataType: "json",
                data: data,
                success: function (data) {
                    runToast({
                        type: "bg-success",
                        title: "Successfully",
                        description: data,
                    });

                    if (!isRenderView) {
                        datatable.ajax.reload();
                    } else {
                        dataFunction();
                    }
                },
            });
        }
    });
}

function onRemoveSpace(text) {
    text.value = text.value.replace(/\s+/g, "");
}

function textareaTrim(pane) {
    $.trim(pane.val())
        .replace(/\s*[\r\n]+\s*/g, "\n")
        .replace(/(<[^\/][^>]*>)\s*/g, "$1")
        .replace(/\s*(<\/[^>]+>)/g, "$1");
}

function select2Standard({
    selector = "",
    parent = "",
    theme = "bootstrap-5",
    data = [],
}) {
    $(`${selector}`).select2({
        dropdownParent: $(`${parent}`),
        closeOnSelect: true,
        theme: theme,
        data: data,
        templateResult: function (data) {
            var $option = $("<span></span>");
            $option.html(data.text);
            return $option;
        },
        templateSelection: function (data) {
            const splitText = data.text.split("<br />");
            var $result = $("<span></span>");
            $result.html(splitText[0]);
            return $result;
        },
    });
}

function select2Server({
    selector = "",
    parent = "",
    routing = "",
    passData = {},
}) {
    $(`${selector}`).select2({
        dropdownParent: $(`${parent}`),
        closeOnSelect: true,
        placeholder: "-- Pilih Data --",
        theme: "bootstrap-5",
        ajax: {
            url: `${routing}`,
            dataType: "json",
            data: function (params) {
                let setData = {
                    search: params.term,
                    page: params.page || 1,
                };
                return {
                    ...setData,
                    ...passData,
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.results,
                    pagination: {
                        more: params.page * 10 < data.count_filtered,
                    },
                };
            },
            cache: true,
        },
        templateResult: function (data) {
            var $option = $("<span></span>");
            $option.html(data.text);
            return $option;
        },
        templateSelection: function (data) {
            const splitText = data.text.split("<br />");
            var $result = $("<span></span>");
            $result.html(splitText[0]);
            return $result;
        },
    });
}


clearError422 = () => {
    const getInput = $("#form-submit input");
    if (getInput.length > 0) {
        $.each(getInput, function (index, value) {
            const name = $(this).attr("name");
            $('input[name="' + name + '"]').removeClass("border border-danger");
            $('small[data-name="' + name + '"]').remove();
        });
    }
    const getSelect = $("#form-submit select");
    if (getSelect.length > 0) {
        $.each(getSelect, function (index, value) {
            const name = $(this).attr("name");
            $('select[name="' + name + '"]').removeClass(
                "border border-danger"
            );
            $('small[data-name="' + name + '"]').remove();
        });
    }
    const getTextarea = $("#form-submit textarea");
    if (getTextarea.length > 0) {
        $.each(getTextarea, function (index, value) {
            const name = $(this).attr("name");
            $('textarea[name="' + name + '"]').removeClass(
                "border border-danger"
            );
            $('small[data-name="' + name + '"]').remove();
        });
    }
};

const showErrors422 = (jqXHR) => {
    Swal.fire({
        title: 'Form Invalid!',
        text: 'Periksa kembali form inputan anda',
        icon: "error",
        confirmButtonText: "OK",
    });

    const responseJSON = jqXHR.responseJSON.errors;
    Object.keys(responseJSON).map((name, index) => {
        const message = responseJSON[name][0];

        var newElement = document.createElement("small");

        newElement.classList.add("text-danger");
        newElement.innerText = message;
        newElement.setAttribute("data-name", name);

        var inputElement = document.querySelector('input[name="' + name + '"]');
        if (inputElement !== null) {
            inputElement.classList.add("border", "border-danger");
            inputElement.parentNode.insertBefore(
                newElement,
                inputElement.nextSibling
            );
        }

        var inputElement = document.querySelector(
            'select[name="' + name + '"]'
        );
        if (inputElement !== null) {
            inputElement.classList.add("border", "border-danger");
            inputElement.parentNode.insertBefore(
                newElement,
                inputElement.nextSibling
            );
        }

        var inputElement = document.querySelector(
            'textarea[name="' + name + '"]'
        );
        if (inputElement !== null) {
            inputElement.classList.add("border", "border-danger");
            inputElement.parentNode.insertBefore(
                newElement,
                inputElement.nextSibling
            );
        }
    });
};

const number_format = (number, decimals, dec_point, thousands_point) => {
    if (number == null || !isFinite(number)) {
        throw new TypeError("number is not valid");
    }

    if (!decimals) {
        var len = number.toString().split(".").length;
        decimals = len > 1 ? len : 0;
    }

    if (!dec_point) {
        dec_point = ".";
    }

    if (!thousands_point) {
        thousands_point = ",";
    }

    number = parseFloat(number).toFixed(decimals);

    number = number.replace(".", dec_point);

    var splitNum = number.split(dec_point);
    splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
    number = splitNum.join(dec_point);

    return number;
};

const formatNumber = (value) => {
    value = String(value);
    value = value.replace(/,/g, "");
    if (value !== "" && value !== "0" && value !== null) {
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    return value;
};

const removeCommas = (value) => {
    value = String(value);
    value = value.replace(/,/g, "");
    return value;
};

const formatDate = () => {
    var date = new Date();
    var year = date.getFullYear();
    var month = ("0" + (date.getMonth() + 1)).slice(-2);
    var day = ("0" + date.getDate()).slice(-2);

    // Dapatkan jam, menit, dan detik
    var hours = ("0" + date.getHours()).slice(-2);
    var minutes = ("0" + date.getMinutes()).slice(-2);
    var seconds = ("0" + date.getSeconds()).slice(-2);

    // Kembalikan format tanggal dan waktu
    return (
        year +
        "-" +
        month +
        "-" +
        day +
        " " +
        hours +
        ":" +
        minutes +
        ":" +
        seconds
    );
};

const formatDateFromDb = (dateString) => {
    var date = new Date(dateString);
    var formattedDate = date.toLocaleString("id-ID", {
        day: "2-digit",
        month: "long",
        year: "numeric",
        hour: "2-digit",
        minute: "2-digit",
        hour12: false,
    });
    return formattedDate;
};

const formatUang = (nominal) => {
    return number_format(nominal, 0, ".", ",");
};

const debounce = (func, delay) => {
    let timeoutId;
    return function () {
        const context = this;
        const args = arguments;
        clearTimeout(timeoutId);
        timeoutId = setTimeout(function () {
            func.apply(context, args);
        }, delay);
    };
};

const capitalizeEachWord = (str) => {
    return str.replace(/\b\w/g, function (char) {
        return char.toUpperCase();
    });
};


const datepickerDdMmYyyy = (element) => {
    $(element).datepicker({
        format: "dd/mm/yyyy",
        todayButton: true,
        highlight: true,
        autoclose: true,
        orientation: 'bottom',
    });
};

const formatDateToDb = (dateString) => {
    var dateParts = dateString.split("/");
    var formattedDate = dateParts[2] + "-" + dateParts[1] + "-" + dateParts[0];
    return formattedDate;
};