<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="antonio">
    <meta charset="UTF-8">    
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="/asset/css/adminhome.css" rel="stylesheet">
</head>
<body>
    <main class="bg-dark">
        <div class="container">
    
          <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
    
                  <div class="d-flex justify-content-center py-4 me-4">
                    <div class="sray">
                      <img src={{asset("asset/logo.gif")}}>
                    </div>
                      <span class="d-none d-lg-block"style="font-size: 26px;margin-left:10px;
                      font-weight: 900;
                      color: #ffff;
                      font-family: 'Nunito', sans-serif;margin-top:10px">Car parking</span>
                  </div><!-- End Logo -->
    
                  <div class="card mb-3 bg-white">
    
                    <div class="card-body">
    
                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4" style="padding: 20px 0 15px 0;font-size: 18px;font-weight: 500;color: #012970;font-family: 'Poppins', sans-serif;">Login </h5>
                        <p class="text-center small">Entrer votre email & mot de passe </p>
                      </div>
    
                      <form class="row g-3 needs-validation" method="POST" action={{route('loginHandler')}}>
                        @csrf
                        <div class="col-12">
                          <label for="yourUsername" class="form-label">Email</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="email" name="email" class="form-control" id="yourUsername" required>
                          </div>
                        </div>
                        
                        <div class="col-12">
                          <label for="yourPassword" class="form-label">Mot de passe</label>
                          <input type="password" name="password" class="form-control" id="yourPassword" required>
                        </div>
                        <div class="col-12  mt-4">
                          <button class="btn btn-primary w-100" type="submit">Login</button>
                        </div>
                        @if (session('fails'))
                        <div class="alert alert-danger alert-dismissible fade show " role="alert">
                            {{session('fails')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        <div class="col-12 ">
                          <p class="small mb-0"><a href={{route('Signin')}}>S'inscrire</a></p>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
          </section>
    
        </div>
      </main>
    <!--<script>
        if( navigator.userAgent.indexOf("Firefox")!=-1){
            history.pushState(null,null,document.URL);
            window.addEventListener('popstate',function(){
                history.pushState(null,null,document.URL);
            });
        }
    </script>-->
    </body>
</html>