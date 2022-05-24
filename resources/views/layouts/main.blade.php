<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- Styles -->
    
        <link href="/css/styles.css" rel="stylesheet">
         <!-- JS -->
    
    <script src="/js/scripts.js"></script>
      <!-- BOOTSTRAP CSS -->
      <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
     <body>
    <header>
    
    <div class="container">
  
    <header class="d-flex flex-wrap justify-content-center py-3 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
     
    
        <span class="fs-4">Agenda Teatro</span>
      </a>
      <ul class="nav nav-pills">
      @guest
        <li class="nav-item"><a href="/" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="/register" class="nav-link">Cadastrar</a></li>
        @endguest
        @auth
        <li class="nav-item"><a href="/agenda/create" class="nav-link">Agendar</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Meus Agendamento</a></li>
        <li class="nav-item">
          <form action="/logout" method="POST">
    @csrf
        <a href="#" class="nav-link" 
        onclick="event.preventDefault();
        this.closest('form').submit();">Sair</a></li>
              </form>  
       
        @endauth
      </ul>
    </header>
  </div>
     @yield('content')
    
    </body>
<footer class="mt-3">
<p>Agenda de Teatros &copy; 2022</p>
</footer>
    
</html>