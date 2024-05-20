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
    <link rel="stylesheet" href="{{ asset('library/fontawesome-free-6.5.1-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/DataTables-2.0.0/css/dataTables.bootstrap5.min.css') }}">
</head>

<body>

    @include('components.partials.header')

    @include('components.partials.sidebar')

    {{ $slot }}

    @include('components.partials.footer')

    @include('components.partials.modalLogout')

    <x-modal title="Judul Modal" id="smallModal" size="modal-sm"></x-modal>
    <x-modal title="Judul Modal" id="mediumModal" size="modal-md"></x-modal>
    <x-modal title="Judul Modal" id="largeModal" size="modal-lg"></x-modal>
    <x-modal title="Judul Modal" id="extraLargeModal" size="modal-xl"></x-modal>

    <!-- Vendor JS Files -->
    <script src="{{ asset('library') }}/jquery-3.7.1.js"></script>
    <script src="{{ asset('template') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('library') }}/sweetalert2/dist/sweetalert2.js"></script>
    <script src="{{ asset('library') }}/select2-develop/dist/js/select2.min.js"></script>
    <script src="{{ asset('library') }}/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('library/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('library/datatables/DataTables-2.0.0/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/utils/index.js') }}"></script>
    <script src="{{ asset('js/modal/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
