<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'POS Admin Dashboard')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- SB Admin 2 CSS -->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body { background-color: #f8f9fa; font-family: 'Nunito', sans-serif; }
        .btn-google { background-color: #ea4335; color: #fff; }
        .btn-google:hover { background-color: #d93025; color: #fff; }
        .form-control-user { border-radius: 10rem; padding: 1.2rem 1rem; }
    </style>
</head>
<body id="page-top">

    <main class="py-5">
        @yield('content')
    </main>

    <!-- jQuery first, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- jQuery Easing -->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- SB Admin 2 JS -->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
