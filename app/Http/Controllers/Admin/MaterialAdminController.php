<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialAdminController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('admin.materials.index', compact('materials'));
    }

    public function create()
    {
        return view('admin.materials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $path = $request->file('file')->store('materials', 'public');
        Material::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $path,
        ]);

        return redirect()->route('admin.materials.index')->with('success', 'Material uploaded successfully.');
    }

    public function edit(Material $material)
    {
        return view('admin.materials.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('materials', 'public');
            $material->file_path = $path;
        }

        $material->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.materials.index')->with('success', 'Material updated successfully.');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('admin.materials.index')->with('success', 'Material deleted successfully.');
    }

    public function createNotes()
    {
        $curricula = ['Physics', 'Mathematics', 'Chemistry']; // Example curricula, expand as needed
        $grades = ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5']; // Example grades, expand as needed
        return view('admin.materials.create-notes', compact('curricula', 'grades'));
    }

    public function storeNotes(Request $request)
    {
        $request->validate([
            'curriculum' => 'required|in:Physics,Mathematics,Chemistry',
            'grade' => 'required|in:Grade 1,Grade 2,Grade 3,Grade 4,Grade 5',
            'title' => 'required|string|max:255',
            'content' => 'required|array',
            'content.*.subtitle' => 'nullable|string',
            'content.*.image' => 'nullable|image|max:2048',
            'questions' => 'nullable|array',
            'questions.*.text' => 'required_with:questions|string',
        ]);

        $content = json_encode($request->content);
        $questions = $request->questions ? json_encode($request->questions) : null;

        Material::create([
            'title' => $request->title,
            'curriculum' => $request->curriculum,
            'grade' => $request->grade,
            'content' => $content,
            'questions' => $questions,
            'type' => 'notes',
        ]);

        return redirect()->route('admin.materials.index')->with('success', 'Notes and questions created successfully.');
    }
}