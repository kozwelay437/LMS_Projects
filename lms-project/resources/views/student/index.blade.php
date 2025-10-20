@extends('layouts.app')

@section('title', 'Home | GTI Insein')

@section('content')
<style>
    :root {
      --primary-color: #1a3a6b;
      --secondary-color: #d4af37;
      --accent-color: #c41e3a;
      --light-bg: #f8f9fa;
      --back-bg:#262331;
      --ared--:#fe5f55;
    }

    /* Info Section */
    .info-section {
      background:var(--light-bg);
      padding: 80px 0;
    }

    /* Department Card Styles */
    .dept-card {
      background:var(--back-bg);
      border: 2px solid rgba(36, 35, 35, 0.3);
      border-radius: 15px;
      padding: 30px 20px;
      text-align: center;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      cursor: pointer;
      height: 100%;
      text-decoration: none;
      display: block;
      backdrop-filter: blur(10px);
      position: relative;
      overflow: hidden;
    }

    .dept-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(40, 40, 39, 0.2), transparent);
      transition: left 0.5s;
    }

    .dept-card:hover::before {
      left: 100%;
    }

    .dept-card:hover {
      transform: translateY(-10px) scale(1.02);
      border-color: var(--light-bg);
      background: rgba(250, 250, 250, 0.1);
      box-shadow: 0 15px 40px rgba(220, 220, 219, 0.3);
    }

    .dept-icon {
      font-size: 3.5rem;
      color: var(--secondary-color);
      margin-bottom: 15px;
      transition: transform 0.3s;
    }

    .dept-card:hover .dept-icon {
      transform: scale(1.2) rotateY(360deg);
    }

      .dept-logo {
      width: 80px;
      height: 80px;
      background-color: #f8f9fa;
      border-radius: 15px;
      object-fit: contain;
      margin-bottom: 15px;
      transition: transform 0.3s;
      filter: drop-shadow(0 4px 8px rgba(40, 40, 40, 0.3));
    }

    .dept-card:hover .dept-logo {
      transform: scale(1.2) rotateY(360deg);
    }
    .dept-title {
      color: rgb(255, 255, 255);
      font-size: 1.1rem;
      font-weight: 600;
      margin: 0;
      transition: color 0.3s;
    }

    .dept-card:hover .dept-title {
      color: var(--ared--);
    }

    .dept-subtitle {
      color: rgba(255, 254, 254, 0.947);
      font-size: 0.85rem;
      margin-top: 5px;
    }
     .dept-card:hover .dept-subtitle {
      color: var(--back-bg);
    }
    
    /* Section Titles */
    .section-title {
      color:#d72323;
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 40px;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 2px;
      position: relative;
      padding-bottom: 15px;
    }

    .section-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 4px;
      background: var(--secondary-color);
      border-radius: 2px;
    }

    /* Events Slider Card */
    .event-slide-card {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(249, 249, 249, 0.911);
      transition: all 0.3s;
      height: 100%;
      cursor: pointer;
    }

    .event-slide-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 40px rgba(242, 242, 242, 0.646);
    }

    .event-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.3s;
    }

    .event-slide-card:hover .event-img {
      transform: scale(1.1);
    }

    .event-img-container {
      overflow: hidden;
      position: relative;
    }

    .event-badge {
      position: absolute;
      top: 15px;
      right: 15px;
      background: var(--accent-color);
      color: white;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 600;
      z-index: 1;
    }

    .event-content {
      padding: 25px;
    }

    .event-date {
      color: var(--secondary-color);
      font-size: 0.85rem;
      font-weight: 600;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .event-title {
      color: var(--primary-color);
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 12px;
      line-height: 1.4;
    }

    .event-description {
      color: #666;
      font-size: 0.9rem;
      line-height: 1.6;
      margin-bottom: 15px;
    }

    .event-link {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 600;
      font-size: 0.9rem;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: gap 0.3s;
    }

    .event-link:hover {
      gap: 10px;
      color: var(--accent-color);
    }

    /* Carousel Custom Styles */
    .carousel-control-prev,
    .carousel-control-next {
      width: 50px;
      height: 50px;
      background: var(--back-bg);
      border-radius: 50%;
      top: 50%;
      transform: translateY(-50%);
      opacity: 0.8;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
      opacity: 1;
      background: var(--accent-color);
    }

    .carousel-control-prev {
      left: -25px;
    }

    .carousel-control-next {
      right: -25px;
    }

    .carousel-indicators {
      bottom: -40px;
    }

    .carousel-indicators button {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background-color: var(--secondary-color);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .section-title {
        font-size: 1.5rem;
      }

      .dept-icon {
        font-size: 2.5rem;
      }

      .carousel-control-prev,
      .carousel-control-next {
        width: 40px;
        height: 40px;
      }

      .carousel-control-prev {
        left: -10px;
      }

      .carousel-control-next {
        right: -10px;
      }
    }
    
    /* ================================
       LOADING SCREEN ANIMATION
       ================================ */
    #loading-screen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 99999;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #ffffff;
      transition: opacity 0.2s ease;
    }

    #loading-screen.fade-out {
      opacity:0;
      pointer-events: none;
    }

    /* Split Curtain Effect */
    .curtain {
      position: absolute;
      width: 50%;
      height: 100%;
      background: linear-gradient(135deg,#1e2a78 0%, #1e2a78 100%);
      transition: transform 1.5s cubic-bezier(0.86, 0, 0.07, 1);
    }

    .curtain-left {
      left: 0;
      transform-origin: left center;
    }

    .curtain-right {
      right: 0;
      transform-origin: right center;
    }

    /* Curtain opening animation (3D Y-axis rotation) */
    #loading-screen.opening .curtain-left {
      transform: perspective(1000px) rotateY(140deg);
    }

    #loading-screen.opening .curtain-right {
      transform: perspective(1000px) rotateY(-140deg);
    }

    /* Logo Container */
    .logo-container {
      position: relative;
      z-index: 10;
      text-align: center;
      animation: logoAppear 1s ease-out;
    }

    @keyframes logoAppear {
      0% {
        opacity: 0;
        transform: scale(0.5) translateY(30px);
      }
      50% {
        opacity: 1;
        transform: scale(1.1) translateY(0);
      }
      100% {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }

    .logo-container img {
      width: 120px;
      height: 120px;
      object-fit: contain;
      margin-bottom: 20px;
      filter: drop-shadow(0 10px 30px rgba(0,0,0,0.3));
      animation: logoPulse 2s ease-in-out infinite;
    }

    @keyframes logoPulse {
      0%, 100% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.05);
      }
    }

    .logo-container h2 {
      color:white;
      font-weight: bold;
      font-size: 1.8rem;
      margin-bottom: 15px;
      letter-spacing: 1px;
    }

    /* Loading Spinner */
    /* .loading-spinner {
      width: 50px;
      height: 50px;
      border: 5px solid rgba(26, 58, 107, 0.2);
      border-top: 5px solid #1a3a6b;
      border-radius: 50%;
      animation: spin 1s linear infinite;
      margin: 0 auto;
    } */
