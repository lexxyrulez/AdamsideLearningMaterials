<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Grade;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::with('grade')->get();
        return view('admin.notes.index', compact('notes'));
    }

    public function create()
    {
        $grades = Grade::all(); // Ensure this fetches data
        $curricula = Curriculum::all(); // Ensure this fetches data
        if ($grades->isEmpty() || $curricula->isEmpty()) {
            return redirect()->route('admin.notes.index')->with('error', 'Please add grades and curricula in the database before creating notes.');
        }
        return view('admin.notes.create', compact('grades', 'curricula'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grade_id' => 'required|exists:grades,id',
            'curriculum_ids' => 'required|array',
            'curriculum_ids.*' => 'exists:curricula,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|max:2048',
        ]);

        $content = $this->processContent($request->content, $request->images);
        $curriculumIds = json_encode($request->curriculum_ids);

        Note::create([
            'title' => $request->title,
            'grade_id' => $request->grade_id,
            'curriculum_ids' => $curriculumIds,
            'content' => $content,
        ]);

        return redirect()->route('admin.notes.index')->with('success', 'Notes created successfully.');
    }

    public function edit(Note $note)
    {
        $grades = Grade::all();
        $curricula = Curriculum::all();
        if ($grades->isEmpty() || $curricula->isEmpty()) {
            return redirect()->route('admin.notes.index')->with('error', 'Please add grades and curricula in the database.');
        }
        return view('admin.notes.edit', compact('note', 'grades', 'curricula'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'grade_id' => 'required|exists:grades,id',
            'curriculum_ids' => 'required|array',
            'curriculum_ids.*' => 'exists:curricula,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|max:2048',
        ]);

        $content = $this->processContent($request->content, $request->images);
        $curriculumIds = json_encode($request->curriculum_ids);

        $note->update([
            'title' => $request->title,
            'grade_id' => $request->grade_id,
            'curriculum_ids' => $curriculumIds,
            'content' => $content,
        ]);

        return redirect()->route('admin.notes.index')->with('success', 'Notes updated successfully.');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('admin.notes.index')->with('success', 'Notes deleted successfully.');
    }

    private function processContent($content, $images)
    {
        if ($images && count($images) > 0) {
            foreach ($images as $index => $image) {
                if ($image) {
                    $imagePath = $image->store('notes/images', 'public');
                    $content = str_replace("{{image$index}}", '<img src="' . asset('storage/' . $imagePath) . '" alt="Note Image" style="max-width: 100%; height: auto;">', $content);
                }
            }
        }
        return $content;
    }
}