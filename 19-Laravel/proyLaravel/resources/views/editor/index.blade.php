@extends('layouts.app')
@section('title', 'Mis Artículos')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1> <i class="fa fa-layer-group"></i> Mis Artículos</h1>
				<hr>
				<a href="{{ url('editor/articles/create') }}" class="btn btn-custom">
					<i class="fa fa-plus"></i> 
					Adicionar Artículo
				</a>				
				{{-- @if (session('message'))
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
					<br>
				@endif --}}
				<br><br>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Título</th>
							<th>Imagen</th>
							<th class="d-none d-sm-table-cell">Categoría</th>
							<th class="d-none d-sm-table-cell">Importante</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody id="content">
						@foreach ($articles as $article)
							<tr>
								<td>{{ $article->title }}</td>
								<td>
									<img src="{{ asset($article->image) }}" width="80px">
								</td>
								<td class="d-none d-sm-table-cell">
									<img src="{{ asset($article->category->image) }}" width="60px">
								</td>
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
								<td>
									<a href="{{ url('editor/articles/'.$article->id) }}" class="btn btn-sm btn-custom">
										<i class="fa fa-search"></i>
									</a>
									<a href="{{ url('editor/articles/'.$article->id.'/edit/') }}" class="btn btn-sm btn-custom">
										<i class="fa fa-pen"></i>
									</a>
									<form action="{{ url('editor/articles/'.$article->id) }}" method="post" style="display: inline-block;">
										@csrf
										@method('delete')
										<button type="button" class="btn btn-sm btn-custom-danger btn-delete">
											<i class=" fa fa-trash"></i>
										</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
					{{ $articles->links() }}
			</div>
		</div>
	</div>
@endsection