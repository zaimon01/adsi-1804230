@extends('layouts.app')
@section('title', 'Adicionar Artículo')

@section('content')
		<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<h1> <i class="fa fa-plus"></i> Adicionar Artículo</h1>
				<hr>
				<a href="{{ url('myarticles') }}" class="btn btn-warning">
					<i class="fas fa-angle-left"></i> 
					Ir a usuarios
				</a>
				<br><br>
				{{-- @if ($errors->any())
					<ul class="alert alert-danger alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  </button>
						@foreach ($errors->all() as $message)
							<li>{{ $message }}</li>
						@endforeach
					</ul>
				@endif --}}
				<form action="{{ url('editor/articles') }}" method="post" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					<div class="form-group">
						<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Título">
						@error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<button class="btn btn-block btn-custom btn-upload" type="button">
							<i class="fa fa-upload"></i>
							Seleccionar Imagen
						</button>
						<input type="file" name="image" id="photo" class="d-none" accept="image/*">
						<br>
						<div class="text-center @error('image') is-invalid @enderror">
							<img id="preview" class="img-thumbnail" src="{{ asset('imgs/no-photo.png') }}" width="120px">
						</div>
						@error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Cotenido">{{ old('content') }}</textarea>
						@error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
							<option value="">Seleccione Categoría...</option>
							@foreach ($categories as $category)
								<option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
							@endforeach
						</select>
						@error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<select name="slider" class="form-control @error('slider') is-invalid @enderror">
							<option value="">Seleccione Importante...</option>
							<option value="1" @if (old('slider') == 1) selected @endif>Si</option>
							<option value="2" @if (old('slider') == 2) selected @endif>No</option>
						</select>
						@error('slider')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Precio" min="1" max="100">
						@error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-custom">
						<i class="fa fa-save"></i>
						 Guardar 
						</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>
@endsection