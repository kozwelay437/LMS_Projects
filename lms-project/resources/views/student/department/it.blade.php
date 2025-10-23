<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Department - Government Technological Institute (Insein)</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom styles for enhanced UI/UX -->
    <link rel="stylesheet" href="{{ asset('css/department.css') }}">
    
</head>

<body data-bs-spy="scroll" data-bs-target="#sidebar-nav" data-bs-offset="100" tabindex="0">
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <div class="container-fluid px-4">
                <a class="navbar-brand d-flex align-items-center me-4" href="#">
                    <img src="{{asset('img/sch.png')}}" alt="GTI Logo" class="brand-logo me-2" style="height: 50px;" />
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
  <a class="nav-link dropdown-toggle" href="#" id="departmentDropdown" 
     role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    
                </div>
            </div>
        </nav>

        <!-- Page Layout with Sidebar -->
        <div class="container-fluid">
            <div class="row">

                <!-- Sidebar (sticky below navbar) -->
                <aside class="col-md-3 col-lg-2 p-0 d-none d-md-block">
                    <div class="sidebar" id="sidebar-nav">
                        <div class="sidebar-header fw-bold text-center mb-3">Information Technology</div>
                        <ul class="list-unstyled">
                            <li><a href="#overview" class="sidebar-btn active"><i class="bi bi-info-circle"></i>
                                    Overview</a></li>
                            <li><a href="#about" class="sidebar-btn"><i class="bi bi-person-vcard"></i> About
                                    Department</a>
                            </li>
                            <li><a href="#programs" class="sidebar-btn"><i class="bi bi-book"></i> Programs</a></li>
                            <li><a href="#faculty" class="sidebar-btn"><i class="bi bi-people"></i> Faculty</a></li>
                            <li><a href="#facilities" class="sidebar-btn"><i class="bi bi-building"></i> Facilities</a>
                            </li>
                            <li><a href="#research" class="sidebar-btn"><i class="bi bi-search"></i> Research</a></li>
                            <li><a href="#contact" class="sidebar-btn"><i class="bi bi-headset"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </aside>

                <!-- Main Content -->
                <main class="col-md-9 col-lg-10 p-0 main-content">

                    <!-- Hero Section -->
                    <section id="overview" class="hero">
                        <div class="container">
                            <h1 class="display-4 fw-bold">Information Technology</h1>
                            <p class="lead">Empowering the next generation of tech innovators and leaders</p>
                            <a href="#about" class="btn btn-light btn-lg">Explore More <i
                                    class="bi bi-arrow-down"></i></a>
                        </div>
                    </section>

                    <!-- About Department -->
                    <section id="about" class="section-padding bg-light animate-on-scroll">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h2 class="fw-bold mb-3">About the Department</h2>
                                    <p>The Information Technology Department at GTI (Insein) offers comprehensive
                                        programs
                                        in computer
                                        science, software development, networking, and cybersecurity. Our curriculum is
                                        designed to
                                        provide students with hands-on experience and theoretical knowledge to excel in
                                        the
                                        rapidly
                                        evolving tech industry.</p>
                                    <p>Our faculty consists of experienced professionals and researchers who are
                                        dedicated
                                        to mentoring
                                        students and fostering innovation.</p>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset('img/it.png')}}"
                                        alt="IT Department" class="img-fluid rounded shadow">
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Programs Offered -->
                    <section id="programs" class="section-padding animate-on-scroll">
                        <div class="container">
                            <h2 class="text-center mb-5 fw-bold">Programs Offered</h2>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 text-center">
                                        <div class="card-body">
                                            <i class="bi bi-laptop fs-1 text-primary mb-3"></i>
                                            <h5 class="card-title">Diploma in Information Technology</h5>
                                            <p class="card-text">A 2-year program covering fundamental IT concepts,
                                                programming, and
                                                system administration.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 text-center">
                                        <div class="card-body">
                                            <i class="bi bi-code-slash fs-1 text-primary mb-3"></i>
                                            <h5 class="card-title">Advanced Diploma in Software Engineering</h5>
                                            <p class="card-text">Focus on software design, development methodologies,
                                                and
                                                project
                                                management.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 text-center">
                                        <div class="card-body">
                                            <i class="bi bi-shield-lock fs-1 text-primary mb-3"></i>
                                            <h5 class="card-title">Certificate in Network Security</h5>
                                            <p class="card-text">Short-term course on cybersecurity fundamentals and
                                                network
                                                protection.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Faculty -->
                    <section id="faculty" class="section-padding bg-light animate-on-scroll">
                        <div class="container">
                            <h2 class="text-center mb-5 fw-bold">Our Faculty</h2>
                            <div class="row g-4">
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="faculty-card card h-100 text-center shadow-sm border-0 rounded-4">
                                        <img src="{{asset('img/professp.png')}}"
                                            class="card-img-top rounded-circle mx-auto mt-3" alt="Faculty">
                                        <div class="card-body p-3">
                                            <h5 class="card-title mb-1">Dr. Lisa Wang</h5>
                                            <p class="card-text text-muted mb-1">Lecturer</p>
                                            <p class="card-text"><small>PhD in Machine Learning</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="faculty-card card h-100 text-center shadow-sm border-0 rounded-4">
                                        <img src="https://via.placeholder.com/150?text=Faculty"
                                            class="card-img-top rounded-circle mx-auto mt-3" alt="Faculty">
                                        <div class="card-body p-3">
                                            <h5 class="card-title mb-1">Prof. John Smith</h5>
                                            <p class="card-text text-muted mb-1">Professor</p>
                                            <p class="card-text"><small>PhD in Computer Science</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="faculty-card card h-100 text-center shadow-sm border-0 rounded-4">
                                        <img src="https://via.placeholder.com/150?text=Faculty"
                                            class="card-img-top rounded-circle mx-auto mt-3" alt="Faculty">
                                        <div class="card-body p-3">
                                            <h5 class="card-title mb-1">Dr. Sarah Johnson</h5>
                                            <p class="card-text text-muted mb-1">Associate Professor</p>
                                            <p class="card-text"><small>PhD in Cybersecurity</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="faculty-card card h-100 text-center shadow-sm border-0 rounded-4">
                                        <img src="https://via.placeholder.com/150?text=Faculty"
                                            class="card-img-top rounded-circle mx-auto mt-3" alt="Faculty">
                                        <div class="card-body p-3">
                                            <h5 class="card-title mb-1">Mr. Michael Chen</h5>
                                            <p class="card-text text-muted mb-1">Lecturer</p>
                                            <p class="card-text"><small>MSc in Software Engineering</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Facilities -->
                    <section id="facilities" class="section-padding animate-on-scroll">
                        <div class="container">
                            <h2 class="text-center mb-5 fw-bold">Department Facilities</h2>
                            <div class="accordion" id="facilitiesAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne">
                                            <i class="bi bi-pc-display me-2"></i> Computer Labs
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne">
                                        <div class="accordion-body">
                                            <div class="row align-items-center">
                                                <div class="col-md-8">
                                                    <p>State-of-the-art computer labs equipped with the latest hardware
                                                        and
                                                        software for programming, design, and development work. Our labs
                                                        provide students with hands-on experience in various
                                                        technologies
                                                        and tools used in the industry.</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <img src="{{asset('img/gti.jpg')}}" alt="Computer Lab"
                                                        class="img-fluid rounded shadow">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                            <i class="bi bi-router me-2"></i> Networking Center
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo">
                                        <div class="accordion-body">
                                            Dedicated facility for hands-on networking and cybersecurity training with
                                            enterprise-grade equipment.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                            <i class="bi bi-search-heart me-2"></i> Research Lab
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree">
                                        <div class="accordion-body">
                                            Modern research space for student projects and faculty research in emerging
                                            technologies like AI, IoT, and cloud computing.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Research -->
                    <section id="research" class="section-padding bg-light animate-on-scroll">
                        <div class="container">
                            <h2 class="fw-bold mb-3">Research & Innovation</h2>
                            <div class="alert alert-info border-0 rounded-4 shadow-sm" role="alert">
                                <i class="bi bi-info-circle me-2"></i> <strong>Exciting Projects:</strong> Discover our
                                latest contributions to IT research soon!
                            </div>
                        </div>
                    </section>

                    <!-- Contact -->
                    <section id="contact" class="section-padding animate-on-scroll">
                        <div class="container">
                            <h2 class="fw-bold mb-4">Contact Us</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-2"><i class="bi bi-geo-alt-fill me-2 text-primary"></i>
                                        <strong>Department:</strong> Information Technology
                                    </p>
                                    <p class="mb-2"><i class="bi bi-geo-alt-fill me-2 text-primary"></i>
                                        <strong>Address:</strong> Insein 11011, Yangon Division, Myanmar
                                    </p>
                                    <p class="mb-2"><i class="bi bi-telephone-fill me-2 text-primary"></i>
                                        <strong>Phone:</strong> +959264833390
                                    </p>
                                    <p class="mb-2"><i class="bi bi-envelope-fill me-2 text-primary"></i>
                                        <strong>Email:</strong> contact@gtiinsein.edu.mm
                                    </p>
                                </div>
                                <div class="col-md-6 mt-3 mt-md-0">
                                    <div class="alert alert-warning border-0 rounded-4 shadow-sm" role="alert">
                                        <i class="bi bi-exclamation-triangle me-2"></i> Contact form integration coming
                                        soon!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </main>
            </div>
        </div>

        <!-- Footer -->
        <footer data-aos="fade-in">
            <div class="container">
                <div class="row">
                    <!-- Left Column  -->
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-left">
                        <div class="footer-logo-section">
                            <img src="{{asset('img/gti.jpg')}}" alt="GTI Logo" />
                            <div class="footer-logo-text">
                                <h4>GTI INSEIN</h4>
                                <p>Government Technical<br>Institute (Insein)</p>
                            </div>
                        </div>

                        <h5 class="footer-section-title mt-4">Contact Us</h5>
                        <div class="footer-contact-info">
                            <p>
                                <i class="bi bi-geo-alt-fill"></i>
                                Insein 11011, Yangon Division,<br>
                                <span style="margin-left: 30px;">Myanmar</span>
                            </p>
                            <p>
                                <i class="bi bi-telephone-fill"></i>
                                +959264833390
                            </p>
                            <p>
                                <i class="bi bi-envelope-fill"></i>
                                contact@gtiinsein.edu.mm
                            </p>
                        </div>

                        <h5 class="footer-section-title mt-4">Follow Us</h5>
                        <div class="social-links">
                            <a href="#" title="Facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" title="Twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                            <a href="#" title="YouTube"><i class="bi bi-youtube"></i></a>
                            <a href="#" title="Instagram"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>

                    <!-- Middle Column - Quick Links -->
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                        <h5 class="footer-section-title">Quick Links</h5>
                        <ul class="footer-links">
                            <li><a href="#"><i class="bi bi-chevron-right"></i> About Us</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Assignments</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Departments</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Events</a></li>
                            <li><a href="#research"><i class="bi bi-chevron-right"></i> Research</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Student Portal</a></li>
                        </ul>
                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-5 mb-4" data-aos="fade-right">
                        <h5 class="footer-section-title">Our Location</h5>
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d306.0828086174892!2d96.09678689206482!3d16.90158638917912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1950068c22ccd%3A0x13f171e1a6e44386!2sGovernment%20Technical%20Institute%20(Insein)!5e0!3m2!1sen!2smm!4v1697532608826!5m2!1sen!2smm"
                                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </div>

                </div>

                <!-- Footer Bottom -->
                <div class="footer-bottom">
                    <p class="mb-0">© 2025 Government Technological Institute (Insein). All Rights Reserved.</p>
                </div>
            </div>
        </footer>

    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script src="{{ asset('department.js') }}"></script>
</body>
</html>