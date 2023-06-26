<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">
  <title>Locadora de veículos</title>
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5960/5960918.png">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/484246aeda.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/lista-veiculos.css">
  <style>
    * {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    body {
      padding-top: 8rem;
      margin-bottom: 20px;
      margin-top: 20px;
      /* background-image: linear-gradient(to right, #00b4db, rgba(15, 165, 211, 0.5)), url('http://gesistemas.com/carro.png'); */
      background-color: #1f1b2d;
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }

    h1 {
      color: #174c4f !important;
      text-transform: uppercase;
      font-size: 22px;
      font-weight: bold;
    }

    .navbar {
      /* background-image: linear-gradient(to right, #00b4db, rgba(15, 165, 211, 0.5)) !important; */
    }
  </style>
</head>

<body style="background-image: url('https://finder.createx.studio/img/car-finder/home/hero-bg.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/')}}" title="Voltar ao início">
        <img src="https://cdn-icons-png.flaticon.com/512/1023/1023706.png" width="60" alt="" srcset="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse menu-btns" id="navbarCollapse">
        <a href="{{url('categoria/listar')}}" class="btn-menu" style="margin-top: 20px;">
          categoria
        </a>
        <a href="{{url('veiculo/listar')}}" class="btn-menu">
          veículos
        </a>
        <a href="{{url('cliente/listar')}}" class="btn-menu">
          clientes
        </a>
        <a href="{{url('locacao/listar')}}" class="btn-menu">
          locações
        </a>
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="btn-menu">
            sair
          </button>
        </form>
        <ul class="navbar-nav me-auto mb-2 mb-md-0 ul-menu">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('categoria/listar')}}">Categoria</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('veiculo/listar')}}">Veículos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('cliente/listar')}}">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('locacao/listar')}}">Locações</a>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="nav-link active" aria-current="page" href="{{route('logout')}}" onclick="event.preventDefault();
                          this.closest('form').submit();">Sair</a>

            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container">
    <!-- <div class="bg-body-tertiary p-5 rounded"> -->
    @if (session('msg') )
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ session('msg') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @yield('conteudo')
    <!-- </div> -->
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>