<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adamside Learning Materials</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- For icons -->
</head>
<body style="margin: 0; padding: 0; font-family: 'Roboto', sans-serif; background: #f0f4f8; color: #333; overflow-x: hidden; line-height: 1.6;">
    <div style="width: 100%; min-height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: space-between;">
        <!-- Header -->
<!-- HEADER -->
<header style="width: 100%; background: linear-gradient(90deg, #03a9fc, #0288d1); padding: 40px 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <!-- Logo with white background -->
    <div style="background: white; border-radius: 20px; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; margin-left: 50px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <img src="{{ asset('assets/images/Logo.png') }}" alt="Adamside Logo" class="bounce-logo" style="width: 140px; height: 140px; object-fit: contain;">

    </div>

    <!-- Centered Title -->
    <div style="text-align: center; margin-top: 10px;">
        <h1 style="color: #fff; font-size: 2.8em; font-weight: 700; text-transform: uppercase; margin: 0;">Adamside Learning Materials</h1>
        <p style="color: #e0f7ff; font-size: 1.3em; margin-top: 10px;">Empowering Education Through Video Content</p>
    </div>
</header>





        <!-- Hero Section -->
        <main style="flex: 1; display: flex; flex-direction: column; align-items: center; padding: 40px 20px; max-width: 1400px; width: 100%; box-sizing: border-box;">
           <!-- Hero/Login Section -->
<section style="display: flex; justify-content: center; align-items: center; padding: 60px 20px; background: linear-gradient(to right, #e0f7fa, #ffffff); width: 100%; flex-direction: column; animation: fadeInUp 1s ease;">
    <h2 style="color: #03a9fc; font-size: 2.8em; margin-bottom: 30px; font-weight: 700; text-shadow: 1px 1px 4px rgba(3,169,252,0.3); animation: bounceIn 0.8s; text-align: center;">Welcome to Adamside LM</h2>
    <p style="font-size: 1.3em; color: #555; max-width: 800px; margin: 0 auto 40px; line-height: 1.8; text-align: center; animation: fadeIn 1.2s;">Login to access your personalized educational experience or register to join our thriving learning community.</p>

    <div style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); max-width: 500px; width: 100%; animation: slideUp 0.8s ease;">
        <h3 style="color: #03a9fc; font-size: 2em; text-align: center; margin-bottom: 30px; animation: pulse 1.5s infinite;">Login</h3>
        <form method="POST" action="{{ route('login') }}" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required style="padding: 12px; border: 2px solid #03a9fc; border-radius: 8px; font-size: 1em;">
            <input type="password" name="password" placeholder="Password" required style="padding: 12px; border: 2px solid #03a9fc; border-radius: 8px; font-size: 1em;">
            <button type="submit" style="padding: 12px; background: #03a9fc; color: #fff; border: none; border-radius: 8px; font-size: 1.2em; cursor: pointer; transition: background 0.3s;">Login</button>
        </form>
        <div style="text-align: center; margin-top: 20px;">
            <!--a href="{{ route('register.admin') }}" style="color: #03a9fc; margin: 0 10px; text-decoration: none; font-weight: 500;">Register as Admin</a-->
            |
            <a href="{{ route('register.user') }}" style="color: #03a9fc; margin: 0 10px; text-decoration: none; font-weight: 500;">Register as User</a>
        </div>
    </div>
</section>


        <!-- Featured Videos -->
