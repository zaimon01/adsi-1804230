@extends('layouts.app')
@section('title', 'Articulo')
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<h1 class="fa fa-search">Articulo</h1>
				<hr>
				<a href="{{ url('articles') }}" class="btn btn-warning">
					<i class="fas fa-angle-left"></i> 
					Ir a articulos
				</a>
				<hr>
				<table class="table table-striped">
					<tr>
						<td colspan="2" class="text-center">
							<img src="{{ asset($article->image) }}" class="img-thumbnail" width="120px">
						</td>
					</tr>
					<tr>
						<th>Titulo:</th>
						<td>{{ $article->title }}</td>
					</tr>
					<tr>
						<th>Contenido:</th>
						<td>{{ $article->content }}</td>
					</tr>
					<tr>
						<th>Categoria:</th>
						<td>
							<img src="{{ asset($article->category->image) }}" class="img-thumbnail" width="100px">
						</td>
					</tr>
					<tr>
						<th>Usuario:</th>
						<td>{{ $article->user->fullname }}</td>
					</tr>
					<tr>
						<th>Importante:</th>
						<td class="d-none d-sm-table-cell">
							@if ($article->slider == 1)
								<button class="btn btn-success">
									<i class="fas fa-check-circle"></i>
								</button>
								@else
								<button class="btn btn-dark">
									<i class="fas fa-times-circle"></i>
								</button>
							@endif
						</td>
					</tr>
					<tr>
						<th>Precio: </th>
						<td>${{ $article->price }}</td>
					</tr>
					</table>
				</div>
			</div>
		</div>	
	@endsection
	