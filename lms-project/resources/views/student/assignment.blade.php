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
      --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
      --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07);
      --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    body {
      font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto;
      background: var(--background);
      color: var(--text-primary);
      font-size: 15px;
    }

    /* Header Section */
    .page-header {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
      padding: 2rem 0;
      margin-bottom: 2rem;
      color: white;
    }

    .back-link {
      color: rgba(255, 255, 255, 0.9);
      text-decoration: none;
      font-weight: 500;
      transition: all 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .back-link:hover {
      color: white;
      transform: translateX(-3px);
    }

    /* Top Info Card */
    .assignment-header {
      background: var(--card-bg);
      border-radius: 16px;
      box-shadow: var(--shadow-lg);
      padding: 2rem;
      margin-bottom: 2rem;
      border: 1px solid var(--border-color);
    }

    .course-badge {
      display: inline-flex;
      align-items: center;
      padding: 0.5rem 1rem;
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      border-radius: 50px;
      font-weight: 600;
      font-size: 0.875rem;
      letter-spacing: 0.3px;
    }

    .assignment-title {
      font-size: 1.75rem;
      font-weight: 700;
      color: var(--text-primary);
      margin: 1rem 0 0.5rem;
    }

    .assignment-meta {
      color: var(--text-secondary);
      font-size: 0.9rem;
      display: flex;
      align-items: center;
      gap: 1.5rem;
      flex-wrap: wrap;
    }

    .meta-item {
      display: flex;
      align-items: center;
      gap: 0.4rem;
    }

    .status-badge {
      padding: 0.5rem 1.25rem;
      border-radius: 50px;
      font-weight: 600;
      font-size: 0.875rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    /* Main Content Card */
    .content-card {
      background: var(--card-bg);
      border-radius: 16px;
      box-shadow: var(--shadow-md);
      padding: 2.5rem;
      margin-bottom: 2rem;
      border: 1px solid var(--border-color);
    }

    /* Progress Section */
    .progress-section {
      background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
      border-radius: 12px;
      padding: 1.5rem;
      margin-bottom: 2rem;
      border: 1px solid #bae6fd;
    }

    .progress-custom {
      height: 12px;
      background: #e0f2fe;
      border-radius: 50px;
      overflow: hidden;
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .progress-bar-custom {
      height: 12px;
      background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
      transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      border-radius: 50px;
    }

    .progress-label {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 0.75rem;
      font-weight: 600;
      color: var(--text-primary);
    }

    /* Question Cards */
    .question-card {
      background: var(--card-bg);
      border: 2px solid var(--border-color);
      border-radius: 12px;
      padding: 1.75rem;
      margin-bottom: 1.5rem;
      transition: all 0.3s ease;
    }

    .question-card:hover {
      border-color: var(--primary-color);
      box-shadow: var(--shadow-md);
    }

    .question-number {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 32px;
      height: 32px;
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      border-radius: 50%;
      font-weight: 700;
      font-size: 0.875rem;
      margin-right: 0.75rem;
    }

    .form-label {
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 0.75rem;
      font-size: 0.95rem;
    }

    .form-label.required::after {
      content: " *";
      color: var(--danger-color);
    }

    .form-control,
    .form-select {
      border: 2px solid var(--border-color);
      border-radius: 8px;
      padding: 0.75rem 1rem;
      font-size: 0.95rem;
      transition: all 0.2s;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .form-check-input {
      width: 1.25rem;
      height: 1.25rem;
      border: 2px solid var(--border-color);
      margin-top: 0.15rem;
    }

    .form-check-input:checked {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .form-check-label {
      font-size: 0.95rem;
      color: var(--text-primary);
      margin-left: 0.5rem;
    }

    /* File Upload Zone */
    .dropzone {
      border: 3px dashed var(--border-color);
      background: #fafbfc;
      border-radius: 12px;
      padding: 2.5rem 2rem;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .dropzone:hover {
      border-color: var(--primary-color);
      background: #f8f9ff;
    }

    .dropzone.dragover {
      border-color: var(--primary-color);
      background: #f0f4ff;
      box-shadow: 0 0 20px rgba(79, 70, 229, 0.15);
    }

    .dropzone-icon {
      font-size: 3rem;
      color: var(--primary-color);
      margin-bottom: 1rem;
    }

    .file-preview {
      margin-top: 1rem;
      padding: 1rem;
      background: var(--card-bg);
      border-radius: 8px;
      border: 1px solid var(--border-color);
      display: inline-block;
      font-size: 0.9rem;
      color: var(--text-primary);
    }

    /* Action Buttons */
    .submit-actions {
      display: flex;
      gap: 1rem;
      align-items: center;
      justify-content: flex-end;
      flex-wrap: wrap;
      margin-top: 2rem;
      padding-top: 2rem;
      border-top: 2px solid var(--border-color);
    }

    .btn {
      font-weight: 600;
      padding: 0.75rem 1.5rem;
      border-radius: 8px;
      transition: all 0.2s;
      text-transform: none;
      font-size: 0.95rem;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      border: none;
      box-shadow: var(--shadow-sm);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .btn-outline-secondary {
      border: 2px solid var(--border-color);
      color: var(--text-secondary);
    }

    .btn-outline-secondary:hover {
      background: var(--text-secondary);
      border-color: var(--text-secondary);
      color: white;
    }

    .btn-lg {
      padding: 0.875rem 2rem;
      font-size: 1rem;
    }

    /* Comments Section */
    .comments-section {
      margin-top: 3rem;
    }

    .section-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .comment-card {
      background: var(--card-bg);
      border: 1px solid var(--border-color);
      border-radius: 12px;
      padding: 1.25rem;
      margin-bottom: 1rem;
      transition: all 0.2s;
    }

    .comment-card:hover {
      box-shadow: var(--shadow-sm);
    }

    .comment-avatar {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: white;
      font-size: 1.1rem;
      flex-shrink: 0;
    }

    .comment-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 0.5rem;
    }

    .comment-author {
      font-weight: 600;
      color: var(--text-primary);
    }

    .comment-date {
      font-size: 0.85rem;
      color: var(--text-secondary);
    }

    .comment-text {
      color: var(--text-secondary);
      line-height: 1.6;
    }

    .comment-form {
      background: #fafbfc;
      border: 2px solid var(--border-color);
      border-radius: 12px;
      padding: 1.5rem;
      margin-top: 1.5rem;
    }

    /* Alerts */
    .alert {
      border-radius: 8px;
      border: none;
      padding: 1rem 1.25rem;
      font-size: 0.95rem;
    }

    .alert-info {
      background: #e0f2fe;
      color: #075985;
    }

    .alert-success {
      background: #d1fae5;
      color: #065f46;
    }

    .alert-danger {
      background: #fee2e2;
      color: #991b1b;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .assignment-header {
        padding: 1.5rem;
      }

      .content-card {
        padding: 1.5rem;
      }

      .assignment-title {
        font-size: 1.5rem;
      }

      .submit-actions {
        flex-direction: column;
        align-items: stretch;
      }

      .btn {
        width: 100%;
      }
    }
</style>
<div class="page-header">
    <div class="container">
      <a href="student_assignment.html" class="back-link">
        <i class="bi bi-arrow-left"></i> Back to assignments
      </a>
    </div>
  </div>

  <div class="container pb-5">
    <!-- Assignment Header Card -->
    <div class="assignment-header">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <div class="course-badge">
            <i class="bi bi-journal-code me-2"></i>
            <span id="courseName">CS 301</span>
          </div>
          <h1 class="assignment-title" id="assignmentTitle">Loading assignment…</h1>
          <div class="assignment-meta">
            <div class="meta-item">
              <i class="bi bi-person-circle"></i>
              <span id="teacherName">by —</span>
            </div>
            <div class="meta-item">
              <i class="bi bi-calendar-event"></i>
              <span id="dueDate">due —</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
          <div class="mb-2 text-secondary small fw-semibold">STATUS</div>
          <span id="statusPill" class="status-badge badge bg-warning text-dark">Pending</span>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="content-card">
      <div id="loadingBlock" class="text-center py-5 text-muted">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="mt-3">Loading assignment content…</div>
      </div>

      <div id="assignmentRoot" style="display:none;">
        <!-- Description -->
        <div class="mb-4">
          <p class="text-secondary mb-0" id="assignmentDescription"></p>
        </div>

        <!-- Progress Section -->
        <div class="progress-section">
          <div class="progress-label">
            <span><i class="bi bi-clipboard-check me-2"></i>Completion Progress</span>
            <span id="completionPct" class="badge bg-primary">0%</span>
          </div>
          <div class="progress-custom">
            <div id="progressBar" class="progress-bar-custom"></div>
          </div>
          <div class="mt-2 small text-secondary">
            <i class="bi bi-info-circle me-1"></i>
            Complete all required questions to submit
          </div>
        </div>

        <!-- Questions Form -->
        <form id="assignmentForm" novalidate>
          <div id="questionsArea"></div>

          <!-- Action Buttons -->
          <div class="submit-actions">
            <button type="button" id="clearAnswers" class="btn btn-link text-secondary">
              <i class="bi bi-x-circle me-1"></i> Clear Answers
            </button>
            <button type="button" id="saveDraft" class="btn btn-outline-secondary">
              <i class="bi bi-save me-2"></i> Save Draft
            </button>
            <button type="submit" id="submitBtn" class="btn btn-primary btn-lg">
              <i class="bi bi-check-circle me-2"></i> Submit Assignment
            </button>
          </div>

          <div id="submitMsg" class="mt-3" aria-live="polite"></div>
        </form>
      </div>
    </div>

    <!-- Comments Section -->
    <div class="content-card comments-section" id="commentsSection" style="display:none;">
      <h5 class="section-title">
        <i class="bi bi-chat-dots"></i>
        Comments & Discussion
      </h5>

      <div id="commentsList"></div>

      <div class="comment-form">
        <form id="commentForm" class="row g-3">
          <div class="col-md-4">
            <input id="commentAuthor" class="form-control" placeholder="Your name" required>
          </div>
          <div class="col-md-6">
            <input id="commentText" class="form-control" placeholder="Write a comment..." required>
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary w-100" type="submit">
              <i class="bi bi-send me-1"></i> Add
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    const MOCK = {
    id: "cs301-final",
    title: "Data Structures — Final Project",
    course: "CS 301",
    teacher: "Dr. A. Instructor",
    dueDate: "2025-11-10T23:59:00Z",
    description: "Implement a binary search tree with insert/delete/search operations and comprehensive unit tests. Upload your complete project as a ZIP file.",
    questions: [
      { id:'q1', type:'short_answer', prompt:'Explain how you ensure your BST remains balanced (200–400 words).', required:true },
      { id:'q2', type:'multiple_choice', prompt:'Which traversal yields sorted output for a BST?', required:true, options:['Pre-order','In-order','Post-order','Level-order'] },
      { id:'q3', type:'file_upload', prompt:'Upload a ZIP with your project (.zip)', required:true, meta:{ accept: '.zip', maxMB: 50 } }
    ],
    comments: [
      { author: 'Dr. A. Instructor', text: 'Include unit tests covering edge cases (empty tree, duplicates).', date: '2025-10-01T08:00:00Z' }
    ]
  };

  const $ = id => document.getElementById(id);
  const escapeHtml = s => s ? String(s).replaceAll('&','&amp;').replaceAll('<','&lt;').replaceAll('>','&gt;') : '';
  const fmtDate = iso => new Date(iso).toLocaleString();

  async function fetchAssignment(slug) {
    return new Promise(resolve => setTimeout(()=>resolve(MOCK), 500));
  }

  async function init() {
    const slug = new URLSearchParams(window.location.search).get('id') || MOCK.id;
    const ass = await fetchAssignment(slug);

    $('courseName').textContent = ass.course;
    $('assignmentTitle').textContent = ass.title;
    $('teacherName').textContent = `by ${ass.teacher}`;
    $('dueDate').textContent = `due ${fmtDate(ass.dueDate)}`;
    $('assignmentDescription').textContent = ass.description;

    $('loadingBlock').style.display = 'none';
    $('assignmentRoot').style.display = 'block';
    $('commentsSection').style.display = 'block';

    const qarea = $('questionsArea');
    ass.questions.forEach((q, idx) => {
      const el = document.createElement('div');
      el.className = 'question-card';
      el.dataset.qid = q.id;

      if (q.type === 'short_answer') {
        el.innerHTML = `
          <div class="d-flex align-items-start mb-3">
            <span class="question-number">${idx + 1}</span>
            <label class="form-label ${q.required ? 'required' : ''}">${escapeHtml(q.prompt)}</label>
          </div>
          <textarea id="${q.id}" class="form-control" rows="5" ${q.required? 'required':''}></textarea>
        `;
      } else if (q.type === 'multiple_choice') {
        const options = (q.options || []).map((opt,i)=>`
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="${q.id}" id="${q.id}_opt${i}" value="${escapeHtml(opt)}" ${q.required? 'required':''}>
            <label class="form-check-label" for="${q.id}_opt${i}">${escapeHtml(opt)}</label>
          </div>
        `).join('');
        el.innerHTML = `
          <div class="d-flex align-items-start mb-3">
            <span class="question-number">${idx + 1}</span>
            <fieldset class="w-100">
              <legend class="form-label ${q.required? 'required':''}">${escapeHtml(q.prompt)}</legend>
              ${options}
            </fieldset>
          </div>
        `;
      } else if (q.type === 'file_upload') {
        const accept = q.meta && q.meta.accept ? `accept="${q.meta.accept}"` : '';
        el.innerHTML = `
          <div class="d-flex align-items-start mb-3">
            <span class="question-number">${idx + 1}</span>
            <label class="form-label ${q.required? 'required':''}">${escapeHtml(q.prompt)}</label>
          </div>
          <div id="${q.id}_drop" class="dropzone" tabindex="0">
            <i class="bi bi-cloud-arrow-up dropzone-icon"></i>
            <div class="fw-semibold mb-1">Drag & drop your file here</div>
            <div class="text-secondary small">or click to browse</div>
            <div id="${q.id}_preview" class="file-preview" style="display:none;"></div>
            <input id="${q.id}" type="file" ${accept} style="display:none" ${q.required? 'required':''}>
          </div>
        `;
      }

      qarea.appendChild(el);
    });

    // File upload handlers
    ass.questions.filter(q=>q.type==='file_upload').forEach(q => {
      const dz = $(`${q.id}_drop`);
      const input = $(`${q.id}`);
      const preview = $(`${q.id}_preview`);

      function updatePreview() {
        if (!input.files || !input.files.length) {
          preview.style.display = 'none';
          return;
        }
        const f = input.files[0];
        preview.innerHTML = `<i class="bi bi-file-earmark-zip me-2"></i>${f.name} · ${Math.round(f.size/1024)} KB`;
        preview.style.display = 'inline-block';
      }

      dz.addEventListener('click', ()=> input.click());
      dz.addEventListener('keydown', e => { if (e.key==='Enter' || e.key===' ') { e.preventDefault(); input.click(); } });

      dz.addEventListener('dragover', e => { e.preventDefault(); dz.classList.add('dragover'); });
      dz.addEventListener('dragleave', () => { dz.classList.remove('dragover'); });
      dz.addEventListener('drop', e => {
        e.preventDefault(); 
        dz.classList.remove('dragover');
        const file = e.dataTransfer.files && e.dataTransfer.files[0];
        if (file) input.files = e.dataTransfer.files;
        updatePreview();
        updateProgress();
      });

      input.addEventListener('change', () => { updatePreview(); updateProgress(); });
    });

    // Comments
    let comments = ass.comments || [];
    function renderComments() {
      const node = $('commentsList');
      node.innerHTML = '';
      if (!comments.length) {
        node.innerHTML = '<div class="text-center py-4 text-secondary"><i class="bi bi-chat-text me-2"></i>No comments yet.</div>';
        return;
      }
      comments.slice().reverse().forEach(c => {
        const d = document.createElement('div');
        d.className = 'comment-card';
        d.innerHTML = `
          <div class="d-flex gap-3">
            <div class="comment-avatar">${escapeHtml(c.author[0]||'U')}</div>
            <div class="flex-grow-1">
              <div class="comment-header">
                <span class="comment-author">${escapeHtml(c.author)}</span>
                <span class="comment-date">${fmtDate(c.date)}</span>
              </div>
              <div class="comment-text">${escapeHtml(c.text)}</div>
            </div>
          </div>
        `;
        node.appendChild(d);
      });
    }
    renderComments();

    // Progress tracking
    function updateProgress() {
      const required = ass.questions.filter(q => q.required);
      let answered = 0;
      
      required.forEach(q => {
        if (q.type === 'short_answer') {
          if ($(`${q.id}`).value.trim()) answered++;
        } else if (q.type === 'multiple_choice') {
          if (document.querySelector(`input[name="${q.id}"]:checked`)) answered++;
        } else if (q.type === 'file_upload') {
          const input = $(`${q.id}`);
          if (input.files && input.files.length) answered++;
        }
      });
      
      const pct = required.length === 0 ? 100 : Math.round((answered / required.length) * 100);
      $('completionPct').textContent = pct + '%';
      $('progressBar').style.width = pct + '%';
    }

    $('assignmentForm').addEventListener('input', updateProgress);
    updateProgress();

    // Save draft
    $('saveDraft').addEventListener('click', () => {
      const data = {};
      ass.questions.forEach(q => {
        if (q.type === 'short_answer') data[q.id] = $(`${q.id}`).value;
        if (q.type === 'multiple_choice') {
          const sel = document.querySelector(`input[name="${q.id}"]:checked`);
          data[q.id] = sel ? sel.value : null;
        }
        if (q.type === 'file_upload') {
          const input = $(`${q.id}`);
          data[q.id] = input.files && input.files[0] ? input.files[0].name : null;
        }
      });
      localStorage.setItem('draft_' + ass.id, JSON.stringify(data));
      $('submitMsg').innerHTML = '<div class="alert alert-info"><i class="bi bi-check-circle me-2"></i>Draft saved locally.</div>';
    });

    // Clear answers
    $('clearAnswers').addEventListener('click', ()=> {
      if (!confirm('Clear all answers?')) return;
      $('assignmentForm').reset();
      ass.questions.forEach(q => { 
        if (q.type === 'file_upload') {
          $(`${q.id}_preview`).style.display = 'none';
          $(`${q.id}_preview`).innerHTML = '';
        }
      });
      updateProgress();
    });

    // Submit
    $('assignmentForm').addEventListener('submit', async e => {
      e.preventDefault();
      $('submitMsg').innerHTML = '';
      
      for (const q of ass.questions.filter(q => q.required)) {
        if (q.type === 'short_answer' && !$(`${q.id}`).value.trim()) {
          $('submitMsg').innerHTML = '<div class="alert alert-danger"><i class="bi bi-exclamation-circle me-2"></i>Please complete all required questions.</div>';
          return;
        }
        if (q.type === 'multiple_choice' && !document.querySelector(`input[name="${q.id}"]:checked`)) {
          $('submitMsg').innerHTML = '<div class="alert alert-danger"><i class="bi bi-exclamation-circle me-2"></i>Please complete all required questions.</div>';
          return;
        }
        if (q.type === 'file_upload') {
          const input = $(`${q.id}`);
          if (!input.files || !input.files[0]) {
            $('submitMsg').innerHTML = '<div class="alert alert-danger"><i class="bi bi-exclamation-circle me-2"></i>Please upload all required files.</div>';
            return;
          }
        }
      }

      $('submitBtn').setAttribute('disabled','disabled');
      let simulated = 0;
      $('submitMsg').innerHTML = '<div class="alert alert-info"><i class="bi bi-hourglass-split me-2"></i>Submitting... <span id="simPct">0%</span></div>';
      
      const simInterval = setInterval(()=> {
        simulated += Math.floor(Math.random()*15)+10;
        if (simulated >= 100) simulated = 100;
        $('simPct').textContent = simulated + '%';
        
        if (simulated === 100) {
          clearInterval(simInterval);
          setTimeout(()=> {
            $('submitMsg').innerHTML = '<div class="alert alert-success"><i class="bi bi-check-circle-fill me-2"></i>Assignment submitted successfully! (Design demo - replace with real API)</div>';
            $('statusPill').textContent = 'Submitted';
            $('statusPill').className = 'status-badge badge bg-success';
            $('submitBtn').removeAttribute('disabled');
          }, 400);
        }
      }, 300);
    });

    // Comments form
    $('commentForm').addEventListener('submit', e => {
      e.preventDefault();
      const author = $('commentAuthor').value.trim();
      const text = $('commentText').value.trim();
      if (!author || !text) return alert('Please provide both name and comment.');
      comments.push({ author, text, date: new Date().toISOString() });
      renderComments();
      $('commentForm').reset();
    });

    // Restore draft
    const draftRaw = localStorage.getItem('draft_' + ass.id);
    if (draftRaw) {
      try {
        const draft = JSON.parse(draftRaw);
        ass.questions.forEach(q => {
          if (q.type === 'short_answer' && draft[q.id]) {
            $(`${q.id}`).value = draft[q.id];
          }
          if (q.type === 'multiple_choice' && draft[q.id]) {
            const input = document.querySelector(`input[name="${q.id}"][value="${draft[q.id]}"]`);
            if (input) input.checked = true;
          }
          if (q.type === 'file_upload' && draft[q.id]) {
            const preview = $(`${q.id}_preview`);
            preview.innerHTML = `<i class="bi bi-file-earmark me-2"></i>${draft[q.id]} (restored filename only)`;
            preview.style.display = 'inline-block';
          }
        });
        updateProgress();
        $('submitMsg').innerHTML = '<div class="alert alert-info"><i class="bi bi-info-circle me-2"></i>Draft restored from local storage.</div>';
        setTimeout(() => $('submitMsg').innerHTML = '', 5000);
      } catch (err) {}
    }
  }

  init();
  </script>
  @endsection