@extends('layouts.master')

@section('meta')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@include('layouts.barraAlumno')

@section('contenido')
    <p>Mi contenido Alumno</p>
  
    <div class="btn-group dropend">
      <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Dropright
      </button>
      <ul class="dropdown-menu"> 
        <li >
          <a href="#" class="dropdown-item">periodo1</a>
        </li>
        <li >
          <a href="#" class="dropdown-item">periodo2</a>
        </li>
      </ul>
    </div>
       
 
    <div class="row">
    @foreach($cursos as $curso)  
      <div class="col-md-3 col-sm-6 m-4">
      <img class="card-img-top" src="img/curso.jpeg" alt="Card image cap">
        <div class="card card-block p-4" >
          <h5 class="card-title mt-3 mb-3">{{$curso->nombre}}</h5>
          <p class="card-text lenguage">{{$curso->inicio}}</p>
          <p class="card-text">{{$curso->fin}}</p>
          <form action="" method="post">
            <a class="btn btn-warning btn-sm" href="{{route('verCurso',$curso->_id,$curso->)}}">Ver curso..</a>
          </form>
        </div>
      </div>
      @endforeach   
    </div>

@endsection

@section('script')
<script>
  const searchFocus = document.getElementById('search-focus');
const keys = [
  { keyCode: 'AltLeft', isTriggered: false },
  { keyCode: 'ControlLeft', isTriggered: false },
];

window.addEventListener('keydown', (e) => {
  keys.forEach((obj) => {
    if (obj.keyCode === e.code) {
      obj.isTriggered = true;
    }
  });

  const shortcutTriggered = keys.filter((obj) => obj.isTriggered).length === keys.length;

  if (shortcutTriggered) {
    searchFocus.focus();
  }
});

window.addEventListener('keyup', (e) => {
  keys.forEach((obj) => {
    if (obj.keyCode === e.code) {
      obj.isTriggered = false;
    }
  });
});
</script>
@endsection