@forelse ($articles as $article)
		<tr>
			<td>{{ $article->title }}</td>
			<td>
				<img src="{{ asset($article->image) }}" width="80px">
			</td>
			<td class="d-none d-sm-table-cell">
				<img src="{{ asset($article->category->image) }}" width="60px">
			</td>
			<td>
				<a href="{{ url('articles/'.$article->id) }}" class="btn btn-sm btn-custom">
					<i class="fa fa-search"></i>
				</a>
				<a href="{{ url('articles/'.$article->id.'/edit/') }}" class="btn btn-sm btn-custom">
					<i class="fa fa-pen"></i>
				</a>
				<form action="{{ url('articles/'.$article->id) }}" method="post" style="display: inline-block;">
					@csrf
					@method('delete')
					<button type="button" class="btn btn-sm btn-custom-danger btn-delete">
						<i class=" fa fa-trash"></i>
					</button>
				</form>
			</td>
		</tr>
@empty
	<tr>
		<td colspan="4">
			No hay Artículos con ese titulo!
		</td>
	</tr>
@endforelse