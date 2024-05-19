 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

     <div class="d-flex align-items-center justify-content-between">
         <a href="{{ url('/') }}" class="logo d-flex align-items-center">
             <img src="{{ asset('template') }}/assets/img/logo.png" alt="">
             <span class="d-none d-lg-block">NiceAdmin</span>
         </a>
         <i class="bi bi-list toggle-sidebar-btn"></i>
     </div><!-- End Logo -->
     <nav class="navbar navbar-expand-lg bg-body-light">
         <div class="container-fluid">
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                 aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     {!! UtilsHelp::renderMenu() !!}
                 </ul>
             </div>
         </div>
     </nav>
     <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">
             <li class="nav-item dropdown pe-3">

                 <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                     data-bs-toggle="dropdown">
                     <img src="{{ asset('upload') }}/assets/avatar.png" alt="Avatar" class="rounded-circle">
                     <span class="d-none d-md-block dropdown-toggle ps-2">Bima Ega Farizky</span>
                 </a><!-- End Profile Iamge Icon -->

                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                         <h6>Bima Ega Farizky</h6>
                         <span>Fullstack Developer</span>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     @if (Auth::id() != null)
                         <li>
                             <a class="dropdown-item d-flex align-items-center btn-logout" href="#">
                                 <i class="bi bi-box-arrow-right"></i>
                                 <span>Sign Out</span>
                             </a>
                         </li>
                     @endif

                 </ul><!-- End Profile Dropdown Items -->
             </li><!-- End Profile Nav -->

         </ul>
     </nav><!-- End Icons Navigation -->

 </header><!-- End Header -->

 @push('custom_js')
     <script src="{{ asset('js/header/index.js') }}"></script>
 @endpush
