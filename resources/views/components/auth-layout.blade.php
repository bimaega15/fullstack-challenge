<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title }}</title>
    <meta content="Fullstack Challenge" name="description">
    <meta content="Bima Ega Farizky" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('template') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('template') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('template') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template') }}/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('library') }}/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="{{ asset('library') }}/select2-develop/dist/css/select2.min.css">
    <link rel="stylesheet"
        href="{{ asset('library') }}/select2-bootstrap-5-theme-1.3.0/select2-bootstrap-5-theme.min.css">
    <link rel="stylesheet"
        href="{{ asset('library') }}/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css">


</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="{{ url('/') }}" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('template') }}/assets/img/logo.png" alt="">
                                </a>
                            </div>

                            {{ $slot }}
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('library') }}/jquery-3.7.1.js"></script>
    <script src="{{ asset('js/utils/index.js') }}"></script>
    <script src="{{ asset('template') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('library') }}/sweetalert2/dist/sweetalert2.js"></script>
    <script src="{{ asset('library') }}/select2-develop/dist/js/select2.min.js"></script>
    <script src="{{ asset('library') }}/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @stack('custom_js')

</body>

</html>
