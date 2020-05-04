@extends('admin.layouts.app')

@section('page', 'Crear un nuevo rol')

@section('content')
	
<form class="was-validated" action="{{ route('user.store') }}" method="POST">
	@csrf
	<input type="hidden" name="_method" value="PATCH">

	<div class="form-row">
		<div class="col-sm-6 mb-3">
			<label for="UserName">Nombre</label>
			<input type="text" name="name" class="form-control is-valid" id="UserName" placeholder="Nombre del usuario" required>
			<div class="invalid-feedback">¡Debes agregar un nombre!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="UserEmail">Correo electrónico</label>
			<input type="email" name="email" class="form-control is-valid" id="UserEmail" placeholder="hola@tudominio.com" required>
			<div class="invalid-feedback">¡Debes agregar un correo electrónico!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="UserPassword">Contraseña</label>
			<input type="password" name="password" class="form-control is-valid" id="UserPassword" required>
			<div class="invalid-feedback">¡Debes agregar un email!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="UserImage">Imagen (por defecto)</label>
			<input type="image" name="image" class="form-control" id="UserImage" value="user.svg" disabled>
		</div>
		<div class="col-sm-6 mb-3">
			<label class="ml-3">Ten cuidado con los permisos que otorgas</label>
				<div class="form-group">
					<ul>
						<div class="col-auto my-1">
							<div class="custom-control custom-checkbox mr-sm-2">
								@foreach($roles as $role)
									<li>
										<input type="checkbox" name="roles[]" class="custom-control-input" id="{{ $role->id }}" value="{{ $role->id }}">
										<label class="custom-control-label" for="{{ $role->id }}">{{ $role->name }}</label>
									</li>
								@endforeach
							</div>
						</div>
					</ul>
				</div>
		</div>
	</div>

	<button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>
	
</form>

@endsection