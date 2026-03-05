<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::whereNull('deleted_at')->get();

        return response()->json([
            'videos' => $videos,
        ], 200);
    }
}
