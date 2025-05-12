<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- adição dinamica de codigo @stack('style') --}}

    <title>@yield(section: 'title')</title>
</head>
<body>

    
  <nav class="red">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">Curso Laravel</a>
      <ul id="nav-mobile" class="left">
        <li><a href="{{route('site.index')}}">Home</a></li>
        <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Categorias <i class="material-icons right">expand_more</i> </a></li>
        <li><a href="{{route('site.carrinho')}}">Carrinho <span class="new badge blue" data-badge-caption="">{{\Cart::getContent()->count()}}</span></a></li>
      </ul>
    </div>
  </nav>

  <ul id='dropdown1' class='dropdown-content'>
    @foreach ($categoriasMenu as $categoria)
        <li><a href="{{route('site.categoria', $categoria->id)}}">{{$categoria->name}}</a></li>
    @endforeach
    
    
  </ul>

    @yield('conteudo')

    {{-- adição dinamica de codigo @stack('script') --}}
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.dropdown-trigger');
          M.Dropdown.init(elems, {
            coverTrigger: false, // opcional: evita o dropdown aparecer em cima do botão
            constrainWidth: false // opcional: dropdown pode ter largura diferente do botão
          });
        });
      </script>
         
</body>
</html>