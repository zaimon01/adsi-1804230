<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre Completo</th>
				<th>Correo Electronico</th>
				<th>Teléfono</th>
				<th>Fecha de Nacimiento</th>
				<th>Genero</th>
				<th>Direccion</th>
				<th>Rol</th>
				<th>Foto</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->id}}</td>
					<td>{{ $user->fullname}}</td>
					<td>{{ $user->email}}</td>
					<td>{{ $user->phone}}</td>
					<td>{{ $user->birthdate}}</td>
					<td>{{ $user->gender}}</td>
					<td>{{ $user->address}}</td>
					<td>{{ $user->role}}</td>
					<td>
						<img src="{{public_path().'/'.$user->photo}}" width="40px">
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>