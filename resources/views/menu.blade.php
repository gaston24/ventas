
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('index')}}" onClick="window.location.href='index.php'">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{route('locales')}}" >Locales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('localesComp')}}" >Locales (Comp)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('franquicias')}}" >Franquicias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('franquiciasComp')}}" >Franquicias (Comp)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('todos')}}" >Todos</a>
        </li>
      </ul>
    </div>
  </nav>
    
