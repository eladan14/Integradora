<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: Modelo para consultar los registros de visita al curso seleccionado
* Autor: Oscar David Castañeda Rivera
* Fecha: 16/03/2021
*/

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
