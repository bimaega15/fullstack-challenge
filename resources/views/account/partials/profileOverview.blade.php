@include('account.partials.about')
<h5 class="card-title">Profile Details</h5>

<div class="row">
    <div class="col-lg-3 col-md-4 label ">Nama</div>
    <div class="col-lg-9 col-md-8">{{ $usersProfile->profile->nama_profile }}</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Email</div>
    <div class="col-lg-9 col-md-8">{{ $usersProfile->profile->email_profile }}</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
    <div class="col-lg-9 col-md-8">
        {{ UtilsHelp::formatDateLaporan($usersProfile->profile->tanggallahir_profile) }}
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">No. Telepon</div>
    <div class="col-lg-9 col-md-8">{{ $usersProfile->profile->notelpon_profile }}
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Alamat</div>
    <div class="col-lg-9 col-md-8">
        {{ $usersProfile->profile->alamat_profile }}</div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-4 label">Pekerjaan</div>
    <div class="col-lg-9 col-md-8">
        {{ $usersProfile->profile->pekerjaan_profile }}</div>
</div>
