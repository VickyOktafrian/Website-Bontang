<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login Akun</title>
  <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">
  
  <!-- Link to Google Fonts for Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  
  <!-- Link to Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Custom Styles to apply Poppins font -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
  
  <!-- JavaScript for toggling password visibility -->
  <script>
    function togglePassword(id) {
      const passwordField = document.getElementById(id);
      const type = passwordField.type === 'password' ? 'text' : 'password';
      passwordField.type = type;
      const icon = document.getElementById(id + "-icon");
      if (type === 'text') {
        icon.classList.add("fa-eye");
        icon.classList.remove("fa-eye-slash");
      } else {
        icon.classList.add("fa-eye-slash");
        icon.classList.remove("fa-eye");
      }
    }
  </script>
</head>

<body class="h-screen">
  @if(session('gagal'))
    <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 text-center" role="alert">
      <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <div>
        <span class="font-medium">Login gagal!</span> {{ session('gagal') }}
      </div>
    </div>
  @endif

  <div class="flex h-full">
    <!-- Bagian kiri (biru) -->
    <div class="w-1/2 bg-sky-200 flex flex-col items-center justify-center">
      <img src="{{ asset('images/logo_bontang.png') }}" alt="Logo Bontang" class="h-20 w-auto mb-4" />
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-40 w-auto mb-2" />
      <img src="https://img.freepik.com/free-vector/teamwork-concept-landing-page_23-2148240860.jpg?ga=GA1.1.1604946464.1734012171&semt=ais_hybrid" 
        alt="Banner" class="h-64 w-auto rounded-full mb-4" />
      <p class="text-center">
        Website Bontang kita
        <br />
        Berisi Informasi seputar Bontang
      </p>
    </div>

    <!-- Bagian kanan (putih) dengan layout vertikal -->
    <div class="w-1/2 bg-white flex flex-col items-center justify-center p-4">
      <div class="w-full max-w-sm p-6 bg-sky-200 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 mt-10 text-gray-700">Selamat Datang</h2>
        <form class="space-y-4" method="post" action="{{ route('login.submit') }}">
          @csrf
          <input name='username' class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
            placeholder="Username" type="text" value="{{ old('username') }}" />
            
          <div class="relative">
            <input name='password' class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
              placeholder="Masukkan Password" type="password" id="password" />
            <i class="fas fa-eye-slash absolute right-3 top-4 text-gray-500 cursor-pointer" 
               onclick="togglePassword('password')" id="password-icon"></i>
          </div>
          
          <div class="flex items-center h-5">
            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" {{ old('remember') ? 'checked' : '' }} />
            <label for="remember" class="ms-2 text-sm font-medium text-black">Remember me</label>
          </div>
          
          <div class="flex justify-center">
            <button class="w-1/3 bg-yellow-400 text-white p-3 rounded-xl font-bold" type="submit">
              Masuk
            </button>
          </div>
        </form>
      </div>

      <p class="mt-4">
        Apakah kamu tidak punya akun? <a class="text-blue-500" href="{{ '/daftar' }}">Daftar</a>
      </p>
      
      <p class="mt-2">Atau masuk dengan</p>
      <div class="flex flex-col space-y-2 mt-4 w-full max-w-sm">

        <form method="GET" action="{{ route('google.auth') }}" class="w-full">
          <button 
            type="submit" 
            class="flex items-center w-full p-3 border border-gray-300 rounded-xl"
          >
            <img 
              alt="Facebook logo" 
              class="mr-2" 
              height="20" 
              src="https://cdn-icons-png.flaticon.com/128/300/300221.png" 
              width="20" 
            />
            <span class="text-center w-full">Masuk dengan Google</span>
          </button>
        </form>
        <form method="GET" action="{{ route('facebook.auth') }}" class="w-full">
          <button 
            type="submit" 
            class="flex items-center w-full p-3 border border-gray-300 rounded-xl"
          >
            <img 
              alt="Facebook logo" 
              class="mr-2" 
              height="20" 
              src="https://cdn-icons-png.flaticon.com/128/5968/5968764.png" 
              width="20" 
            />
            <span class="text-center w-full">Masuk dengan Facebook</span>
          </button>
        </form>
        
                
      </div>
    </div>
  </div>
</body>

</html>
