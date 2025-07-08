<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Video;
use App\Models\Note;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $videos = Video::whereNull('deleted_at')->get();
        return view('user.dashboard', compact('videos'));
    }

    public function userMaterials()
    {
        $materials = Material::all();
        $notes = Note::with('grade')->get();
        return view('material.user', compact('materials', 'notes'));
    }

    public function show($id)
    {
        $material = Material::find($id);
        if ($material) {
            return view('material.show', compact('material'));
        }
        $note = Note::with('grade')->find($id);
        return view('material.show', compact('note'));
    }

    public function download(Material $material)
    {
        $path = storage_path('app/public/' . $material->file_path);
        if (file_exists($path)) {
            return response()->file($path, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $material->title . '.pdf"',
            ]);
        }
        return redirect()->back()->with('error', 'File not found.');
    }
}