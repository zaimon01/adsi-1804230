<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Titulo</th>
				<th>Imagen</th>
				<th>Contenido</th>
				<th>Usuario</th>
				<th>Categoria</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($articles as $article)
				<tr>
					<td>{{ $article->id}}</td>
					<td>{{ $article->title}}</td>
					<td>
						<img src="{{public_path().'/'.$article->image}}" width="40px">
					</td>
					<td>{{ $article->content}}</td>
					<td>{{ $article->user->fullname}}</td>
					<td>{{ $article->category->name}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>