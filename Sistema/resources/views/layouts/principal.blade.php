<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style type="text/css">
    *[class*="-primary"] {
      background-color: #ff6400 !important;
      border-color: #ff6400 !important;
    }
  </style>

  @stack('estilos')

  <title>
    SportZap
  </title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <div class="mx-1">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('public/imagens/mockup_logo.jpeg') }}" alt="" width="120" height="60" class="d-inline-block align-text-top">
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ms-auto">
          @yield('botoes')

          @if(\Auth::check())
          <li class="nav-item m-1">
            <form method="POST" action="{!! route('logout') !!}">
              @csrf

              <button class="btn btn-secondary" type="submit">
                Sair
              </button>
            </form>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <main class="container">
    @yield('conteudo')
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  @stack('scripts')
</body>
</html>
