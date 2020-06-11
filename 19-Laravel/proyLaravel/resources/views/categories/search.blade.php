@forelse ($categories as $category)
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
@empty
	<tr>
		<td colspan="4">
			No hay Categorias con ese nombre!
		</td>
	</tr>
@endforelse