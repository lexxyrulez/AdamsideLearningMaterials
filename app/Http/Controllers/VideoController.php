<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('index');
    }

    public function index()
    {
        $videos = Video::whereNull('deleted_at')->get();
        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_link' => 'required|url',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $youtubeId = $this->extractYouTubeId($request->video_link);

        if (!$youtubeId) {
            return redirect()->back()->with('error', 'Invalid YouTube URL. Please provide a valid link.');
        }

        $existingVideo = Video::where('youtube_id', $youtubeId)->first();

        if ($existingVideo) {
            return redirect()->back()->with('error', 'A video with this YouTube ID already exists.');
        }

        Video::create([
            'youtube_id' => $youtubeId,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('videos.index')->with('success', 'Video uploaded successfully.');
    }

    private function extractYouTubeId($url)
    {
        $parsedUrl = parse_url($url);
        if (!$parsedUrl || !isset($parsedUrl['query'])) {
            return null;
        }

        parse_str($parsedUrl['query'], $params);
        return $params['v'] ?? null;
    }

    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'video_link' => 'required|url',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $youtubeId = $this->extractYouTubeId($request->video_link);

        if (!$youtubeId) {
            return redirect()->back()->with('error', 'Invalid YouTube URL. Please provide a valid link.');
        }

        $video->update([
            'youtube_id' => $youtubeId,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index')->with('success', 'Video hidden successfully.');
    }

    public function restore($id)
    {
        $video = Video::withTrashed()->findOrFail($id);
        $video->restore();
        return redirect()->route('videos.index')->with('success', 'Video restored successfully.');
    }

    public function forceDelete($id)
    {
        $video = Video::withTrashed()->findOrFail($id);
        $video->forceDelete();
        return redirect()->route('videos.index')->with('success', 'Video permanently deleted.');
    }
}