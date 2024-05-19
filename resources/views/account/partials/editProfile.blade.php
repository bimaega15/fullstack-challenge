<!-- Profile Edit Form -->
<form method="post" action="{{ url('account/' . $usersProfile->id . '/update?_method=put') }}" id="form-submit">
    <div class="row mb-3">
        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto
            Profi</label>
        <div class="col-md-8 col-lg-9">
            <img src="{{ asset('upload/profile/' . $usersProfile->profile->foto_profile) }}" alt="Foto Profile"
                class="rounded-circle" style="width: 100px; height: 100px;">
            <div class="pt-2">

                <x-input name="foto_profile" type="file" />
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="Nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
        <div class="col-md-8 col-lg-9">
            <x-input name="nama_profile" type="text" value="{{ $usersProfile->profile->nama_profile }}" placeholder="Masuk nama..." />
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
        <div class="col-md-8 col-lg-9">
            <x-input name="email_profile" type="text" value="{{ $usersProfile->profile->email_profile }}" placeholder="Masuk email..." />
        </div>
    </div>

    <div class="row mb-3">
        <label for="tanggallahir_profile" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
        <div class="col-md-8 col-lg-9">
            <x-input name="tanggallahir_profile" type="text"
                value="{{ UtilsHelp::formatDateLaporan($usersProfile->profile->tanggallahir_profile) }}"
                class="datepicker" placeholder="Masuk tanggal lahir..." />
        </div>
    </div>

    <div class="row mb-3">
        <label for="notelpon_profile" class="col-md-4 col-lg-3 col-form-label">No.
            Telepon</label>
        <div class="col-md-8 col-lg-9">
            <x-input name="notelpon_profile" type="number" value="{{ $usersProfile->profile->notelpon_profile }}" placeholder="Masuk no. telepon..."/>
        </div>
    </div>

    <div class="row mb-3">
        <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
        <div class="col-md-8 col-lg-9">
            <x-textarea name="alamat_profile" placeholder="Masukan alamat..."
                value="{{ $usersProfile->profile->alamat_profile }}"  />
        </div>
    </div>

    <div class="row mb-3">
        <label for="pekerjaan_profile" class="col-md-4 col-lg-3 col-form-label">Pekerjaan</label>
        <div class="col-md-8 col-lg-9">
            @php
                $pekerjaanProfile = in_array($usersProfile->profile->pekerjaan_profile, $pekerjaan);
                $pekerjaanValueOriginal = $usersProfile->profile->pekerjaan_profile;
                $pekerjaanValue = $usersProfile->profile->pekerjaan_profile;
                if (!$pekerjaanProfile) {
                    $pekerjaanValue = 'Lain-lain';
                }
            @endphp
            <x-select class="select2" label="Pekerjaan" name="pekerjaan_profile" :data="$pekerjaan"
                value="{{ $pekerjaanValue }}" />

            <x-input name="pekerjaan_profile_value" class="mt-2 {{ $pekerjaanProfile ? 'd-none' : '' }}"
                placeholder="Masukan pekerjaan lainnya..." value="{{ $pekerjaanValueOriginal }}" />
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary" id="btn-submit">Simpan </button>
    </div>
</form><!-- End Profile Edit Form -->
