<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; 

class UserController extends Controller
{
    public function create(Request $request)
    {
    	echo "aqui vamos a crear un usuario";
    	print_r($_REQUEST);

    	$user = new User();
    	$user->nombres = $request->nombres;
    	$user->apellidos = $request->apellidos;
    	$user->direccion = $request->direccion;
    	$user->telefono = $request->telefono;
    	$user->tipo_documento = $request->tipo_documento;
    	$user->numero_documento = $request->numero_documento;
    	$user->rol = $request->rol;
    	$user->username = $request->username;
    	$user->password = $request->password;
    	$user->save();
    	echo "usuario creado";
    }
}