<section style="width: 100%; max-width: 1200px; margin: 60px auto; background: #fff; padding: 30px; border-radius: 20px; box-shadow: 0 8px 20px rgba(0,0,0,0.1);">
    <h3 style="color: #03a9fc; font-size: 2em; font-weight: 700; text-align: center; margin-bottom: 30px;">Featured Educational Videos</h3>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
        <!-- Video 1 -->
        <a href="https://www.youtube.com/watch?v=ljiAQ7LyzQ8&t=1s" target="_blank" style="text-decoration: none;">
            <div style="background: #f9f9f9; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05); transition: transform 0.3s;">
                <img src="https://img.youtube.com/vi/XYZ123/hqdefault.jpg" alt="Video 1" style="width: 100%; height: 150px; object-fit: cover;">
                <div style="padding: 10px; color: #333; font-weight: 600;">Sample Video 1</div>
            </div>
        </a>

        <!-- Video 2 -->
        <a href="https://www.youtube.com/watch?v=XYZ123" target="_blank" style="text-decoration: none;">
            <div style="background: #f9f9f9; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05); transition: transform 0.3s;">
                <img src="https://img.youtube.com/vi/XYZ123/hqdefault.jpg" alt="Video 2" style="width: 100%; height: 150px; object-fit: cover;">
                <div style="padding: 10px; color: #333; font-weight: 600;">Sample Video 2</div>
            </div>
        </a>

        <!-- Video 3 -->
        <a href="https://www.youtube.com/watch?v=aBcDeFgHiJk" target="_blank" style="text-decoration: none;">
            <div style="background: #f9f9f9; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05); transition: transform 0.3s;">
                <img src="https://img.youtube.com/vi/aBcDeFgHiJk/hqdefault.jpg" alt="Video 3" style="width: 100%; height: 150px; object-fit: cover;">
                <div style="padding: 10px; color: #333; font-weight: 600;">Sample Video 3</div>
            </div>
        </a>

        <!-- Video 4 -->
        <a href="https://www.youtube.com/watch?v=lmNOPqRsTuV" target="_blank" style="text-decoration: none;">
            <div style="background: #f9f9f9; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05); transition: transform 0.3s;">
                <img src="https://img.youtube.com/vi/lmNOPqRsTuV/hqdefault.jpg" alt="Video 4" style="width: 100%; height: 150px; object-fit: cover;">
                <div style="padding: 10px; color: #333; font-weight: 600;">Sample Video 4</div>
            </div>
        </a>
    </div>
</section>

        </main>

        <!-- Footer -->
        <footer style="width: 100%; background: linear-gradient(90deg, #0288d1, #03a9fc); padding: 20px; text-align: center; color: #fff; font-size: 1em; box-shadow: 0 -2px 4px rgba(0,0,0,0.1); animation: slideUp 0.8s;">
            <p>© 2025 Adamside Learning Materials. All rights reserved. | <a href="#" style="color: #fff; text-decoration: underline; transition: color 0.3s;">Contact Us</a></p>
            <div style="margin-top: 10px;">
                <a href="#" style="color: #fff; margin: 0 10px; transition: color 0.3s;"><i class="fab fa-facebook-f"></i></a>
                <a href="#" style="color: #fff; margin: 0 10px; transition: color 0.3s;"><i class="fab fa-twitter"></i></a>
                <a href="#" style="color: #fff; margin: 0 10px; transition: color 0.3s;"><i class="fab fa-instagram"></i></a>
            </div>
        </footer>
    </div>
    <style>
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideDown { from { transform: translateY(-20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.05); } 100% { transform: scale(1); } }
        @keyframes bounceIn { 0% { transform: scale(0.8); opacity: 0; } 50% { transform: scale(1.1); opacity: 1; } 100% { transform: scale(1); } }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
        header img:hover { transform: scale(1.1); }
        a:hover { transform: scale(1.05); background: #0288d1; box-shadow: 0 6px 20px rgba(3,169,252,0.5); }
        a:hover div { transform: scale(1.05); }
        @media (max-width: 768px) {
            header { padding: 20px; }
            header h1 { font-size: 2.5em; }
            header p { font-size: 1.1em; }
            header img { height: 100px; }
            main h2 { font-size: 2.5em; }
            main p { font-size: 1.2em; }
            a { padding: 12px 30px; font-size: 1.1em; }
            div[style*="overflow-x: auto"] div { width: 200px; height: 150px; }
        }
        @media (max-width: 480px) {
            header { flex-direction: column; padding: 15px 10px; }
            header img { height: 80px; margin-bottom: 10px; }
            header h1 { font-size: 2em; }
            header p { font-size: 1em; }
            main h2 { font-size: 2em; }
            main p { font-size: 1em; }
            a { padding: 10px 20px; font-size: 1em; }
            div[style*="overflow-x: auto"] div { width: 150px; height: 112.5px; }
        }


@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
  40% {
    transform: translateY(-18px);
  }
  60% {
    transform: translateY(-8px);
  }
}

.bounce-logo {
  animation: bounce 2s infinite;
}


    </style>
</body>
</html>