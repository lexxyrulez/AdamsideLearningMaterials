@extends('layouts.app')

@section('content')
<div style="width: 100%; min-height: 100vh; background: #f0f4f8; padding: 20px; box-sizing: border-box; font-family: 'Roboto', sans-serif; display: flex; animation: fadeIn 1s ease;">
    <nav style="width: 240px; background: #fff; padding: 20px; border-right: 1px solid #03a9fc; box-shadow: 0 4px 8px rgba(0,0,0,0.1); animation: slideIn 0.8s;">
        <h3 style="color: #03a9fc; font-size: 1.5em; margin-bottom: 20px; animation: pulse 1.5s infinite;">Menu</h3>
        <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 15px;"><a href="{{ route('user.dashboard') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.6s;">Dashboard</a></li>
            <li style="margin-bottom: 15px;"><a href="{{ route('materials.user') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.6s;">Materials</a></li>
        </ul>
    </nav>
    <div style="flex: 1; padding: 20px; animation: fadeInUp 1s ease;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; animation: slideDown 0.8s;">
            <h2 style="color: #03a9fc; font-size: 2em; margin: 0; animation: bounceIn 0.8s;">User Dashboard</h2>
            <a href="{{ route('logout') }}" style="display: inline-block; padding: 10px 20px; background: #03a9fc; color: #fff; text-decoration: none; font-size: 1em; border-radius: 8px; transition: transform 0.3s, background 0.3s; animation: bounceIn 0.9s;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <div style="max-width: 100%; margin: 0 auto; animation: slideUp 0.8s;">
            @if($videos->isEmpty())
                <p style="color: #888; font-size: 1.1em; text-align: center; animation: fadeIn 1s;">No videos available. Please contact admin for approval.</p>
            @else
                <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; animation: fadeInUp 1s ease;">
                    @foreach($videos as $video)
                        <div style="background: #fff; padding: 0; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: transform 0.3s; animation: slideIn 0.6s {{ $loop->index * 0.1 }}s; height: 320px; overflow: hidden;">
                            <div style="padding: 15px; height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
                                <a href="https://www.youtube.com/watch?v={{ $video->youtube_id }}" target="_blank" style="display: flex; flex-direction: column; flex-grow: 1; text-decoration: none; overflow: hidden;">
                                    <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg" alt="{{ $video->title }}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 5px 5px 0 0; transition: transform 0.3s; margin-bottom: 10px;">
                                    <h3 style="color: #333; font-size: 1.1em; margin: 0 0 5px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $video->title }}</h3>
                                    <p style="color: #555; font-size: 0.9em; margin: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ Str::limit($video->description, 50) }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
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
        @keyframes slideDown { from { transform: translateY(-20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.05); } 100% { transform: scale(1); } }
        @keyframes bounceIn { 0% { transform: scale(0.8); opacity: 0; } 50% { transform: scale(1.1); opacity: 1; } 100% { transform: scale(1); } }
        @keyframes shake { 0% { transform: translateX(0); } 25% { transform: translateX(-5px); } 50% { transform: translateX(5px); } 75% { transform: translateX(-5px); } 100% { transform: translateX(0); } }
        a:hover div { transform: scale(1.05); }
        a:hover img { transform: scale(1.05); }
        @media (max-width: 1200px) {
            div[style*="grid-template-columns"] { grid-template-columns: repeat(3, 1fr); }
        }
        @media (max-width: 900px) {
            div[style*="grid-template-columns"] { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 600px) {
            div[style*="grid-template-columns"] { grid-template-columns: 1fr; }
            h2 { font-size: 1.8em; }
            a { padding: 8px 15px; font-size: 0.9em; }
            div[style*="height: 320px"] { height: 280px; }
        }
    </style>
</div>
@endsection