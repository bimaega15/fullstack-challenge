<x-admin-panel title="Home Page">
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Home</h1>
            <nav>
                {{ Breadcrumbs::render('home') }}
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
                                    <h5 class="card-title">Home Page</h5>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="{{ asset('upload/assets/home.png') }}" alt="Home"
                                                style="height: 250px;">
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class="card-title">
                                                Selamat datang di halaman dashboard Fullstack Challenge
                                            </h5>
                                            <span>
                                                Terdapat 3 case dalama fullstack challenge yang dapat dilihat hasilnya
                                                pada Halaman sidebar:
                                                <ul style="list-style: none;">
                                                    <li>1. FS 3.1 (Authentication & Profile)</li>
                                                    <li>2. FS 3.2 (Admin Panel)</li>
                                                    <li>3. FS 3.3 (Realtime Chat)</li>
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
