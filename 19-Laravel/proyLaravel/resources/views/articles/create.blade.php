@extends('layouts.app')
@section('title', 'Crear  Articulos')
@section('content') 

<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
	  <h1> <i class="fa fa-plus"> Crear Articulos </i> </h1>
	<hr>
		<a href="{{ url('articles') }}" class="btn btn-warning">
					<i class="fas fa-angle-left"></i> 
					Ir a Articulos
				</a>
				<hr>
				<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Crear</div>
					<div class="card-body"></div>
					<br><br>
	<form action="{{ url('articles') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="container">Titulo:
			</div>
			<div class="col-12">
		<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" class="form-control" value="{{ old('title') }}" placeholder="Titulo">
		@error('title')
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
			<img id="preview" class="img-thumbnail" src="{{ asset('imgs/no-article.png')}}" width="120px">
		</div>
		@error('image')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
	</div>
	<br>
	<div class="container">Contenido:
			</div>
		<div class="col-12">	
		<textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="contenido">{{ old('content') }}</textarea>
		@error('content')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
		</div>
		<div class="container">Usuario:
			</div>
			<div class="col-12">
		<select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
			<option value="">Seleccione Usuario</option>
			@foreach ($users as $user)
				<option value="{{$user->id}}" @if (old('user_id') == $user->id) selected @endif>{{$user->fullname}}</option>
			@endforeach
		</select>
		@error('user_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
		</div>
		<div class="container">Categoria:
			</div>
			<div class="col-12">
		<select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
			<option value="">Seleccione Categoria</option>
			@foreach ($categories as $category)
				<option value="{{$category->id}}" @if (old('category_id') == $category->id) selected @endif>{{$category->name}}</option>
			@endforeach
		</select>
		@error('category_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
		</div>
		<div class="container">Importante:
			</div>
			<div class="col-12">
		<select name="slider" class="form-control @error('slider') is-invalid @enderror">
			<option value="">Seleccione Importante</option>
			<option value="1" @if (old('slider') == 1) selected @endif>Si</option>
			<option value="2" @if (old('slider') == 2) selected @endif>No</option>
		</select>
		@error('slider')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
		</div>
		<div class="container">Precio:
			</div>
			<div class="col-12">
		<input type="number" class="form-control @error('Price') is-invalid @enderror" name="price" class="form-control" value="{{ old('price') }}" placeholder="Precio">
		@error('price')
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