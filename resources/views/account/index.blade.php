<x-admin-panel title="Account Page">
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Account</h1>
            <nav>
                {{ Breadcrumbs::render('account') }}
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard" id="section_account">
            <div class="row">
                <div class="col-xl-4">

                    <section id="accountProfile">
                        @include('account.partials.accountProfile')
                    </section>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Ringkasan</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Ganti Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    @include('account.partials.profileOverview')
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    @include('account.partials.editProfile')
                                </div>
                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    @include('account.partials.changePassword')
                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
    @push('custom_js')
        <script class="baseurl" data-value="{{ url('/') }}"></script>
        <script src="{{ asset('js/profile/index.js') }}"></script>
    @endpush
</x-admin-panel>
