<div class="modal fade" id="modalLogout" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ url('logout') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-circle-info"></i> Logout Aplikasi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin keluar dari aplikasi ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="btn-submit">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div><!-- End Basic Modal-->
