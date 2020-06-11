@extends('layouts.app')
@section('title', 'Lista de categorias')
@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1> <i class="fa fa-layer-group"> Lista de Categorias </i> </h1>
	<hr>
		<a href="{{ url('categories/create') }}" class="btn btn-custom">
					<i class="fa fa-plus"></i> 
					Adicionar Categorias
				</a>
				<form action="{{ url('import/excel/categories') }}" method="post" enctype="multipart/form-data" style="display: inline-block;">
					@csrf
					<input type="file" class="d-none" id="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
					<button type="button" class="btn btn-custom btn-excel">
						<i class="fa fa-file-excel"></i>
						Importar Categorias
					</button>
				</form>
				|
				<a href="{{ url('generate/pdf/categories') }}" class="btn btn-custom">
					<i class="fa fa-file-pdf"></i> 
					Reporte PDF
				</a>
				<a href="{{ url('generate/excel/categories') }}" class="btn btn-custom">
					<i class="fa fa-file-excel"></i> 
					Reporte EXCEL
				</a>
				@csrf
				<input type="hidden" id="tmodel" value="categories">
				<input type="search" id="qsearch" class="form-search" autocomplete="false" placeholder="Buscar..." autofocus="off">
				<br>
				<br>
	<div class="loader d-none text-center">
		<img src="{{asset('imgs/loader.gif')}}" width="80px">
	</div>
				<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Imagen</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody id="content">
			@foreach ($categories as $category)
				<tr>
					<td>{{ $category->name }}</td>
					<td>
						<img src="{{ asset($category->image) }}" width="100px">
					</td>
					<td>
						<a href="{{ url('categories/'.$category->id) }}" class="btn btn-sm btn-custom">
							<i class="fa fa-search"></i>
						</a>
						<a href="{{ url('categories/'.$category->id.'/edit/') }}" class="btn btn-sm btn-custom">
										<i class="fa fa-pen"></i>
									</a>
						<form action="{{url('categories/'.$category->id)}}" method="post" style="display:inline-block;">
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
				{{$categories->links()}}
			</div>
		</div>	
	</div>
</div>
@endsection
