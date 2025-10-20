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

    /* Navbar animation */
      .navbar {
      background: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      animation: slideDown 1s ease-out;
    }

    @keyframes slideDown {
      from {
        transform: translateY(-50px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .navbar-brand span {
      font-weight: 600;
      color: var(--primary-color);
      font-size: 0.95rem;
      line-height: 1.3;
    }

    .nav-link {
      color: #333 !important;
      font-weight: 500;
      transition: color 0.3s;
    }

    .nav-link:hover, .nav-link.active {
      color: var(--primary-color) !important;
    }

    .navbar {
      animation: slideDown 4.5s ease-out;
    }

    @keyframes slideDown {
      from {
        transform: translateY(-50px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    /* Button hover glow */
    .btn-primary:hover {
      box-shadow: 0 0 5px rgba(67, 141, 252, 0.402);
    }

    /* Section hover effect
    .info-section h5 {
      position: relative;
      transition: 0.1s;
    }

    .info-section h5:hover {
      color: #ffc107;
      transform: translateY(-3px);
    }

    .info-section ul li a:hover {
      color: #0d6efd;
      text-decoration: underline;
    }

    .info-section a {
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      transition: color 0.3s;
    } */

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
<!-- Loading Screen from index.html -->
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

  <!-- Main Content Wrapper -->
  <div class="main-content">

    


    <!-- Page Banner (kept as is, but enhanced with hero-like styles) -->
    <section class="hero page-banner text-center" data-aos="zoom-in">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1 data-aos="fade-up" data-aos-delay="300">My Assignments</h1>
        <p data-aos="fade-up" data-aos-delay="500">Track, manage, and submit your course assignments</p>
      </div>
    </section>

    <!-- Main Content (modified for better Bootstrap integration and design) -->
    <main class="container my-5">
      <div class="row">
        <!-- Left Column - Assignments -->
        <div class="col-lg-8">
          <!-- Filter Section (enhanced with Bootstrap buttons group) -->
          <div class="filter-section card mb-4" data-aos="fade-up">
            <div class="card-body">
              <h2 class="filter-title card-title">Filter by Status</h2>
              <div class="btn-group filter-buttons" role="group" aria-label="Assignment filters">
                <button class="btn btn-outline-primary filter-btn active" data-filter="all">All Assignments</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="pending">Pending</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="submitted">Submitted</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="graded">Graded</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="overdue">Overdue</button>
              </div>
            </div>
          </div>

          <!-- Assignments Grid (using Bootstrap cards) -->
          <div class="row assignments-grid">
            <!-- Assignment Cards (converted to Bootstrap cards) -->
            <div class="col-md-6 mb-4">
              <div class="card assignment-card h-100" tabindex="0" data-aos="fade-up" data-aos-delay="100"
                data-status="pending">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <h3 class="card-title assignment-title">Data Structures Final Project</h3>
                      <p class="assignment-course text-muted">CS 301 - Advanced Algorithms</p>
                    </div>
                    <span class="badge bg-warning status-badge status-pending">Pending</span>
                  </div>
                  <p class="assignment-description card-text">
                    Implement a binary search tree with full CRUD operations, balance algorithms, and comprehensive unit
                    tests.
                  </p>
                  <div class="assignment-meta d-flex flex-wrap gap-3">
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-calendar-event-fill me-2"></i>
                      <span><strong>Due:</strong> December 20, 2025</span>
                    </div>
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-award-fill me-2"></i>
                      <span><strong>Points:</strong> 100</span>
                    </div>
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-clock-fill me-2"></i>
                      <span><strong>Time Left:</strong> 3 days remaining</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card assignment-card h-100" tabindex="0" data-aos="fade-up" data-aos-delay="200"
                data-status="submitted">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <h3 class="card-title assignment-title">Renaissance Art Analysis</h3>
                      <p class="assignment-course text-muted">ART 201 - Art History</p>
                    </div>
                    <span class="badge bg-success status-badge status-submitted">Submitted</span>
                  </div>
                  <p class="assignment-description card-text">
                    Write a comprehensive 5-page essay analyzing three major Renaissance artworks and their cultural
                    impact.
                  </p>
                  <div class="assignment-meta d-flex flex-wrap gap-3">
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-calendar-event-fill me-2"></i>
                      <span><strong>Due:</strong> December 15, 2025</span>
                    </div>
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-award-fill me-2"></i>
                      <span><strong>Points:</strong> 50</span>
                    </div>
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-check-circle-fill me-2"></i>
                      <span><strong>Status:</strong> Submitted on Dec 14</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card assignment-card h-100" tabindex="0" data-aos="fade-up" data-aos-delay="300"
                data-status="graded">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <h3 class="card-title assignment-title">Quantum Mechanics Problem Set</h3>
                      <p class="assignment-course text-muted">PHY 401 - Quantum Physics</p>
                    </div>
                    <span class="badge bg-info status-badge status-graded">Graded</span>
                  </div>
                  <p class="assignment-description card-text">
                    Solve 10 advanced problems covering wave functions, uncertainty principle, and Schrödinger equation.
                  </p>
                  <div class="assignment-meta d-flex flex-wrap gap-3">
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-calendar-event-fill me-2"></i>
                      <span><strong>Due:</strong> December 10, 2025</span>
                    </div>
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-award-fill me-2"></i>
                      <span><strong>Score:</strong> 92/100</span>
                    </div>
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-trophy-fill me-2"></i>
                      <span><strong>Grade:</strong> A (Excellent)</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card assignment-card h-100" tabindex="0" data-aos="fade-up" data-aos-delay="400"
                data-status="overdue">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <h3 class="card-title assignment-title">Database Design Lab</h3>
                      <p class="assignment-course text-muted">CS 250 - Database Systems</p>
                    </div>
                    <span class="badge bg-danger status-badge status-overdue">Overdue</span>
                  </div>
                  <p class="assignment-description card-text">
                    Design and implement a fully normalized database schema for an e-commerce application.
                  </p>
                  <div class="assignment-meta d-flex flex-wrap gap-3">
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-calendar-event-fill me-2"></i>
                      <span><strong>Due:</strong> December 5, 2025</span>
                    </div>
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-award-fill me-2"></i>
                      <span><strong>Points:</strong> 75</span>
                    </div>
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-exclamation-triangle-fill me-2"></i>
                      <span><strong>Warning:</strong> 12 days overdue</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card assignment-card h-100" tabindex="0" data-aos="fade-up" data-aos-delay="500"
                data-status="pending">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <h3 class="card-title assignment-title">Machine Learning Project</h3>
                      <p class="assignment-course text-muted">CS 450 - AI & Machine Learning</p>
                    </div>
                    <span class="badge bg-warning status-badge status-pending">Pending</span>
                  </div>
                  <p class="assignment-description card-text">
                    Build and train a convolutional neural network for image classification using TensorFlow or PyTorch.
                  </p>
                  <div class="assignment-meta d-flex flex-wrap gap-3">
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-calendar-event-fill me-2"></i>
                      <span><strong>Due:</strong> December 28, 2025</span>
                    </div>
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-award-fill me-2"></i>
                      <span><strong>Points:</strong> 150</span>
                    </div>
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-clock-fill me-2"></i>
                      <span><strong>Time Left:</strong> 11 days remaining</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card assignment-card h-100" tabindex="0" data-aos="fade-up" data-aos-delay="600"
                data-status="graded">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <h3 class="card-title assignment-title">Literary Analysis Essay</h3>
                      <p class="assignment-course text-muted">ENG 202 - Modern Literature</p>
                    </div>
                    <span class="badge bg-info status-badge status-graded">Graded</span>
                  </div>
                  <p class="assignment-description card-text">
                    Critically analyze themes and symbolism in "The Great Gatsby" focusing on the American Dream.
                  </p>
                  <div class="assignment-meta d-flex flex-wrap gap-3">
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-calendar-event-fill me-2"></i>
                      <span><strong>Due:</strong> December 1, 2025</span>
                    </div>
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-award-fill me-2"></i>
                      <span><strong>Score:</strong> 88/100</span>
                    </div>
                    <div class="meta-item d-flex align-items-center">
                      <i class="bi bi-trophy-fill me-2"></i>
                      <span><strong>Grade:</strong> B+ (Good)</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column - Account Info (replaced stats panel with account info) -->
        <div class="col-lg-4">
          <div class="card stats-panel" data-aos="fade-left">
            <div class="card-body text-center">
              <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Student Avatar">
              <h5 class="card-title">John Doe</h5>
              <p class="text-muted">Student ID: 101234</p>
              <p class="text-muted">Year: Sophomore</p>
              <hr>
              <form>
                <div class="mb-3 text-start">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" value="john.doe@student.edu" readonly>
                </div>
                <div class="mb-3 text-start">
                  <label class="form-label">Phone</label>
                  <input type="text" class="form-control" value="(123) 456-7890" readonly>
                </div>
                <div class="mb-3 text-start">
                  <label class="form-label">Address</label>
                  <input type="text" class="form-control" value="123 University Ave, City, State" readonly>
                </div>
              </form>
              <hr>
              <h6 class="mb-3">Enrolled Courses</h6>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">CS 301 - Advanced Algorithms</li>
                <li class="list-group-item">ART 201 - Art History</li>
                <li class="list-group-item">PHY 401 - Quantum Physics</li>
                <li class="list-group-item">CS 250 - Database Systems</li>
                <li class="list-group-item">CS 450 - AI & Machine Learning</li>
                <li class="list-group-item">ENG 202 - Modern Literature</li>
              </ul>
              <button class="btn btn-primary w-100 mt-3">Edit Profile</button>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer from index.html, adapted -->
    <footer data-aos="fade-in">
      <div class="container">
        <div class="row">
          <!-- Left Column -->
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

          <!-- Middle Column - Quick Links (student-specific) -->
          <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
            <h5 class="footer-section-title">Quick Links</h5>
            <ul class="footer-links">
              <li><a href="#"><i class="bi bi-chevron-right"></i> Dashboard</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> My Courses</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Assignments</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Grades</a></li>
              <li><a href="../pages/assignCalendar.html"><i class="bi bi-chevron-right"></i> Calendar</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Help Center</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> FAQ</a></li>
            </ul>
          </div>

          <!-- Right Column - Map -->
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
  // Remove loading screen after page load
  window.addEventListener('load', () => {
    const loadingScreen = document.getElementById('loading-screen');
    loadingScreen.classList.add('opening');
    setTimeout(() => {
      loadingScreen.classList.add('fade-out');
      document.querySelector('.main-content').classList.add('visible');
    }, 1500);
    document.body.classList.remove('loading');
  });

  // Initialize AOS
  AOS.init({
    duration: 1000,
    offset: 100,
    once: true
  });

  // Filter assignments
  const filterButtons = document.querySelectorAll('.filter-btn');
  const assignmentCards = document.querySelectorAll('.assignment-card');

  filterButtons.forEach(button => {
    button.addEventListener('click', () => {
      const filter = button.getAttribute('data-filter');

      // Set active class
      filterButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');

      // Show/hide cards
      assignmentCards.forEach(card => {
        const status = card.getAttribute('data-status');
        if (filter === 'all' || status === filter) {
          card.parentElement.style.display = 'block';
        } else {
          card.parentElement.style.display = 'none';
        }
      });
    });
  });
</script>
@endsection