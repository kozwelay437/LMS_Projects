@extends('layouts.app')

@section('title', 'About | GTI Insein')

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
      background: url(../photo/webpageImg/bghero.jpg) center no-repeat;
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

    
            .hero {
            background: linear-gradient(rgba(253, 253, 253, 0), rgba(223, 217, 217, 0)), url('../img/bghero.jpg');
            background-size: cover;
            background-position: center;
            color: rgb(249, 249, 249);
            padding: 150px 0;
            text-align: center;
        }
        .section-padding { padding: 80px 0; }
        .event-card { transition: transform 0.3s ease, box-shadow 0.3s ease; border: none; border-radius: 15px; overflow: hidden; }
        .event-card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); }
        .event-img { height: 200px; object-fit: cover; }
        .event-date { background-color: #fd0d0d; color: white; padding: 5px 10px; border-radius: 5px; }
        .modal-content { border-radius: 15px; }
</style>
<!-- Hero Section -->
    <section class="hero" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 class="display-4 fw-bold">Upcoming Events</h1>
            <p class="lead">Stay updated with our latest events, workshops, and activities</p>
        </div>
    </section>

    <!-- Events Section (grid of cards with animations) -->
    <section class="section-padding bg-light">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="zoom-in">Recent and Upcoming Events</h2>
            <div class="row">
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card event-card">
                        <img src="https://via.placeholder.com/400x200?text=Tech+Workshop" class="card-img-top event-img" alt="Tech Workshop">
                        <div class="card-body">
                            <span class="event-date d-inline-block mb-2">October 25, 2025</span>
                            <h5 class="card-title">AI and Machine Learning Workshop</h5>
                            <p class="card-text">Join us for a hands-on workshop on the latest advancements in AI and ML. Perfect for students and professionals.</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventModal1">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card event-card">
                        <img src="https://via.placeholder.com/400x200?text=Seminar" class="card-img-top event-img" alt="Seminar">
                        <div class="card-body">
                            <span class="event-date d-inline-block mb-2">November 5, 2025</span>
                            <h5 class="card-title">Cybersecurity Seminar</h5>
                            <p class="card-text">Learn about emerging threats and best practices in cybersecurity from industry experts.</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventModal2">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card event-card">
                        <img src="https://via.placeholder.com/400x200?text=Hackathon" class="card-img-top event-img" alt="Hackathon">
                        <div class="card-body">
                            <span class="event-date d-inline-block mb-2">November 15, 2025</span>
                            <h5 class="card-title">Annual Hackathon</h5>
                            <p class="card-text">Compete in our 24-hour hackathon to build innovative solutions and win exciting prizes.</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventModal3">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card event-card">
                        <img src="https://via.placeholder.com/400x200?text=Conference" class="card-img-top event-img" alt="Conference">
                        <div class="card-body">
                            <span class="event-date d-inline-block mb-2">December 10, 2025</span>
                            <h5 class="card-title">Tech Conference 2025</h5>
                            <p class="card-text">Network with tech leaders and attend talks on future technologies.</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventModal4">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card event-card">
                        <img src="https://via.placeholder.com/400x200?text=Webinar" class="card-img-top event-img" alt="Webinar">
                        <div class="card-body">
                            <span class="event-date d-inline-block mb-2">December 20, 2025</span>
                            <h5 class="card-title">Online Webinar: Cloud Computing</h5>
                            <p class="card-text">Explore cloud technologies and their applications in a virtual session.</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventModal5">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card event-card">
                        <img src="https://via.placeholder.com/400x200?text=Career+Fair" class="card-img-top event-img" alt="Career Fair">
                        <div class="card-body">
                            <span class="event-date d-inline-block mb-2">January 15, 2026</span>
                            <h5 class="card-title">Career Fair</h5>
                            <p class="card-text">Meet recruiters from top tech companies and explore job opportunities.</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventModal6">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="#" class="btn btn-outline-primary btn-lg">Load More Events</a>
            </div>
        </div>
    </section>

    <!-- Event Modals -->
    <!-- Modal 1 -->
    <div class="modal fade" id="eventModal1" tabindex="-1" aria-labelledby="eventModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModal1Label">AI and Machine Learning Workshop</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/800x400?text=AI+Workshop+Image" class="img-fluid mb-3" alt="Event Image">
                    <p><strong>Date:</strong> October 25, 2025</p>
                    <p><strong>Time:</strong> 9:00 AM - 4:00 PM</p>
                    <p><strong>Location:</strong> Main Auditorium, GTI Campus</p>
                    <p><strong>Description:</strong> This full-day workshop dives deep into artificial intelligence and machine learning. Participants will learn about neural networks, deep learning frameworks like TensorFlow and PyTorch, and real-world applications. Hands-on sessions include building a simple ML model. Suitable for beginners to intermediate learners. Guest speakers from industry leaders will share insights on career opportunities in AI.</p>
                    <p><strong>Registration:</strong> Free for students; $20 for professionals. Limited seats available.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal fade" id="eventModal2" tabindex="-1" aria-labelledby="eventModal2Label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModal2Label">Cybersecurity Seminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/800x400?text=Cybersecurity+Seminar+Image" class="img-fluid mb-3" alt="Event Image">
                    <p><strong>Date:</strong> November 5, 2025</p>
                    <p><strong>Time:</strong> 2:00 PM - 5:00 PM</p>
                    <p><strong>Location:</strong> Online (Zoom)</p>
                    <p><strong>Description:</strong> In this seminar, experts will discuss current cybersecurity threats, including ransomware, phishing, and data breaches. Topics include ethical hacking basics, network security protocols, and compliance standards like GDPR. Interactive Q&A session included. Ideal for IT students and professionals looking to enhance their security knowledge.</p>
                    <p><strong>Registration:</strong> Free. Link will be emailed upon registration.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 3 -->
    <div class="modal fade" id="eventModal3" tabindex="-1" aria-labelledby="eventModal3Label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModal3Label">Annual Hackathon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/800x400?text=Hackathon+Image" class="img-fluid mb-3" alt="Event Image">
                    <p><strong>Date:</strong> November 15, 2025</p>
                    <p><strong>Time:</strong> 10:00 AM (24 hours)</p>
                    <p><strong>Location:</strong> GTI Innovation Lab</p>
                    <p><strong>Description:</strong> Our annual hackathon challenges teams to create innovative tech solutions in 24 hours. Themes include sustainable tech, AI for good, and IoT applications. Mentors from industry will guide participants. Prizes include cash, gadgets, and internship opportunities. Open to all students; form teams of 3-5.</p>
                    <p><strong>Registration:</strong> $10 per team. Includes meals and swag.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 4 -->
    <div class="modal fade" id="eventModal4" tabindex="-1" aria-labelledby="eventModal4Label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModal4Label">Tech Conference 2025</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/800x400?text=Conference+Image" class="img-fluid mb-3" alt="Event Image">
                    <p><strong>Date:</strong> December 10, 2025</p>
                    <p><strong>Time:</strong> 8:00 AM - 6:00 PM</p>
                    <p><strong>Location:</strong> GTI Conference Hall</p>
                    <p><strong>Description:</strong> This year's tech conference features keynote speeches on emerging technologies like blockchain, quantum computing, and 5G. Panel discussions on tech ethics and innovation. Networking sessions with alumni and industry partners. Attendees get certificates and access to recorded sessions.</p>
                    <p><strong>Registration:</strong> $15 for students; $50 for others.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 5 -->
    <div class="modal fade" id="eventModal5" tabindex="-1" aria-labelledby="eventModal5Label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModal5Label">Online Webinar: Cloud Computing</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/800x400?text=Webinar+Image" class="img-fluid mb-3" alt="Event Image">
                    <p><strong>Date:</strong> December 20, 2025</p>
                    <p><strong>Time:</strong> 3:00 PM - 5:00 PM</p>
                    <p><strong>Location:</strong> Online (Microsoft Teams)</p>
                    <p><strong>Description:</strong> Dive into cloud computing with this webinar covering AWS, Azure, and Google Cloud. Topics include cloud architecture, deployment models, and case studies. Interactive polls and Q&A. Perfect for those new to cloud tech or looking to certify.</p>
                    <p><strong>Registration:</strong> Free. Recording available post-event.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 6 -->
    <div class="modal fade" id="eventModal6" tabindex="-1" aria-labelledby="eventModal6Label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModal6Label">Career Fair</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/800x400?text=Career+Fair+Image" class="img-fluid mb-3" alt="Event Image">
                    <p><strong>Date:</strong> January 15, 2026</p>
                    <p><strong>Time:</strong> 10:00 AM - 4:00 PM</p>
                    <p><strong>Location:</strong> GTI Main Hall</p>
                    <p><strong>Description:</strong> Connect with over 50 companies at our career fair. Opportunities in tech, engineering, and more. Bring your resume for on-spot interviews. Workshops on resume building and interview skills included. Open to all years and alumni.</p>
                    <p><strong>Registration:</strong> Free entry. Pre-register for priority access.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer data-aos="fade-up" data-aos-duration="1000">
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

                <!-- Middle Column - Quick Links -->
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                    <h5 class="footer-section-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="../pages/about.html"><i class="bi bi-chevron-right"></i> About Us</a></li>
                        <li><a href="../pages/student_assignment.html"><i class="bi bi-chevron-right"></i> Assignments</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Departments</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Events</a></li>
                        <li><a href="../pages/student_assignment.html"><i class="bi bi-chevron-right"></i> Research</a></li>
                        <li><a href="../pages/student_assignment.html"><i class="bi bi-chevron-right"></i> Student Portal</a></li>
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
    @endsection