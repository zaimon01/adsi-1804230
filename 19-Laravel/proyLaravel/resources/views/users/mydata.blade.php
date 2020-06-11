@extends('layouts.app')
@section('title', 'Mis Datos')
@section('content')
	<div class="container">
		<div class="row">
		<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header"><h1><i class="fa fa-user"></i>Mis datos</h1></div>
					<div class="card-body"></div>
	<form action="{{url('mydata/'.$user->id)}}" method="post" enctype="multipart/form-data">
		@csrf 
		@method('PUT')
		<input type="hidden" name="id" value="{{ $user->id }}">
		<div class="container">Nombre:
			</div>
			<div class="col-12">
		<input type="hidden" name="_method" value="PUT">
		<input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" value="{{ $user->fullname }}">
		@error('fullname')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
		</span>
		@enderror
		<br><br>
	</div>
	<div class="container">Correo Electronico:
			</div>
			<div class="col-12">
		<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" >
		@error('email')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
		</span>
		@enderror
		<br><br>
	</div>
		<div class="container">
			Telefono:
		</div>
		<div class="col-12">
		<input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}">
		@error('phone')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
		</span>
		@enderror
		<br><br>
	</div>
	<div class="container">Fecha de Nacimiento:
			</div>
			<div class="col-12">
		<input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ $user->birthdate }}">
		@error('birthdate')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
		</span>
		@enderror
		<br><br>
	</div>
	<div class="container">
			Genero:
		</div>
		<div class="col-12">
		<select name="gender" class="form-control @error('gender') is-invalid @enderror">
			<option value="">Seleccion genero...</option>
			<option value="Male" @if (old('gender',$user->gender) == 'Male') selected @endif>Hombre</option>
			<option value="Female" @if (old('gender',$user->gender) == 'Female') selected @endif>Mujer</option>
		</select>
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
			<img id="preview" class="img-thumbnail" src="{{ asset($user->photo)}}" width="120px">
		</div>
		@error('photo')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
	</div>
	<div class="container">Direccion:
			</div>
			<div class="col-12">
		<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $user->address }}">
		@error('address')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
		</span>
		@enderror
		<br><br>
		<div class="container">
		<button type="submit" class="btn btn-success"><i class="fa fa-pen"></i> Actualizar </button>
		</div>
		<br>
	</form>
	</div>
		</div>
	</div>
	@endsection
