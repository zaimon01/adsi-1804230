@extends('layouts.app')
@section('title', 'Lista de Articulos')
@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1> <i class="fa fa-list-alt"> Lista de Articulos </i> </h1>
	<hr>
		<a href="{{ url('articles/create') }}" class="btn btn-custom">
					<i class="fa fa-plus"></i> 
					Adicionar Articulos
				</a>
				<form action="{{ url('import/excel/articles') }}" method="post" enctype="multipart/form-data" style="display: inline-block;">
					@csrf
					<input type="file" class="d-none" id="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
					<button type="button" class="btn btn-custom btn-excel">
						<i class="fa fa-file-excel"></i>
						Importar Articulos
					</button>
				</form>
				|
				<a href="{{ url('generate/pdf/articles') }}" class="btn btn-custom">
					<i class="fa fa-file-pdf"></i> 
					Reporte PDF
				</a>
				<a href="{{ url('generate/excel/articles') }}" class="btn btn-custom">
					<i class="fa fa-file-excel"></i> 
					Reporte EXCEL
				</a>
				@csrf
				<input type="hidden" id="tmodel" value="articles">				
				<input type="search" id="qsearch" class="form-search" autocomplete="false" placeholder="Buscar..." autofocus="off">
				<br>
				<br>
	<div class="loader d-none text-center">
		<img src="{{asset('imgs/loader.gif')}}" width="80px">
	</div>
				<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Titulo</th>
				<th>Imagen</th>
				<th class="d-none d-sm-table-cell">Categoria</th>
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
						<img src="{{ asset($article->category->image) }}" width="100px">
					</td>
					<td>
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
						<a href="{{ url('articles/'.$article->id) }}" class="btn btn-sm btn-custom">
							<i class="fa fa-search"></i>
						</a>
						<a href="{{ url('articles/'.$article->id.'/edit/') }}" class="btn btn-sm btn-custom">
										<i class="fa fa-pen"></i>
									</a>
						<form action="{{url('articles/'.$article->id)}}" method="post" style="display:inline-block;">
							@csrf
							@method('delete')
							<button type="button" class="btn btn-sm btn-custom-danger btn-delete">
								<i class="fa fa-trash"></i>
							</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
				{{$articles->links()}}
			</div>
		</div>	
	</div>
</div>
@endsection
