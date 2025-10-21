<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::latest()->get();
        return view('teacher.assignments.index', compact('assignments'));
    }

    public function create()
    {
        return view('teacher.assignments.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'assignment_title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'document' => 'nullable|file|mimes:pdf,doc,docx,xlsx|max:2048',
        'upload_date' => 'required|date',
        'due_date' => 'required|date|after_or_equal:upload_date',
        'questions' => 'required|array|min:1',
        'questions.*.question' => 'required|string',
        'questions.*.type' => 'required|in:text,mcq',
        'questions.*.options' => 'nullable|array',
        'questions.*.correct' => 'nullable|string',
    ]);

    if ($request->hasFile('document')) {
        $validated['document'] = $request->file('document')->store('assignments');
    }

    $assignment = Assignment::create($validated);

    foreach ($validated['questions'] as $q) {
        Question::create([
            'assignment_id' => $assignment->id,
            'type' => $q['type'],
            'question' => $q['question'],
            'options' => $q['type'] === 'mcq' ? $q['options'] : null,
            'correct_answer' => $q['type'] === 'mcq' ? $q['correct'] : null,
        ]);
    }

    return redirect()->route('teacher.assignments.index')->with('success', 'Assignment and questions saved!');
}

    public function show(Assignment $assignment)
    {
        return view('teacher.assignments.show', compact('assignment'));
    }

    public function edit(Assignment $assignment)
    {
        return view('teacher.assignments.edit', compact('assignment'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
            'assignment_title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'upload_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:upload_date',
        ]);

        if ($request->hasFile('document')) {
            if ($assignment->document) {
                Storage::delete($assignment->document);
            }
            $validated['document'] = $request->file('document')->store('assignments');
        }

        $assignment->update($validated);

        return redirect()->route('teacher.assignments.index')->with('success', 'Assignment updated successfully!');
    }

    public function destroy(Assignment $assignment)
    {
        if ($assignment->document) {
            Storage::delete($assignment->document);
        }
        $assignment->delete();

        return redirect()->route('teacher.assignments.index')->with('success', 'Assignment deleted successfully!');
    }
}
