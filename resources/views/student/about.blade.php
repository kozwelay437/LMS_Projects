@extends('layouts.app')

@section('title', 'About | GTI Insein')

@section('content')


<!-- Internal Styles -->
<style>
:root {
    --primary-color: #1a3a6b;
    --secondary-color: #d4af37;
    --accent-color: #c41e3a;
    --light-bg: #f8f9fa;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    overflow-x: hidden;
}

/* Navbar Styles */
.navbar {
    background: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

.nav-link:hover,
.nav-link.active {
    color: var(--primary-color) !important;
}

/* Page Header */
.page-header {
    background: linear-gradient(135deg, var(--primary-color), #2c5aa0);
    color: white;
    padding: 80px 0 60px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1600') center/cover;
    opacity: 0.15;
}

.page-header h1 {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 15px;
    position: relative;
    z-index: 1;
}

.page-header p {
    font-size: 1.2rem;
    position: relative;
    z-index: 1;
    max-width: 800px;
    margin: 0 auto;
}

/* Breadcrumb */
.breadcrumb-section {
    background: white;
    padding: 15px 0;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

.breadcrumb {
    margin: 0;
    background: transparent;
}

.breadcrumb-item a {
    color: var(--primary-color);
    text-decoration: none;
}

/* Section Styles */
.section-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: var(--primary-color);
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 80px;
    height: 4px;
    background: var(--secondary-color);
}

.section-subtitle {
    color: #666;
    font-size: 1.1rem;
    line-height: 1.8;
    margin-bottom: 30px;
}

/* About Content Card */
.content-card {
    background: white;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
    height: 100%;
}

.content-card:hover {
    transform: translateY(-10px);
}

.content-card h3 {
    color: var(--primary-color);
    font-weight: bold;
    margin-bottom: 20px;
    font-size: 1.8rem;
}

.content-card p {
    color: #555;
    line-height: 1.8;
    margin-bottom: 15px;
}

/* Stats Section */
.stats-section {
    background: linear-gradient(135deg, var(--primary-color), #2c5aa0);
    color: white;
    padding: 60px 0;
}

.stat-box {
    text-align: center;
    padding: 20px;
}

.stat-box .stat-number {
    font-size: 3rem;
    font-weight: bold;
    color: var(--secondary-color);
    margin-bottom: 10px;
    display: block;
}

.stat-box .stat-label {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.9);
}

/* Vision Mission Cards */
.vision-mission-card {
    background: white;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    height: 100%;
    border-left: 5px solid var(--secondary-color);
    transition: all 0.3s;
}

.vision-mission-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
}

.vision-mission-card .icon {
    font-size: 3rem;
    color: var(--secondary-color);
    margin-bottom: 20px;
}

.vision-mission-card h3 {
    color: var(--primary-color);
    font-weight: bold;
    margin-bottom: 20px;
}

.vision-mission-card p {
    color: #555;
    line-height: 1.8;
}

/* Image Gallery */
.about-image {
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    width: 100%;
    height: auto;
    transition: transform 0.3s;
}

.about-image:hover {
    transform: scale(1.05);
}

/* Timeline */
.timeline-item {
    padding: 30px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    border-left: 4px solid var(--secondary-color);
    transition: all 0.3s;
}

.timeline-item:hover {
    transform: translateX(10px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.timeline-year {
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--primary-color);
    margin-bottom: 10px;
}

.timeline-content {
    color: #555;
    line-height: 1.7;
}

/* Footer */
footer {
    background: var(--primary-color);
    color: white;
    padding: 50px 0 20px;
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
    color: var(--secondary-color);
}

.footer-logo-text p {
    font-size: 0.9rem;
    margin: 0;
    color: rgba(255, 255, 255, 0.8);
}

.footer-section-title {
    color: var(--secondary-color);
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
    color: var(--secondary-color);
    padding-left: 5px;
}

.footer-contact-info p {
    margin-bottom: 10px;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.8;
}

.footer-contact-info i {
    color: var(--secondary-color);
    margin-right: 10px;
    width: 20px;
}

.map-container {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
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
    background: var(--secondary-color);
    transform: translateY(-3px);
}

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    margin-top: 30px;
    padding-top: 20px;
    text-align: center;
    color: rgba(255, 255, 255, 0.7);
}

/* Responsive */
@media (max-width: 768px) {
    .page-header h1 {
        font-size: 2rem;
    }

    .section-title {
        font-size: 1.8rem;
    }
}
</style>

<body>

  
  <!-- Page Header -->
  <section class="page-header" data-aos="fade-down">
    <div class="container">
      <h1>About GTI Insein</h1>
      <p>Building Myanmar's Future Through Technical Excellence and Innovation</p>
    </div>
  </section>

  <!-- Breadcrumb -->
  <section class="breadcrumb-section" data-aos="fade-in">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../pages/index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">About</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- About Introduction -->
  <section class="py-5 bg-white">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6" data-aos="fade-right">
          <img src="../img/sch1.jpg" alt="GTI Campus" class="about-image" />
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <h2 class="section-title">Welcome to GTI Insein</h2>
          <p class="section-subtitle">Government Technological Institute (Insein) is a premier vocational and technical
            training institute located in Yangon, Myanmar.</p>
          <p style="color: #555; line-height: 1.8;">The institute is committed to producing skilled engineers and
            technicians who will contribute to national development. We offer diploma-level programs in various
            engineering fields under the Ministry of Science and Technology, focusing on hands-on practical training
            that meets industry standards.</p>
          <p style="color: #555; line-height: 1.8;">Our commitment to excellence in technical education has made us one
            of the leading institutions in Myanmar, preparing graduates who are ready to meet the challenges of the
            modern engineering world.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="stats-section" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-6 mb-4">
          <div class="stat-box" data-aos="zoom-in" data-aos-delay="100">
            <span class="stat-number">6</span>
            <span class="stat-label">Engineering Departments</span>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="stat-box" data-aos="zoom-in" data-aos-delay="200">
            <span class="stat-number">2000+</span>
            <span class="stat-label">Students Enrolled</span>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="stat-box" data-aos="zoom-in" data-aos-delay="300">
            <span class="stat-number">100+</span>
            <span class="stat-label">Expert Faculty Members</span>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="stat-box" data-aos="zoom-in" data-aos-delay="400">
            <span class="stat-number">50+</span>
            <span class="stat-label">Years of Excellence</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- History Section -->
  <section class="py-5" style="background: var(--light-bg);">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-5" data-aos="fade-up">
          <h2 class="section-title">Our History</h2>
          <p class="section-subtitle">A Legacy of Technical Excellence</p>
        </div>
      </div>
      <div class="row align-items-center g-5">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="timeline-item">
            <div class="timeline-year">Foundation Era</div>
            <div class="timeline-content">
              GTI (Insein) was established as part of Myanmar's national effort to build skilled manpower in technical
              and engineering fields. The institute began with a vision to create competent professionals who could
              contribute to the nation's industrial development.
            </div>
          </div>
          <div class="timeline-item">
            <div class="timeline-year">Growth Period</div>
            <div class="timeline-content">
              Over the years, the institute evolved significantly, expanding its programs and facilities. It established
              strong partnerships with industries and upgraded its curriculum to align with international standards and
              modern technological advancements.
            </div>
          </div>
          <div class="timeline-item">
            <div class="timeline-year">Modern Era</div>
            <div class="timeline-content">
              Today, GTI Insein stands as a premier institution providing high-quality education through hands-on and
              practical training. It offers two-year diploma programs in Electrical, Civil, Mechanical, Information
              Technology, and other engineering disciplines.
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800" alt="Students Learning"
            class="about-image" />
        </div>
      </div>
    </div>
  </section>

  <!-- Vision & Mission -->
  <section class="py-5 bg-white">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12 text-center" data-aos="fade-up">
          <h2 class="section-title">Vision & Mission</h2>
          <p class="section-subtitle">Guiding Our Path to Excellence</p>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="vision-mission-card">
            <div class="icon">
              <i class="bi bi-eye"></i>
            </div>
            <h3>Our Vision</h3>
            <p>To become a leading technical institute that produces competent engineers and technicians equipped with
              practical skills, innovative thinking, and professional ethics, ready to contribute to national and
              international development in the field of technology and engineering.</p>
            <p>We aspire to be recognized as an institution that bridges the gap between academic knowledge and industry
              requirements, creating graduates who are industry-ready and capable of driving technological advancement.
            </p>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <div class="vision-mission-card">
            <div class="icon">
              <i class="bi bi-bullseye"></i>
            </div>
            <h3>Our Mission</h3>
            <p>To develop qualified graduates through quality technical education, fostering innovation, ethical
              professionalism, and social responsibility in the field of engineering and technology.</p>
            <p>We are committed to providing comprehensive hands-on training, modern facilities, and industry-relevant
              curriculum that prepares our students for successful careers while instilling values of continuous
              learning and professional excellence.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Values Section -->
  <section class="py-5" style="background: var(--light-bg);">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12 text-center" data-aos="fade-up">
          <h2 class="section-title">Our Core Values</h2>
          <p class="section-subtitle">The Principles That Guide Us</p>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="content-card text-center">
            <i class="bi bi-mortarboard"
              style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 20px;"></i>
            <h3>Excellence</h3>
            <p>We strive for excellence in all aspects of technical education, research, and service to our community.
            </p>
          </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="content-card text-center">
            <i class="bi bi-lightbulb" style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 20px;"></i>
            <h3>Innovation</h3>
            <p>We encourage creative thinking and innovative approaches to problem-solving in engineering and
              technology.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="content-card text-center">
            <i class="bi bi-shield-check"
              style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 20px;"></i>
            <h3>Integrity</h3>
            <p>We uphold the highest standards of honesty, ethics, and professional conduct in all our endeavors.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
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
  </body>
<script>
  document.addEventListener("DOMContentLoaded", function() {
      const faders = document.querySelectorAll(".fade-in, .zoom-in");
      const appearOptions = { threshold: 0.2 };
      const appearOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("show");
          observer.unobserve(entry.target);
        });
      }, appearOptions);
      faders.forEach(fader => appearOnScroll.observe(fader));
    });
      AOS.init({
      duration: 1000,
      offset: 100,
      once: true
    });

    // Smooth Scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener("click", function (e) {
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: "smooth" });
        }
      });
    });
@endsection