/* 
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    } */

    /* Progress Bar */
    .progress-container {
      width: 300px;
      height: 4px;
      background: rgb(222, 224, 227);
      border-radius: 10px;
      overflow: hidden;
      margin: 20px auto 0;
    }

    .progress-bar-loading {
      height: 100%;
      background: linear-gradient(90deg, #f70808, #ff0303);
      border-radius: 10px;
      animation: progressLoad 1.5s ease-out forwards;
    }

    @keyframes progressLoad {
      0% { width: 0%; }
      100% { width: 100%; }
    }

    /* ================================
       ORIGINAL STYLES
       ================================ */
    
    /* Hero Animation */
    .hero {
      position: relative;
      background: url(../img/bghero.jpg) center no-repeat;
      color: white;
      height: 80vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-shadow: 0 2px 8px rgba(255, 255, 255, 0.269);
      opacity: 1;
    }

    .hero-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
      z-index: 1;
      animation: fadeZoomIn 4.5s ease-in-out;
    }

    @keyframes fadeZoomIn {
      from {
        opacity: 0;
        transform: scale(0.9);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    

    /* Smooth section reveal */
    [data-aos] {
      transition-property: transform, opacity;
    }

    /* Footer fade-in */
    footer {
      animation: fadeIn 2s ease-in;
      background: #1a3a6b !important;
      color: white;
      padding: 50px 0 20px;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .footer-logo-section {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-bottom: 30px;
    }

    .footer-logo-section img {
      width: 80px;
      height: 80px;
      object-fit: contain;
    }

    .footer-logo-text h4 {
      font-size: 1.3rem;
      font-weight: bold;
      margin-bottom: 5px;
      color: #d4af37;
    }

    .footer-logo-text p {
      font-size: 0.9rem;
      margin: 0;
      color: rgba(255, 255, 255, 0.8);
    }

    .footer-contact-info p {
      margin-bottom: 10px;
      color: rgba(255, 255, 255, 0.9);
      line-height: 1.8;
    }

    .footer-contact-info i {
      color: #d4af37;
      margin-right: 10px;
      width: 20px;
    }

    .footer-section-title {
      color: #d4af37;
      font-size: 1.1rem;
      font-weight: bold;
      margin-bottom: 20px;
      text-transform: uppercase;
    }

    .footer-links {
      list-style: none;
      padding: 0;
    }

    .footer-links li {
      margin-bottom: 10px;
    }

    .footer-links a {
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      transition: all 0.3s;
    }

    .footer-links a:hover {
      color: #d4af37;
      padding-left: 5px;
    }

    .map-container {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .footer-bottom {
      border-top: 1px solid rgba(255, 255, 255, 0.2);
      margin-top: 30px;
      padding-top: 20px;
      text-align: center;
      color: rgba(255, 255, 255, 0.7);
    }

    .social-links a {
      display: inline-block;
      width: 40px;
      height: 40px;
      line-height: 40px;
      text-align: center;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      color: white;
      margin: 0 5px;
      transition: all 0.3s;
    }

    .social-links a:hover {
      background: #d4af37;
      transform: translateY(-3px);
    }

    /* Hide body content initially */
    body.loading {
      overflow: hidden;
    }

    .main-content {
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .main-content.visible {
      opacity: 1;
    }
</style>
<body class="loading" data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">

  <!-- ================================
       LOADING SCREEN
       ================================ -->
  <div id="loading-screen">
    <!-- Left Curtain -->
    <div class="curtain curtain-left"></div>

    <!-- Right Curtain -->
    <div class="curtain curtain-right"></div>

    <!-- Logo and Loading Animation -->
    <div class="logo-container">
      <img src="../img/gti.jpg" alt="GTI Logo" />
      <h2>GTI Insein</h2>
      <div class="loading-spinner"></div>
      <div class="progress-container">
        <div class="progress-bar-loading"></div>
      </div>
    </div>
  </div>

  <!-- ================================
       MAIN CONTENT
       ================================ -->
  <div class="main-content">
    

    <!-- ✅ Hero Section -->
    <section class="hero text-center" data-aos="zoom-in">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1 data-aos="fade-up" data-aos-delay="300">Government Technological Institute (Insein)</h1>
        <p data-aos="fade-up" data-aos-delay="500">Empowering innovation, creativity, and design for a smarter future.
        </p>
        <a href="#" class="btn btn-primary btn-lg" data-aos="zoom-in" data-aos-delay="700">Discover More</a>
      </div>
    </section>

    <!-- ✅ Info Grid Section -->
    <section class="info-section" data-aos="fade-up">
      <div class="container">

        <!-- Departments Section -->
        <div class="row mb-5">
          <div class="col-12">
            <h2 class="section-title" data-aos="fade-down">Our Departments</h2>
          </div>
        </div>
        <div class="row g-6 mb-5">
          <!-- IT Department Card -->
          <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="100">
            <a href="../pages/department/it.html" class="dept-card">
              <img src="../img/it.png" alt="Information Technology" class="dept-logo" />
              <h5 class="dept-title">Information Technology</h5>
              <p class="dept-subtitle">IT Department</p>
            </a>
          </div>

          <!-- Civil Engineering Card -->
          <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="200">
            <a href="../pages/department/civil.html" class="dept-card">
              <img src="../img/civil.png" alt="Civil Engineering" class="dept-logo" />
              <h5 class="dept-title">Civil Engineering</h5>
              <p class="dept-subtitle">CE Department</p>
            </a>
          </div>
            <!-- Electronics and Comms Card -->
          <div class="col-lg-2 col-md-4 col-6 " data-aos="zoom-in" data-aos-delay="500">
            <a href="../pages/department/ec.html" class="dept-card">
              <!-- Option 1: Use custom logo image -->
              <img src="../img/ec.png" alt="Electronics & Communication" class="dept-logo" />
              <!---: Use icon -->
              <!-- <i class="bi bi-broadcast dept-icon"></i> -->
              <h5 class="dept-title">Electronics & Comm.</h5>
              <p class="dept-subtitle">EC Department</p>
            </a>
          </div>

          <!-- Mechanical Engineering Card -->
          <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="300">
            <a href="../pages/department/me.html" class="dept-card">
              <img src="../img/me.png" alt="Mechanical Engineering" class="dept-logo" />
              <h5 class="dept-title">Mechanical Engineering</h5>
              <p class="dept-subtitle">ME Department</p>
            </a>
          </div>

          <!-- Industrial Engineering Card -->
          <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="400">
            <a href="../pages/department/ie.html" class="dept-card">
              <img src="../img/ie.png" alt="Industrial Engineering" class="dept-logo" />
              <h5 class="dept-title">Industrial Engineering</h5>
              <p class="dept-subtitle">IE Department</p>
            </a>
          </div>

          <!-- Electrical Power Card -->
          <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="600">
            <a href="../pages/department/ep.html" class="dept-card">
              <img src="../img/ec.png" alt="Electronics & Communication" class="dept-logo" />
              <h5 class="dept-title">Electrical Power</h5>
              <p class="dept-subtitle">EP Department</p>
            </a>
          </div>
        </div>

        <!-- News & Events Section -->
        <div class="row mt-5 pt-5">
          <div class="col-12">
            <h2 class="section-title" data-aos="fade-down">Latest News & Events</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <!-- Bootstrap Carousel for Events -->
            <div id="eventsCarousel" class="carousel slide" data-bs-ride="carousel">

              <!-- Carousel Indicators -->
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#eventsCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#eventsCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#eventsCarousel" data-bs-slide-to="2"></button>
              </div>

              <!-- Carousel Items -->
              <div class="carousel-inner">

                <!-- Slide 1 - Multiple Cards -->
                <div class="carousel-item active">
                  <div class="row g-4">
                    <!-- Event Card 1 -->
                    <div class="col-lg-4 col-md-6">
                      <div class="event-slide-card">
                        <div class="event-img-container">
                          <span class="event-badge">Upcoming</span>
                          <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600" alt="Final Exam"
                            class="event-img">
                        </div>
                        <div class="event-content">
                          <div class="event-date">
                            <i class="bi bi-calendar-event"></i>
                            December 20-30, 2025
                          </div>
                          <h4 class="event-title">Final Exam Time Table 2024-2025</h4>
                          <p class="event-description">
                            Check the final examination schedule for all departments. Semester II exams begin on
                            December 20th.
                          </p>
                          <a href="#" class="event-link">
                            Read More <i class="bi bi-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>

                    <!-- Event Card 2 -->
                    <div class="col-lg-4 col-md-6">
                      <div class="event-slide-card">
                        <div class="event-img-container">
                          <span class="event-badge">Completed</span>
                          <img src="https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?w=600" alt="Graduation"
                            class="event-img">
                        </div>
                        <div class="event-content">
                          <div class="event-date">
                            <i class="bi bi-calendar-event"></i>
                            November 15, 2025
                          </div>
                          <h4 class="event-title">Annual Graduation Ceremony 2025</h4>
                          <p class="event-description">
                            Celebrating the achievements of over 500 graduates across all engineering departments.
                          </p>
                          <a href="../pages/event.html" class="event-link">
                            Read More <i class="bi bi-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>

                    <!-- Event Card 3 -->
                    <div class="col-lg-4 col-md-6">
                      <div class="event-slide-card">
                        <div class="event-img-container">
                          <span class="event-badge">News</span>
                          <img src="https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=600" alt="AI Seminar"
                            class="event-img">
                        </div>
                        <div class="event-content">
                          <div class="event-date">
                            <i class="bi bi-calendar-event"></i>
                            December 10, 2025
                          </div>
                          <h4 class="event-title">AI Knowledge Sharing Seminar</h4>
                          <p class="event-description">
                            Join us for an insightful seminar on Artificial Intelligence and its applications in
                            engineering.
                          </p>
                          <a href="../pages/event.html" class="event-link">
                            Read More <i class="bi bi-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Slide 2 - Multiple Cards -->
                <div class="carousel-item">
                  <div class="row g-4">
                    <!-- Event Card 4 -->
                    <div class="col-lg-4 col-md-6">
                      <div class="event-slide-card">
                        <div class="event-img-container">
                          <span class="event-badge">Results</span>
                          <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600"
                            alt="Exam Results" class="event-img">
                        </div>
                        <div class="event-content">
                          <div class="event-date">
                            <i class="bi bi-calendar-event"></i>
                            December 5, 2025
                          </div>
                          <h4 class="event-title">Semester I Exam Results Published</h4>
                          <p class="event-description">
                            First-year and third-year examination results are now available online for all students.
                          </p>
                          <a href="../pages/event.html" class="event-link">
                            View Results <i class="bi bi-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>

                    <!-- Event Card 5 -->
                    <div class="col-lg-4 col-md-6">
                      <div class="event-slide-card">
                        <div class="event-img-container">
                          <span class="event-badge">Workshop</span>
                          <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600" alt="Workshop"
                            class="event-img">
                        </div>
                        <div class="event-content">
                          <div class="event-date">
                            <i class="bi bi-calendar-event"></i>
                            January 15-20, 2026
                          </div>
                          <h4 class="event-title">Technical Skills Workshop 2026</h4>
                          <p class="event-description">
                            Five-day intensive workshop covering advanced topics in all engineering disciplines.
                          </p>
                          <a href="../pages/event.html" class="event-link">
                            Register Now <i class="bi bi-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>

                    <!-- Event Card 6 -->
                    <div class="col-lg-4 col-md-6">
                      <div class="event-slide-card">
                        <div class="event-img-container">
                          <span class="event-badge">Competition</span>
                          <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=600"
                            alt="Competition" class="event-img">
                        </div>
                        <div class="event-content">
                          <div class="event-date">
                            <i class="bi bi-calendar-event"></i>
                            February 1-3, 2026
                          </div>
                          <h4 class="event-title">Inter-Department Project Competition</h4>
                          <p class="event-description">
                            Showcase your innovative projects and compete for exciting prizes and recognition.
                          </p>
                          <a href="#" class="event-link">
                            Learn More <i class="bi bi-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Slide 3 - Multiple Cards -->
                <div class="carousel-item">
                  <div class="row g-4">
                    <!-- Event Card 7 -->
                    <div class="col-lg-4 col-md-6">
                      <div class="event-slide-card">
                        <div class="event-img-container">
                          <span class="event-badge">Cultural</span>
                          <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=600"
                            alt="Cultural Event" class="event-img">
                        </div>
                        <div class="event-content">
                          <div class="event-date">
                            <i class="bi bi-calendar-event"></i>
                            December 25, 2025
                          </div>
                          <h4 class="event-title">Annual Cultural Festival 2025</h4>
                          <p class="event-description">
                            Join us for a day of cultural performances, exhibitions, and celebration of diversity.
                          </p>
                          <a href="#" class="event-link">
                            View Schedule <i class="bi bi-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>

                    <!-- Event Card 8 -->
                    <div class="col-lg-4 col-md-6">
                      <div class="event-slide-card">
                        <div class="event-img-container">
                          <span class="event-badge">Sports</span>
                          <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=600" alt="Sports Day"
                            class="event-img">
                        </div>
                        <div class="event-content">
                          <div class="event-date">
                            <i class="bi bi-calendar-event"></i>
                            January 10-12, 2026
                          </div>
                          <h4 class="event-title">Inter-Institute Sports Meet 2026</h4>
                          <p class="event-description">
                            Compete in various sports events and represent your department with pride and spirit.
                          </p>
                          <a href="#" class="event-link">
                            View Events <i class="bi bi-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>

                    <!-- Event Card 9 -->
                    <div class="col-lg-4 col-md-6">
                      <div class="event-slide-card">
                        <div class="event-img-container">
                          <span class="event-badge">Career</span>
                          <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=600" alt="Job Fair"
                            class="event-img">
                        </div>
                        <div class="event-content">
                          <div class="event-date">
                            <i class="bi bi-calendar-event"></i>
                            February 15, 2026
                          </div>
                          <h4 class="event-title">Campus Placement & Job Fair 2026</h4>
                          <p class="event-description">
                            Connect with top employers and explore career opportunities in leading companies.
                          </p>
                          <a href="#" class="event-link">
                            Register <i class="bi bi-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <!-- Carousel Controls -->
              <button class="carousel-control-prev" type="button" data-bs-target="#eventsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#eventsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ✅ Footer -->
    <footer data-aos="fade-in">
      <div class="container">
        <div class="row">
          <!-- Left Column  -->
          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-left">
            <div class="footer-logo-section">
              <img src="../img/gti.jpg" alt="GTI Logo" />
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
              <li><a href="#"><i class="bi bi-chevron-right"></i>Assignments</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Departments</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Events</a></li>
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
<script>
        // ================================
    // LOADING SCREEN ANIMATION
    // ================================
    window.addEventListener('load', function() {
      const loadingScreen = document.getElementById('loading-screen');
      const mainContent = document.querySelector('.main-content');
      const body = document.body;

      // Wait for logo animation to complete, then open curtains
      setTimeout(function() {
        // Add opening class to trigger curtain animation
        loadingScreen.classList.add('opening');
        
        // After curtains open, fade out loading screen
        setTimeout(function() {
          loadingScreen.classList.add('fade-out');
          mainContent.classList.add('visible');
          body.classList.remove('loading');
          
          // Remove loading screen from DOM after animation
          setTimeout(function() {
            loadingScreen.style.display = 'none';
          }, 500);
        }, 1500); // Wait for curtain animation to complete
      }, 1000); // Wait for logo animation
    });

    // ================================
    // AOS INITIALIZATION
    // ================================
    AOS.init({
      duration: 1000,
      offset: 100,
      once: true
    });

    // ================================
    // SMOOTH SCROLL
    // ================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener("click", function (e) {
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: "smooth" });
        }
      });
    });


// Auto-play carousel with longer interval
     const eventsCarousel = document.getElementById('eventsCarousel');
    const carousel = new bootstrap.Carousel(eventsCarousel, {
      interval: 5000,
      wrap: true,
      touch: true
    });
</script>
@endsection
