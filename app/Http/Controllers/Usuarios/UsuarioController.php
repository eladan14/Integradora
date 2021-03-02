<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.usuarios.unirse', ['usuario' => new User()]);
        $user = User::where('confirmed', true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //Recibir las contraseñas del form y almacenarlas en una variable
        $passw = $request['password'];

        $confPassw = $request['password_confirmation'];
        //Recibir el email, para validar la existencia
        $getEmail = $request['email'];

        //if para ver si el correo existe
        if (User::where('email', '=', $getEmail)->exists()) {
            return back()->with('error', 'El correo electronico ya existe');
        } else {
            //Comparar las contraseñas
            if ($passw == $confPassw) { //Si son iguales se procede a establecer valores, dentro de la creación y encriptar las contraseñas
                //Usuario::create($request->all());
                //maximo de oportunidaddes <---
                $request['confirmation_code'] = Str::random(25);
                User::create([
                    'nombre' => $request['nombre'],
                    'appPaterno' => $request['appPaterno'],
                    'appMaterno' => $request['appMaterno'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'nivelEducativo' => $request['nivelEducativo'],
                    'institucion' => $request['institucion'],
                    'rol' => "estudiante",
                    'confirmation_code' => $request['confirmation_code'],
                    'confirmed' => false
                ]);

                $confirmation_code = $request['confirmation_code'];

                //Enviar email
                Mail::send('emails.confirmation_code', ['confirmation_code' => $confirmation_code], function ($message) use ($request) {
                    $message->to($request['email'], $request['nombre'])->subject('Por favor confirma tu correo');
                });


                return back()->with('success', 'Te has registrado correctamente, confirma tu correo electronico. Para poder iniciar sesion.');
            } else { //Si no son iguales se retorna un mensaje
                return back()->with('error', 'Las contraseñas no son iguales');
            }
        }
    }

    public function login(Request $request)
    {

        //Obtener email y contraseñas
        $getEmail = $request['email'];
        $getPassword = $request['password'];
        //Buscar el usuario con el email
        $usuario = User::where('email', '=', $getEmail)->first();

        if ($usuario) {
            //Comprobar la contraseña y la contaseña encriptada
            if($usuario->confirmed == true){// validar que el correo electronico sea confirmado.
                
                if (Hash::check($getPassword, $usuario->password)) {
                    Auth::login($usuario);//Se abre la sesion
                    if ($usuario->rol == "estudiante") {
                        return redirect()->intended('alumno');
                    } else if ($usuario->rol == "docente") {
                        return redirect()->intended('docente');
                    } else if ($usuario->rol == "administrador") {
                        return redirect()->intended('administrador');
                    } else {
                        return redirect('/');
                        return back()->with('error', 'Ocurrio un error consulta al admin.');
                    }
                }else{
                    return back()->with('error', 'Contraseña incorrecta.');
                }
            } else {
                
                return back()->with('error', 'Porfavor, confirma tu correo electronico, para poder iniciar sesión.');
            }
        }else{
            return back()->with('error', 'Esta cuenta no existe, porfavor registrate.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); //Se cierra la sesión
        $request->session()->invalidate(); //Se invalida la sesión
        $request->session()->regenerateToken(); //Se regenera el token, para una nueva sesion
        return redirect('/');//Se redirecciona a la raíz de la pagina.
    }

    public function verify($code)
    {
        $user = User::where('confirmation_code', $code)->first();

        if (!$user)
            return redirect('/');

        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();

        return redirect('/')->with('success', 'Has confirmado correctamente tu correo!');
    }

    public function update_pass(){

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        //
    }
}
