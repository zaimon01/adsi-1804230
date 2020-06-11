@extends('layouts.app')
@section('title', 'Categoria')
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<h1 class="fa fa-search">Categoria</h1>
				<hr>
				<a href="{{ url('categories') }}" class="btn btn-warning">
					<i class="fas fa-angle-left"></i> 
					Ir a categorias
				</a>
				<hr>
				<table class="table table-striped">
					<tr>
						<td colspan="2" class="text-center">
							<img src="{{ asset($category->image) }}" class="img-thumbnail" width="120px">
						</td>
					</tr>
					<tr>
						<th>Nombre de la categoria:</th>
						<td>{{ $category->name }}</td>
					</tr>
					<tr>
						<th>Descripcion:</th>
						<td>{{ $category->description }}</td>
					</tr>
					</table>
				</div>
			</div>
		</div>	
	@endsection
	