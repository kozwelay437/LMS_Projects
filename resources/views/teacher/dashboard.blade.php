<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Teacher Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #343a40;
      color: white;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 1rem;
    }
    .sidebar a {
      display: block;
      color: #adb5bd;
      padding: 10px 20px;
      text-decoration: none;
    }
    .sidebar a.active, .sidebar a:hover {
      background-color: #495057;
      color: #fff;
    }
    .main {
      margin-left: 250px;
      padding: 20px;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h4 class="text-center text-white mb-4">Teacher Panel</h4>
    <a href="#">Dashboard</a>
    <a href="#" class="active">Assignments</a>
    <a href="#">Students</a>
    <a href="#">Grades</a>
    <a href="#">Settings</a>
  </div>

  <div class="main">
    <nav class="navbar navbar-light bg-white shadow-sm rounded mb-4">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h5">@yield('page-title', 'Manage Assignments')</span>
        <div class="d-flex align-items-center">
          <span class="me-3">Teacher</span>
          <img src="https://i.pravatar.cc/40" class="rounded-circle" alt="avatar">
        </div>
      </div>
    </nav>

    <div class="content">
      @yield('content')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
