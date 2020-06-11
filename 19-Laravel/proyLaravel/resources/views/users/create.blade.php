@extends('layouts.app')
@section('title', 'Crear Usuarios')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
	  <h1> <i class="fa fa-plus"> Crear Usuario </i> </h1>
	<hr>
		<a href="{{ url('users') }}" class="btn btn-warning">
					<i class="fas fa-angle-left"></i> 
					Ir a usuarios
				</a>
				<hr>
				<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Crear</div>
					<div class="card-body"></div>
					<br><br>
	<form action="{{ url('users') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="container">Nombre:
			</div>
			<div class="col-12">
		<input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" class="form-control" value="{{ old('fullname') }}" placeholder="Nombre Completo">
		@error('fullname')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
		</div>
		<div class="container">Correo Electronico:
		</div>
		<div class="col-12">	
		<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"0placeholder="Correo Electrónico">
		@error('email')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
		</div>
		<div class="container">Telefono:
		</div>
		<div class="col-12">
		<input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Teléfono">
		@error('phone')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
	</div>
	<div class="container">
		Fecha de Nacimiento:
	</div>
	<div class="col-12">
		<input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ old('birthdate') }}" placeholder="Fecha de nacimiento">
		@error('birthdate')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
	</div>
		<div class="container">
			Genero:
		</div>
		<div class="col-12">
		<select name="gender" class="form-control @error('gender') is-invalid @enderror">
			<option value="">Seleccion genero...</option>
			<option value="Male" @if (old('gender') == 'Male') selected @endif>Hombre</option>
			<option value="Female" @if (old('gender') == 'Female') selected @endif>Mujer</option>
		</select>
		@error('gender')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
	</div>
	<div class="col-12">
		<button class="btn btn-block btn-custom btn-upload" type="button">
			<i class="fa fa-upload"></i>
			Seleccionar Foto
		</button>
		<input type="file" name="photo" id="photo" class="d-none" accept="image/*">
		<br>
		<div class="text-center @error('photo') is-invalid @enderror">
			<img id="preview" class="img-thumbnail" src="{{ asset('imgs/no-photo.png')}}" width="120px">
		</div>
		@error('photo')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
	</div>
	<div class="container">
		Direccion:
	</div>
	<div class="col-12">
		<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Direccion">
		@error('address')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
	</div>
	<div class="container">
		Contraseña:
	</div>
	<div class="col-12">
		<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña">
		@error('password')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
	</div>
	<div class="container">
		Confirmar Contraseña:
	</div>
	<div class="col-12">
		<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  placeholder="Confirmar Contraseña">
		@error('password_confirmation')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
	</div>
	<div class="container">
		<button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Guardar </button>
	</div>
	</form>
	</div>
		</div>
	</div>
@endsection
    <script src="{{ asset('js/app.js') }}" defer></script>

		<!--<input type="text" name="gender" value="{{ old('gender') }}" placeholder="Genero">
