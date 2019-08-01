@extends('softwareTemplate')

@section('content')
    
	@if(session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		@endif


		<table class="table">
			<thead>
				<tr>
					<th>id</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Tipo de Documento</th>
					<th>Número Documento</th>
					<th>Rol</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->nombres }}  {{ $user->apellidos }}</td>
					<td>{{ $user->direccion }}</td>
					<td>{{ $user->telefono }}</td>
					<td>{{ $tiposDocumentoArray[$user->tipo_documento] }}</td>
					<td>{{ $user->numero_documento }}</td>					
					<td>{{ $rolesArray[$user->rol] }}</td>
					<td>
					  <a class="btn btn-warning" href="/users/edit/{{$user->id}}" > Editar </a>  
					  <button class="btn btn-danger" onclick="confirmDelete( {{$user->id}} ) "  > Eliminar </button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<div>

			<form action=" {{ ( isset($userE) ?  '/users/updateUser':'/users/createUser' )  }} " method="post">
				{{ csrf_field() }}

				@if(isset($userE))
				<input type="hidden"  name="id" value={{$userE->id}} >
				@endif

				<div class="form-group">
					<label>Usuario</label>
					<input name="a" type="text"  
						@if(isset($userE))
							value = '{{$userE->username}}' 
						@endif
					required />
				</div>
				<div class="form-group">
					<label>Contraseña</label>
					<input name="cualquiercosa" type="password" required />
				</div>
				<div class="form-group">
					<label>Nombres</label>
					<input name="nombres" type="text" 
						@if(isset($userE))
							value="{{$userE->nombres}}"
						@endif
					 required />
				</div>
				<div class="form-group">
					<label>Apellidos</label>
					<input name="apellidos" type="text" 
						@if(isset($userE))
							value = "{{$userE->apellidos}}"
						@endif
					 required />
				</div>
				<div class="form-group">
					<label>Dirección</label>
					<input name="direccion" type="text" 
						@if(isset($userE))
							value=" {{$userE->direccion}}"
						@endif
					 required />
				</div>
				<div class="form-group">
					<label>Teléfono</label>
					<input name="telefono" type="number" 
						
						@if(isset($userE))
							value="{{$userE->telefono}}"
						@endif

					 required />
				</div>
				<div class="form-group">
					<label>Tipo de documento</label>
					<select name="cualquiercosa2"  required >
						<option value="" >Selecciona</option>
						@foreach( $tiposDocumento as $pepito )
							<option value={{$pepito->id}} 
								@if(isset($userE))
									{{ ( $pepito->id ===  $userE->tipo_documento ? "selected":null )   }}
								@endif
								>{{ $pepito->nombre }}
							</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Número de documento</label>
					<input name="numero_documento" type="number"
						@if(isset($userE))
							value="{{$userE->numero_documento}}"
						@endif
					 required />
				</div>
				<div class="form-group">
					<label>Rol</label>
					<select name="rol" required>
						<option value="" >Selecciona</option>
						@foreach( $roles as $rol )
							<option value="{{ $rol->id }}" 
								@if(isset($userE))
									{{ ( $rol->id ===  $userE->rol ? "selected":null )   }}
								@endif
								>{{ $rol->nombre }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					@if(isset($userE))
						<input type="submit" value="Actualizar" class="btn btn-success" >
					@else
						<input type="submit" value="Guardar" class="btn btn-success" >
					@endif
				</div>
			</form>

		</div>

	
	<script>
		
		function confirmDelete(id)
		{
			if(window.confirm("¿Esta seguro de eliminar?"))
			{
				window.location = "/users/delete/"+id;
			}
		}

	</script>



@endsection
		
		