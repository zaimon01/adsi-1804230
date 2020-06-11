<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de todos los usuarios</title>
	<style>
		table {
			border: 1px solid #999;
			border-collapse: collapse;
		}
		table th, table td {
			font-family: sans-serif;
			font-size: 12px;
			border: 1px solid #999;
			padding: 10px; 
		}
		table th {
			background-color: #666;
			color: #fff;
		}
	</style>
</head>
<body>
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
</body>
</html>