<x-page title="Halaman 404">
    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>404</h1>
        <h2>Halaman yang kamu cari tidak ditemukan</h2>
        <a class="btn" href="{{ url('login') }}">Kembali</a>
        <img src="{{ asset('template') }}/assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
        <div class="credits">
            Created by <a href="https://wa.me/6282277506232">Bima Ega F</a>
        </div>
    </section>
</x-page>
