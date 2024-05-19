<x-auth-layout title="Lengkapi Profil">
    <section id="content">
        <div class="card mb-3">
            @include('flash.message')
            <div class="card-body">
                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Completed Profile</h5>
                    <p class="text-center small">Silahkan lengkapi profil kamu:</p>
                </div>
                <form id="form-submit" class="row g-3"
                    action="{{ url('completeProfile/update?_method=put&token=' . $token) }}" method="post">
                    @csrf
                    <x-input label="Foto Profil" name="foto_profile" type="file" />
                    <x-input label="Tanggal Lahir" name="tanggallahir_profile" class="datepicker" />
                    <x-input label="No. Telepon" name="notelpon_profile" type="number" />
                    <x-textarea label="Alamat" name="alamat_profile" />
                    <x-select class="select2" label="Pekerjaan" name="pekerjaan_profile" :data="$pekerjaan" />
                    <x-input name="pekerjaan_profile_value" class="d-none" placeholder="Masukan pekerjaan lainnya..." />


                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" id="btn-submit">Submit</button>
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
        <script src="{{ asset('js/completeProfile/index.js') }}"></script>
    @endpush
</x-auth-layout>
