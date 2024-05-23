<x-admin-panel title="Realtime Chat Page">
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Realtime Chat</h1>
            <nav>
                {{ Breadcrumbs::render('realtimeChat') }}
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
                                    <h5 class="card-title">Realtime Chat Page</h5>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="{{ asset('upload/assets/chat.png') }}" alt="realtime chat"
                                                style="width: 300px;">
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class="card-title">
                                                Selamat datang di halaman Realtime Chat Fullstack Challenge
                                            </h5>
                                            <span>
                                                Untuk Goals yang ingin dicapai yaitu:
                                                <ul style="list-style: none;">
                                                    <li>
                                                        1. User bisa join dengan memasukkan username mereka
                                                    </li>
                                                    <li>
                                                        2. User bisa membuat ruang chat
                                                    </li>
                                                    <li>
                                                        3. User bisa join ruang chat
                                                    </li>
                                                    <li>
                                                        4. User bisa mengirim pesan dan menerima pesan dari ruang chat
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
