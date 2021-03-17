<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *Autor: Brayan Mares Bueno
     * Jorge Perez Magallon
     *Descripción:Modelo para guardar los usuarios.
     *Jorge: Modelo que se utilizo para iniciar sesión.
     *Funcionalidad: Registrar participante.
     *Fecha: 17-03-2021
     * @var array
     */
    protected $collection = 'usuarios';
    protected $primaryKey = '_id';
    protected $fillable = [
        '_id',
        'nombre',
        'appPaterno',
        'appMaterno',
        'email',
        'password',
        'nivelEducativo',
        'institucion',
        'rol',
        'confirmed',
        'confirmation_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
