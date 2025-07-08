@extends('layouts.app')

@section('content')
<div style="width: 100%; min-height: 100vh; background: #f0f4f8; padding: 20px; box-sizing: border-box; font-family: 'Roboto', sans-serif; display: flex; animation: fadeIn 1s ease;">
    <nav style="width: 240px; background: #fff; padding: 20px; border-right: 1px solid #03a9fc; box-shadow: 0 4px 8px rgba(0,0,0,0.1); animation: slideIn 0.8s;">
        <h3 style="color: #03a9fc; font-size: 1.5em; margin-bottom: 20px; animation: pulse 1.5s infinite;">Menu</h3>
        <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 15px;"><a href="{{ route('admin.dashboard') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.6s;">Dashboard</a></li>
            <li style="margin-bottom: 15px;"><a href="{{ route('grades.index') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.7s;">Grades</a></li>
            <li style="margin-bottom: 15px;"><a href="{{ route('curriculums.index') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.8s;">Curriculums</a></li>
            <li style="margin-bottom: 15px;"><a href="{{ route('materials.index') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.9s;">Materials</a></li>
        </ul>
    </nav>
    <div style="flex: 1; padding: 20px; animation: fadeInUp 1s ease;">
        <h2 style="color: #03a9fc; font-size: 2.5em; margin-bottom: 20px; animation: bounceIn 0.8s;">Add New Curriculum</h2>
        <form method="POST" action="{{ route('curriculums.store') }}" style="max-width: 400px; animation: slideUp 0.8s;">
            @csrf
            <input type="text" name="name" placeholder="Curriculum Name" required style="width: 100%; padding: 12px; border: 2px solid #03a9fc; border-radius: 8px; margin-bottom: 20px; font-size: 1em; transition: border-color 0.3s;">
            <button type="submit" style="padding: 12px 20px; background: #03a9fc; color: #fff; border: none; border-radius: 8px; font-size: 1.2em; cursor: pointer; transition: transform 0.3s;">Save</button>
        </form>
    </div>
    <style>
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.05); } 100% { transform: scale(1); } }
        @keyframes bounceIn { 0% { transform: scale(0.8); opacity: 0; } 50% { transform: scale(1.1); opacity: 1; } 100% { transform: scale(1); } }
        input:focus { border-color: #0288d1; }
        button:hover { transform: scale(1.05); background: #0288d1; }
        @media (max-width: 768px) { nav { width: 200px; } }
        @media (max-width: 480px) { nav { width: 150px; } }
    </style>
</div>
@endsection