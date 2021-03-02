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
     *
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



/**<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent implements Authenticatable
{

    use AuthenticatableTrait;
    use Notifiable;
    
    protected $connection = 'mongodb';
    protected $collection = 'usuarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     
    protected $primaryKey = '_id';
    protected $fillable = [
        '_id',
        'nombre',
        'appPaterno',
        'appMaterno',
        'email',
        'password',
        'confPassw',
        'nivelEducativo',
        'institucion',
        'rol',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}**/
