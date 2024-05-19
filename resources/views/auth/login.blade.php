<x-auth-layout title="Login Akun Kamu">
    <section id="content">
        <div class="card mb-3">
            <div class="card-body">
                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login Akun</h5>
                    <p class="text-center small">Masukan email dan password kamu</p>
                </div>
                <form class="row g-3" action="{{ url('login') }}" method="post" id="form-submit">
                    @csrf
                    <x-input label="Email" name="email" />
                    <x-input label="Password" name="password" type="password" />

                    <x-checkbox label="Remember me" name="remember" value="1" />
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" id="btn-submit">Login</button>
                    </div>
                    <div class="col-12">
                        <p class="small mb-0">Belum memiliki akun ? <a href="{{ url('/register') }}">Daftar akun</a>
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
        <script src="{{ asset('js/login/index.js') }}"></script>
    @endpush

</x-auth-layout>
