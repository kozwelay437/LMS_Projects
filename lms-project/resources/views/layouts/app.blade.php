<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'GTI Insein')</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- AOS Animation CSS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <!-- Optional Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <!-- Custom Styles -->
  <style>
    :root {
      --primary-color: #1a3a6b;
      --secondary-color: #d4af37;
    }

    body { font-family: 'Nunito', sans-serif; background-color: #f8f9fa; color: #333; }
    .navbar { background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    .navbar-brand span { font-weight: 700; color: var(--primary-color); line-height: 1.1; }
    .nav-link { color: var(--primary-color); font-weight: 600; }
    .nav-link:hover, .nav-link.active { color: var(--secondary-color); }
    .btn-outline-secondary { border-color: var(--primary-color); color: var(--primary-color); }
    .btn-outline-secondary:hover { background-color: var(--primary-color); color: #fff; }
    section { padding: 60px 0; }
    .section-title { color: var(--primary-color); font-weight: 800; margin-bottom: 30px; }
  </style>
</head>


<body id="page-top">

  <!-- ✅ Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container-fluid px-4">
      <a class="navbar-brand d-flex align-items-center me-4" href="{{ url('/') }}">
        <img src="{{ asset('img/gti.jpg') }}" alt="GTI Logo" class="brand-logo me-2" style="height: 50px;" />
        <span>Government Technical <br> Institute (Insein)</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/index') }}">Home</a></li>
    <li class="nav-item"><a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a></li>

    @auth
        <li class="nav-item"><a class="nav-link {{ Request::is('assignments') ? 'active' : '' }}" href="{{ url('/studentAssignment') }}">Assignments</a></li>
    @endauth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="departmentDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Departments
            </a>
            <ul class="dropdown-menu" aria-labelledby="departmentDropdown">
                <li><a class="dropdown-item" href="{{ url('/department/it') }}">Information Technology</a></li>
                <li><a class="dropdown-item" href="{{ url('/department/civil') }}">Civil Engineering</a></li>
                <li><a class="dropdown-item" href="{{ url('/department/me') }}">Mechanical Engineering</a></li>
                <li><a class="dropdown-item" href="{{ url('/department/ie') }}">Industrial Engineering</a></li>
                <li><a class="dropdown-item" href="{{ url('/department/ec') }}">Electronics & Communication</a></li>
                <li><a class="dropdown-item" href="{{ url('/department/ep') }}">Electrical Power</a></li>
            </ul>
        </li>
    @auth
        <li class="nav-item"><a class="nav-link {{ Request::is('events') ? 'active' : '' }}" href="{{ url('/event') }}">Events</a></li>
    @endauth
</ul>


        <div class="d-flex align-items-center gap-2">
    <form class="d-flex me-3" role="search">
        <input class="form-control form-control-sm search-input" type="search" placeholder="Search..." aria-label="Search">
    </form>

    @guest
        <!-- Guest: show login/signup -->
        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm">Sign Up</a>
    @else
        <!-- Authenticated user: show profile dropdown -->
        <div class="dropdown">
            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                @if(Auth::user()->role == 'Admin')
                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                
                @elseif(Auth::user()->role == 'student')
                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                @elseif(Auth::user()->role == 'teacher')
                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                @endif

                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @endguest
</div>

      </div>
    </div>
  </nav>

  <!-- ✅ Page Content -->
  <main class="py-4">
    @yield('content')
  </main>

  

  <!-- ✅ Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

<!-- ✅ AOS Animation Library -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    AOS.init({
      duration: 1000,
      offset: 100,
      once: true
    });
  });
</script>


</body>
</html>
