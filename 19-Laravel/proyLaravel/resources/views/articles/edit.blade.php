@extends('layouts.app')
@section('title', 'Editar Articulo')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
			<h1 class="fa fa-pen">Actualizar Articulo</h1>
				<hr>
				<a href="{{ url('articles') }}" class="btn btn-warning">
					<i class="fas fa-angle-left"></i>
					Ir a articulo
				</a>
				<hr>
				<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Actualizar</div>
					<div class="card-body"></div> 
	<form action="{{url('articles/'.$article->id)}}" method="post" enctype="multipart/form-data">
		@csrf 
		@method('PUT')
		<input type="hidden" name="id" value="{{ $article->id }}">
	<div class="container">Titulo:
			</div>
			<div class="col-12">
		<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('name', $article->title) }}">
		@error('title')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
		</span>
		@enderror
		<br><br>
		<div class="col-12">
		<button class="btn btn-block btn-custom btn-upload" type="button">
			<i class="fa fa-upload"></i>
			Seleccionar Foto
		</button>
		<input type="file" name="image" id="image" class="d-none" accept="image/*">
		<br>
		<div class="text-center @error('image') is-invalid @enderror">
			<img id="preview" class="img-thumbnail" src="{{ asset($article->image)}}" width="120px">
		</div>
		@error('image')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
	</div>
	<br><br>
	<div class="container">Contenido:
			</div>
		<div class="col-12">	
		<textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="contenido">{{ old('name', $article->content) }}</textarea>
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
			<option value="">Seleccione...</option>
			@foreach ($users as $user)
				<option value="{{$user->id}}" @if (old('user_id', $article->user_id) == $user->id) selected @endif>{{$user->fullname}}</option>
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
			<option value="">Seleccione...</option>
			@foreach ($categories as $category)
				<option value="{{$category->id}}" @if (old('category_id', $article->category_id) == $category->id) selected @endif>{{$category->name}}</option>
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
			<option value="1" @if (old('slider', $article->slider) == 1) selected @endif>Si</option>
			<option value="2" @if (old('slider', $article->slider) == 2) selected @endif>No</option>
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
		<input type="number" class="form-control @error('Price') is-invalid @enderror" name="price" class="form-control" value="{{ old('price', $article->price) }}" placeholder="Precio">
		@error('price')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
		<br><br>
		</div>
		<div class="container">
		<button type="submit" class="btn btn-success"><i class="fa fa-pen"></i> Actualizar </button>
		</div>
		<br>
	</form>
	</div>
		</div>
	</div>
	@endsection