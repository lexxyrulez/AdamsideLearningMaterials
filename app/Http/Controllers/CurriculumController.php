<?php
namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function index()
    {
        $curriculums = Curriculum::all();
        return view('curriculums.index', compact('curriculums'));
    }

    public function create()
    {
        return view('curriculums.create');
    }

    public function store(Request $request)
    {
        Curriculum::create($request->validate(['name' => 'required|unique:curriculums|string|max:255']));
        return redirect()->route('curriculums.index')->with('success', 'Curriculum created successfully.');
    }
}