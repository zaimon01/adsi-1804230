@extends('layouts.app')
@section('title', 'Editar categoria')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
			<h1 class="fa fa-pen">Actualizar  Categorias</h1>
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
					<div class="card-header">Actualizar</div>
					<div class="card-body"></div> 
	<form action="{{url('categories/'.$category->id)}}" method="post" enctype="multipart/form-data">
		@csrf 
		@method('PUT')
		<input type="hidden" name="id" value="{{ $category->id }}">
	<div class="container">Nombre:
			</div>
			<div class="col-12">
		<input type="hidden" name="_method" value="PUT">
		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}">
		@error('name')
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
			<img id="preview" class="img-thumbnail" src="{{ asset($category->image)}}" width="120px">
		</div>
		@error('image')
		<span class="invalid-feedback" role="alert">
			<strong>{{$message}}</strong>
			@enderror
		</span>
	</div>
	<br><br>
	<div class="container">Descripcion:
			</div>
			<div class="col-12">
		<input type="hidden" name="_method" value="PUT">
		<input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $category->description }}">
		@error('description')
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