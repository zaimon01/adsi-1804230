@extends('layouts.app')
@section('title', 'Modificar Artículo')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<h1> <i class="fa fa-pen"></i> Modificar Artículo</h1>
				<hr>
				<a href="{{ url('myarticles') }}" class="btn btn-warning">
					<i class="fas fa-angle-left"></i> 
					Ir a usuarios
				</a>
				<br><br>
				<form action="{{ url('editor/articles/'.$article->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<input type="hidden" name="id" value="{{ $article->id }}">
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					<div class="form-group">
						<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('name', $article->title) }}" placeholder="Título">
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
							<img id="preview" class="img-thumbnail" src="{{ asset($article->image) }}" width="120px">
						</div>
						@error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Contenido">{{ old('content', $article->content) }}</textarea>
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
								<option value="{{ $category->id }}" @if (old('category_id', $article->category_id) == $category->id) selected @endif>{{ $category->name }}</option>
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
							<option value="1" @if (old('slider', $article->slider) == 1) selected @endif>Si</option>
							<option value="2" @if (old('slider', $article->slider) == 2) selected @endif>No</option>
						</select>
						@error('slider')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $article->price) }}" placeholder="Precio" min="1" max="100">
						@error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-custom"> 
						<i class="fa fa-pen"></i>
						Modificar </button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection