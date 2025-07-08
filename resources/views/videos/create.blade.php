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
        <h2 style="color: #03a9fc; font-size: 2.5em; margin-bottom: 20px; animation: bounceIn 0.8s;">Upload New Video</h2>
        <div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 8px 16px rgba(0,0,0,0.1); animation: slideUp 0.8s;">
            @if ($errors->any())
                <div style="background: #ffebee; color: #c62828; padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: center; animation: shake 0.5s;">
                    <ul style="list-style: none; padding: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('success'))
                <div style="background: #e8f5e9; color: #2e7d32; padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: center; animation: bounceIn 0.8s;">{{ session('success') }}</div>
            @endif
            <form method="POST" action="{{ route('videos.store') }}" style="display: flex; flex-direction: column; gap: 20px; animation: fadeInUp 1s ease;">
                @csrf
                <input type="url" name="video_link" value="{{ old('video_link') }}" placeholder="YouTube Video Link" required style="padding: 12px; border: 2px solid #03a9fc; border-radius: 8px; font-size: 1em; transition: border-color 0.3s, box-shadow 0.3s; animation: slideIn 0.6s;">
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Title" required style="padding: 12px; border: 2px solid #03a9fc; border-radius: 8px; font-size: 1em; transition: border-color 0.3s, box-shadow 0.3s; animation: slideIn 0.7s;">
                <textarea name="description" placeholder="Description" required style="padding: 12px; border: 2px solid #03a9fc; border-radius: 8px; font-size: 1em; resize: vertical; min-height: 100px; transition: border-color 0.3s, box-shadow 0.3s; animation: slideIn 0.8s;">{{ old('description') }}</textarea>
                <button type="submit" style="padding: 12px; background: #03a9fc; color: #fff; border: none; border-radius: 8px; font-size: 1.2em; cursor: pointer; transition: transform 0.3s, background 0.3s; animation: bounceIn 0.8s;">Upload</button>
            </form>
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
        input:focus { border-color: #0288d1; box-shadow: 0 0 8px rgba(3, 169, 252, 0.5); }
        button:hover { transform: scale(1.05); background: #0288d1; }
        a:hover { color: #0288d1; }
        @media (max-width: 768px) {
            nav { width: 200px; }
            h2 { font-size: 2em; }
            input, button { padding: 10px; font-size: 0.9em; }
        }
        @media (max-width: 480px) {
            nav { width: 150px; }
            h2 { font-size: 1.5em; }
            input, button { padding: 8px; font-size: 0.8em; }
            div { padding: 20px; }
        }
    </style>
</div>
@endsection