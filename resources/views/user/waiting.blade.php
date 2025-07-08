<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waiting for Approval</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0; font-family: 'Roboto', sans-serif; background: #f0f4f8; color: #333; display: flex; justify-content: center; align-items: center; min-height: 100vh; animation: fadeIn 1s ease;">
    <div style="text-align: center; max-width: 500px; padding: 30px; background: #fff; border-radius: 15px; box-shadow: 0 8px 16px rgba(0,0,0,0.1); animation: slideUp 0.8s ease;">
        <h2 style="color: #03a9fc; font-size: 2.5em; margin-bottom: 20px; animation: pulse 1.5s infinite;">Waiting for Approval</h2>
        @if(session('info'))
            <p style="color: #555; font-size: 1.2em; margin-bottom: 20px; animation: fadeIn 1s;">{{ session('info') }}</p>
        @endif
        <p style="color: #888; font-size: 1.1em; animation: fadeIn 1.2s;">Your account is currently awaiting approval from an administrator. Please check back later or contact support if you have questions.</p>
        <a href="{{ route('logout') }}" style="display: inline-block; padding: 12px 30px; background: #03a9fc; color: #fff; text-decoration: none; font-size: 1.2em; border-radius: 8px; transition: transform 0.3s, background 0.3s; animation: bounceIn 0.8s;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <style>
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.05); } 100% { transform: scale(1); } }
        @keyframes bounceIn { 0% { transform: scale(0.8); opacity: 0; } 50% { transform: scale(1.1); opacity: 1; } 100% { transform: scale(1); } }
        a:hover { transform: scale(1.05); background: #0288d1; }
        @media (max-width: 768px) {
            h2 { font-size: 2em; }
            p { font-size: 1em; }
            a { padding: 10px 20px; font-size: 1em; }
        }
        @media (max-width: 480px) {
            h2 { font-size: 1.5em; }
            p { font-size: 0.9em; }
            a { padding: 8px 15px; font-size: 0.9em; }
        }
    </style>
</body>
</html>