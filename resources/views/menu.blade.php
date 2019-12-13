<!DOCTYPE html>
<html lang="br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Supermercado WEB</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/small-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <img src="/img/logo.png" height="60px">
      <a class="navbar-brand" href="#">  Supermercado WEB</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-nav ml-auto" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          


                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                              </li>
                          @endif
                      @else
                      <li class="nav-item">
                          <a  class="nav-link" href="{{ route('carrinhos.index') }}" role="button">
                              Carrinho <span class="caret"></span>
                          </a>
                      </li>
                          <li class="nav-item">
                              <a  class="nav-link" href="/pedidos" role="button">
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
                          </li>

                              <li class="nav-item" aria-labelledby="navbarDropdown">
                                  <a class="nav-link" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </li>

                      @endguest
                  </ul>


      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container">
  <!-- Conteúdo - parte central //-->
    @yield('conteudo')

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container" >
        <p class="m-0 text-center text-white">WebSite Supermecado Web 2019 - Vinícius Gomes</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</div>
  </body>

  </html>
