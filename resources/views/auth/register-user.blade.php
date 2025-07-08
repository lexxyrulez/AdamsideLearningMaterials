@extends('layouts.app')

@section('content')
<div style="width: 100%; min-height: 100vh; background: #f0f4f8; padding: 20px; box-sizing: border-box; font-family: 'Roboto', sans-serif; display: flex; justify-content: center; align-items: center; animation: fadeIn 1s ease;">
    <div style="max-width: 500px; width: 100%; background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 8px 16px rgba(0,0,0,0.1); animation: slideUp 0.8s ease;">
        <h2 style="color: #03a9fc; font-size: 2.5em; text-align: center; margin-bottom: 20px; animation: pulse 1.5s infinite;">User Registration</h2>
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
            <div style="background: #e8f5e9; color: #2e7d32; padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: center; animation: bounceIn 0.8s;">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('register.user.post') }}" style="display: flex; flex-direction: column; gap: 20px; animation: fadeInUp 1s ease;">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" required style="padding: 12px; border: 2px solid #03a9fc; border-radius: 8px; font-size: 1em; transition: border-color 0.3s, box-shadow 0.3s; animation: slideIn 0.6s;">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required style="padding: 12px; border: 2px solid #03a9fc; border-radius: 8px; font-size: 1em; transition: border-color 0.3s, box-shadow 0.3s; animation: slideIn 0.7s;">
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone" required style="padding: 12px; border: 2px solid #03a9fc; border-radius: 8px; font-size: 1em; transition: border-color 0.3s, box-shadow 0.3s; animation: slideIn 0.8s;">
            <select name="user_type" value="{{ old('user_type') }}" required style="padding: 12px; border: 2px solid #03a9fc; border-radius: 8px; font-size: 1em; transition: border-color 0.3s, box-shadow 0.3s; animation: slideIn 0.9s;">
                <option value="">Select User Type</option>
                <option value="parent">Parent</option>
                <option value="student">Student</option>
            </select>
            <input type="password" name="password" placeholder="Password" required style="padding: 12px; border: 2px solid #03a9fc; border-radius: 8px; font-size: 1em; transition: border-color 0.3s, box-shadow 0.3s; animation: slideIn 1s;">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required style="padding: 12px; border: 2px solid #03a9fc; border-radius: 8px; font-size: 1em; transition: border-color 0.3s, box-shadow 0.3s; animation: slideIn 1.1s;">
            <button type="submit" style="padding: 12px; background: #03a9fc; color: #fff; border: none; border-radius: 8px; font-size: 1.2em; cursor: pointer; transition: transform 0.3s, background 0.3s; animation: bounceIn 0.8s;">Register</button>
            <div style="text-align: center; font-size: 0.9em; color: #666;">
                <a href="{{ route('login') }}" style="color: #03a9fc; text-decoration: none; transition: color 0.3s; animation: fadeIn 1s;">Back to Login</a>
            </div>
        </form>
    </div>
    <style>
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.05); } 100% { transform: scale(1); } }
        @keyframes shake { 0% { transform: translateX(0); } 25% { transform: translateX(-5px); } 50% { transform: translateX(5px); } 75% { transform: translateX(-5px); } 100% { transform: translateX(0); } }
        @keyframes bounceIn { 0% { transform: scale(0.8); opacity: 0; } 50% { transform: scale(1.1); opacity: 1; } 100% { transform: scale(1); } }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
        input:focus { border-color: #0288d1; box-shadow: 0 0 8px rgba(3, 169, 252, 0.5); }
        button:hover { transform: scale(1.05); background: #0288d1; }
        a:hover { color: #0288d1; }
        @media (max-width: 768px) {
            h2 { font-size: 2em; }
            input, button { padding: 10px; font-size: 0.9em; }
            div { max-width: 90%; }
        }
        @media (max-width: 480px) {
            h2 { font-size: 1.5em; }
            input, button { padding: 8px; font-size: 0.8em; }
            div { padding: 20px; }
        }
    </style>
</div>
@endsection