@extends('teacher.dashboard')

@section('title', 'Assignments')
@section('page-title', 'All Assignments')

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('teacher.assignments.create') }}" class="btn btn-primary mb-3">Create Assignment</a>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Upload Date</th>
            <th>Due Date</th>
            <th>Document</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assignments as $assignment)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $assignment->assignment_title }}</td>
            <td>{{ $assignment->upload_date->format('d M Y') }}</td>
            <td>{{ $assignment->due_date->format('d M Y') }}</td>
            <td>
    @if($assignment->document)
        <a href="{{ asset('storage/' . $assignment->document) }}">
            {{ $assignment->original_name ?? basename($assignment->document) }}
        </a>
    @else
        <em>No file</em>
    @endif
</td>

            <td>
                <a href="{{ route('teacher.assignments.show', $assignment) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('teacher.assignments.edit', $assignment) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('teacher.assignments.destroy', $assignment) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this assignment?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
