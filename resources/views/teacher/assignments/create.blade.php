@extends('teacher.dashboard')

@section('title', 'Create Assignment')
@section('page-title', 'Create New Assignment')

@section('content')
<div class="card shadow-sm">
  <div class="card-body">
    {{-- Validation errors --}}
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
    @endif

    {{-- Assignment Form --}}
    <form action="{{ route('teacher.assignments.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      {{-- Assignment Title --}}
      <div class="mb-3">
        <label>Title</label>
        <input type="text" name="assignment_title" class="form-control" required>
      </div>

      {{-- Description --}}
      <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
      </div>

      {{-- Document --}}
      <div class="mb-3">
        <label>Document </label>
        <input type="file" name="document" class="form-control">
      </div>

      {{-- Upload and Due Dates --}}
      <div class="mb-3">
        <label>Upload Date</label>
        <input type="date" name="upload_date" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Due Date</label>
        <input type="date" name="due_date" class="form-control" required>
      </div>

      <hr>

      {{-- Questions Section --}}
      <div id="questions-section">
        <h5>Questions</h5>
      </div>

      <button type="button" id="add-text-question" class="btn btn-outline-primary mt-2">Add Text Question</button>
      <button type="button" id="add-mcq-question" class="btn btn-outline-secondary mt-2">Add Multiple Choice</button>

      <hr>

      <button type="submit" class="btn btn-success">Save Assignment</button>
    </form>
  </div>
</div>

{{-- Dynamic Questions JavaScript --}}
<script>
let questionCount = 0;

function createTextQuestion() {
  return `
    <div class="card mt-3 p-3">
      <h6>Text Question</h6>
      <input type="text" name="questions[${questionCount}][question]" class="form-control mb-2" placeholder="Enter question" required>
      <input type="hidden" name="questions[${questionCount}][type]" value="text">
    </div>
  `;
}

function createMCQQuestion() {
  return `
    <div class="card mt-3 p-3">
      <h6>Multiple Choice Question</h6>
      <input type="text" name="questions[${questionCount}][question]" class="form-control mb-2" placeholder="Enter question" required>
      <input type="hidden" name="questions[${questionCount}][type]" value="mcq">
      <label>Options:</label>
      <input type="text" name="questions[${questionCount}][options][]" class="form-control mb-1" placeholder="Option 1">
      <input type="text" name="questions[${questionCount}][options][]" class="form-control mb-1" placeholder="Option 2">
      <input type="text" name="questions[${questionCount}][options][]" class="form-control mb-1" placeholder="Option 3">
      <input type="text" name="questions[${questionCount}][options][]" class="form-control mb-1" placeholder="Option 4">
      <input type="text" name="questions[${questionCount}][correct]" class="form-control" placeholder="Correct answer">
    </div>
  `;
}

document.getElementById('add-text-question').addEventListener('click', () => {
  const section = document.getElementById('questions-section');
  section.insertAdjacentHTML('beforeend', createTextQuestion());
  questionCount++;
});

document.getElementById('add-mcq-question').addEventListener('click', () => {
  const section = document.getElementById('questions-section');
  section.insertAdjacentHTML('beforeend', createMCQQuestion());
  questionCount++;
});
</script>
@endsection