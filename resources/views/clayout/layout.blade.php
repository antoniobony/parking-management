<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/asset/css/adminhome.css" rel="stylesheet">
    <title>@yield("title")</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div id="app">
    <div class="d-flex flex-column flex-shrink-0 p-2  fixed-top bg-dark" style="width:280px;height:260.5ch;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4" style="color: black">Sidebar</span>
      </a>
      <hr>
      @yield('navcontent')
      <hr>
    </div>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <div class="sray" style="margin-right:10px">
        <img src={{asset("asset/logo.gif")}}>
      </div>
      <a class="navbar-brand" href="#">Car Parking</a>
      <div class="collapse navbar-collapse" id="navbarCollapse" style="justify-content: end">
          @yield('logout')
      </div>
  </nav>
<main  style="margin-left: 8rem;padding-left: 9rem;margin-top: 5rem;height:63.2ch">
  <div class="container d-column">
      <div class="container-fluid">                     
        @yield('content')          
      </div>  
  </div>
</main>
<hr>
<footer style="float: ">
  <div class="copyright" style="margin-left:600px;margin-bottom:15px;color: #012970">
    &copy; Copyright <strong><span style="color: #012970;font-weight:bold;font-size:15px">Car Parking</span></strong>. All Rights Reserved
  </div>
  <div style="margin-left:627px;color: #012970">
    <p>Designed by Antonio & toavina L3 IG<p> 
  </div>
</footer>
</div>
    <script>
      if( navigator.userAgent.indexOf("Firefox")!=-1){
          history.pushState(null,null,document.URL);
          window.addEventListener('popstate',function(){
              history.pushState(null,null,document.URL);
          });
      }
      function preventClick(e){
        e.preventDefault();
      }
  </script>
  @livewireScripts
  @stack('script')
</body>
</html>
<!--<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Offcanvas dark navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>-->