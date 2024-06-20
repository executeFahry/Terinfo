<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Terinfo - Portal Berita</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('assets-fe/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-fe/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-fe/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-fe/css/navbar.css') }}" rel="stylesheet">

    @stack('css')
</head>

<body>
    @if (session('success'))
        <div class="p-3 bg-success text-white">
            <div class="container">{{ session('success') }}
            </div>
        </div>
    @endif
    
    @if (session('dager'))
        <div class="p-3 bg-dager text-white">
            <div class="container">{{ session('dager') }}
            </div>
        </div>
    @endif

    <!-- Topbar Start -->
    @include('frontend.includes.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('frontend.includes.navbar')
    <!-- Navbar End -->

    <!-- Contents Start -->
    @yield('content')
    <!-- Contents End -->


    <!-- Footer Start -->
    @include('frontend.includes.footer')

    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-fe/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets-fe/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets-fe/js/main.js') }}"></script>

    @stack('js')
</body>

</html>
