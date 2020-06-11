@extends('layouts.app')
@section('title', 'Crear  categorias')
@section('content')

<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
	  <h1> <i class="fa fa-plus"> Crear Categorias </i> </h1>
	<hr>
		<a href="{{ url('categories') }}" class="btn btn-warning">
					<i class="fas fa-angle-left"></i> 
					Ir a categorias
				</a>
				<hr>
				<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Crear</div>
					<div class="card-body"></div>
					<br><br>
	<form action="{{ url('categories') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="container">Nombre de la categoria:
			</div>
			<div class="col-12">
		<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nombre de la categoria">
		@error('name')
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
		<input type="file" name="image" id="image" class="d-none" accept="image/*">
		<br>
		<div class="text-center @error('image') is-invalid @enderror">
			<img id="preview" class="img-thumbnail" src="{{ asset('imgs/no-category.png')}}" width="120px">
		</div>
		@error('image')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
	</div>
	<br>
		<div class="col-12">	
		<textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Descripcion">{{ old('description') }}</textarea>
		@error('description')
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