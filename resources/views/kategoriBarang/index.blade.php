<x-admin-panel title="Kategori Barang Page">
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Kategori Barang</h1>
            <nav>
                {{ Breadcrumbs::render('kategoriBarang') }}
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card" style="min-height: 400px;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <div>
                                            <h5 class="card-title">Kategori Barang Page</h5>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-primary btn-add"
                                                data-urlcreate="{{ url('kategoriBarang/create') }}"
                                                data-typemodal="mediumModal">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Kategori Barang</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- End Customers Card -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->
    @push('custom_js')
        <script class="baseurl" data-value="{{ url('/') }}"></script>
        <script src="{{ asset('js/kategoriBarang/index.js') }}"></script>
    @endpush
</x-admin-panel>
