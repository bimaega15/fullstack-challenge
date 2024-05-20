<x-admin-panel title="Barang Page">
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                {{ Breadcrumbs::render('dashboard') }}
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            @include('dashboard.partials.cardStatus')
            @include('dashboard.partials.grafik')
        </section>
    </main><!-- End #main -->
    @push('custom_js')
        <script class="baseurl" data-value="{{ url('/') }}"></script>
        <script class="statusGrafik" data-value="{{ $status_grafik }}"></script>
        <script src="{{ asset('js/dashboard/index.js') }}"></script>
    @endpush
</x-admin-panel>
