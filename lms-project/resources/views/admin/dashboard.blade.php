<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom styles for sidebar and layout -->
    <link rel="stylesheet" href="../style/admin_panel.css">
    <style>
        
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #c2c7d0;
            font-size: 1.1rem;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: #495057;
        }
        .sidebar .nav-link.active {
            color: #fff;
            background-color: #007bff;
        }
        .sidebar-header {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }
        footer {
            margin-left: 250px;
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Sidebar Navigation -->
    <nav class="sidebar">
        <div class="container-fluid">
            <div class="d-flex align-items-center mb-4">
                <img src="../photo/gti.jpg" height="50px;" alt="LMS Logo" class="me-2">
                <h4 class="text-white mb-0 sidebar-header">GTI INSEIN ADMIN</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#dashboard"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#users"><i class="bi bi-people me-2"></i>Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#courses"><i class="bi bi-book me-2"></i>Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#posts"><i class="bi bi-file-earmark-text me-2"></i>Posts & Pages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#settings"><i class="bi bi-gear me-2"></i>Settings</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Notifications <span class="badge bg-danger">3</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Admin User
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="../pages/index.html">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Dashboard Section -->
        <section id="dashboard">
            <h2>Dashboard</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text display-4">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Active Courses</h5>
                            <p class="card-text display-4">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Active Assignments</h5>
                            <p class="card-text display-4">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pending Approvals</h5>
                            <p class="card-text display-4">12</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Users Section -->
        <section id="users" class="mt-5">
            <h2>Users (Teachers & Students)</h2>
            <ul class="nav nav-tabs" id="userTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending"
                        type="button" role="tab" aria-controls="pending" aria-selected="true">Pending Approvals</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="teachers-tab" data-bs-toggle="tab" data-bs-target="#teachers"
                        type="button" role="tab" aria-controls="teachers" aria-selected="false">Teachers</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="students-tab" data-bs-toggle="tab" data-bs-target="#students"
                        type="button" role="tab" aria-controls="students" aria-selected="false">Students</button>
                </li>
            </ul>
            <div class="tab-content" id="userTabsContent">
                <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                    <p class="mt-3">Review and approve new user registrations.</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Requested Role</th>
                                <th>Registration Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>201</td>
                                <td>Herry</td>
                                <td>Herry@gmail.com</td>
                                <td>Student</td>
                                <td>2025-10-15</td>
                                <td>
                                    <button class="btn btn-sm btn-success">Approve</button>
                                    <button class="btn btn-sm btn-danger">Reject</button>
                                </td>
                            </tr>
                            <tr>
                                <td>202</td>
                                <td>Adams</td>
                                <td>adams@gmail.com</td>
                                <td>Teacher</td>
                                <td>2025-10-14</td>
                                <td>
                                    <button class="btn btn-sm btn-success">Approve</button>
                                    <button class="btn btn-sm btn-danger">Reject</button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Courses Taught</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tr.Shun</td>
                                <td>shunweb@gti.most.edu</td>
                                <td>Web Development</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab">
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Enrolled Courses</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>101</td>
                                <td>Herry</td>
                                <td>Herry@gmail.com</td>
                                <td>Web Development</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Courses Section -->
        <section id="courses" class="mt-5">
            <h2>Courses</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Web Dev 101</h5>
                            <p class="card-text">Introduction to Web Development. Teacher Shun</p>
                            <a href="#" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
                <!-- Add more course cards -->
            </div>
        </section>

        <!-- Posts & Pages Section -->
        <section id="posts" class="mt-5">
            <h2>Posts & Pages</h2>
            <form class="mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search posts...">
                            <button class="btn btn-outline-secondary" type="button">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Welcome Announcement</td>
                        <td>Post</td>
                        <td><span class="badge bg-success">Published</span></td>
                        <td>
                            <button class="btn btn-sm btn-info">View</button>
                            <button class="btn btn-sm btn-primary">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <!-- Add more rows -->
                </tbody>
            </table>
        </section>

        <!-- Settings Section -->
        <section id="settings" class="mt-5">
            <h2>Settings</h2>
            <form>
                <div class="mb-3">
                    <label for="siteName" class="form-label">LMS Name</label>
                    <input type="text" class="form-control" id="siteName" value="My Learning Management System">
                </div>
                <div class="mb-3">
                    <label for="changePassword" class="form-label">Change Password</label>
                    <input type="password" class="form-control" id="changePassword" placeholder="New Password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="enableEmailNotifications">
                    <label class="form-check-label" for="enableEmailNotifications">Enable Email Notifications</label>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        &copy; 2025 GTI Admin Panel. All rights reserved.
    </footer>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>