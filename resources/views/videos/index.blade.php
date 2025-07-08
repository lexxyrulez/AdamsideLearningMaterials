@extends('layouts.app')

@section('content')
<div style="width: 100%; min-height: 100vh; background: #f0f4f8; padding: 20px; box-sizing: border-box; font-family: 'Roboto', sans-serif; display: flex; animation: fadeIn 1s ease;">
    <nav style="width: 240px; background: #fff; padding: 20px; border-right: 1px solid #03a9fc; box-shadow: 0 4px 8px rgba(0,0,0,0.1); animation: slideIn 0.8s;">
        <h3 style="color: #03a9fc; font-size: 1.5em; margin-bottom: 20px; animation: pulse 1.5s infinite;">Menu</h3>
        <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 15px;"><a href="{{ route('admin.dashboard') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.6s;">Dashboard</a></li>
            <li style="margin-bottom: 15px;"><a href="{{ route('videos.create') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.7s;">Upload Video</a></li>
            <li style="margin-bottom: 15px;"><a href="{{ route('videos.index') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.8s;">Uploaded Videos</a></li>
        </ul>
    </nav>
    <div style="flex: 1; padding: 20px; animation: fadeInUp 1s ease;">
        <h2 style="color: #03a9fc; font-size: 2.5em; margin-bottom: 20px; animation: bounceIn 0.8s;">Uploaded Videos</h2>
        <div style="max-width: 100%; margin: 0 auto; animation: slideUp 0.8s;">
            @if($videos->isEmpty())
                <p style="color: #888; font-size: 1.1em; text-align: center; animation: fadeIn 1s;">No videos uploaded yet.</p>
            @else
                @foreach($videos as $video)
                    <div style="background: #fff; padding: 15px; border-radius: 10px; margin-bottom: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); display: flex; align-items: center; gap: 15px; animation: fadeInUp 0.6s {{ $loop->index * 0.1 }}s;">
                        <a href="https://www.youtube.com/watch?v={{ $video->youtube_id }}" target="_blank" style="display: block; transition: transform 0.3s;">
                            <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg" alt="{{ $video->title }}" style="width: 120px; height: 90px; object-fit: cover; border-radius: 5px; transition: transform 0.3s;">
                        </a>
                        <div style="flex: 1; animation: slideIn 0.6s;">
                            <p style="margin: 0; color: #333; font-size: 1.1em;">{{ $video->title }}</p>
                            <p style="margin: 5px 0; color: #555;">{{ Str::limit($video->description, 50) }}</p>
                        </div>
                        <div style="display: flex; gap: 10px; animation: fadeIn 0.6s;">
                            @if($video->trashed())
                                <form action="{{ route('videos.restore', $video->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" style="padding: 5px 10px; background: #03a9fc; color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: transform 0.3s;">Restore</button>
                                </form>
                            @else
                                <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="padding: 5px 10px; background: #03a9fc; color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: transform 0.3s;">Hide</button>
                                </form>
                                <form action="{{ route('videos.forceDelete', $video->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="padding: 5px 10px; background: #03a9fc; color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: transform 0.3s;">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
            @if(session('success'))
                <div style="background: #e8f5e9; color: #2e7d32; padding: 15px; border-radius: 10px; margin-top: 15px; text-align: center; animation: bounceIn 0.8s;">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div style="background: #ffebee; color: #c62828; padding: 15px; border-radius: 10px; margin-top: 15px; text-align: center; animation: shake 0.5s;">{{ session('error') }}</div>
            @endif
        </div>
    </div>
    <style>
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.05); } 100% { transform: scale(1); } }
        @keyframes bounceIn { 0% { transform: scale(0.8); opacity: 0; } 50% { transform: scale(1.1); opacity: 1; } 100% { transform: scale(1); } }
        @keyframes shake { 0% { transform: translateX(0); } 25% { transform: translateX(-5px); } 50% { transform: translateX(5px); } 75% { transform: translateX(-5px); } 100% { transform: translateX(0); } }
        a:hover img { transform: scale(1.05); }
        button:hover { transform: scale(1.05); background: #0288d1; }
        a:hover { color: #0288d1; }
        @media (max-width: 768px) {
            nav { width: 200px; }
            h2 { font-size: 2em; }
            .video-card { flex-direction: column; text-align: center; }
            img { width: 100px; height: 75px; }
        }
        @media (max-width: 480px) {
            nav { width: 150px; }
            h2 { font-size: 1.5em; }
            img { width: 80px; height: 60px; }
            div { padding: 15px; }
        }
    </style>
</div>
@endsection