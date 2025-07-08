@extends('layouts.app')

@section('content')
<div style="width: 100%; min-height: 100vh; background: #f0f4f8; padding: 20px; box-sizing: border-box; font-family: 'Roboto', sans-serif; display: flex; animation: fadeIn 1s ease;">
    <nav style="width: 240px; background: #fff; padding: 20px; border-right: 1px solid #03a9fc; box-shadow: 0 4px 8px rgba(0,0,0,0.1); animation: slideIn 0.8s;">
        <h3 style="color: #03a9fc; font-size: 1.5em; margin-bottom: 20px; animation: pulse 1.5s infinite;">Menu</h3>
        <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 15px;"><a href="{{ route('admin.materials.index') }}" style="color: #333; text-decoration: none; font-size: 1em; transition: color 0.3s; animation: fadeIn 0.6s;">Materials</a></li>
        </ul>
    </nav>
    <div style="flex: 1; padding: 20px; animation: fadeInUp 1s ease;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; animation: slideDown 0.8s;">
            <h2 style="color: #03a9fc; font-size: 2em; margin: 0; animation: bounceIn 0.8s;">Add New Material</h2>
            <a href="{{ route('admin.materials.index') }}" style="display: inline-block; padding: 10px 20px; background: #03a9fc; color: #fff; text-decoration: none; font-size: 1em; border-radius: 8px; transition: transform 0.3s; animation: bounceIn 0.9s;">Back to List</a>
        </div>
        <div style="max-width: 100%; margin: 0 auto; animation: slideUp 0.8s;">
            <form action="{{ route('admin.materials.store') }}" method="POST" enctype="multipart/form-data" style="background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); animation: fadeInUp 1s ease;">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label style="display: block; color: #333; font-size: 1em; margin-bottom: 5px;">Title</label>
                    <input type="text" name="title" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 1em;" required>
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; color: #333; font-size: 1em; margin-bottom: 5px;">Description</label>
                    <textarea name="description" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 1em; resize: vertical;" rows="4"></textarea>
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; color: #333; font-size: 1em; margin-bottom: 5px;">PDF File</label>
                    <input type="file" name="file" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 1em;" required>
                </div>
                <button type="submit" style="padding: 10px 20px; background: #03a9fc; color: #fff; border: none; border-radius: 5px; font-size: 1em; cursor: pointer;">Upload Material</button>
            </form>
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
        @media (max-width: 600px) {
            h2 { font-size: 1.8em; }
            a, button { padding: 8px 15px; font-size: 0.9em; }
            input, textarea { font-size: 0.9em; }
        }
    </style>
</div>
@endsection