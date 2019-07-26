<html>
	<head>
		<title>Usuarios</title>
		<link rel="Stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
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
					<td>{{ $user->tipo_documento }}</td>
					<td>{{ $user->numero_documento }}</td>					
					<td>{{ $rolesArray[$user->rol] }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<div>

			<form action="/users/createUser" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Usuario</label>
					<input name="username" type="text" required />
				</div>
				<div class="form-group">
					<label>Contraseña</label>
					<input name="password" type="password" required />
				</div>
				<div class="form-group">
					<label>Nombres</label>
					<input name="nombres" type="text" required />
				</div>
				<div class="form-group">
					<label>Apellidos</label>
					<input name="apellidos" type="text" required />
				</div>
				<div class="form-group">
					<label>Dirección</label>
					<input name="direccion" type="text" required />
				</div>
				<div class="form-group">
					<label>Teléfono</label>
					<input name="telefono" type="number" required />
				</div>
				<div class="form-group">
					<label>Tipo de documento</label>
					<input name="tipo_documento" type="number" required />
				</div>
				<div class="form-group">
					<label>Número de documento</label>
					<input name="numero_documento" type="number" required />
				</div>
				<div class="form-group">
					<label>Rol</label>
					<select name="rol" required>
						<option value="" >Selecciona</option>
						@foreach( $roles as $rol )
							<option value="{{ $rol->id }}" >{{ $rol->nombre }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<input type="submit" value="Guardar" class="btn btn-success" >
				</div>
			</form>

		</div>

	</body>
</html>
