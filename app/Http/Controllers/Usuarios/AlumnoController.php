<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Registro;
use App\Models\User;
use Jenssegers\Date\Date;
use Carbon\Carbon;

class AlumnoController extends Controller
{
            /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloalumno',['only'=>'index']);
        Date::setLocale('es');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
            $cursos=Curso::all();
            return view('homeAlumno',compact('cursos'));
    }

    public function verCurso($id){

        $alumno='603d02c54c610000cf004e92';
        $registros=Registro::where('idCurso',$id)->get();
        $date = Carbon::now();
        $pocentajes=92;
        $date = $date->toDateTimeString();
        if($alumno=='603d02c54c610000cf004e92'){
            $sabe=Registro::where('idAlumno',$alumno)->where('idCurso',$id)->get();
        }else{
            Registro::create([
            'porcentaje'=>$pocentajes,
            'registro'=>$date,
            'idAlumno'=>$alumno,
            'idCurso'=>$id,
        ]);
        }

        $uno = Registro::join('cursos','cursos._id', 'registro.idCurso')->where('idCurso',$id)->get();
        $cursos=Curso::all()->where('_id',$id);
        //$tareas=Arr::get($cursos,'curso.tareas');
        return view('layouts.alumno.verCurso',['cursos'=>$cursos,'uno'=>$uno]);
    }
}
