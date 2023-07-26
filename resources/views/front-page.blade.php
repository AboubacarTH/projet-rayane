<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acceuil</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">  
    <link rel="stylesheet" href="{{asset('css/style.css')}}";/>
  </head>
  <body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light nbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">
          <img src="{{asset('storage/images/rayan-medical-logo.jpg')}}" alt="logo" height="70px" width="109px" >
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="{{route('home')}}">Acceuil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Télé-médecine</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Nos docteurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Nous contacter</a>
            </li>
            <li class="nav-item me-2">
              <a class="nav-link" href="{{route('login')}}">Mon espace</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
      <div class="container position-relative">
          <div class="row justify-content-center">
              <div class="col-md-5 left-side pt-5">
                  <div class="text-white">
                      <!-- Page heading-->
                      <h4>__ Nous sommes là pour vos soins</h4>
                      <h1>Rayane Médical</h1>
                      <h6>Nous disposons des docteurs généralistes et spécialistes dans tous les domaines de soins pour vous apporter le meilleur soins possible avec une accessibilité jamais atteinte.</h6>
                      <form class="d-flex" role="search">
                        <select id="my-select" class="form-control me-2" name="doctor">
                          <option>Séléctionnez un docteur</option>
                          <option>Généraliste</option>
                          <option>Cardiologue</option>
                          <option>Radiologue</option>
                          <option>Ophtalmologue</option>
                        </select>
                        <button class="btn btn-primary" type="submit">Search</button>
                      </form>
                      <h4 class="pt-5"><i>1er site de Télé-médecine au <b>Niger</b>.</i></h4>
                  </div>
              </div>
              <div class="col-md-7">
                <div class="text-center">
                  <img class="img-fluid" src="../storage/images/medical-doctor-image.png" alt="doctor">
                </div>
              </div>
          </div>
      </div>
  </header>
  <section class="pt-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3">
          <ul class="text-light">
            <li><span class="badge rounded-pill text-bg-info"><a class="text-white" href="#">Voir les pharmacies de garde</a></span></li>
            <li><span class="badge rounded-pill text-bg-info"><a class="text-white" href="#">Voir les clinics de garde</a></span></li>
          </ul>
        </div>
        <div class="col-xl-9">
        </div>
      </div>
      <div class="row text-center pb-5">
        <div class="col-xl-12">
          <button class="btn btn-lg btn-outline-success rounded-pill" type="button">Prendre un rendez-vous</button>
        </div>
        <div class="col-xl-12">
          <p>Vous pouvez prendre un rendez-vous avec un médecin généraliste ou spécialiste rapidement sans déplacement, vous faire consulter à distance aussi en toute sécurité.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <img class="img-fluid" src="{{asset('storage/images/generel-medical.png')}}" alt="general medical">
          <h3>Personnel professionnel</h3>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde voluptate quisquam dignissimos provident fugit non aliquam, dolores molestias quos sed expedita possimus porro deserunt rerum hic cumque numquam facere tempore.</p>
        </div>
        <div class="col-md-4">
          <img class="img-fluid" src="{{asset('storage/images/Medical-Surgical.png')}}" alt="medical & chirigucal">
          <h3>Médical & Chirurgical</h3>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde voluptate quisquam dignissimos provident fugit non aliquam, dolores molestias quos sed expedita possimus porro deserunt rerum hic cumque numquam facere tempore.</p>
        </div>
        <div class="col-md-4">
          <img class="img-fluid" src="{{asset('storage/images/generel-medical.png')}}" alt="general medical">
          <h3>Service d'urgence</h3>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde voluptate quisquam dignissimos provident fugit non aliquam, dolores molestias quos sed expedita possimus porro deserunt rerum hic cumque numquam facere tempore.</p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <h2 class="pt-5 text-center">Les pharmacies</h2>
      </div>
      <div class="row">
        <div class="card shadow">
          <div class="card-body">
            <form class="d-flex" role="search">
              <select id="quarter-select" class="form-control me-2" name="quarter-select">
                <option>Séléctionnez une région</option>
                <option>Niamey</option>
                <option>Dosso</option>
                <option>Maradi</option>
                <option>Tahoua</option>
              </select>
              <select id="quarter-select" class="form-control me-2" name="quarter-select">
                <option>Séléctionnez une quartier</option>
                <option>Dar es salam</option>
                <option>Bobiel</option>
                <option>Koira Kano</option>
              </select>
              <div class="form-check form-switch me-2">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">De garde</label>
              </div>
              <button class="btn btn-primary" type="submit">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="wrapper">
    <div class="container-fostrap">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="#">
                            <img src="{{asset('storage/images/pharmacy-icon.png')}}" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="#"> Pharmacie Rayane </a>
                                </h4>
                                <p class="">
                                    Tutorial to make a carousel bootstrap by adding more wonderful effect fadein ...
                                </p>
                            </div>
                            <div class="card-read-more">
                                <a href="#" class="btn btn-link btn-block">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                      <div class="card">
                          <a class="img-card" href="#">
                          <img src="{{asset('storage/images/pharmacy-icon.png')}}" />
                        </a>
                          <div class="card-content">
                              <h4 class="card-title">
                                  <a href="#"> Pharmacie Rayane </a>
                              </h4>
                              <p class="">
                                  Tutorial to make a carousel bootstrap by adding more wonderful effect fadein ...
                              </p>
                          </div>
                          <div class="card-read-more">
                              <a href="#" class="btn btn-link btn-block">
                                  Read More
                              </a>
                          </div>
                      </div>
                  </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="#">
                              <img src="{{asset('storage/images/pharmacy-icon.png')}}" />
                            </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="#"> Pharmacie Rayane </a>
                                </h4>
                                <p class="">
                                    tutorials button hover animation, although very much a hover button is very beauti...
                                </p>
                            </div>
                            <div class="card-read-more">
                                <a href="#" class="btn btn-link btn-block">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>