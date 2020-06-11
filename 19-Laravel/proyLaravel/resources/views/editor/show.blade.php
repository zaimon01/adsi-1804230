@extends('layouts.app')
@section('title', 'Consultar Artículo')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<h1> <i class="fa fa-search"></i> Consultar Artículo</h1>
				<hr>
				<a href="{{ url('myarticles') }}" class="btn btn-warning">
					<i class="fas fa-angle-left"></i> 
					Ir a usuarios
				</a>
				<br><br>
				<table class="table table-striped">
					<tr>
						<td colspan="2" class="text-center">
							<img src="{{ asset($article->image) }}" class="img-thumbnail" width="140px">
						</td>
					</tr>
					<tr>
						<th>Título:</th>
						<td>{{ $article->title }}</td>
					</tr>
					<tr>
						<th>Contenido:</th>
						<td>{{ $article->content }}</td>
					</tr>
					<tr>
						<th>Categoría:</th>
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
						<th>Precio:</th>
						<td><i class="fas fa-dollar-sign"></i> {{ $article->price }}</td>
					</tr>
				</table>

			</div>
		</div>
	</div>
@endsection