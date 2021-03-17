<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: Modelo para consultar los cursos registrados
* Autor: Oscar David Castañeda Rivera
* Fecha: 16/03/2021
*/
class Curso extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'cursos';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','inicio','fin',
    ];
}
