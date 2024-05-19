<div class="card">
    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

        <img src="{{ asset('upload/profile/' . $usersProfile->profile->foto_profile) }}" alt="Foto Profile"
            class="rounded-circle" style="width: 250px; height: 250px;">
        <h2>{{ $usersProfile->profile->nama_profile }}</h2>
        <h3>Fullstack Developer</h3>
        <div class="social-links mt-2">
            <a href="https://wa.me/6282277506232" class="whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="https://web.facebook.com/bimaega15" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/bimaega/?hl=id" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/in/bima-ega-347442199/" class="linkedin"><i
                    class="bi bi-linkedin"></i></a>
        </div>
    </div>
</div>
