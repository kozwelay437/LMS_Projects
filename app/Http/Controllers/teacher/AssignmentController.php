<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
    // ✅ Validate base assignment fields
    $validated = $request->validate([
        'assignment_title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'document' => 'nullable|file|mimes:pdf,doc,docx,xlsx|max:2048',
        'upload_date' => 'required|date',
        'due_date' => 'required|date|after_or_equal:upload_date',
        'questions' => 'nullable|array',
        'questions.*.question' => 'required_with:questions|string',
        'questions.*.type' => 'required_with:questions|in:text,mcq',
        'questions.*.options' => 'nullable|array',
        'questions.*.correct' => 'nullable|string',
    ]);

    // ✅ Handle file upload with readable name
    if ($request->hasFile('document')) {
        $file = $request->file('document');
        // Create a friendly filename: assignment-title-timestamp.extension
        $filename = Str::slug($request->assignment_title) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('assignments', $filename, 'public');
        $validated['document'] = $path;
    }

    // ✅ Create the assignment
    $assignment = Assignment::create([
        'assignment_title' => $validated['assignment_title'],
        'description' => $validated['description'] ?? null,
        'document' => $validated['document'] ?? null,
        'upload_date' => $validated['upload_date'],
        'due_date' => $validated['due_date'],
    ]);

    // ✅ Save questions if any exist
    if (!empty($validated['questions'])) {
        foreach ($validated['questions'] as $q) {
            Question::create([
                'assignment_id' => $assignment->id,
                'type' => $q['type'],
                'question' => $q['question'],
                'options' => $q['type'] === 'mcq' ? json_encode($q['options']) : null,
                'correct_answer' => $q['type'] === 'mcq' ? $q['correct'] : null,
            ]);
        }
    }

    // ✅ Redirect with success message
    return redirect()
        ->route('teacher.assignments.index')
        ->with('success', 'Assignment saved successfully!');
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
