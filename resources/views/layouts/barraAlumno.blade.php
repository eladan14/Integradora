
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <!------ Include the above in your HEAD tag ---------->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> 
  <link rel="stylesheet" href="{{ asset('css/buscar.css') }}" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<nav class="navbar navbar-expand-md navbar-light  shadow-sm">
  <div class="container">
 
    <h3>CursosOnlineEasy-Alumno</h3>
 
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest

      @else
      <form class="">
        <div class="d-flex justify-content-center h-100"> 
        <div class="searchbar"> <input class="search_input" type="text" name="search" placeholder="Buscar curso"> 
        <a class="search_icon"><i class="fas fa-search"></i></a> 
        </div> 
      </form>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Mis cursos
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <div class="dropdown-item" href="#">
              <div class="card card border-warning ">
                <div class="card-header">
                  curso
                </div>
                <div class="card-body">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                  </div>
                  <a href="#" class="btn btn-warning btn-sm">Continuar...</a>
                </div>
              </div>
            </div>

          </li>
        </ul>
  
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="{{ asset('img/campana.png') }}" alt="campana-notificaciones" style="width: 30px;height:30px;">
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="">
              notificacion....
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->nombre}}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item ">Mi perfil</a>
          </li>
          <li><a class="dropdown-item" href="{{ url('logout') }}">
              Cerrar sesión
            </a>
            <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </li>
      @endguest
    </ul>
  </div>
  </div>
</nav>

<script src="{{asset('js/dop.js')}}"></script>