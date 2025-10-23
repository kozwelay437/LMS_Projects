@extends('teacher.dashboard')

@section('title', $assignment->assignment_title)
@section('page-title', $assignment->assignment_title)

@section('content')
<div class="card shadow-sm mb-3">
  <div class="card-body">
    <h5>Title:</h5>
    <p>{{ $assignment->assignment_title }}</p>

    <h5>Description:</h5>
    <p>{{ $assignment->description ?? '-' }}</p>

    <h5>Upload Date:</h5>
    <p>{{ $assignment->upload_date->format('d M Y') }}</p>

    <h5>Due Date:</h5>
    <p>{{ $assignment->due_date->format('d M Y') }}</p>

    <h5>Document:</h5>
    @if($assignment->document)
      <a href="{{ asset('storage/' . $assignment->document) }}" target="_blank">View Document</a>
    @else
      <p>No document uploaded</p>
    @endif
  </div>
</div>

{{-- Questions --}}
<div class="card shadow-sm">
  <div class="card-body">
    <h5>Questions</h5>

    @if($assignment->questions->count() > 0)
      @foreach($assignment->questions as $key => $question)
      <div class="mb-3">
        <h6>Q{{ $key + 1 }}: {{ $question->question }}</h6>

        @if($question->type === 'mcq')
          <ul>
            @foreach($question->options as $option)
              <li @if($option === $question->correct_answer) class="fw-bold text-success" @endif>{{ $option }}</li>
            @endforeach
          </ul>
          <p><strong>Correct Answer:</strong> {{ $question->correct_answer }}</p>
        @else
          <p>Answer: <em>Text question</em></p>
        @endif
      </div>
      <hr>
      @endforeach
    @else
      <p>No questions added to this assignment.</p>
    @endif
  </div>
</div>

<a href="{{ route('teacher.assignments.index') }}" class="btn btn-secondary mt-3">Back to Assignments</a>
@endsection
