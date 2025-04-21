<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="author" content="bakary">
        <meta charset="UTF-8">    
        <title>Barea</title>
        <link rel="shortcut icon" href="img/logo.jpg">
        <link rel="stylesheet" href="css/ba.css">
    </head>
    <body>
         <header>
          <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Offcanvas navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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
                      <ul class="dropdown-menu">
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
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
              </div>
            </div>
          </nav>
         </header>
          <section>
          <div id="vd">
          <div class="vid">
          <video controls >
            <source src="video/CAN 2019 Madagascar Flash back sur l'incroyable parcours des Barea..mp4">
            <source src="video/CAN 2019 Madagascar Flash back sur l'incroyable parcours des Barea..ogg">
          </video>
          </div>
          </section>
          <section>
          <div class="onze">
           <div class="titre"><h1>Onze de depart</h1></div> 
           <div class="terrain">
           <div class="poste">
           <div class="GB"></div>
          </div>
          <div class="poste">
            <div class="DD"></div><div class="DC1"></div><div class="DC2"></div><div class="DG"></div>
          </div>
          <div class="poste">
          <div class="MDF1"></div><div class="MDF2"></div>
           </div>   
           <div class="poste">
            <div class="MLD"></div><div class="MLG"></div>
            </div>     
            <div class="poste">
              <div class="MO"></div>
              </div>     
              <div class="poste">
                <div class="ATT"></div>
                </div>       
            </div> 
          </div>
          </section>
          <video controls  height="70%" width="70%">
            <source src="Madmax - Malalako (Clip Officiel).mp4">
          </video>
          @yield('content')    
      <footer>
      <div class="rs">
      <a href="#">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 17 17">
            <g></g>
            <path d="M12.461 5.57l-0.309 2.93h-2.342v8.5h-3.518v-8.5h-1.753v-2.93h1.753v-1.764c0-2.383 0.991-3.806 3.808-3.806h2.341v2.93h-1.465c-1.093 0-1.166 0.413-1.166 1.176v1.464h2.651z" fill="#FFFFFF" />
          </svg>
        </a>
      </div>
      <div class="rs">
      <a href="#">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 17 17">
            <g></g>
            <path d="M17 3.236c-0.626 0.27-1.305 0.464-2.007 0.539 0.723-0.431 1.273-1.11 1.532-1.919-0.669 0.399-1.424 0.69-2.211 0.841-0.636-0.68-1.542-1.1-2.545-1.1-1.931 0-3.484 1.564-3.484 3.483 0 0.27 0.033 0.54 0.086 0.799-2.891-0.15-5.469-1.531-7.184-3.646-0.302 0.517-0.475 1.111-0.475 1.759 0 1.208 0.615 2.275 1.553 2.901-0.571-0.022-1.111-0.184-1.575-0.442 0 0.010 0 0.032 0 0.043 0 1.692 1.197 3.095 2.794 3.419-0.291 0.075-0.604 0.118-0.917 0.118-0.226 0-0.442-0.021-0.657-0.054 0.442 1.381 1.726 2.384 3.257 2.417-1.198 0.938-2.697 1.488-4.326 1.488-0.291 0-0.561-0.010-0.841-0.042 1.543 0.992 3.376 1.564 5.351 1.564 6.407 0 9.913-5.307 9.913-9.912 0-0.152 0-0.302-0.010-0.454 0.678-0.496 1.271-1.112 1.746-1.802zM14.263 5.491c0 3.701-2.765 8.912-8.913 8.912-0.492 0-0.979-0.040-1.458-0.118 0.67-0.276 1.305-0.646 1.891-1.104 0.333-0.26 0.466-0.702 0.332-1.103-0.134-0.401-0.505-0.675-0.928-0.684-0.545-0.011-1.055-0.197-1.467-0.509 0.004-0.001 0.008-0.002 0.012-0.003 0.452-0.116 0.763-0.528 0.751-0.994-0.011-0.467-0.343-0.862-0.8-0.955-0.652-0.132-1.203-0.516-1.559-1.046 0.035 0.002 0.069 0.004 0.104 0.005 0.013 0 0.025 0 0.038 0 0.432 0 0.817-0.278 0.951-0.692 0.138-0.426-0.024-0.891-0.397-1.14-0.63-0.42-1.030-1.096-1.098-1.841 1.824 1.582 4.146 2.531 6.597 2.658 0.017 0.001 0.035 0.001 0.052 0.001 0.291 0 0.568-0.127 0.759-0.349 0.202-0.235 0.283-0.551 0.22-0.854-0.044-0.209-0.066-0.41-0.066-0.595 0-1.369 1.114-2.483 2.484-2.483 0.698 0 1.342 0.278 1.815 0.784 0.116 0.124 0.261 0.215 0.417 0.266-0.019 0.146-0.006 0.297 0.043 0.444 0.063 0.191 0.18 0.352 0.33 0.47-0.089 0.164-0.132 0.353-0.119 0.544 0.010 0.129 0.009 0.257 0.009 0.386z" fill="#FFFFFF" />
          </svg>
        </a>
      </div>
      <div class="rs">  
      <a href="#">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 17 17">
            <g></g>
            <path d="M13 0h-9c-2.2 0-4 1.8-4 4v9c0 2.2 1.8 4 4 4h9c2.2 0 4-1.8 4-4v-9c0-2.2-1.8-4-4-4zM16 13c0 1.654-1.346 3-3 3h-9c-1.654 0-3-1.346-3-3v-6h3.207c-0.286 0.61-0.457 1.283-0.457 2 0 2.619 2.131 4.75 4.75 4.75s4.75-2.131 4.75-4.75c0-0.717-0.171-1.39-0.457-2h3.207v6zM12.25 9c0 2.068-1.682 3.75-3.75 3.75s-3.75-1.682-3.75-3.75 1.682-3.75 3.75-3.75 3.75 1.682 3.75 3.75zM12.152 6c-0.872-1.059-2.176-1.75-3.652-1.75s-2.78 0.691-3.652 1.75h-3.848v-2c0-1.654 1.346-3 3-3h9c1.654 0 3 1.346 3 3v2h-3.848zM14.454 2.722v1.298c0 0.299-0.244 0.543-0.542 0.543h-1.368c-0.3-0.001-0.544-0.245-0.544-0.543v-1.298c0-0.299 0.244-0.543 0.544-0.543h1.368c0.298 0 0.542 0.244 0.542 0.543z" fill="#FFFFFF" />
          </svg>
        </a>
      </div>
      </div>
      <hr>
      <div><p>Copyright &copy  2022 all rigth reserved | html by Antonio Bakary L1 IG ENI 2022 </p></div> 
    </hr> 
    </footer>
      </body>
  </html>
  