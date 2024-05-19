<x-admin-panel title="Admin Panel Page">
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Admin Panel</h1>
            <nav>
                {{ Breadcrumbs::render('adminPanel') }}
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
                                    <h5 class="card-title">Admin Panel Page</h5>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="{{ asset('upload/assets/profile.png') }}" alt="profile"
                                                style="width: 300px;">
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class="card-title">
                                                Selamat datang di halaman Admin Panel Fullstack Challenge
                                            </h5>
                                            <span>
                                                Untuk Goals yang ingin dicapai yaitu:
                                                <ul style="list-style: none;">
                                                    <li>
                                                        1. User bisa menambahkan kategori barang
                                                    </li>
                                                    <li>
                                                        2. User bisa menambahkan barang
                                                    </li>
                                                    <li>
                                                        3. User bisa menambahkan satuan barang
                                                    </li>
                                                    <li>
                                                        4. User bisa mengubah status satuan barang
                                                    </li>
                                                    <li>
                                                        5. User bisa melihat dashboard berisikan statistik data barang
                                                    </li>
                                                </ul>
                                            </span>
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
</x-admin-panel>
