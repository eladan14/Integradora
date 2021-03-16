<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Registro extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'registro';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'porcentaje',
        'registro',
        'idAlumno',
        'idCurso',
    ];
}