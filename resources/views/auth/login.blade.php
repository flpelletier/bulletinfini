<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./images/icon.ico">
  <link rel="icon" type="image/png" href="./images/icon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{ __('Bulletinfini - Authentification') }}
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

  <!-- CSS Files -->
  <link href="./css/bootstrap.min.css" rel="stylesheet" />
  <link href="./css/login.css" rel="stylesheet" />

</head>

<body class="login-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent" color-on-scroll="200" style="background-color:transparent!important;">
    <div class="container" style="height: 70%;">

      <div class="dropdown button-dropdown">
        <a href="" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
          <span class="button-bar"></span>
          <span class="button-bar"></span>
          <span class="button-bar"></span>
        </a>

      </div>
      <div class="navbar-translate">
        <a class="navbar-brand" rel="tooltip" title="Bienvenue !" data-placement="bottom">
          {{ __('Bulletinfini') }}
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="" style="background: linear-gradient(#38422b 0%, #000 80%);">
        <ul class="navbar-nav">
          <li class="nav-item">
           
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <div class="page-header clear-filter" filter-color="yellow">
    <div class="page-header-image" style="background-image:url(./images/learning-concept.png)"></div>
    <!-- <a href="https://iconscout.com/illustrations/developer-team" target="_blank">Developer Team Illustration</a> by <a href="https://iconscout.com/contributors/delesign" target="_blank">Delesign Graphics</a>-->
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">
          <div class="card-header text-center">
              <div class="logo-container">
                <img src="./images/icon.ico" alt>
              </div>
            </div>
            @if(session()->has('errors'))
            <div class="alert alert-danger" role="alert">
              @foreach($errors->all() as $error)
              {{$error}}
              <br>
              @endforeach
            </div>
            @endif
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
                <!-- Email -->
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <!-- Password -->
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" placeholder="Mot de passe" class="form-control" class="form-control @error('password') is-invalid @enderror" name="password" required>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <!-- -->
            </div>
            <!-- Login -->
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">{{ __('Connexion') }}</button>
              <div class="pull-right">
                @if (Route::has('password.request'))
                <h6> <a class="link">
                    <!-- href="{{ route('password.request') }}" -->
                    {{ __('Mot de passe oublié?') }}
                  </a></h6>
                @endif
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</body>