@extends('teacher.dashboard')

@section('title', 'Edit Assignment')
@section('page-title', 'Edit Assignment')

@section('content')
<div class="card shadow-sm">
  <div class="card-body">

    {{-- Validation errors --}}
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
    @endif

    {{-- Edit Form --}}
    <form action="{{ route('teacher.assignments.update', $assignment->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      {{-- Assignment Title --}}
      <div class="mb-3">
        <label>Title</label>
        <input type="text" name="assignment_title" value="{{ old('assignment_title', $assignment->assignment_title) }}" class="form-control" required>
      </div>

      {{-- Description --}}
      <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="3">{{ old('description', $assignment->description) }}</textarea>
      </div>

      {{-- Document --}}
      <div class="mb-3">
        <label>Document (optional)</label>
        <input type="file" name="document" class="form-control">
        @if($assignment->document)
          <small>Current file: <a href="{{ asset('storage/'.$assignment->document) }}" target="_blank">{{ basename($assignment->document) }}</a></small>
        @endif
      </div>

      {{-- Dates --}}
      <div class="mb-3">
    <label>Upload Date</label>
    <input type="date" name="upload_date" 
        value="{{ old('upload_date', \Carbon\Carbon::parse($assignment->upload_date)->format('Y-m-d')) }}" 
        class="form-control" required>
</div>

<div class="mb-3">
    <label>Due Date</label>
    <input type="date" name="due_date" 
        value="{{ old('due_date', \Carbon\Carbon::parse($assignment->due_date)->format('Y-m-d')) }}" 
        class="form-control" required>
</div>


      <hr>

      {{-- Existing Questions --}}
      <div id="questions-section">
        <h5>Questions</h5>

        @foreach($assignment->questions as $index => $question)
        <div class="card mt-3 p-3">
          <h6>{{ ucfirst($question->type) }} Question</h6>

          <input type="hidden" name="questions[{{ $index }}][id]" value="{{ $question->id }}">
          <input type="hidden" name="questions[{{ $index }}][type]" value="{{ $question->type }}">

          <input type="text" name="questions[{{ $index }}][question]" value="{{ $question->question }}" class="form-control mb-2" placeholder="Enter question" required>

          @if($question->type === 'mcq')
            <label>Options:</label>
            @foreach($question->options ?? [] as $opt)
              <input type="text" name="questions[{{ $index }}][options][]" class="form-control mb-1" value="{{ $opt }}" placeholder="Option">
            @endforeach
            <input type="text" name="questions[{{ $index }}][correct]" class="form-control" value="{{ $question->correct_answer }}" placeholder="Correct answer">
          @endif
        </div>
        @endforeach
      </div>

      {{-- Add Buttons --}}
      <button type="button" id="add-text-question" class="btn btn-outline-primary mt-2">Add Text Question</button>
      <button type="button" id="add-mcq-question" class="btn btn-outline-secondary mt-2">Add Multiple Choice</button>

      <hr>

      {{-- Submit --}}
      <button type="submit" class="btn btn-success">Update Assignment</button>
    </form>
  </div>
</div>

{{-- JavaScript for Dynamic Questions --}}
<script>
let questionCount = {{ $assignment->questions->count() }};

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
  document.getElementById('questions-section').insertAdjacentHTML('beforeend', createTextQuestion());
  questionCount++;
});

document.getElementById('add-mcq-question').addEventListener('click', () => {
  document.getElementById('questions-section').insertAdjacentHTML('beforeend', createMCQQuestion());
  questionCount++;
});
</script>
@endsection
