<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="antonio">
    <meta charset="UTF-8">    
    <title>Sign in</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="/asset/css/adminhome.css" rel="stylesheet">
</head>
<body>
        <main class="bg-dark" >
            <div class="container">    
              <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
        
                      <div class="d-flex justify-content-center py-4">
                        <div class="sray">
                          <img src={{asset("asset/logo.gif")}}>
                        </div>
                          <span class="d-none d-lg-block"style="font-size: 26px;
                          font-weight: 900;
                          color: white;
                          font-family: 'Nunito', sans-serif;margin-top:10px; margin-left:10px">Car parking</span>
                      </div><!-- End Logo -->
        
                      <div class="card mb-3 bg-white">
        
                        <div class="card-body">
        
                          <div class="pt-4 pb-2">
                            <h5 class="text-center pb-0 fs-4" style="padding: 20px 0 15px 0;font-size: 18px;font-weight: 500;color: #012970;font-family: 'Poppins', sans-serif;">S'inscrire</h5>
                            <p class="text-center small">Ajouter votre information personnel</p>
                          </div>
        
                          <form class="row g-3 needs-validation" method="POST" action={{route('signinHandler')}} >
                            @csrf
                            <div class="col-12">
                              <label for="yourName" class="form-label">Nom d'utilisateur</label>
                              <input type="text" name="username" class="form-control" id="yourName" required>
                            </div>
                            @error('username')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{$message}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @enderror
                            <div class="col-12">
                              <label for="yourEmail" class="form-label"> Email</label>
                              <input type="email" name="email" class="form-control" id="yourEmail" required>
                            </div>
                            @error('email')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{$message}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @enderror
                            <div class="col-12">
                              <label for="yourPassword" class="form-label">Mot de passe</label>
                              <input type="password" name="password" class="form-control" id="yourPassword" required>
                            </div>
                            @error('password')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{$message}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @enderror
                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Confirmer votre mot de passe</label>
                                <input type="password" name="confirm_password" class="form-control" id="yourPassword" required>
                              </div>
                              @error('confirm_password')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{$message}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @enderror
                              <fieldset class="row mb-2 mt-4">
                                <label for="yourPassword" class="form-label">Choisissez votre role</label>
                                <div class="col-sm-10">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="admin" value="admin" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                      Admin
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="user" value="driver">
                                    <label class="form-check-label" for="gridRadios2">
                                      Conducteur                        
                                    </label>
                                  </div>
                            <div class="col-10 mx-5 mt-5">
                              <button class="btn btn-primary w-100" type="submit">S'inscrire</button>
                            </div>
                            <div class="col-12 px-5 mx-5 mt-3">
                              <p class="small mb-0"><a href={{ route('Login') }}>Se connecter</a></p>
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
    </body>
</html>