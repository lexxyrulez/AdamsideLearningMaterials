@extends('layouts.app')

@section('content')
<div style="width: 100%; min-height: 100vh; background: #f0f4f8; padding: 20px; box-sizing: border-box; font-family: 'Roboto', sans-serif; display: flex; animation: fadeIn 1s ease;">
    <nav style="width: 240px; background: #fff; padding: 20px; border-right: 1px solid #03a9fc; box-shadow: 0 4px 8px rgba(0,0,0,0.1); animation: slideIn 0.8s;">
        <h3 style="color: #03a9fc; font-size: 1.5em; margin-bottom: 20px; animation: pulse 1.5s infinite;">Menu</h3>
        <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 15px;"><a href="{{ route('admin.dashboard') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.6s;">Dashboard</a></li>
            <li style="margin-bottom: 15px;"><a href="{{ route('videos.create') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.7s;">Upload Video</a></li>
            <li style="margin-bottom: 15px;"><a href="{{ route('videos.index') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.9s;">Uploaded Videos</a></li>
            <li style="margin-bottom: 15px;"><a href="{{ route('admin.materials.create') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.8s;">Upload PDF Document</a></li>
<li style="margin-bottom: 15px;"><a href="{{ route('admin.materials.index') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 1s;">Uploaded Documents</a></li>
<li style="margin-bottom: 15px;"><a href="{{ route('admin.notes.index') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.8s;">Manage Notes</a></li>
        </ul>
    </nav>
    <div style="flex: 1; padding: 20px; animation: fadeInUp 1s ease;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; animation: slideDown 0.8s;">
            <h2 style="color: #03a9fc; font-size: 2.5em; margin: 0; animation: bounceIn 0.8s;">Welcome, {{ Auth::user()->name }}!</h2>
            <a href="{{ route('logout') }}" style="display: inline-block; padding: 10px 20px; background: #03a9fc; color: #fff; text-decoration: none; font-size: 1em; border-radius: 8px; transition: transform 0.3s, background 0.3s; animation: bounceIn 0.9s;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <div style="max-width: 800px; margin: 0 auto; animation: slideUp 0.8s;">
            <h3 style="color: #03a9fc; font-size: 1.5em; margin-bottom: 15px; animation: pulse 1.5s infinite;">Pending Approvals</h3>
            @if($pendingUsers->isEmpty())
                <p style="color: #888; font-size: 1.1em; animation: fadeIn 1s;">No pending approvals.</p>
            @else
                @foreach($pendingUsers as $user)
                    <div style="background: #fff; padding: 15px; border-radius: 10px; margin-bottom: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); animation: fadeInUp 0.6s {{ $loop->index * 0.1 }}s;">
                        <p style="margin: 0; color: #555;">{{ $user->name }} ({{ $user->email }}) - {{ $user->user_type }}</p>
                        <form method="POST" action="{{ route('admin.approve', $user->id) }}" style="display: inline; animation: fadeIn 0.6s;">
                            @csrf
                            <button type="submit" style="padding: 5px 10px; background: #03a9fc; color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: transform 0.3s; animation: bounceIn 0.8s;">Approve</button>
                        </form>
                    </div>
                @endforeach
            @endif
            <h3 style="color: #03a9fc; font-size: 1.5em; margin-top: 20px; margin-bottom: 15px; animation: pulse 1.5s infinite;">Users</h3>
            @if($users->isEmpty())
                <p style="color: #888; font-size: 1.1em; animation: fadeIn 1s;">No users registered.</p>
            @else
                @foreach($users as $user)
                    <div style="background: #fff; padding: 15px; border-radius: 10px; margin-bottom: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); animation: fadeInUp 0.6s {{ $loop->index * 0.1 }}s;">
                        <p style="margin: 0; color: #555;">{{ $user->name }} ({{ $user->email }}) - {{ $user->user_type }} - {{ $user->is_approved ? 'Approved' : 'Pending' }}</p>
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
        @keyframes slideDown { from { transform: translateY(-20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.05); } 100% { transform: scale(1); } }
        @keyframes bounceIn { 0% { transform: scale(0.8); opacity: 0; } 50% { transform: scale(1.1); opacity: 1; } 100% { transform: scale(1); } }
        @keyframes shake { 0% { transform: translateX(0); } 25% { transform: translateX(-5px); } 50% { transform: translateX(5px); } 75% { transform: translateX(-5px); } 100% { transform: translateX(0); } }
        a:hover { color: #0288d1; }
        button:hover { transform: scale(1.05); background: #0288d1; }
        @media (max-width: 768px) {
            nav { width: 200px; }
            h2 { font-size: 2em; }
            h3 { font-size: 1.3em; }
            p { font-size: 1em; }
        }
        @media (max-width: 480px) {
            nav { width: 150px; }
            h2 { font-size: 1.5em; }
            h3 { font-size: 1.1em; }
            p { font-size: 0.9em; }
            div { padding: 15px; }
        }
    </style>
</div>
@endsection