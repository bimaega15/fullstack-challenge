var body = $('body');

body.on('click', '.btn-logout', function (e) {
    e.preventDefault();
    var myModal = new bootstrap.Modal(document.getElementById('modalLogout'), {
        keyboard: false
    });
    myModal.show();
})