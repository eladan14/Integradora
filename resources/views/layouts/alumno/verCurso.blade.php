@extends('layouts.master')

@section('meta')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@include('layouts.barraAlumno')

@section('contenido')
<a href="{{route('alumno')}}">atras</a>
@foreach($cursos as $t)
<h3>Detalles del curso de {{$t->nombre}}</h3>
@foreach($uno as $un)

<h2>fecha {{$un->registro}}</h2>
    <div class="progress">
       <div class="progress-bar" role="progressbar" style="width: {{$un->porcentaje}}%;" aria-valuenow="{{$un->porcentaje}}" aria-valuemin="0" aria-valuemax="100">{{$un->porcentaje}}%</div>
    </div>
</div>
<br>
<hr>

@endforeach
@endforeach
@endsection