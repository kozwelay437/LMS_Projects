@extends('layouts.app')

@section('title', 'AssignCalendar | GTI Insein')

@section('content')
<style>
    
    :root {
      --primary-color: #4f46e5;
      --primary-hover: #4338ca;
      --secondary-color: #8b5cf6;
      --success-color: #10b981;
      --warning-color: #f59e0b;
      --danger-color: #ef4444;
      --background: #f8fafc;
      --card-bg: #ffffff;
      --border-color: #e2e8f0;
      --text-primary: #1e293b;
      --text-secondary: #64748b;
      --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
      --shadow-md: 0 4px 6px rgba(0,0,0,0.07);
      --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
    }

    body { 
      font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto; 
      background: var(--background);
      color: var(--text-primary);
      font-size: 15px;
    }

    .section-padding { padding: 60px 0; }

    /* Calendar Table Styles */
    .calendar-table-wrapper {
      background: var(--card-bg);
      border-radius: 16px;
      box-shadow: var(--shadow-md);
      padding: 2rem;
      margin-bottom: 2rem;
      border: 1px solid var(--border-color);
    }

    .calendar-controls {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .current-month {
      font-size: 1.75rem;
      font-weight: 700;
      color: var(--text-primary);
    }

    .calendar-table { 
      width: 100%;
      border-collapse: separate;
      border-spacing: 0.5rem;
    }

    .calendar-table th { 
      text-align: center;
      font-weight: 700;
      color: var(--text-secondary);
      padding: 1rem 0;
      font-size: 0.875rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      background: none;
      border: none;
    }

    .calendar-table td { 
      text-align: center;
      height: 100px;
      border: 2px solid var(--border-color);
      border-radius: 12px;
      position: relative;
      background: var(--card-bg);
      transition: all 0.2s;
      cursor: pointer;
      vertical-align: top;
      padding: 0.75rem 0.5rem;
    }

    .calendar-table td:hover {
      border-color: var(--primary-color);
      box-shadow: var(--shadow-sm);
      transform: translateY(-2px);
    }

    .calendar-table .today { 
      border-color: var(--primary-color);
      background: linear-gradient(135deg, rgba(79, 70, 229, 0.05), rgba(139, 92, 246, 0.05));
    }

    .calendar-table .has-assignment .badge { 
      position: absolute;
      top: 8px;
      right: 8px;
      min-width: 20px;
      height: 20px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.7rem;
      font-weight: 700;
      background: linear-gradient(135deg, var(--danger-color), #f87171);
    }

    .calendar-table .date { 
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--text-primary);
      display: block;
    }

    .calendar-table .today .date {
      color: var(--primary-color);
    }

    .assignment-indicators {
      display: flex;
      flex-direction: column;
      gap: 3px;
      margin-top: 0.5rem;
    }

    .assignment-dot {
      width: 100%;
      height: 4px;
      border-radius: 2px;
      background: linear-gradient(90deg, var(--danger-color), #f87171);
    }

    /* Assignments Sidebar */
    .assignments-sidebar {
      background: var(--card-bg);
      border-radius: 16px;
      box-shadow: var(--shadow-md);
      padding: 1.5rem;
      border: 1px solid var(--border-color);
      height: fit-content;
      position: sticky;
      top: 2rem;
    }

    .sidebar-title {
      font-size: 1.25rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .assignment-item {
      border: 1px solid var(--border-color);
      border-radius: 10px;
      padding: 1rem;
      margin-bottom: 0.75rem;
      cursor: pointer;
      transition: all 0.2s;
    }

    .assignment-item:hover {
      box-shadow: var(--shadow-sm);
      border-color: var(--primary-color);
      transform: translateX(3px);
    }

    .assignment-course {
      font-size: 0.75rem;
      font-weight: 700;
      color: var(--primary-color);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 0.25rem;
    }

    .assignment-title {
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
      font-size: 0.95rem;
    }

    .assignment-meta {
      display: flex;
      align-items: center;
      gap: 1rem;
      font-size: 0.8rem;
      color: var(--text-secondary);
    }

    .meta-item {
      display: flex;
      align-items: center;
      gap: 0.25rem;
    }

    .status-tag {
      padding: 0.25rem 0.75rem;
      border-radius: 50px;
      font-size: 0.7rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }

    .status-tag.pending {
      background: #fef3c7;
      color: #92400e;
    }

    .status-tag.submitted {
      background: #d1fae5;
      color: #065f46;
    }

    .status-tag.overdue {
      background: #fee2e2;
      color: #991b1b;
    }

    /* Modal Styles */
    .modal-content {
      border-radius: 16px;
      border: none;
      box-shadow: var(--shadow-lg);
    }

    .modal-header {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      border-radius: 16px 16px 0 0;
      padding: 1.5rem;
    }

    .modal-title {
      font-weight: 700;
    }

    .btn-close {
      filter: brightness(0) invert(1);
    }

    .modal-body {
      padding: 1.5rem;
    }

    .assignment-detail {
      border: 1px solid var(--border-color);
      border-radius: 10px;
      padding: 1rem;
      margin-bottom: 1rem;
    }

    /* Responsive */
    @media (max-width: 992px) {
      .assignments-sidebar {
        position: static;
        margin-top: 2rem;
      }
    }

    @media (max-width: 768px) {
      .calendar-table td {
        height: 80px;
        padding: 0.5rem 0.25rem;
      }

      .calendar-table .date {
        font-size: 0.95rem;
      }

      .assignment-dot {
        height: 3px;
      }
      
    }
</style>

<!-- Calendar Section -->
  <section class="section-padding">
    <div class="container">
      <div class="row">
        <!-- Main Calendar -->
        <div class="col-lg-8">
          <div class="calendar-table-wrapper" data-aos="fade-up">
            <div class="calendar-controls">
              <h2 class="current-month" id="currentMonth">October 2025</h2>
              <div class="nav-buttons">
                <button class="nav-btn" id="prevMonth">
                  <i class="bi bi-chevron-left"></i> Previous
                </button>
                <button class="nav-btn" id="nextMonth">
                  Next <i class="bi bi-chevron-right"></i>
                </button>
              </div>
            </div>

            <table class="calendar-table">
              <thead>
                <tr>
                  <th>Sun</th>
                  <th>Mon</th>
                  <th>Tue</th>
                  <th>Wed</th>
                  <th>Thu</th>
                  <th>Fri</th>
                  <th>Sat</th>
                </tr>
              </thead>
              <tbody id="calendarBody">
                <!-- Calendar days will be generated by JavaScript -->
              </tbody>
            </table>
          </div>
        </div>

        <!-- Assignments Sidebar -->
        <div class="col-lg-4">
          <div class="assignments-sidebar" data-aos="fade-left">
            <div class="sidebar-title">
              <i class="bi bi-list-task"></i>
              Selected Date Assignments
            </div>
            <div id="assignmentsList">
              <div class="text-center text-secondary py-3">
                <i class="bi bi-calendar-x" style="font-size: 2rem;"></i>
                <p class="mt-2 mb-0">Click on a date to view assignments</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Assignment Detail Modal -->
  <div class="modal fade" id="assignmentModal" tabindex="-1" aria-labelledby="assignmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="assignmentModalLabel">Assignment Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalBody">
          <!-- Content will be populated by JS -->
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
   <footer data-aos="fade-in">
      <div class="container">
        <div class="row">
          <!-- Left Column -->
          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-left">
            <div class="footer-logo-section">
              <img src="../photo/gti.jpg" alt="GTI Logo" />
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
              <li><a href="#"><i class="bi bi-chevron-right"></i> Calendar</a></li>
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
   
    <script>
          AOS.init({
    duration: 1000,
    once: true,
    easing: 'ease-in-out'
  });

  // Mock assignment data
  const ASSIGNMENTS = [
    {
      id: 1,
      title: "Write a simple Python program to calculate factorial",
      course: "CS 101",
      teacher: "Dr. Jane Smith",
      dueDate: "2025-10-12",
      status: "pending",
      description: "Submit via online portal by 11:59 PM. Include comments in code. Late submissions penalized by 10% per day."
    },
    {
      id: 2,
      title: "Solve integration problems set #3",
      course: "MATH 201",
      teacher: "Prof. Michael Johnson",
      dueDate: "2025-10-18",
      status: "pending",
      description: "Handwritten solutions to be submitted in class. Show all steps for full credit."
    },
    {
      id: 3,
      title: "Write a 2-page report on a tech topic",
      course: "ENG 101",
      teacher: "Dr. Emily Chen",
      dueDate: "2025-10-21",
      status: "pending",
      description: "Use APA format. Submit digitally via email. Focus on clarity and structure."
    },
    {
      id: 4,
      title: "Lab report on motion experiments",
      course: "PHYS 101",
      teacher: "Prof. Alex Lee",
      dueDate: "2025-10-30",
      status: "pending",
      description: "Include data tables and graphs. Group submission allowed."
    },
    {
      id: 5,
      title: "Database Design Assignment",
      course: "CS 401",
      teacher: "Prof. B. Teacher",
      dueDate: "2025-10-22",
      status: "pending",
      description: "Design a normalized database schema for an e-commerce application."
    }
  ];

  const $ = id => document.getElementById(id);
  let currentDate = new Date();
  let selectedDate = null;

  function formatDate(dateStr) {
    const date = new Date(dateStr);
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
  }

  function getAssignmentsForDate(dateStr) {
    return ASSIGNMENTS.filter(a => a.dueDate === dateStr);
  }

  function renderCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    
    $('currentMonth').textContent = new Date(year, month).toLocaleDateString('en-US', { 
      month: 'long', 
      year: 'numeric' 
    });

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const daysInPrevMonth = new Date(year, month, 0).getDate();

    const today = new Date();
    const isCurrentMonth = today.getFullYear() === year && today.getMonth() === month;
    const todayDate = today.getDate();

    const tbody = $('calendarBody');
    tbody.innerHTML = '';

    let dayCounter = 1;
    let nextMonthCounter = 1;

    for (let week = 0; week < 6; week++) {
      const row = document.createElement('tr');
      row.setAttribute('data-aos', 'fade-up');
      row.setAttribute('data-aos-delay', (week * 100).toString());

      for (let day = 0; day < 7; day++) {
        const cell = document.createElement('td');
        const totalDays = week * 7 + day;

        if (totalDays < firstDay) {
          // Previous month days
          const prevDay = daysInPrevMonth - firstDay + totalDays + 1;
          cell.innerHTML = `<span class="date text-muted">${prevDay}</span>`;
          cell.style.opacity = '0.3';
        } else if (dayCounter <= daysInMonth) {
          // Current month days
          const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(dayCounter).padStart(2, '0')}`;
          const assignments = getAssignmentsForDate(dateStr);
          const isToday = isCurrentMonth && dayCounter === todayDate;

          if (isToday) cell.classList.add('today');
          if (assignments.length > 0) cell.classList.add('has-assignment');

          let content = `<span class="date">${dayCounter}</span>`;
          
          if (assignments.length > 0) {
            content += `<span class="badge bg-danger">${assignments.length}</span>`;
            content += `<div class="assignment-indicators">`;
            assignments.slice(0, 3).forEach(() => {
              content += `<div class="assignment-dot"></div>`;
            });
            content += `</div>`;
          }

          cell.innerHTML = content;
          cell.addEventListener('click', () => {
            selectedDate = dateStr;
            renderAssignmentsList(assignments, dateStr);
          });

          dayCounter++;
        } else {
          // Next month days
          cell.innerHTML = `<span class="date text-muted">${nextMonthCounter}</span>`;
          cell.style.opacity = '0.3';
          nextMonthCounter++;
        }

        row.appendChild(cell);
      }

      tbody.appendChild(row);
      
      if (dayCounter > daysInMonth && nextMonthCounter > 7) break;
    }
  }

  function renderAssignmentsList(assignments, dateStr) {
    const container = $('assignmentsList');
    
    if (assignments.length === 0) {
      container.innerHTML = `
        <div class="text-center text-secondary py-3">
          <i class="bi bi-calendar-x" style="font-size: 2rem;"></i>
          <p class="mt-2 mb-0">No assignments for ${formatDate(dateStr)}</p>
        </div>
      `;
      return;
    }

    container.innerHTML = `<div class="mb-3 fw-semibold text-secondary small">${formatDate(dateStr)}</div>`;
    
    assignments.forEach(assignment => {
      const item = document.createElement('div');
      item.className = 'assignment-item';
      item.innerHTML = `
        <div class="assignment-course">${assignment.course}</div>
        <div class="assignment-title">${assignment.title}</div>
        <div class="assignment-meta">
          <div class="meta-item">
            <i class="bi bi-person"></i>
            <span>${assignment.teacher}</span>
          </div>
          <span class="status-tag ${assignment.status}">${assignment.status}</span>
        </div>
      `;
      item.addEventListener('click', () => showAssignmentModal(assignment));
      container.appendChild(item);
    });
  }

  function showAssignmentModal(assignment) {
    const modal = new bootstrap.Modal($('assignmentModal'));
    $('assignmentModalLabel').textContent = assignment.title;
    
    const statusClass = assignment.status === 'submitted' ? 'success' : 
                       assignment.status === 'overdue' ? 'danger' : 'warning';
    
    $('modalBody').innerHTML = `
      <div class="assignment-detail">
        <div class="row mb-3">
          <div class="col-md-6">
            <strong class="text-secondary">Course:</strong>
            <div class="mt-1">${assignment.course}</div>
          </div>
          <div class="col-md-6">
            <strong class="text-secondary">Teacher:</strong>
            <div class="mt-1">${assignment.teacher}</div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <strong class="text-secondary">Due Date:</strong>
            <div class="mt-1"><i class="bi bi-calendar me-2"></i>${formatDate(assignment.dueDate)}</div>
          </div>
          <div class="col-md-6">
            <strong class="text-secondary">Status:</strong>
            <div class="mt-1"><span class="badge bg-${statusClass} text-uppercase">${assignment.status}</span></div>
          </div>
        </div>
        <div class="mb-3">
          <strong class="text-secondary">Description:</strong>
          <div class="mt-2">${assignment.description}</div>
        </div>
      </div>
      <div class="d-flex gap-2 justify-content-end">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="assignment_page.html?id=${assignment.id}" class="btn btn-primary">
          <i class="bi bi-box-arrow-up-right me-2"></i>View Assignment
        </a>
      </div>
    `;
    
    modal.show();
  }

  $('prevMonth').addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar();
  });

  $('nextMonth').addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar();
  });

  renderCalendar();
    </script>
    @endsection