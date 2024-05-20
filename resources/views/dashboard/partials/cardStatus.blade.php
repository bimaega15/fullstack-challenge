<div class="row">
    @foreach ($total_status as $status => $item)
        <div class="col-lg-3">
            <div class="card info-card customers-card" style="min-height: 185px;">
                <div class="card-body">
                    <h5 class="card-title">Total
                        {{ $status === 'perluPerbaikan' ? 'Perlu Perbaikan' : ($status === 'dalamPerbaikan' ? 'Dalam Perbaikan' : ucfirst($status)) }}
                        <span></span>
                    </h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-box-archive"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $item }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
