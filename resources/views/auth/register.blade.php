<x-auth-layout title="Register Akun">
    <section id="content">
        <div class="card mb-3">

            <div class="card-body">

                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Register Akun</h5>
                    <p class="text-center small">Masukan detail data diri kamu</p>
                </div>
                <form class="row g-3" id="form-submit" method="post" action="{{ url('register') }}">
                    <x-input label="Nama" name="name" />
                    <x-input label="Email" name="email" />
                    <x-input label="Password" name="password" type="password" />
                    <x-input label="Konfirmasi Password" name="password_confirmation" type="password" />

                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" id="btn-submit">Daftar</button>
                    </div>
                    <div class="col-12">
                        <p class="small mb-0">Sudah memiliki akun ? <a href="{{ url('/login') }}">Login akun</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <div class="credits">
            Created by <a href="https://wa.me/6282277506232">Bima Ega F.</a>
        </div>
    </section>

    @push('custom_js')
        <script class="baseurl" data-value="{{ url('/') }}"></script>
        <script src="{{ asset('js/register/index.js') }}"></script>
    @endpush

</x-auth-layout>
