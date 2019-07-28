<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Roles;

use App\TiposDocumento; 

class UserController extends Controller
{

	public function index()
	{
		$rolesArray = Roles::pluck("nombre","id");

		$roles = Roles::All();

		$tiposDocumentoArray = TiposDocumento::pluck("nombre","id");

		$tiposDocumento = TiposDocumento::All();

		$users = User::All();

		//print_r($rolesArray);

		//print_r($roles);		
		//exit;

		return view("users",compact('roles','users','rolesArray','tiposDocumentoArray','tiposDocumento'));
	}

    public function create(Request $request)
    {
    	echo "aqui vamos a crear un usuario";
    	print_r($_REQUEST);

    	$user = new User();
    	$user->nombres = $request->nombres;
    	$user->apellidos = $request->apellidos;
    	$user->direccion = $request->direccion;
    	$user->telefono = $request->telefono;
    	$user->tipo_documento = $request->cualquiercosa2;
    	$user->numero_documento = $request->numero_documento;
    	$user->rol = $request->rol;
    	$user->username = $request->a;
    	$user->password = $request->cualquiercosa;
    	$user->save();

    	return redirect('/users')->with('status', "¡usuario creado!");
    	
    }

    public function edit($id){

    	$userE = User::find($id);

    	$rolesArray = Roles::pluck("nombre","id");

		$roles = Roles::All();

		$tiposDocumentoArray = TiposDocumento::pluck("nombre","id");

		$tiposDocumento = TiposDocumento::All();

		$users = User::All();

    	return view("users",compact('roles','users','rolesArray','tiposDocumentoArray','tiposDocumento','userE'));

    }

    public function update(Request $request)
    {
    	$user = User::find($request->id);
    	$user->nombres = $request->nombres;
    	$user->apellidos = $request->apellidos;
    	$user->direccion = $request->direccion;
    	$user->telefono = $request->telefono;
    	$user->tipo_documento = $request->cualquiercosa2;
    	$user->numero_documento = $request->numero_documento;
    	$user->rol = $request->rol;
    	$user->username = $request->a;
    	$user->password = $request->cualquiercosa;
    	$user->save();

    	return redirect('/users')->with('status', "¡usuario actualizado!");	
    }

    public function delete($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect('/users')->with('status', "¡usuario eliminado!");	
    }

}
