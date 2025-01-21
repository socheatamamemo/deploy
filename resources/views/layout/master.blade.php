<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Link to Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <title>CrimeTrack</title>
  <style>
    section {
      padding: 0;
    }

    .navbar{
      background-color: #153448;
    }
    .search {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }
    .search img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .search-content {
      position: absolute;
      top: 25%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }
    .btn-group > *:not(:last-child) {
      margin-right: 20px;
    }
    
    .sub-content {
      background-color: #3452a2;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 70vh;
      overflow: hidden;
    }
    .image-box {
      border: 2px solid #fff;
      padding: 8px;
    }
    
    .search-content h1 {
      color: rgb(125, 23, 50); 
    }

    .search-content h2 {
      color: rgb(194, 32, 75); 
    }
    .button {
      margin-top: 70px; 
      margin: 20px 100px 0px;
    }
 
  .profile-image {
    width: 400px;
    height: 500px;
    object-fit: cover;
  }
  


  </style>
</head>
<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand navbar-light">
    @include('layout.navbar')
  </nav>

  <!-- Content -->
  <main class="search">
    @yield('content')
  </main>
  
  {{-- SubContent --}}
  <div class="data">
    @yield('subcontent')
  </div>

  {{-- SubContent --}}
  <div class="data">
    @yield('subcontents')
  </div>


  <!-- Footer -->
  <footer class="footer">
    @include('layout.footer')
  <!-- End of Footer -->
</body>
</html>
